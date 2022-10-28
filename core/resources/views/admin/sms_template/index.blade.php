@extends('admin.layouts.app')

@section('panel')

    <div class="row mb-none-30">


        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two custom-data-table">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($sms_templates as $template)
                                <tr>
                                    <td data-label="@lang('Name')">
                                        {{ __($template->name) }}
                                    </td>

                                    <td data-label="@lang('Status')">
                                        @if($template->sms_status == 1)
                                            <span class="badge  badge--success">@lang('Active')</span>
                                        @else
                                            <span class="badge  badge--warning">@lang('Disabled')</span>
                                        @endif
                                    </td>

                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('admin.sms.template.edit', $template->id) }}"
                                           class="icon-btn ml-1 editGatewayBtn" data-toggle="tooltip"
                                           data-original-title="@lang('Edit')">
                                            <i class="la la-pencil"></i>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


