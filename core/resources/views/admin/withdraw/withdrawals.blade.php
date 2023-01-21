@extends('admin.layouts.app')

@section('panel')
    <div class="row justify-content-center">
        @if(request()->routeIs('admin.withdraw.log') || request()->routeIs('admin.withdraw.method') || request()->routeIs('admin.users.withdrawals') || request()->routeIs('admin.users.withdrawals.method'))
        @if (!@$search)
        <div class="col-xl-4 col-sm-6 mb-30">
            <div class="widget-two box--shadow2 b-radius--5 bg--success">
            <div class="widget-two__content">
                <h2 class="text-white">{{ __($general->cur_sym) }}{{ $withdrawals->where('status',1)->sum('amount') }}</h2>
                <p class="text-white">@lang('Approved Withdrawals')</p>
            </div>
            </div><!-- widget-two end -->
        </div>
        <div class="col-xl-4 col-sm-6 mb-30">
            <div class="widget-two box--shadow2 b-radius--5 bg--6">
                <div class="widget-two__content">
                    <h2 class="text-white">{{ __($general->cur_sym) }}{{ $withdrawals->where('status',2)->sum('amount') }}</h2>
                    <p class="text-white">@lang('Pending Withdrawals')</p>
                </div>
            </div><!-- widget-two end -->
        </div>
        <div class="col-xl-4 col-sm-6 mb-30">
            <div class="widget-two box--shadow2 b-radius--5 bg--pink">
            <div class="widget-two__content">
                <h2 class="text-white">{{ __($general->cur_sym) }}{{ $withdrawals->where('status',3)->sum('amount') }}</h2>
                <p class="text-white">@lang('Rejected Withdrawals')</p>
            </div>
            </div><!-- widget-two end -->
        </div>
        @endif
       
        @endif
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">

                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two" id="datatable5">
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
                                @if(request()->routeIs('admin.withdraw.pending'))
                                    <th scope="col">@lang('Action')</th>
                                @elseif(request()->routeIs('admin.withdraw.log') || request()->routeIs('admin.withdraw.search')  || request()->routeIs('admin.users.withdrawals'))
                                    <th scope="col">@lang('Status')</th>
                                @endif

                                @if(request()->routeIs('admin.withdraw.approved') || request()->routeIs('admin.withdraw.rejected'))
                                    <th scope="col">@lang('Info')</th>
                                @endif

                            </tr>
                            </thead>
                            <tbody>
                                @if(!empty($withdrawals))
                            @foreach($withdrawals as $withdraw)
                                @php
                                    $details = ($withdraw->withdraw_information != null) ? json_encode($withdraw->withdraw_information) : null;
                                @endphp
                                <tr>
                                    <td data-label="@lang('Date')">{{ showDateTime($withdraw->created_at) }}</td>
                                    <td data-label="@lang('Trx Number')" class="font-weight-bold">{{ strtoupper($withdraw->trx) }}</td>
                                    <td data-label="@lang('Username')">
                                        <a href="{{ route('admin.publisher.details', $withdraw->user_id) }}">{{ optional($withdraw->publisher)->username }}</a>
                                    </td>
                                    <td data-label="@lang('Method')">{{ $withdraw->method->name }}</td>
                                    <td data-label="@lang('Amount')" class="budget font-weight-bold">{{ getAmount($withdraw->amount) }} {{$general->cur_text}}</td>
                                    <td data-label="@lang('Charge')" class="budget text-danger">{{ getAmount($withdraw->charge) }} {{$general->cur_text}}</td>
                                    <td data-label="@lang('After Charge')" class="budget">{{ getAmount($withdraw->after_charge) }} {{$general->cur_text}}</td>
                                    <td data-label="@lang('Rate')" class="budget">{{ getAmount($withdraw->rate) }}  {{$withdraw->currency}}</td>

                                    <td data-label="@lang('Payable')" class="budget font-weight-bold">{{ getAmount($withdraw->final_amount) }} {{ $withdraw->currency }} </td>
                                    @if(request()->routeIs('admin.withdraw.pending'))

                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('admin.withdraw.details', $withdraw->id) }}"
                                               class="icon-btn ml-1 " data-toggle="tooltip" title=""
                                               data-original-title="Detail">
                                                <i class="la la-eye"></i>
                                            </a>
                                        </td>
                                    @elseif(request()->routeIs('admin.withdraw.log') || request()->routeIs('admin.withdraw.search') || request()->routeIs('admin.users.withdrawals'))
                                        <td data-label="@lang('Status')">
                                            @if($withdraw->status == 2)
                                                <span class="text--small badge font-weight-normal badge--warning">@lang('Pending')</span>
                                            @elseif($withdraw->status == 1)
                                                <span class="text--small badge font-weight-normal badge--success">@lang('Approved')</span>
                                            @elseif($withdraw->status == 3)
                                                <span class="text--small badge font-weight-normal badge--danger">@lang('Rejected')</span>
                                            @endif
                                        </td>
                                    @endif
                                    @if(request()->routeIs('admin.withdraw.approved') || request()->routeIs('admin.withdraw.rejected'))
                                        <td data-label="@lang('Info')">
                                            <a href="{{ route('admin.withdraw.details', $withdraw->id) }}"
                                               class="icon-btn ml-1 " data-toggle="tooltip" title=""
                                               data-original-title="Detail">
                                                <i class="la la-desktop"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                               @endforeach
                               @endif

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>

@endsection




@push('breadcrumb-plugins')

@if(request()->routeIs('admin.users.withdrawals'))
<form action="" method="GET" class="form-inline float-sm-right bg--white">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="{{trans('Withdrawal code')}}"
               value="{{ $search ?? '' }}">
        <div class="input-group-append">
            <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@else
<form
    action="{{ route('admin.withdraw.search', $scope ?? str_replace('admin.withdraw.', '', request()->route()->getName())) }}"
    method="GET" class="form-inline float-sm-right bg--white">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="{{trans('Withdrawal code/Username')}}"
               value="{{ $search ?? '' }}">
        <div class="input-group-append">
            <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@endif
    
@endpush

@push('style')
<style>
    table thead tr th:after {
    top: 14px !important;
}
table thead tr th:before {
    bottom: 14px !important;
}


</style>
@endpush

@push('script')
    <script>

 $('#datatable5').DataTable({
            
            "sDom": 'Lfrtlip',
            "language": {
                "lengthMenu": "Show rows  _MENU_",
                search: "",
                searchPlaceholder: "Search"
            }
           
        });

</script>
@endpush