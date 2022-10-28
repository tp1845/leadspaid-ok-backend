@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')

    <div class="container-fluid px-0">
        <div class="mt-2">
            <div class="card">
                <div class="table-responsive--sm">
                    <table class="table style--two">
                        <thead class="bg--primary">
                        <tr>
                            <th scope="col">@lang('Subject')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Last Reply')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($supports as $key => $support)
                            <tr>
                                <td data-label="@lang('Subject')"><a
                                        href="{{ route('ticket.view', $support->ticket) }}"
                                        class="font-weight-bold"> [Ticket#{{ $support->ticket }}
                                        ] {{ $support->subject }} </a></td>
                                <td data-label="@lang('Status')">
                                    @if($support->status == 0)
                                        <span class="text--small  badge badge--success">@lang('Open')</span>
                                    @elseif($support->status == 1)
                                        <span class="text--small badge badge--primary">@lang('Answered')</span>
                                    @elseif($support->status == 2)
                                        <span
                                            class="text--small badge badge--warning">@lang('Customer Reply')</span>
                                    @elseif($support->status == 3)
                                        <span class="text--small badge badge--dark">@lang('Closed')</span>
                                    @endif
                                </td>
                                <td data-label="@lang('Last Reply')">{{ \Carbon\Carbon::parse($support->last_reply)->diffForHumans() }} </td>

                                <td data-label="@lang('Action')">
                                    <a href="{{ route('ticket.view', $support->ticket) }}"
                                       class="icon-btn btn--primary btn-sm">
                                        <i class="fa fa-desktop"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center" data-label="@lang('Action')">
                                    @lang('No Tickets')
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="my-3">
                {{paginateLinks($supports)}}
            </div>
        </div>
    </div>


@endsection



@push('breadcrumb-plugins')
    <a href="{{route('ticket.open') }}" class="btn btn-sm btn--primary mr-3">
        <i class="fa fa-plus"></i> @lang('New Ticket')
    </a>
@endpush
