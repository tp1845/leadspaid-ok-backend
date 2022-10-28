<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SupportAttachment;
use App\SupportMessage;
use App\SupportTicket;
use Auth;
use Image;
use File;
use Validator;
use Session;
use Carbon\Carbon;

class TicketController extends Controller
{

    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }


    // Support Ticket
    public function supportTicket()
    {

        if (auth()->guard('advertiser')->user()) {
            $user = auth()->guard('advertiser')->user();
            $view = 'advertiser';
            $supports = SupportTicket::where('user_id', $user->id)->latest()->paginate(15);
        } else {
            $user = auth()->guard('publisher')->user();
            if ($user == null) {
                abort(404);
            }
            $view = 'publisher';
            $supports = SupportTicket::where('publisher_id', $user->id)->latest()->paginate(15);
        }

        $page_title = "Support Tickets";
        return view($this->activeTemplate . $view . '.support.index', compact('supports', 'page_title'));
    }


    public function openSupportTicket()
    {

        $page_title = "Open New Ticket";
        if (auth()->guard('advertiser')->user() != null) {
            $user = auth()->guard('advertiser')->user();
            $view = 'advertiser';
        } else {
            $user = auth()->guard('publisher')->user();
            $view = 'publisher';
        }
        if (!$user) {
            abort(404);
        }
        return view($this->activeTemplate . $view . '.support.create', compact('page_title', 'user'));
    }

    public function storeSupportTicket(Request $request)
    {
        $ticket = new SupportTicket();
        $message = new SupportMessage();

        $files = $request->file('attachments');
        $allowedExts = array('jpg', 'png', 'jpeg', 'pdf');

        $this->validate($request, [
            'attachments' => [
                'max:4096',
                function ($attribute, $value, $fail) use ($files, $allowedExts) {
                    foreach ($files as $file) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (($file->getSize() / 1000000) > 2) {
                            return $fail("Images MAX  2MB ALLOW!");
                        }
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg, pdf images are allowed");
                        }
                    }
                    if (count($files) > 5) {
                        return $fail("Maximum 5 images can be uploaded");
                    }
                },
            ],
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'subject' => 'required|max:100',
            'message' => 'required',
        ]);

        if (auth()->guard('advertiser')->user() != null) {
            $user = auth()->guard('advertiser')->user();
            $ticket->user_id = $user->id;
        } else {
            $user = auth()->guard('publisher')->user();
            $ticket->publisher_id = $user->id;
        }

        $random = rand(100000, 999999);
        $ticket->ticket = $random;
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->save();

        $message->supportticket_id = $ticket->id;
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
        $notify[] = ['success', 'ticket created successfully!'];
        return redirect()->route('ticket')->withNotify($notify);
    }

    public function viewTicket($ticket)
    {
        $page_title = "Support Tickets";
        $my_ticket = SupportTicket::where('ticket', $ticket)->latest()->firstOrFail();
        $messages = SupportMessage::where('supportticket_id', $my_ticket->id)->latest()->get();
        if (auth()->guard('advertiser')->user() != null) {
            $user = auth()->guard('advertiser')->user();
            $view = 'advertiser';
        } elseif (auth()->guard('publisher')->user() != null) {
            $user = auth()->guard('publisher')->user();
            $view = 'publisher';
        } else {
            $user = null;
            $view = 'user';
        }
        return view($this->activeTemplate . $view . '.support.view', compact('my_ticket', 'messages', 'page_title', 'user'));

    }

    public function replyTicket(Request $request, $id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $message = new SupportMessage();

        if ($request->replayTicket == 1) {
            $files = $request->file('attachments');
            $allowedExts = array('jpg', 'png', 'jpeg', 'pdf');

            $this->validate($request, [
                'attachments' => [
                    'max:4096',
                    function ($attribute, $value, $fail) use ($files, $allowedExts) {
                        foreach ($files as $file) {
                            $ext = strtolower($file->getClientOriginalExtension());
                            if (($file->getSize() / 1000000) > 2) {
                                return $fail("Images MAX  2MB ALLOW!");
                            }
                            if (!in_array($ext, $allowedExts)) {
                                return $fail("Only png, jpg, jpeg, pdf images are allowed");
                            }
                        }
                        if (count($files) > 5) {
                            return $fail("Maximum 5 images can be uploaded");
                        }
                    },
                ],
                'message' => 'required',
            ]);

            $ticket->status = 2;
            $ticket->last_reply = Carbon::now();
            $ticket->save();

            $message->supportticket_id = $ticket->id;
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

            $notify[] = ['success', 'Support ticket replied successfully!'];
        } elseif ($request->replayTicket == 2) {
            $ticket->status = 3;
            $ticket->last_reply = Carbon::now();
            $ticket->save();
            $notify[] = ['success', 'Support ticket closed successfully!'];
        }
        return back()->withNotify($notify);

    }

    public function ticketDownload($ticket_id)
    {
        $attachment = SupportAttachment::findOrFail(decrypt($ticket_id));
        $file = $attachment->attachment;

        $path = imagePath()['ticket']['path'];
        $full_path = $path . '/' . $file;

        $title = str_slug($attachment->supportMessage->ticket->subject);
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $mimetype = mime_content_type($full_path);


        header('Content-Disposition: attachment; filename="' . $title . '.' . $ext . '";');
        header("Content-Type: " . $mimetype);
        return readfile($full_path);
    }

}
