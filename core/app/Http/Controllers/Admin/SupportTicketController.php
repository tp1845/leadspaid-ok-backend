<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SupportAttachment;
use App\SupportMessage;
use App\SupportTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class SupportTicketController extends Controller
{
    public function tickets()
    {
        $page_title = 'Support Tickets';
        $empty_message = 'No Data found.';
        $items = SupportTicket::latest()->with(['advertiser','publisher'])->paginate(getPaginate());
        return view('admin.support.tickets', compact('items', 'page_title','empty_message'));
    }

    public function pendingTicket()
    {
        $page_title = 'Pending Tickets';
        $empty_message = 'No Data found.';
        $items = SupportTicket::whereIn('status', [0,2])->latest()->with(['advertiser','publisher'])->paginate(getPaginate());
        return view('admin.support.tickets', compact('items', 'page_title','empty_message'));
    }

    public function closedTicket()
    {
        $empty_message = 'No Data found.';
        $page_title = 'Closed Tickets';
        $items = SupportTicket::whereIn('status', [3])->latest()->with(['advertiser','publisher'])->paginate(getPaginate());
        return view('admin.support.tickets', compact('items', 'page_title','empty_message'));
    }

    public function answeredTicket()
    {
        $page_title = 'Answered Tickets';
        $empty_message = 'No Data found.';
        $items = SupportTicket::latest()->with(['advertiser','publisher'])->whereIN('status', [1])->paginate(getPaginate());
        return view('admin.support.tickets', compact('items', 'page_title','empty_message'));
    }


    public function ticketReply($id)
    {
        $ticket = SupportTicket::with(['advertiser','publisher'])->where('id', $id)->firstOrFail();
        $page_title = 'Support Tickets';
        $messages = SupportMessage::with('ticket')->where('supportticket_id', $ticket->id)->latest()->get();
        return view('admin.support.reply', compact('ticket', 'messages', 'page_title'));
    }



    public function ticketReplySend(Request $request, $id)
    {
        $ticket = SupportTicket::with(['advertiser','publisher'])->where('id', $id)->firstOrFail();
        $message = new SupportMessage();
        if ($request->replayTicket == 1) {

            $imgs = $request->file('attachments');
            $allowedExts = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');

            $this->validate($request, [
                'attachments' => [
                    'max:4096',
                    function ($attribute, $value, $fail) use ($imgs, $allowedExts) {
                        foreach ($imgs as $img) {
                            $ext = strtolower($img->getClientOriginalExtension());
                            if (($img->getSize() / 1000000) > 2) {
                                return $fail("Images MAX  2MB ALLOW!");
                            }

                            if (!in_array($ext, $allowedExts)) {
                                return $fail("Only png, jpg, jpeg, pdf, doc, docx files are allowed");
                            }
                        }
                        if (count($imgs) > 5) {
                            return $fail("Maximum 5 files can be uploaded");
                        }
                    }
                ],
                'message' => 'required',
            ]);
            $ticket->status = 1;
            $ticket->last_reply = Carbon::now();
            $ticket->save();

            $message->supportticket_id = $ticket->id;
            $message->admin_id = Auth::guard('admin')->id();
            $message->message = $request->message;
            $message->save();

            $path = imagePath()['ticket']['path'];
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    try {
                        $attachment = new SupportAttachment();
                        $attachment->support_message_id = $message->id;
                        $attachment->attachment = uploadFile($file, $path);
                        $attachment->save();
                    } catch (\Exception $exp) {
                        $notify[] = ['error', 'Could not upload your ' . $file];
                        return back()->withNotify($notify)->withInput();
                    }
                }
            }

            notify($ticket, 'ADMIN_SUPPORT_REPLY', [
                'ticket_id' => $ticket->ticket,
                'ticket_subject' => $ticket->subject,
                'reply' => $request->message,
                'link' => route('ticket.view',$ticket->ticket),
            ]);

            $notify[] = ['success', "Support ticket replied successfully"];

        } elseif ($request->replayTicket == 2) {
            $ticket->status = 3;
            $ticket->save();
            $notify[] = ['success', "Support ticket closed successfully"];
        }
        return back()->withNotify($notify);
    }


    public function ticketDownload($ticket_id)
    {
        $attachment = SupportAttachment::findOrFail(decrypt($ticket_id));
        $file = $attachment->attachment;


        $path = imagePath()['ticket']['path'];

        $full_path = $path.'/' . $file;
        $title = str_slug($attachment->supportMessage->ticket->subject).'-'.$file;
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $mimetype = mime_content_type($full_path);
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($full_path);
    }
    public function ticketDelete(Request $request)
    {
        $message = SupportMessage::findOrFail($request->message_id);
        $path = imagePath()['ticket']['path'];
        if ($message->attachments()->count() > 0) {
            foreach ($message->attachments as $img) {
                @unlink($path.'/'.$img->image);
                $img->delete();
            }
        }
        $message->delete();
        $notify[] = ['success', "Delete Successfully"];
        return back()->withNotify($notify);

    }

}
