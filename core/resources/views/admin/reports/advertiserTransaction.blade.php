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
                                <th scope="col">@lang('TRX')</th>
                                <th scope="col">@lang('Username')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Charge')</th>
                                <th scope="col">@lang('Post Balance')</th>
                                <th scope="col">@lang('Detail')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as  $trx)
                               <tr>
                                <td data-label="@lang('Date')">{{ showDateTime($trx->created_at) }}</td>
                                <td data-label="@lang('TRX')" class="font-weight-bold">{{ $trx->trx }}</td>
                                <td data-label="@lang('Username')"><a href="{{ route('admin.advertiser.details', $trx->user_id) }}">{{ @$trx->user->username }}</a></td>
                                <td data-label="@lang('Amount')" class="budget">
                                    <strong @if($trx->trx_type == '+') class="text-success" @else class="text-danger" @endif> {{($trx->trx_type == '+') ? '+':'-'}} {{getAmount($trx->amount)}} {{$general->cur_text}}</strong>
                                </td>
                                <td data-label="@lang('Charge')" class="budget">{{ $general->cur_sym }} {{ getAmount($trx->charge) }} </td>
                                <td data-label="@lang('Post Balance')">{{ $trx->post_balance +0 }} {{$general->cur_text}}</td>
                                <td data-label="@lang('Detail')">{{ $trx->details }}</td>
                            </tr>


                            @endforeach

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ paginateLinks($transactions) }}
                </div>
            </div><!-- card end -->
        </div>
    </div>



@endsection


@push('breadcrumb-plugins')

    <form action="{{route('admin.transaction.advertiser')}}" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="@lang('TRX / Username')" value="{{ $search ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>

@endpush


