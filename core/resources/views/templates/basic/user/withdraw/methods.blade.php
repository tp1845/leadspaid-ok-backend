@extends($activeTemplate.'layouts.publisher.frontend')

@section('panel')

            <div class="row justify-content-center mt-2">
                @foreach($withdrawMethod as $data)
                    <div class="col-lg-3 col-md-4 mb-4 p-2 ">
                        <div class="card card-deposit  border shadow">
                            <h5 class="card-header text-center bg--primary">{{__($data->name)}}</h5>
                            <div class="card-body card-body-deposit">
                                <img  src="{{getImage(imagePath()['withdraw']['method']['path'].'/'. $data->image)}}"
                                     class="card-img-top border" alt="{{$data->name}}" style="width:200%">
                                <ul style="font-size: 15px;" class="list-group text-center mt-4">
                                    <li class="list-group-item">@lang('Limit')
                                        : {{getAmount($data->min_limit)}}
                                        - {{getAmount($data->max_limit)}} {{$general->cur_text}}</li>
                                    <li class="list-group-item"> @lang('Charge')
                                        - {{getAmount($data->fixed_charge)}} {{$general->cur_text}}
                                        + {{getAmount($data->percent_charge)}}%
                                    </li>
                                    <li class="list-group-item">@lang('Processing Time')
                                        - {{$data->delay}}</li>
                                </ul>
                            </div>
                            <div class="card-footer border-top-0 pt-2">
                                <a href="javascript:void(0)"  data-id="{{$data->id}}"
                                   data-resource="{{$data}}"
                                   data-min_amount="{{getAmount($data->min_limit)}}"
                                   data-max_amount="{{getAmount($data->max_limit)}}"
                                   data-fix_charge="{{getAmount($data->fixed_charge)}}"
                                   data-percent_charge="{{getAmount($data->percent_charge)}}"
                                   data-base_symbol="{{$general->cur_text}}"
                                   class="btn btn-block  btn--primary deposit py-2" data-toggle="modal" data-target="#exampleModal">
                                    @lang('Withdraw Now')</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg--primary ">
                    <h5 class="modal-title method-name text-white" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.withdraw.money')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <p class="text-danger depositLimit"></p>
                        <p class="text-danger depositCharge"></p>

                        <div class="form-group">
                            <input type="hidden" name="currency"  class="edit-currency form-control" value="">
                            <input type="hidden" name="method_code" class="edit-method-code  form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>@lang('Enter Amount'):</label>
                            <div class="input-group">
                                <input id="amount" type="text" class="form-control form-control-lg" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount" placeholder="0.00" required=""  value="{{old('amount')}}">

                                <div class="input-group-prepend">
                                    <span class="input-group-text addon-bg currency-addon text-secondary">{{__($general->cur_text)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
     <script>
            'use strict';
            (function ($) {
                $('.deposit').on('click', function () {
                var id = $(this).data('id');
                var result = $(this).data('resource');
                var minAmount = $(this).data('min_amount');
                var maxAmount = $(this).data('max_amount');
                var fixCharge = $(this).data('fix_charge');
                var percentCharge = $(this).data('percent_charge');

                var depositLimit = `@lang('Withdraw Limit:') ${minAmount} - ${maxAmount}  {{$general->cur_text}}`;
                $('.depositLimit').text(depositLimit);
                var depositCharge = `@lang('Charge:') ${fixCharge} {{$general->cur_text}} ${(0 < percentCharge) ? ' + ' + percentCharge + ' %' : ''}`
                $('.depositCharge').text(depositCharge);
                $('.method-name').text(`@lang('Withdraw Via ') ${result.name}`);
                $('.edit-currency').val(result.currency);
                $('.edit-method-code').val(result.id);
            });

            })(jQuery);
     </script>

@endpush

