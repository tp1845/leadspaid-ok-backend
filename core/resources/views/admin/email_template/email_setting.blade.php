@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('admin.email.template.setting') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="mb-4">@lang('Email Send Method')</label>
                                <select name="email_method" class="form-control" >
                                    <option value="php" @if($general_setting->mail_config->name == 'php') selected @endif>@lang('PHP Mail')</option>
                                    <option value="smtp" @if($general_setting->mail_config->name == 'smtp') selected @endif>@lang('SMTP')</option>
                                    <option value="sendgrid" @if($general_setting->mail_config->name == 'sendgrid') selected @endif>@lang('SendGrid API')</option>
                                    <option value="mailjet" @if($general_setting->mail_config->name == 'mailjet') selected @endif>@lang('Mailjet API')</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 text-right">
                                <h6 class="mb-4">&nbsp;</h6>
                                <button type="button" data-target="#testMailModal" data-toggle="modal" class="btn btn--info">@lang('Send Test Mail')</button>
                            </div>
                        </div>
                        <div class="form-row mt-4 d-none configForm" id="smtp">
                            <div class="col-md-12">
                                <h6 class="mb-2">@lang('SMTP Configuration')</h6>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-bold">@lang('Host') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="e.g. smtp.googlemail.com" name="host" value="{{ $general_setting->mail_config->host ?? '' }}"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-bold">@lang('Port') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Available port" name="port" value="{{ $general_setting->mail_config->port ?? '' }}"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-bold">@lang('Encryption')</label>
                                <select class="form-control" name="enc">
                                    <option value="ssl">@lang('SSL')</option>
                                    <option value="tls">@lang('TLS')</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">@lang('Username') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Normally your email address" name="username" value="{{ $general_setting->mail_config->username ?? '' }}"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">@lang('Password') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Normally your email password" name="password" value="{{ $general_setting->mail_config->password ?? '' }}"/>
                            </div>
                        </div>
                        <div class="form-row mt-4 d-none configForm" id="sendgrid">
                            <div class="col-md-12">
                                <h6 class="mb-2">@lang('SendGrid API Configuration')</h6>
                            </div>
                            <div class="form-group col-md-12">
                                <label>@lang('APP KEY') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="@lang('SendGrid app key')" name="appkey" value="{{ $general_setting->mail_config->appkey ?? '' }}"/>
                            </div>
                        </div>
                        <div class="form-row mt-4 d-none configForm" id="mailjet">
                            <div class="col-md-12">
                                <h6 class="mb-2">@lang('Mailjet API Configuration')</h6>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">@lang('API PUBLIC KEY') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="@lang('Mailjet API PUBLIC KEY')" name="public_key" value="{{ $general_setting->mail_config->public_key ?? '' }}"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">@lang('API SECRET KEY') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="@lang('Mailjet API SECRET KEY')" name="secret_key" value="{{ $general_setting->mail_config->secret_key ?? '' }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn--primary mr-2">@lang('Update')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>


    </div>


    {{-- TEST MAIL MODAL --}}
    <div id="testMailModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Test Mail Setup')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.email.template.sendTestMail') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>@lang('Sent to') <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" placeholder="@lang('Email Address')">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--success">@lang('Send')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        'use strict'
        $(function () {
            "use strict";
            $('select[name=email_method]').on('change', function() {
                var method = $(this).val();
                $('.configForm').addClass('d-none');
                if(method != 'php') {
                    $(`#${method}`).removeClass('d-none');
                }
            }).change();

        });

    </script>
@endpush
