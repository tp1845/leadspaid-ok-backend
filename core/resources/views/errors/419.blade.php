<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $general->sitename($page_title ?? '419 | Session has expired') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}">
    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="{{ asset('assets/errors/css/bootstrap.min.css') }}">
    <!-- dashdoard main css -->
    <link rel="stylesheet" href="{{ asset('assets/errors/css/main.css') }}">
</head>
<body>


<!-- error-404 start -->
<div class="error">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <img src="{{ asset('assets/errors/images/error-419.png') }}" alt="@lang('image')">
                <h2 class="title"><b>@lang('419')</b> @lang('Sorry your session has expired.')</h2>
                <p>@lang('Please go back and refresh your browser and try again')</p>
                <a href="{{ route('home') }}" class="cmn-btn mt-4">@lang('Go to Home')</a>
            </div>
        </div>
    </div>
</div>
<!-- error-404 end -->
</body>
</html>
