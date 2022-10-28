@extends($activeTemplate.'layouts.publisher.frontend')

@section('panel')
    <div class="row mb-none-30">

        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--primary b-radius--10 bg--white p-4 box--shadow2 has--link">
                <a href="#0" class="item--link"></a>
                <div class="widget__icon b-radius--rounded bg--primary"><i class="fa fa-globe"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Total Impression')</p>
                    <h2 class="text--primary font-weight-bold widget-amount">{{ collect($publisherAd)->sum('imp_count') }}</h2>

                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div><!-- widget end -->
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--success b-radius--10 bg--white p-4 box--shadow2 has--link">
                <a href="#0" class="item--link"></a>
                <div class="widget__icon b-radius--rounded bg--success"><i class="fa fa-hand-point-up"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Total Clicked')</p>
                    <h2 class="text--success font-weight-bold widget-amount">{{ collect($publisherAd)->sum('click_count') }}</h2>
                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div><!-- widget end -->
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--purple b-radius--10 bg--white p-4 box--shadow2 has--link">
                <a href="#0" class="item--link"></a>
                <div class="widget__icon b-radius--rounded bg--purple"><i class="fa fa-wallet"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Balance')</p>
                    <h2 class="text--purple font-weight-bold widget-amount">{{$general->cur_sym}} {{ getAmount($publisher->earnings) }} {{$general->cur_text}}</h2>
                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div><!-- widget end -->
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 mb-30">
            <div class="widget bb--3 border--indigo b-radius--10 bg--white p-4 box--shadow2 has--link">
                <a href="#0" class="item--link"></a>
                <div class="widget__icon b-radius--rounded bg--indigo"><i class="fa fa-archive"></i></div>
                <div class="widget__content">
                    <p class="text-uppercase text-muted widget-caption">@lang('Total widthdraw')</p>
                    <h2 class="text--indigo font-weight-bold widget-amount">{{$general->cur_sym}} {{getAmount($totalWidthdraw)}} {{$general->cur_text}}</h2>
                </div>
                <div class="widget__arrow">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div><!-- widget end -->
        </div>
    </div><!-- row end-->


    <div class="row mb-none-30 mt-50">
        <div class="col-md-6 mb-30">
            <div class="report-card d-flex flex-wrap align-items-center">
                <i class="las la-dollar-sign report-card-icon"></i>
                <div class="thumb">
                    <img src="{{getImage('assets/images/today.jpg')}}" class="card-img style--horizontal" alt="image">
                </div>
                <div class="content">
                    <h3 class="title">@lang('Today\'s Earnings')</h3>
                    <h5 class="subtitle">@lang('You\'ve earned')</h5>
                    @if ($perDay)
                        <p class="card-text font-weight-bold">{{$general->cur_sym}}{{getAmount($perDay->amount,4)}}</p>
                        <p class="card-text"><small
                                class="text-muted">@lang('Last updated '){{diffForHumans($perDay->updated_at)}}</small>
                        </p>
                    @else
                        <p class="card-text font-weight-bold">{{$general->cur_sym}} 0.00</p>
                        <p class="card-text"><small class="text-muted">@lang('Last checked ') @lang('0 sec ago')</small>
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
                        <p class="card-text">@lang('Total Clicked : '){{number_format_short(collect($todayReport)->sum('click_count'))}}</p>
                        <p class="card-text">@lang('Total Impression : '){{number_format_short(collect($todayReport)->sum('imp_count'))}}</p>
                    @else
                        <p class="card-text">@lang('Total Clicked : ')0</p>
                        <p class="card-text">@lang('Total Impression : ')0</p>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-none-30 mt-5">
        <div class="col-xl-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Monthly  Earning  Reports')</h5>
                    <div id="apex-bar-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Monthly  Widthdraw   Report')</h5>
                    <div id="apex-bar-chart-w"></div>
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
                name: 'Total Earnings',
                data: @json($report['trx_month_amount']->flatten())
            },

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
                    columnWidth: '20%',
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

        var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
        chart.render();
    </script>
    <script>
        'use strict'
        var options = {
            series: [{
                name: 'Total Widthdraw',
                data: @json($wdata['amount']->flatten())
            },


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
                    columnWidth: '20%',
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
                categories: @json($wdata['date']->flatten()),
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

        var chart = new ApexCharts(document.querySelector("#apex-bar-chart-w"), options);
        chart.render();
    </script>
@endpush
