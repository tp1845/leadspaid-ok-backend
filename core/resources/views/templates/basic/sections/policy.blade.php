
@extends($activeTemplate.'layouts.frontend')

@section('content')

@include($activeTemplate.'partials.breadcrumb')
 <section class="pt-100 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content-block">
            @php
                echo $policy->data_values->content;
            @endphp
        </div>
      </div>
    </div>
  </section>
@stop