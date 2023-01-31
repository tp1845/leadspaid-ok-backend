@extends('admin.layouts.app')

@section('panel')
    @if(@json_decode($general->sys_version)->version > systemDetails()['version'])
        <div class="row">
            <div class="col-md-12">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">
                        <h3 class="card-title"> @lang('New Version Available') <button class="btn btn--dark float-right">@lang('Version') {{json_decode($general->sys_version)->version}}</button> </h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark">@lang('What is the Update ?')</h5>
                        <p><pre  class="f-size--24">{{json_decode($general->sys_version)->details}}</pre></p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(@json_decode($general->sys_version)->message)
        <div class="row">
            @foreach(json_decode($general->sys_version)->message as $msg)
                <div class="col-md-12">
                    <div class="alert border border--primary" role="alert">
                        <div class="alert__icon bg--primary"><i class="far fa-bell"></i></div>
                        <p class="alert__message">@php echo $msg; @endphp</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="align-items-center breadcrumb-plugins justify-content-between mb-30">
        <div class="col">
            <h6 style="font-size: 14px;">BASIC STATS</h6>
        </div>

        <div style="display: flex;flex-direction: row;gap: 5rem;">
            <table class="dataTable no-footer style--two table table--light table-light" id="data-email" aria-describedby="data-email_info" style="width: 14rem;">
            <thead>
                <tr>
                    <th tabindex="0" aria-controls="data-email" rowspan="1" colspan="2" aria-sort="ascending" aria-label="Status: activate to sort column descending" style="width: 0px;">Advertiser</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd">
                    <td>Active</td>
                    <td>{{$advertiser['active']}}</td>
                </tr>
                <tr class="odd">
                    <td>Pending Approval</td>
                    <td class="" style="color: red;">{{$advertiser['pending']}}</td>
                </tr>
                <tr class="odd">
                    <td>Email Unverified</td>
                    <td>{{$advertiser['unverified']}}</td>
                </tr>
                <tr class="odd">
                    <td>All Advertiser</td>
                    <td>{{$advertiser['all']}}</td>
                </tr>
            </tbody>
            </table>
        <table class="dataTable no-footer style--two table table--light table-light" id="data-email" aria-describedby="data-email_info" style="width: 14rem;">
            <thead>
                <tr>
                    <th  tabindex="0" aria-controls="data-email" rowspan="1" colspan="2" aria-sort="ascending" aria-label="Status: activate to sort column descending" style="width: 0px;">Campaigns</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd">
                    <td>Approved</td>
                    <td>{{$campaign['approved']}}</td>
                </tr>
                <tr class="odd">
                    <td>Pending Approval</td>
                    <td class="" style="color: red;">{{$campaign['pending']}}</td>
                </tr>
                <tr class="odd">
                    <td>Rejected</td>
                    <td>{{$campaign['rejected']}}</td>
                </tr>
                <tr class="odd">
                    <td>All campaigns</td>
                    <td>{{$campaign['all']}}</td>
                </tr>
            </tbody>
        </table>
        <table class="dataTable no-footer style--two table table--light table-light" id="data-email" aria-describedby="data-email_info" style="width: 14rem;">
            <thead>
                <tr>
                    <th tabindex="0" aria-controls="data-email" rowspan="1" colspan="2" aria-sort="ascending" aria-label="Status: activate to sort column descending" style="width: 0px;">Users</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd">
                    <td>Publisher Admin</td>
                    <td>{{$widget['total_admin_publisher']}}</td>
                </tr>
                <tr class="odd">
                    <td>Campaign Manager</td>
                    <td>{{$widget['total_campaign_manager']}}</td>
                </tr>   
                <tr class="odd">
                    <td>Campaign executive</td>
                    <td>{{$widget['total_campaign_executive']}}</td>
                </tr>
                <tr class="odd">
                    <td>Admin</td>
                    <td>{{$widget['total_admin']}}</td>
                </tr>
                <tr class="odd">
                    <td>Pending Login</td>
                    <td class="" style="color: red;">{{$widget['total_pending_login']}}</td>
                </tr>
                <tr class="odd">
                    <td>All Active</td>
                    <td>{{$widget['total_all_active']}}</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>

    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--primary b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{$widget['total_users']}}</span>
                    </div>
                    <div class="desciption">
                        <span class="text--small">@lang('Total Advertiser')</span>
                    </div>
                    <a href="{{route('admin.advertiser.all')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--success b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{$widget['total_publisher']}}</span>
                    </div>
                    <div class="desciption">
                        <span class="text--small">@lang('Total Publisher')</span>
                    </div>
                    <a href="{{route('admin.publisher.all')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--deep-purple b-radius--10 box-shadow ">
                <div class="icon">
                    <i class="la la-envelope"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{$widget['total_ads']}}</span>
                    </div>
                    <div class="desciption">
                        <span class="text--small">@lang('Total Advertises')</span>
                    </div>

                    <a href="{{route('admin.advertise.all')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--warning b-radius--10 box-shadow ">
                <div class="icon">
                    <i class="fab fa-adn"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{$widget['ad_type']}}</span>
                    </div>
                    <div class="desciption">
                        <span class="text--small">@lang('Total Ad Types')</span>
                    </div>

                    <a href="{{route('admin.advertise.type')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->


        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--17 b-radius--10 box-shadow" >
                <div class="icon">
                    <i class="fa fa-list"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{$payment['total_plan']}} </span>
                    </div>
                    <div class="desciption">
                        <span>@lang('Total Price Plans')</span>
                    </div>
                    <a href="{{route('admin.advertise.price-plan')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--16 b-radius--10 box-shadow" >
                <div class="icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{$approvedDomain}} </span>

                    </div>
                    <div class="desciption">
                        <span>@lang('Total Approved Domains')</span>
                    </div>
                    <a href="{{route('admin.domain.approved')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--1 b-radius--10 box-shadow" >
                <div class="icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{$pendingDomain}} </span>

                    </div>
                    <div class="desciption">
                        <span>@lang('Total Pending Domains')</span>
                    </div>
                    <a href="{{route('admin.domain.pending')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--15 b-radius--10 box-shadow" >
                <div class="icon">
                    <i class="fas fa-hand-point-up"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{number_format_short($total_click)}} </span>

                    </div>
                    <div class="desciption">
                        <span>@lang('Total Clicked')</span>
                    </div>
                    <a href="{{route('admin.advertise.all')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--13 b-radius--10 box-shadow" >
                <div class="icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{number_format_short($total_imp)}} </span>
                    </div>
                    <div class="desciption">
                        <span>@lang('Total Impressions')</span>
                    </div>
                    <a href="{{route('admin.advertise.all')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
         </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                <div class="dashboard-w1 bg--indigo b-radius--10 box-shadow" >
                    <div class="icon">
                        <i class="fa fa-wallet"></i>
                    </div>
                    <div class="details">
                        <div class="numbers">
                            <span class="amount">{{$paymentWithdraw['withdraw_method']}}</span>
                        </div>
                        <div class="desciption">
                            <span>@lang('Withdraw Method')</span>
                        </div>
                        <a href="{{route('admin.withdraw.method.index')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                <div class="dashboard-w1 bg--purple b-radius--10 box-shadow" >
                    <div class="icon">
                        <i class="fa fa-hand-holding-usd"></i>
                    </div>
                     <div class="details">
                        <div class="numbers">
                            <span class="amount">{{getAmount($paymentWithdraw['total_withdraw_amount'])}}</span>
                            <span class="currency-sign">{{$general->cur_text}}</span>
                        </div>
                        <div class="desciption">
                            <span>@lang('Total Withdraw')</span>
                        </div>
                        <a href="{{route('admin.withdraw.approved')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-6 col-sm-4 mb-30">
                <div class="dashboard-w1 bg--teal b-radius--10 box-shadow">
                    <div class="icon">
                        <i class="fa fa-spinner"></i>
                    </div>
                    <div class="details">
                        <div class="numbers">
                            <span class="amount">{{$paymentWithdraw['total_withdraw_pending']}}</span>
                        </div>
                        <div class="desciption">
                            <span>@lang('Withdraw Pending')</span>
                        </div>

                        <a href="{{route('admin.withdraw.pending')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                <div class="dashboard-w1 bg--brown b-radius--10 box-shadow" >
                    <div class="icon">
                        <i class="fa fa-money-bill-alt"></i>
                    </div>
                    <div class="details">
                        <div class="numbers">
                            <span class="amount">{{$paymentWithdraw['total_withdraw_approved']}} </span>
                        </div>
                        <div class="desciption">
                            <span>@lang('Withdraw Approved')</span>
                        </div>
                        <a href="{{route('admin.withdraw.approved')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                <div class="dashboard-w1 bg--12 b-radius--10 box-shadow" >
                    <div class="icon">
                        <i class="fa fa-money-bill-alt"></i>
                    </div>
                    <div class="details">
                        <div class="numbers">
                            <span class="amount">{{getAmount($general->cpc)}} </span>
                            <span class="currency-sign">{{$general->cur_text}}</span>
                        </div>
                        <div class="desciption">
                            <span>@lang('Current CPC')</span>
                        </div>
                        <a href="{{route('admin.advertise.perCost')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View')</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                <div class="dashboard-w1 bg--8 b-radius--10 box-shadow" >
                    <div class="icon">
                        <i class="fa fa-money-bill-alt"></i>
                    </div>
                    <div class="details">
                        <div class="numbers">
                            <span class="amount">{{getAmount($general->cpm)}} </span>
                            <span class="currency-sign">{{$general->cur_text}}</span>
                        </div>
                        <div class="desciption">
                            <span>@lang('Current CPM')</span>
                        </div>
                        <a href="{{route('admin.advertise.perCost')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View')</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                <div class="dashboard-w1 bg--19 b-radius--10 box-shadow" >
                    <div class="icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="details">
                        <div class="numbers">
                            <span class="amount">{{$pendingTicket}} </span>
                        </div>
                        <div class="desciption">
                            <span>@lang('Total Pending Tickets')</span>
                        </div>
                        <a href="{{route('admin.ticket.pending')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                    </div>
                </div>
            </div>
          </div><!-- row end-->


    <div class="row mt-50 mb-none-30">
        <div class="col-xl-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Monthly  Deposit & Withdraw  Report')</h5>
                    <div id="apex-bar-chart"> </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-30">
            <div class="row mb-none-30">
                <div class="col-lg-6 col-sm-6 mb-30">
                    <div class="widget-three box--shadow2 b-radius--5 bg--white">
                        <div class="widget-three__icon b-radius--rounded bg--primary box--shadow2">
                            <i class="las la-wallet "></i>
                        </div>
                        <div class="widget-three__content">
                            <h2 class="numbers">{{$payment['payment_method']}}</h2>
                            <p  class="text--small">@lang('Total Payment Method')</p>
                        </div>
                    </div><!-- widget-two end -->
                </div>
                <div class="col-lg-6 col-sm-6 mb-30">
                    <div class="widget-three box--shadow2 b-radius--5 bg--white">
                        <div class="widget-three__icon b-radius--rounded bg--pink  box--shadow2">
                            <i class="las la-money-bill "></i>
                        </div>
                        <div class="widget-three__content">
                            <h2 class="numbers">{{getAmount($payment['total_deposit_amount'])}} {{$general->cur_text}}</h2>
                            <p class="text--small">@lang('Total Deposit')</p>
                        </div>
                    </div><!-- widget-two end -->
                </div>
                <div class="col-lg-6 col-sm-6 mb-30">
                    <div class="widget-three box--shadow2 b-radius--5 bg--white">
                        <div class="widget-three__icon b-radius--rounded bg--teal box--shadow2">
                            <i class="las la-money-check"></i>
                        </div>
                        <div class="widget-three__content">
                            <h2 class="numbers">{{getAmount($payment['total_deposit_charge'])}} {{$general->cur_text}}</h2>
                            <p class="text--small">@lang('Total Deposit Charge')</p>
                        </div>
                    </div><!-- widget-two end -->
                </div>
                <div class="col-lg-6 col-sm-6 mb-30">
                    <div class="widget-three box--shadow2 b-radius--5 bg--white">
                        <div class="widget-three__icon b-radius--rounded bg--green  box--shadow2">
                            <i class="las la-money-bill-wave "></i>
                        </div>
                        <div class="widget-three__content">
                            <h2 class="numbers">{{$payment['total_deposit_pending']}}</h2>
                            <p class="text--small">@lang('Pending Deposit')</p>
                        </div>
                    </div><!-- widget-two end -->
                </div>
            </div>
        </div>
    </div><!-- row end -->

    <div class="row mb-none-30 mt-5">
        <div class="col-xl-12 mb-30">
            <div class="card ">
                <div class="card-header">
                    <h6 class="card-title mb-0">@lang('Latest Transactions')</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Date')</th>
                                <th scope="col">@lang('TRX')</th>

                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Charge')</th>
                                <th scope="col">@lang('Post Balance')</th>
                                <th scope="col">@lang('Detail')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($transactions as $trx)
                                <tr>
                                    <td data-label="Date">{{ showDateTime($trx->created_at) }}</td>
                                    <td data-label="TRX" class="font-weight-bold">{{ $trx->trx }}</td>
                                    <td data-label="Amount" class="budget">
                                        <strong @if($trx->trx_type == '+') class="text-success" @else class="text-danger" @endif> {{($trx->trx_type == '+') ? '+':'-'}} {{getAmount($trx->amount)}} {{$general->cur_text}}</strong>
                                    </td>
                                    <td data-label="Charge" class="budget">{{ $general->cur_sym }} {{ getAmount($trx->charge) }} </td>
                                    <td data-label="Post Balance">{{ $trx->post_balance +0 }} {{$general->cur_text}}</td>
                                    <td data-label="Detail">{{ $trx->details }}</td>
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
            </div><!-- card end -->
        </div>
    </div>

    <div class="row mb-none-30 mt-5">
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By Browser')</h5>
                    <canvas id="userBrowserChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By OS')</h5>
                    <canvas id="userOsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By Country')</h5>
                    <canvas id="userCountryChart"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('style')
<style>
.table th{
    font-size: 16px !important;
}
.table tr td{
    font-size: 16px;
}
</style>

#endpush
@push('script')

    <script src="{{asset('assets/admin/js/vendor/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendor/chart.js.2.8.0.js')}}"></script>

    <script>
        'use strict'
            // apex-bar-chart js
        var options = {
            series: [{
                name: 'Total Deposit',
                data: [
                    @foreach($report['months'] as $month)
                    {{ getAmount(@$depositsMonth->where('months',$month)->first()->depositAmount) }},
                    @endforeach
                ]
            }, {
                name: 'Total Withdraw',
                data: [
                    @foreach($report['months'] as $month)
                    {{ getAmount(@$withdrawalMonth->where('months',$month)->first()->withdrawAmount) }},
                    @endforeach
                ]
            }],
            chart: {
                type: 'bar',
                height: 400,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json($report['months']->flatten()),
            },
            yaxis: {
                title: {
                    text: "{{__($general->cur_sym)}}",
                    style: {
                        color: '#7c97bb'
                    }
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "{{__($general->cur_sym)}}" + val + " "
                    }
                }
            }
        };

            var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
            chart.render();

    </script>






 <script>

        var ctx = document.getElementById('userBrowserChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_browser_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_browser_counter']->flatten() }},
                    backgroundColor: [
                        '#FF4500',
                        '#e52d27',
                        '#fba540',
                        '#e7505a',
                        '#5050bf',
                        '#8E44AD',
                        '#4f8a8b',
                        '#1f4068',
                        '#62760c',
                        '#be5683',
                        '#cf1b1b',
                        '#96bb7c',
                        '#d3de32',
                        '#e8505b',
                        '#24a19c',
                        '#3b6978',
                        '#b83b5e',
                        '#ff4301',
                        '#c4fb6d',
                        '#bac964',
                        '#fb7813',
                        '#3b6978',
                        '#f3c623',
                        '#127681',
                        '#562349',
                        '#1f4068',
                        '#035aa6',
                        '#95389e',
                        '#481380'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                maintainAspectRatio: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });



        var ctx = document.getElementById('userOsChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_os_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_os_counter']->flatten() }},
                    backgroundColor: [
                        '#FF4500',
                        '#e52d27',
                        '#fba540',
                        '#e7505a',
                        '#5050bf',
                        '#8E44AD',
                        '#4f8a8b',
                        '#1f4068',
                        '#62760c',
                        '#be5683',
                        '#cf1b1b',
                        '#96bb7c',
                        '#d3de32',
                        '#e8505b',
                        '#24a19c',
                        '#3b6978',
                        '#b83b5e',
                        '#ff4301',
                        '#c4fb6d',
                        '#bac964',
                        '#fb7813',
                        '#3b6978',
                        '#f3c623',
                        '#127681',
                        '#562349',
                        '#1f4068',
                        '#035aa6',
                        '#95389e',
                        '#481380'

                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 0.05)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            },
        });


        //Donut chart
        var ctx = document.getElementById('userCountryChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_country_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_country_counter']->flatten() }},
                    backgroundColor: [
                        '#FF4500',
                        '#e52d27',
                        '#fba540',
                        '#e7505a',
                        '#5050bf',
                        '#8E44AD',
                        '#4f8a8b',
                        '#1f4068',
                        '#62760c',
                        '#be5683',
                        '#cf1b1b',
                        '#96bb7c',
                        '#d3de32',
                        '#e8505b',
                        '#24a19c',
                        '#3b6978',
                        '#b83b5e',
                        '#ff4301',
                        '#c4fb6d',
                        '#bac964',
                        '#fb7813',
                        '#3b6978',
                        '#f3c623',
                        '#127681',
                        '#562349',
                        '#1f4068',
                        '#035aa6',
                        '#95389e',
                        '#481380',
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 3,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
</script>
@endpush

