@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')
    
   
<div class="row justify-content-center">
           
    <div class="col-xl-8 col-lg-8 col-sm-6 mb-4">
        <div class="pricing-card">
            <form action="{{route('advertiser.purchase.plan.confirm')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$plan->id}}" name="planid">
                <ul class="list-group">
                    <li class="list-group-item"><strong>@lang('Package Name : ')</strong><strong class="text--success">{{$plan->name}}</strong> </li>
                    <li class="list-group-item"><strong>@lang('Package Type : ')</strong><strong class="text--success">{{$plan->type}} </strong></li>
                    <li class="list-group-item"><strong>@lang('Package Credit : ')</strong><strong class="text--success">{{$plan->credit}}</strong> </li>
                    <li class="list-group-item"><strong>@lang('Package Price : ')</strong><strong class="text--success">{{getAmount($plan->price)}} {{$general->cur_text}}</strong></li>
                  
                    <li class="list-group-item"><strong>@lang('Total Payable : ')</strong><strong class="text--success">{{getAmount($plan->price)}} {{$general->cur_text}}</strong></li>
                  
                    <li class="list-group-item">@lang("NB : Remember") <strong class="text--danger">{{getAmount($plan->price)}} {{$general->cur_text}}</strong> @lang('will be deducted from your balance. Your current balance is ') <strong class="text--success">{{getAmount(auth()->guard('advertiser')->user()->balance)}} {{$general->cur_text}}</strong> </li>
                  
                    <li class="list-group-item"><button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Confirm')</button></li>
                   
                </ul>
            </form>
        </div>
    </div>


    </div>
    <!-- /.row -->
  
   <!-- /modal -->
  
  
 
@endsection

