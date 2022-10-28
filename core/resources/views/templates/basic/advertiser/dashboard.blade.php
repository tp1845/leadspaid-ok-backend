@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')
    <div class="row mb-none-30 ">
        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--success b-radius--10 bg--white p-4 box--shadow2 has--link">

                <div class="widget__icon b-radius--rounded bg--success"><i class="fa fa-globe"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Total Impression')</p>
                    <h2 class="text--success font-weight-bold widget-amount">{{collect($totalImp)->sum('impression') }}</h2>
                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div><!-- widget end -->
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--primary b-radius--10 bg--white p-4 box--shadow2 has--link">
                <div class="widget__icon b-radius--rounded bg--primary"><i class="fa fa-hand-point-up"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Total Clicked')</p>
                    <h2 class="text--primary font-weight-bold widget-amount">{{collect($totalImp)->sum('clicked') }}</h2>
                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--info b-radius--10 bg--white p-4 box--shadow2 has--link">

                <div class="widget__icon b-radius--rounded bg--info"><i class="fa fa-globe"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Remain Impression Credit')</p>
                    <h2 class="text--info font-weight-bold widget-amount">{{ auth()->guard('advertiser')->user()->impression_credit??'0' }}</h2>
                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--warning b-radius--10 bg--white p-4 box--shadow2 has--link">
                <div class="widget__icon b-radius--rounded bg--warning"><i class="fa fa-hand-point-up"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Remain Click Credit')</p>
                    <h2 class="text--warning font-weight-bold widget-amount">{{ auth()->guard('advertiser')->user()->click_credit??'0' }}</h2>

                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div><!-- widget end -->
        </div>


        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--cyan b-radius--10 bg--white p-4 box--shadow2 has--link">
                <a href="{{route('advertiser.ad.all')}}" class="item--link"></a>
                <div class="widget__icon b-radius--rounded bg--cyan"><i class="lab la-adversal"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Total Advertises')</p>
                    <h2 class="text--cyan font-weight-bold widget-amount">{{ auth()->guard('advertiser')->user()->ads->count() }}</h2>

                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div><!-- widget end -->
        </div>


        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--teal b-radius--10 bg--white p-4 box--shadow2 has--link">
                <a href="#0" class="item--link"></a>
                <div class="widget__icon b-radius--rounded bg--teal"><i class="fa fa-wallet"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Remaining balance')</p>
                    <h2 class="text--teal font-weight-bold widget-amount">{{$general->cur_sym}} {{ getAmount(auth()->guard('advertiser')->user()->balance) }} {{$general->cur_text}}</h2>
                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div><!-- widget end -->
        </div>


        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--indigo b-radius--10 bg--white p-4 box--shadow2 has--link">
                <a href="{{route('user.deposit.history')}}" class="item--link"></a>
                <div class="widget__icon b-radius--rounded bg--indigo"><i class="fa fa-wallet"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Total Deposited')</p>
                    <h2 class="text--indigo font-weight-bold widget-amount">{{$general->cur_sym}} {{ getAmount($totalDeposit) }}</h2>

                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div><!-- widget end -->
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--purple b-radius--10 bg--white p-4 box--shadow2 has--link">
                <a href="{{route('advertiser.trx.logs')}}" class="item--link"></a>
                <div class="widget__icon b-radius--rounded bg--purple"><i class="las la-exchange-alt"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Total Transaction')</p>
                    <h2 class="text--purple font-weight-bold widget-amount">{{ $totalTrx }}</h2>

                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div><!-- widget end -->
        </div>

    </div><!-- row end-->

    <!-- row end -->
    <div class="row mb-none-30 mt-50">
        <div class="col-md-6 mb-30">
            <div class="report-card d-flex flex-wrap align-items-center">
                <i class="las la-dollar-sign report-card-icon"></i>
                <div class="thumb">
                    <img src="{{getImage('assets/images/today.jpg')}}" class="card-img style--horizontal" alt="image">
                </div>
                <div class="content">
                    <h3 class="title">@lang('Today\'s Spent')</h3>
                    <h5 class="subtitle">@lang('You\'ve spent')</h5>
                    @if ($perDay)
                        <p>{{$general->cur_sym}}{{getAmount($perDay->sum('amount'))}}</p>
                    @else
                        <p><strong>{{$general->cur_sym}} 0.00</strong></p>
                        <p><small class="text-muted">@lang('Last checked ') <strong>@lang('0 sec ago')</strong></small>
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-30">
            <div class="report-card d-flex flex-wrap align-items-center">
                <i class="las la-chart-pie report-card-icon"></i>
                <div class="thumb">
                    <img src="{{getImage('assets/images/report.jpg')}}" class="card-img style--horizontal" alt="image">
                </div>
                <div class="content">
                    <h3 class="title">@lang('Today\'s Ad Report')</h3>
                    @if ($todayReport)
                        <p>@lang('Total Clicked : '){{collect($todayReport)->sum('click_count')}}</p>
                        <p>@lang('Total Impression : '){{collect($todayReport)->sum('imp_count')}}</p>
                    @else
                        <p>@lang('Total Clicked : ') <strong>0</strong></p>
                        <p>@lang('Total Impression : ') <strong>0</strong></p>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-none-30 mt-5">
        <div class="col-xl-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Monthly  Transaction  Report')</h5>
                    <div id="apex-bar-chart-trx"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Monthly  Deposit  Report')</h5>
                    <div id="apex-bar-chart-depo"></div>
                </div>
            </div>
        </div>
    </div>




@endsection

@push('script')
    <script src="{{asset('assets/admin/js/vendor/apexcharts.min.js')}}"></script>
    <script>
        'use strict'
        var options = {
            series: [{
                name: 'Total Transaction',
                data: @json($report['trx_month_amount']->flatten())
            }

            ],
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
                    columnWidth: '40%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json($report['trx_months']->flatten()),
            },
            yaxis: {
                title: {
                    text: "{{$general->cur_sym}}",
                    style: {
                        color: '#7c97bb'
                    }
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "{{$general->cur_sym}}" + val + " "
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#apex-bar-chart-trx"), options);
        chart.render();
    </script>

    <script>
        'use strict'
        var options = {
            series: [
                {
                    name: 'Total Deposit',
                    data: @json($report['deposit_month_amount']->flatten())
                }

            ],
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
                    columnWidth: '40%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json($report['d_months']->flatten()),
            },
            yaxis: {
                title: {
                    text: "{{$general->cur_sym}}",
                    style: {
                        color: '#7c97bb'
                    }
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "{{$general->cur_sym}}" + val + " "
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#apex-bar-chart-depo"), options);
        chart.render();
    </script>
@endpush
