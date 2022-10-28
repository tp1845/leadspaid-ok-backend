@extends($activeTemplate.'layouts.publisher.frontend')

@section('panel')
   <div class="row justify-content-center mt-2">
            <div class="col-lg-12 ">
                      <div class="card">
                        <div class="table-responsive--lg">
                            <table class="table  style--two">
                                <thead class="">
                                <tr>
                                    <th scope="col">@lang('Transaction ID')</th>
                                    <th scope="col">@lang('Gateway')</th>
                                    <th scope="col">@lang('Amount')</th>
                                    <th scope="col">@lang('Charge')</th>
                                    <th scope="col">@lang('After Charge')</th>
                                    <th scope="col">@lang('Rate')</th>
                                    <th scope="col">@lang('Receivable')</th>
                                    <th scope="col">@lang('Status')</th>
                                    <th scope="col">@lang('Time')</th>
                                </tr>
                                </thead>
                                <tbody>
    
                                @forelse($withdraws as $k=>$data)
                                    <tr>
                                        <td data-label="#@lang('Trx')">{{$data->trx}}</td>
                                        <td data-label="@lang('Gateway')">{{ $data->method->name   }}</td>
                                        <td data-label="@lang('Amount')">
                                            <strong>{{getAmount($data->amount)}} {{$general->cur_text}}</strong>
                                        </td>
                                        <td data-label="@lang('Charge')" class="text-danger">
                                            {{getAmount($data->charge)}} {{$general->cur_text}}
                                        </td>
                                        <td data-label="@lang('After Charge')">
                                            {{getAmount($data->after_charge)}} {{$general->cur_text}}
                                        </td>
                                        <td data-label="@lang('Rate')">
                                            {{getAmount($data->rate)}} {{$data->currency}}
                                        </td>
                                        <td data-label="@lang('Receivable')" class="text-success">
                                            <strong>{{getAmount($data->final_amount)}} {{$data->currency}}</strong>
                                        </td>
                                        <td data-label="@lang('Status')">
                                            @if($data->status == 2)
                                                <span class="text--small badge font-weight-normal badge--warning">@lang('Pending')</span>
                                            @elseif($data->status == 1)
                                                <span class="text--small badge font-weight-normal badge--success">@lang('Completed')</span>
                                                <button class="btn-info btn-rounded  badge approveBtn" data-admin_feedback="{{$data->admin_feedback}}"><i class="fa fa-info"></i></button>
                                            @elseif($data->status == 3)
                                                <span class="text--small badge font-weight-normal badge--danger">@lang('Rejected')</span>
                                                <button class="btn-info btn-rounded badge approveBtn" data-admin_feedback="{{$data->admin_feedback}}"><i class="fa fa-info"></i></button>
                                            @endif
    
                                        </td>
                                        <td data-label="@lang('Time')">
                                            <i class="fa fa-calendar"></i> {{showDateTime($data->created_at)}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                      </div>
                 
                    <div class="my-2">
                       {{$withdraws->appends(Request::all())->links('admin.partials.paginate')}}
                    </div>

            </div>
        </div>


    {{-- Detail MODAL --}}
    <div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Details')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="withdraw-detail"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.approveBtn').on('click', function() {
            var modal = $('#detailModal');
            var feedback = $(this).data('admin_feedback');

            modal.find('.withdraw-detail').html(`<p> ${feedback} </p>`);
            modal.modal('show');
        });

    </script>
@endpush

@push('breadcrumb-plugins')
<form action="{{route('user.withdraw.history')}}" method="GET" class="form-inline float-sm-right bg--white">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="@lang('search by trx')" value="{{ $search ?? '' }}">
        <div class="input-group-append">
            <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@endpush

