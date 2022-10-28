@extends($activeTemplate.'layouts.publisher.frontend')

@section('panel')
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg--primary">

                        <a href="{{route('ticket') }}" class="btn btn-sm btn--dark  float-right">
                            @lang('My Support Tickets')
                        </a>
                    </div>
                    <div class="card-body">

                        <form  action="{{route('ticket.store')}}"  method="post" enctype="multipart/form-data" onsubmit="return submitUserForm();">
                            @csrf
                            <div class="row ">
                                <div class="form-group col-md-6">
                                    <label for="name">@lang('Name')</label>
                                    <input type="text"  name="name" value="{{@$user->name}}" class="form-control form-control-lg" placeholder="@lang('Enter Name')" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">@lang('Email address')</label>
                                    <input type="email"  name="email" value="{{@$user->email}}" class="form-control form-control-lg" placeholder="@lang('Enter your Email')" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="website">@lang('Subject')</label>
                                    <input type="text" name="subject" value="{{old('subject')}}" class="form-control form-control-lg" placeholder="@lang('Subject')" >
                                </div>

                                <div class="col-12 form-group">
                                    <label for="inputMessage">@lang('Message')</label>
                                    <textarea name="message" id="inputMessage" rows="6" class="form-control form-control-lg">{{old('message')}}</textarea>
                                </div>
                            </div>

                            <div class="row form-group ">
                                <div class="col-sm-9 file-upload">
                                    <label for="inputAttachments">@lang('Attachments')</label>
                                    <div class="file-upload-wrapper" data-text="Select your file!">
                                        <input type="file" name="attachments[]" id="inputAttachments" class="file-upload-field">
                                    </div>
                                    <div id="fileUploadsContainer"></div>
                                    <p class="ticket-attachments-message text-muted">
                                        @lang("Allowed File Extensions: .jpg, .jpeg, .png, .pdf, .doc, .docx")
                                    </p>
                                </div>

                                <div class="col-sm-1 mt-2">
                                    <button type="button" class="btn btn--primary btn-sm mt-4" onclick="extraTicketAttachment()">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="row form-group justify-content-center">
                                <div class="col-md-12">
                                    <button class="btn btn--primary" type="submit" id="recaptcha" ><i class="fa fa-paper-plane"></i>&nbsp;@lang('Submit')</button>
                                    <button class=" btn btn-danger" type="button" onclick="formReset()">&nbsp;@lang('Cancel')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        'use strict'
        function extraTicketAttachment() {
            $("#fileUploadsContainer").append(`<div class="file-upload-wrapper" data-text="Select your file!">
                                                    <input type="file" name="attachments[]" id="inputAttachments" class="file-upload-field">
                                                </div>`)
        }
        function formReset() {
            window.location.href = "{{url()->current()}}"
        }
    </script>
@endpush


