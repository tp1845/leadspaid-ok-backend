@extends('admin.layouts.app')

@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light">
                        <thead>
                        <tr>
                            <th scope="col">@lang('Subject')</th>
                            <th scope="col">@lang('Submitted By')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Last Reply')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td data-label="Subject">
                                    <a href="{{ route('admin.ticket.view', $item->id) }}" class="font-weight-bold"> [@lang('Ticket') #{{ $item->ticket }}] {{ $item->subject }} </a>
                                </td>

                                <td data-label="Submitted By">
                                    @if($item->user_id!=null)
                                    <a href="{{ route('admin.advertiser.details', $item->user_id)}}"> {{$item->advertiser->username}} </a> <small>@lang('(Advertiser)')</small>
                                    @elseif($item->publisher_id!=null)
                                    <a href="{{ route('admin.publisher.details', $item->publisher_id)}}"> {{$item->publisher->username}}</a> <small>@lang('(Publisher)')</small>
                                    @else
                                    <p>Guest</p>
                                    @endif
                                </td>
                                <td data-label="Status">
                                    @if($item->status == 0)
                                        <span class="text--small badge font-weight-normal badge--success">@lang('Open')</span>
                                    @elseif($item->status == 1)
                                        <span class="text--small badge font-weight-normal badge--primary">@lang('Answered')</span>
                                    @elseif($item->status == 2)
                                        <span class="text--small badge font-weight-normal badge--warning">@lang('Customer Reply')</span>
                                    @elseif($item->status == 3)
                                        <span class="text--small badge font-weight-normal badge--dark">@lang('Closed')</span>
                                    @endif
                                </td>

                                <td data-label="Last Reply">
                                    {{ \Carbon\Carbon::parse($item->last_reply)->diffForHumans() }}
                                </td>

                                <td data-label="Action">
                                    <a href="{{ route('admin.ticket.view', $item->id) }}" class="icon-btn  ml-1" data-toggle="tooltip" title="" data-original-title="Details">
                                        <i class="las la-desktop"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            <div class="card-footer py-4">
                {{ $items->links('admin.partials.paginate') }}
            </div>
        </div><!-- card end -->
    </div>
</div>
@endsection


