@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Ip')</th>
                                <th scope="col">@lang('Date')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($logs as $log)
                            <tr>
                                <td data-label="@lang('Ip')">{{$log->ip}}</td>
                                <td data-label="@lang('Date')">{{showDateTime($log->created_at,'d M Y')}}</td>
                                <td data-label="@lang('Action')">
                                    <a href="javascript:void(0)" data-route="{{route('admin.advertise.ip.unblock',$log->id)}}" class="icon-btn btn--primary block" data-toggle="tooltip" title="@lang('Un Block IP')">
                                        <i class="las la-check text--shadow"></i>
                                    </a>
                                </td>
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
                    {{paginateLinks($logs)}}
                </div>
            </div><!-- card end -->
        </div>

        <div class="modal fade" id="unblockModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
               <button type="button" class="close ml-auto m-3" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
                    <form action="" method="POST">
                        @csrf
                        <div class="modal-body text-center">
                            
                            <i class="las la-exclamation-circle text-secondary display-2 mb-15"></i>
                            <h4 class="text--secondary mb-15">@lang('Are You Sure Want to Un Block This Ip?')</h4>
    
                        </div>
                    <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('close')</button>
                      <button type="submit"  class="btn btn--success del">@lang('Un Block')</button>
                    </div>
                    
                    </form>
              </div>
            </div>
        </div>

    </div>
@endsection

@push('script')

<script>
    'use strict';
    $('.block').on('click',function(){
        var route = $(this).data('route')
        var modal = $('#unblockModal');
        modal.find('form').attr('action',route)
        modal.modal('show');


    })
</script>

@endpush

@push('breadcrumb-plugins')
    <form action="" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="@lang('Ip')" value="{{$search??''}}" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>    
@endpush