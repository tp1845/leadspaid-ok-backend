@extends('admin.layouts.app')

@section('panel')

    <div class="row">


        @foreach($templates as $temp)

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header bg--primary"><h4 class="card-title text-white"> {{ __(inputTitle($temp['name'])) }} </h4></div>
                    <div class="card-body">
                        <img src="{{$temp['image']}}" alt="@lang('Template')" class="w-100">
                    </div>
                    <div class="card-footer">
                        @if($general->active_template == $temp['name'])
                            <button type="submit" name="name" value="{{$temp['name']}}" class="btn btn--primary btn-block">
                                @lang('SELECTED')
                            </button>
                        @else
								<form action="" method="post">
									@csrf
									<button type="submit" name="name" value="{{$temp['name']}}" class="btn btn--success btn-block">
										@lang('Select As Active')
									</button>
								</form>
                        @endif
                    </div>
                </div>
            </div>

        @endforeach


        @if($extra_templates)
            @foreach($extra_templates as $temp)
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg--primary"><h4 class="card-title text-white"> {{ __(inputTitle($temp['name'])) }} </h4></div>
                        <div class="card-body">
                            <img src="{{$temp['image']}}" alt="@lang('Template')" class="w-100">
                        </div>
                        <div class="card-footer">
                            <a href="{{$temp['url']}}" target="_blank" class="btn btn--primary btn-block">@lang('Get This')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

@endsection
