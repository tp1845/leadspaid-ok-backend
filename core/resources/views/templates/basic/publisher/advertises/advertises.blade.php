@extends($activeTemplate.'layouts.publisher.frontend')

@section('panel')
    <div class="row">
        <div class="col-lg-12">

                   <div class="card">
                    <div class="table-responsive--lg">
                        <table class="table style--two">
                            <thead>
                            <tr>
                                {{-- <th scope="col">@lang('Ad Name')</th> --}}
                                {{-- <th scope="col">@lang('Ad Type')</th> --}}
                                <th scope="col">@lang('Ad Width')</th>
                                <th scope="col">@lang('Ad Height')</th>
                                <th scope="col">@lang('Script')</th>
                                <th scope="col">@lang('Copy Script')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($ads as $ad)
                            <tr>
                                {{-- <td data-label="@lang('Ad Name')" >{{ $ad->adName }}</td> --}}
                                {{-- <td data-label="@lang('Ad Type')" ><span class="text--small badge font-weight-normal badge--success">{{ $ad->type }}</span></td> --}}
                                <td data-label="@lang('Ad Width')" ><span class="text--small badge font-weight-normal badge--primary">300px</span></td>
                                <td data-label="@lang('Ad Height')" ><span class="text--small badge font-weight-normal badge--warning">600px</span></td>
                                <td data-label="@lang('Script')" >
                                    <textarea id="advertScript{{$ad->id}}" class="form-control" rows="2" readonly><iframe src="{{url("/")}}/campaign_form/{{Auth::guard('publisher')->user()->id}}" sandbox="allow-top-navigation allow-scripts allow-forms" width="300" height="600"></iframe></textarea>
                                </td>

                                <td data-label="@lang('Copy Script')">
                                    <span>
                                    <div class="toast d-none t{{ $ad->id }}">
                                    <div class="toast-header bg-secondary">
                                      @lang('Copied')
                                    </div>
                                  </div>
                                </span>
                                    <button class="btn btn--primary w-100 copyButton{{ $ad->id }}"   onclick="copyToClipboard('#advertScript{{$ad->id}}','{{$ad->id}}')">
                                        @lang('Copy Script')
                                    </button>
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
        </div>

    </div>
@endsection


@push('script')

<script>
    'use strict'
    function copyToClipboard(element,id) {
    $(`.t${id}`).removeClass('d-none');
    var $temp = $("<textarea>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $(`.t${id}`).toast('show');
    $temp.remove();
    }

</script>
@endpush

@push('style')
    <style>
        .btn{
            padding: 1.375rem 0rem 1.375rem 0rem;
        }
    </style>
@endpush
