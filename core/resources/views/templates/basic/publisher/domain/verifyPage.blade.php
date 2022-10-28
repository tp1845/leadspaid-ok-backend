@extends($activeTemplate.'layouts.publisher.frontend')

@section('panel')
<div class="row">
    
    <div class="col-xl-12 col-lg-12">
        <div class="card mt-25">
            <div class="card-body">
               <div class="row">
                   <div class="col-md-7">
                    <h2 class="card-title mb-15 border-bottom pb-2">{{$domain->domain_name}}</h2>

                    <p class="mt-3 mb-3 lead">
                     @lang(' To verify the domain, ')
                      <li class="ml-2 lead">@lang('Please download the file and')</li>
                      <li  class="ml-2 lead">@lang('Place it to your Domain/Server.')</li>
                    </p><br>

                    <button class="btn btn--primary downloadFile mt-3" onclick="">@lang('Download')</button>
                   </div>
                    <div class="col-md-5">
                        @if ($domain->status==0)
                        <h2 class="card-title mb-15 border-bottom pb-2 text--danger">@lang('Unverified')</h2>
                        @elseif($domain->status==1)
                        <h2 class="card-title mb-15 border-bottom pb-2 text--success">@lang('Verified')</h2>
                        @else
                        <h2 class="card-title mb-15 border-bottom pb-2 text--warning">@lang('Pending')</h2>
                        @endif
                  
                   <p class="my-3 lead">

                       @lang('After upload the file to your domain/Server , The file should be browsable with below URL'): 
                   </p>         

                <a href="{{$fileURL}}" target="_blank" class="lead">{{str_replace('https://','',$fileURL)}}</a>

                <br><br>
                   @if ($domain->status==0) 
                     <a class="btn btn--success " href="{{route('publisher.domain.check',$domain->tracker)}}">@lang('Verify Now')</a>
                    @elseif($domain->status==1) 
                    <a class="btn btn--secondary" href="javascript:void(0)">  <i class="menu-icon las la-check-circle"></i>@lang('Verified')</a>
                   @else
                     <a class="btn btn--secondary" href="javascript:void(0)">  <i class="menu-icon las la-spinner"></i>@lang('Pending')</a>
                   @endif
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>


@stop


@push('script')


<script>
  'use strict'
    function download(filename, text) {
     var element = document.createElement('a');
     element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
     element.setAttribute('download', filename);
   
     element.style.display = 'none';
     document.body.appendChild(element);
   
     element.click();
   
     document.body.removeChild(element);
   }

$('.downloadFile').on('click', function(){

   download("{{$fileName}}","{{$domain->verify_code}}");
})

</script>         
@endpush

@push('breadcrumb-plugins')
<a href="{{route('publisher.domain.verify')}}" class="btn btn--primary"><i class="fas fa-backward"></i>
   @lang('Go Back')
 </a>
@endpush