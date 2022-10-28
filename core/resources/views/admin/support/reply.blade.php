@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <h6 class="card-title  mb-4">
                        <div class="row">
                            <div class="col-sm-8 col-md-6">
                                @if($ticket->status == 0)
                                    <span class="text--small badge font-weight-normal bg--success py-1 px-2">@lang('Open')</span>
                                @elseif($ticket->status == 1)
                                    <span class="text--small badge font-weight-normal bg--primary py-1 px-2">@lang('Answered')</span>
                                @elseif($ticket->status == 2)
                                    <span
                                        class="text--small badge font-weight-normal bg--warning py-1 px-2">@lang('Customer Reply')</span>
                                @elseif($ticket->status == 3)
                                    <span class="text--small badge font-weight-normal bg--dark py-1 px-2">@lang('Closed')</span>
                                @endif
                                [@lang('Ticket') #{{ $ticket->ticket }}] {{ $ticket->subject }}
                            </div>
                            <div class="col-sm-4  col-md-6 text-sm-right mt-sm-0 mt-3">

                                <button class="btn btn--danger btn-sm" type="button" data-toggle="modal"
                                        data-target="#DelModal">
                                    <i class="fa fa-lg fa-times-circle"></i> @lang('CLose Ticket')
                                </button>
                            </div>
                        </div>
                    </h6>


                    <form action="{{ route('admin.ticket.reply', $ticket->id) }}" enctype="multipart/form-data" method="post" class="form-horizontal">
                        @csrf
                      

                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="3" id="inputMessage" placeholder="Your Message ..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="inputAttachments">@lang('Attachments')</label>
                                    </div>
                                    <div class="col-9 ">
                                        <div class="file-upload-wrapper" data-text="Select your file!">
                                            <input type="file" name="attachments[]" id="inputAttachments"
                                            class="file-upload-field"/>
                                        </div>
                                        <div id="fileUploadsContainer"></div>
                                    </div>
                                    <div class="col-3">
                                        <button type="button" class="btn btn--dark"
                                                onclick="extraTicketAttachment()"><i
                                                class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-md-12 ticket-attachments-message text-muted mt-3">
                                        @lang('Allowed File Extensions: .jpg, .jpeg, .png, .pdf'),
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 offset-md-3">
                                <button class="btn btn--primary btn-block mt-4" type="submit" name="replayTicket"
                                        value="1"><i class="la la-fw la-lg la-reply"></i> @lang('Reply')
                                </button>
                            </div>
                        </div>
                    </form>

                    @foreach($messages as $message)
                        @if($message->admin_id == 0)

                            <div class="row border border-primary border-radius-3 my-3 mx-2">

                                <div class="col-md-3 border-right text-right">
                                    <h5 class="my-3">{{ $ticket->name }}</h5>
                                    @if($ticket->user_id!=null)
                                        <a href="{{ route('admin.advertiser.details', $ticket->user_id)}}"> {{$ticket->advertiser->name}}</a>
                                        @elseif($ticket->publisher_id!=null)
                                        <a href="{{ route('admin.publisher.details', $ticket->publisher_id)}}"> {{$ticket->publisher->name}}</a>
                                        @else
                                        <p>Guest</p>
                                     @endif
                                    <button data-id="{{$message->id}}" type="button" data-toggle="modal" data-target="#DelMessage" class="btn btn-danger btn-sm my-3 delete-message"><i class="la la-trash"></i> @lang('Delete')</button>
                                </div>

                                <div class="col-md-9">
                                    <p class="text-muted font-weight-bold my-3">
                                        @lang('Posted on') {{ $message->created_at->format('l, dS F Y @ H:i') }}</p>
                                    <p>{{ $message->message }}</p>
                                    @if($message->attachments()->count() > 0)
                                        <div class="my-3">
                                            @foreach($message->attachments as $k=> $image)
                                                <a href="{{route('admin.ticket.download',encrypt($image->id))}}" class="mr-3"><i class="fa fa-file"></i>  @lang('Attachment') {{++$k}} </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                            </div>

                        @else

                            <div class="row border border-warning border-radius-3 my-3 mx-2" style="background-color: #faf8f1;">
                                <div class="col-md-3 border-right text-right">
                                    <h5 class="my-3">{{ $message->admin->name }}</h5>
                                    <p class="lead text-muted">@lang('Staff')</p>
                                    <button data-id="{{$message->id}}" type="button" data-toggle="modal" data-target="#DelMessage" class="btn btn-danger btn-sm my-3 delete-message"><i class="la la-trash"></i> @lang('Delete')</button>
                                </div>

                                <div class="col-md-9">
                                    <p class="text-muted font-weight-bold my-3">
                                        @lang('Posted on') {{ $message->created_at->format('l, dS F Y @ H:i') }}</p>
                                    <p>{{ $message->message }}</p>
                                    @if($message->attachments()->count() > 0)
                                        <div class="my-3">
                                            @foreach($message->attachments as $k=> $image)
                                                <a href="{{route('admin.ticket.download',encrypt($image->id))}}" class="mr-3"><i class="fa fa-file"></i>  @lang('Attachment') {{++$k}} </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                            </div>

                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Close Support Ticket!')</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>@lang('Are you  want to Close This Support Ticket?')</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('admin.ticket.reply', $ticket->id) }}">
                        @csrf
                        <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('No') </button>
                        <button type="submit" class="btn btn--success" name="replayTicket" value="2"> @lang('Close Ticket') </button>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="DelMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('Delete Reply')</h4>
                    <button type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>@lang('Are you sure to delete this?')</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('admin.ticket.delete')}}">
                        @csrf
                        <input type="hidden" name="message_id" class="message_id">
                        <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('No') </button>
                        <button type="submit" class="btn btn--danger"><i class="fa fa-trash"></i> @lang('Delete') </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection




@push('breadcrumb-plugins')
    <a href="{{ route('admin.ticket') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="la la-fw la-backward"></i> @lang('Go Back') </a>
@endpush

@push('script')
    <script>
        'use strict';
        $(document).ready(function () {
            $('.delete-message').on('click', function (e) {
                $('.message_id').val($(this).data('id'));
            })
        });
        function extraTicketAttachment() {
            $("#fileUploadsContainer").append(`
            <div class="file-upload-wrapper" data-text="Select your file!"><input type="file" name="attachments[]" id="inputAttachments" class="file-upload-field"/></div>`)
        }
        
    </script>
@endpush
