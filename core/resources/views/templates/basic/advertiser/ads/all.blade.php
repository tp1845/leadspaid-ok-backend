@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive--lg">
                            <table class=" table style--two">
                                <thead>
                                <tr>
                                    <th scope="col">@lang('Image')</th>
                                    <th scope="col">@lang('Ad Name')</th>
                                    <th scope="col">@lang('Ad Title')</th>
                                    <th scope="col">@lang('Type')</th>
                                    <th scope="col">@lang('Resolution')</th>
                                    <th scope="col">@lang('Status')</th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($advertises as $advertise)

                                <tr>
                                    <td data-label="@lang('Image')">
                                        <div class="user">
                                            <div class="thumb"><img class="adImage" src="{{getImage('assets/images/adImage/'.$advertise->image) }}" alt="image"></div>
                                            <span class="name"></span>
                                        </div>
                                    </td>
                                    <td data-label="@lang('Ad Name')" class="text--primary">{{ $advertise->ad_name }}</td>
                                    <td data-label="@lang('Ad Title')" class="text--dark">{{ $advertise->ad_title }}</td>
                                    <td data-label="@lang('Type')"><span class="text--small badge font-weight-normal badge--dark">{{ $advertise->ad_type }}</span></td>
                                    <td data-label="@lang('Resolution')"><span class="text--small badge font-weight-normal badge--primary">{{ $advertise->resolution }}</span></td>
                                    @if ($advertise->status==1)
                                    <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal badge--success">@lang('Active')</span></td>
                                    @else
                                    <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal badge--warning">@lang('Deactive')</span></td>
                                    @endif
                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('advertiser.ad.details',$advertise->id) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Details">
                                            <i class="las la-desktop text--shadow"></i>
                                        </a>
                                        <a href="javascript:void(0)"  data-route="{{ route('advertiser.ad.remove',$advertise->id) }}" class=" btn--danger icon-btn delete" data-toggle="tooltip" data-original-title="remove">
                                            <i class="las la-trash text--shadow"></i>
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

                    <div class="my-3">
                        {{paginateLinks($advertises)}}
                    </div>
            </div>
     </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
               <button type="button" class="close ml-auto m-3" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
               </button>
                    <form action="" method="POST">
                        @csrf
                        <div class="modal-body text-center">
                            <i class="las la-exclamation-circle text-danger f-size--100  mb-15"></i>
                            <h3 class="text--secondary mb-15">@lang('Are You Sure Want to Delete This?')</h3>
                        </div>
                    <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('close')</button>
                      <button type="submit"  class="btn btn--danger del">@lang('Delete')</button>
                    </div>

                    </form>
              </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')

<form action="{{route('advertiser.ad.search')}}" method="GET" class="form-inline float-sm-right bg--white">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="{{trans('Search by title,resolution')}}" value="{{$query??''}}">
        <div class="input-group-append">
            <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@endpush

@push('script')
<script>
    'use strict';
    $('.delete').on('click',function(){
        var route = $(this).data('route')
        var modal = $('#deleteModal');
        $('#deleteModal').find('form').attr('action',route)
        modal.modal('show');
    })
</script>
@endpush
