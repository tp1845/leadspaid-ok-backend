@extends($activeTemplate.'layouts.advertiser.frontend')
 @php
     session()->forget('pricePlan');
 @endphp
@section('panel')


<div class="row">
    @foreach ($plans as $plan)
    <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
        <div class="pricing-card">
            <h2 class="package-name">{{ $plan->name }}</h2>
            <h4 class="package-price">{{$general->cur_sym}} {{getAmount($plan->price)}} {{$general->cur_text}}</h4>
            <ul class="package-feature-list">
                <li>@lang('Type'): <strong>{{ $plan->type }}</strong></li>
                <li>@lang('Credit'): <strong>{{number_format($plan->credit) }}</strong></li>
            </ul>
            <button class="btn btn--primary w-100 purchase" data-planroute="{{ route('advertiser.purchase.plan',$plan->id) }}" data-route="{{ route('user.payment',$plan->id) }}"  type="button"
                >@lang('Purchase')</button>
        </div>
    </div>
    @endforeach

    <div class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
           <button type="button" class="close ml-auto m-3" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
           </button>
            <div class="modal-body text-center">

                    <i class="fas fa-hand-holding-usd f-size--100 text-info mb-15"></i>
                    <h3 class="text--secondary mb-15">@lang('Please choose your payment option!')</h3>

                </div>
            <div class="modal-footer justify-content-center">
              <a href=""  class="btn btn-warning planpurchase">@lang('From Balance')</a>
              <a href=""  class="btn btn--primary gateway">@lang('From Gateway')</a>
            </div>

          </div>
        </div>
    </div>
    <!-- /.col-sm-3 -->

    <!-- /.col-sm-3 -->
    </div>
    <!-- /.row -->

   <!-- /modal -->



@endsection

@push('script')

<script>
    'use strict';
    $('.purchase').on('click',function(){
        var route = $(this).data('route')
        var planroute = $(this).data('planroute')

        var modal = $('#purchaseModal');
        $('.gateway').attr('href',route)
        $('.planpurchase').attr('href',planroute)
        modal.modal('show');


    })
</script>

@endpush
