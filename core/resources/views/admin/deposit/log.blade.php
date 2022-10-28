@extends('admin.layouts.app')

@section('panel')
<div class="row">

    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two">
                        <thead>
                        <tr>
                            <th scope="col">@lang('Date')</th>
                            <th scope="col">@lang('Trx Number')</th>
                            <th scope="col">@lang('Username')</th>
                            <th scope="col">@lang('Method')</th>
                            <th scope="col">@lang('Amount')</th>
                            <th scope="col">@lang('Charge')</th>
                            <th scope="col">@lang('After Charge')</th>
                            <th scope="col">@lang('Rate')</th>
                            <th scope="col">@lang('Payable')</th>

                            @if(request()->routeIs('admin.deposit.pending') || request()->routeIs('admin.deposit.approved'))
                                <th scope="col">@lang('Action')</th>

                            @elseif(request()->routeIs('admin.deposit.list') || request()->routeIs('admin.deposit.search') || request()->routeIs('admin.users.deposits'))
                                <th scope="col">@lang('Status')</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($deposits as $deposit)
                            @php
                                $details = ($deposit->detail != null) ? json_encode($deposit->detail) : null;
                            @endphp

                            <tr>
                                <td data-label="@lang('Date')"> {{ showDateTime($deposit->created_at) }}</td>
                                <td data-label="@lang('Trx Number')" class="font-weight-bold text-uppercase">{{ $deposit->trx }}</td>
                                <td data-label="@lang('Username')"><a href="{{ route('admin.advertiser.details', $deposit->user_id) }}">{{ $deposit->user->username }}</a></td>
                                <td data-label="@lang('Method')">{{ $deposit->gateway->name }}</td>
                                <td data-label="@lang('Amount')" class="font-weight-bold">{{ getAmount($deposit->amount ) }} {{ $general->cur_text }}</td>
                                <td data-label="@lang('Charge')" class="text-success">{{ getAmount($deposit->charge)}} {{ $general->cur_text }}</td>
                                <td data-label="@lang('After Charge')"> {{ getAmount($deposit->amount+$deposit->charge) }} {{ $general->cur_text }}</td>
                                <td data-label="@lang('Rate')"> {{ getAmount($deposit->rate) }} {{$deposit->method_currency}}</td>
                                <td data-label="@lang('Payable')" class="font-weight-bold">{{ getAmount($deposit->final_amo) }} {{$deposit->method_currency}}</td>

                                @if(request()->routeIs('admin.deposit.approved') || request()->routeIs('admin.deposit.pending'))

                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('admin.deposit.details', $deposit->id) }}"
                                           class="icon-btn ml-1 " data-toggle="tooltip" title="" data-original-title="Detail">
                                            <i class="la la-eye"></i>
                                        </a>
                                    </td>

                                @elseif(request()->routeIs('admin.deposit.list')  || request()->routeIs('admin.deposit.search') || request()->routeIs('admin.users.deposits'))
                                    <td data-label="@lang('Status')">
                                        @if($deposit->status == 2)
                                            <span class="text--small badge font-weight-normal badge--warning">@lang('Pending')</span>
                                        @elseif($deposit->status == 1)
                                            <span class="text--small badge font-weight-normal badge--success">@lang('Approved')</span>
                                        @elseif($deposit->status == 3)
                                            <span class="text--small badge font-weight-normal badge--danger">@lang('Rejected')</span>
                                        @endif
                                    </td>
                                @endif
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
                {{ $deposits->links('admin.partials.paginate') }}
            </div>
        </div><!-- card end -->
    </div>
</div>



@endsection


@push('breadcrumb-plugins')
    @if(request()->routeIs('admin.users.deposits'))
        <form action="" method="GET" class="form-inline float-sm-right bg--white">
            <div class="input-group has_append">
                <input type="text" name="search" class="form-control" placeholder="{{trans('Deposit code')}}" value="{{ $search ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    @else

        <form action="{{route('admin.deposit.search', $scope ?? str_replace('admin.deposit.', '', request()->route()->getName()))}}" method="GET" class="form-inline float-sm-right bg--white">
            <div class="input-group has_append  ">
                <input type="text" name="search" class="form-control" placeholder="{{trans('Deposit code/Username')}}" value="{{ $search ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    @endif
@endpush


