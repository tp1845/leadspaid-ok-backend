<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>LeadsPaid </title>
  <!-- CSS only -->
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>

    .form-punchline {
    color: #c1cafd;
    font-weight: 500;
    font-size: 18px;
    text-align: left;
    margin: 0 0 5px 0;
    padding: 0;
    line-height: 1.3;
    }
    .form-subtitle{ margin-bottom: 0}
 </style>
<style  media="screen and (min-width: 992px)">
    .container{ max-width: 1024px; padding: 0}
    #LeadForm{
        padding: 5px;
        border: 1px solid #00297050;
        font-family: 'Roboto', sans-serif!important;

    }
    .darkBG{
        background: #333;
        color: #fff;
        padding: 10px;
        height: 100%;
    }
    label {
        color: #fff;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: bold;
    }
    h1,h2,h3,h4,h5,h6{ color: #fff; }
    iframe{ min-height: 460px; }
    .form-title{ text-transform: uppercase; font-weight: bold; font-size: 22px; }

    .form-control, .form-select {
        color: #222;
        border: 1px solid #515350;
        margin-bottom: 10px!important;
        border-radius: 0;
        font-size: 16px;
        line-height: 18px;
        padding: 10px 30px;
    }
    .form-control {  background: #ffffff;  }
   .form-select{  }
    .form-btn {
        min-width: 200px;
        width: 100%;
        padding: 5px 25px;
        line-height: 23px;
        border-radius: 3px;
        font-size: 18px!important;
        font-weight: 400;
        line-height: 1.5;
        color: #fff;
        background-color: #000;
        border-radius: 3px;
        cursor: pointer;
        margin-top: 2px;
        position: relative;
        outline: 0!important;
        font-weight: 700;
        background: #e80002;
        border: 3px solid #e80002;
        text-transform: uppercase;
    }

    .policy {
      margin: 5px 0 0 0;
      padding: 0;
      font-size: 12px;
      color: rgb(172, 172, 172);
      text-align: center;
      width: 100%;
    }
    .logo{
      text-align: center;
      width: 100%;
      margin: 0;
      padding: 0;
      font-size: 12px;
      display: flex;
      align-content: center;
      flex-direction: row;
      align-items: center;
      gap: 5px;
      justify-content: center;
    }

    .logo img{ display: inline-block; max-width: 120px; max-height: 40px;  }
    .alert{ border-radius: 0; }
</style>

<style  media="screen and (min-width: 700px) and (max-width: 991px) ">
    .container{max-width: 700px; width: 100%; padding: 0; }
    .row.main{ margin: 0!important}
    .col-lg-8 {
    flex: 0 0 auto;
    width: 58.33333333%;
    padding: 0;
    }
    .col-lg-4 {
        flex: 0 0 auto;
        width: 41.66666667%;
        padding: 0;
    }
    .col-lg-8 #loadMedia .heading{ display: none!important; }
    .col-lg-4  .heading{ display: block!important; }
    #loadMedia {    display: flex;
    flex-direction: column;
    justify-content: center;}
    #LeadForm{
        padding: 5px;
        border: 1px solid #00297050;
        font-family: 'Roboto', sans-serif!important;

    }
    .darkBG{
        background: #333;
        color: #fff;
        padding: 10px;
        height: 100%;
    }
    label {
        color: #fff;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: bold;
    }
    h1,h2,h3,h4,h5,h6{ color: #fff; }
    iframe{ min-height: 460px; }
    .form-title{ text-transform: uppercase; font-weight: bold; font-size: 22px; }
    .form-control, .form-select {
        color: #222;
        border: 1px solid #515350;
        margin-bottom: 10px!important;
        border-radius: 0;
        font-size: 16px;
        line-height: 18px;
        padding: 10px 30px;
    }
    .form-control {  background: #ffffff;  }
   .form-select{  }
    .form-btn {
        min-width: 200px;
        width: 100%;
        padding: 5px 25px;
        line-height: 23px;
        border-radius: 3px;
        font-size: 18px!important;
        font-weight: 400;
        line-height: 1.5;
        color: #fff;
        background-color: #000;
        border-radius: 3px;
        cursor: pointer;
        margin-top: 2px;
        position: relative;
        outline: 0!important;
        font-weight: 700;
        background: #e80002;
        border: 3px solid #e80002;
        text-transform: uppercase;
    }

    .policy {
      margin: 5px 0 0 0;
      padding: 0;
      font-size: 12px;
      color: rgb(172, 172, 172);
      text-align: center;
      width: 100%;
    }
    .logo{
      text-align: center;
      width: 100%;
      margin: 0;
      padding: 0;
      font-size: 12px;
      display: flex;
      align-content: center;
      flex-direction: row;
      align-items: center;
      gap: 5px;
      justify-content: center;
    }

    .logo img{ display: inline-block; max-width: 120px; max-height: 40px;  }
    .alert{ border-radius: 0; }
</style>
<style media="screen and (max-width: 700px)">
    body {
    background-color: #fff;
    margin: 0;
    padding: 0;
    font-family: 'Roboto', Helvetica, sans-serif, 'Open Sans', Arial;
    font-size: 16px;
    color: #333;
    }

    * {
    box-sizing: border-box;
    }

    .container {
        --bs-gutter-x: 0;
        width: 300px;
        margin: 10px auto;
        background-color: #f4f4f4;
        height: 600px;
    }
    .row{     --bs-gutter-x: 0; }
    .row>* {
        padding-right:  var(--bs-gutter-x) ;
        padding-left:  var(--bs-gutter-x) ;
    }
    .form-row.padding{ padding: 0 11px; }
    .form-row.bottom{ margin-top: 8px !important;}

    #loadData > * {
    padding: 0 11px !important;
    }

    #loadMedia{
    display: flex;
    flex-direction: column-reverse;
    flex-wrap: nowrap;
    }
    .heading{}
    .video {
        margin: 0 -5px 5px;
        margin: 0 !important;
        padding: 0!important;
    }

    .video iframe {
        border: 0px;
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        border-bottom: 1px solid #dee2e6!important;
        height: 150px;
     }

    .form-title {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        margin: 0 0 0 0;
        margin-top: 4px !important;
        color: #34495e;
        line-height: 1.4;
    }

    .form-subtitle {
        text-align: center;
        font-size: 14px;
        margin: 0 0 0px 0;
        padding: 0;
        line-height: 1.3;
    }
    .form-punchline {
        color: #3f51b5;
        font-weight: 500;
        font-size: 18px;
        text-align: center;
        margin: 0 0 2px 0 !important;
        line-height: 1.3;
    }
    .form-row {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin: 0 !important;

    }

    .form-row.form-check {
    flex-direction: row;
    }

    .form-label {
    display: none;
    width: 100%;
    margin-bottom: 5px;
    }

    .form-control, .form-select {
        display: block;
      box-sizing: border-box;
      width: 100%;
      padding: 0.375rem 0.5rem;
      font-size: .9rem;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: 3px;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      margin: 4px 0;
        height: 40px;
    }

    .form-row .form-control {}

    .form-row .form-select {
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    }

    .form-row select:invalid,
    .form-row select option:first-child {
    color: gray !important;
    }

    .form-btn {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #fff;
        background-color: #e80002;
        border-radius: 3px;
        cursor: pointer;
        margin-top: 2px;
        border: 0;
    }

    .policy {
        margin: 5px 0 0 0;
        padding: 0;
        font-size: 11px;
        color: #666;
        text-align: center;
        width: 100%;
    }
    .form-top-logo{ display: block!important; }
    .logo.bottom{ display: none!important }
    .logo{
        text-align: left;
        margin: 0;
        padding: 0;
        font-size: 12px;
        line-height: 15px;
        display: flex;
        align-content: center;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start !important;
        gap: 5px;
    }
    #img_company_logo, #img_company_logo_top{margin-bottom: 3px;
        margin-top: 3px;
        margin-left: 5px;
        height: 100%;
        max-height: 36px;}
    #img_company_logo img#company_logo{}
    .logo img{
        display: inline-block;
        max-width: unset;
        max-height: 36px;
    }

    .form-row select:invalid,
    .form-row select option:first-child {
    color: gray !important;
    font-size: 13px;
    }

    ::-webkit-input-placeholder {
    /* WebKit, Blink, Edge */
    color: gray !important;
    font-size: 13px;
    }

    :-moz-placeholder {
    /* Mozilla Firefox 4 to 18 */
    color: gray !important;
    font-size: 13px;
    opacity: 1;
    }

    ::-moz-placeholder {
    /* Mozilla Firefox 19+ */
    color: gray !important;
    font-size: 13px;
    opacity: 1;
    }

    :-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: gray !important;
    font-size: 13px;
    }

    ::-ms-input-placeholder {
    /* Microsoft Edge */
    color: gray !important;
    font-size: 13px;
    }

    ::placeholder {
    /* Most modern browsers support this now. */
    color: gray !important;
    font-size: 13px;
    }
    .message  {padding: 0 5px; }
    .message .alert{
    margin-top: .5rem;
    position: relative;
    padding: .5rem .5rem;
    margin-bottom: .5rem;
    color: #b6d4fe;;
    background-color: #cfe2ff;
    border: 1px solid;
    border-radius: 3px;
    }
    .message  .alert.success{
    color: #0f5132;
    background-color: #d1e7dd;
    border-color: #badbcc;
    }
    .message  .alert.error{
    color: #842029;
    background-color: #f8d7da;
    border-color: #f5c2c7;
    }
</style>



</head>
<body>
    @php
    $url = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:false;
    $domain = $url?parse_url($url, PHP_URL_HOST):false;
    @endphp
  <div class="container">
    <div class="loading" style="text-align: center; padding:15px">Loading...</div>
    <form id="LeadForm" method="POST" action="{{ route('front_campaign_form.save') }}" style="display: none;" >

        @csrf
        <input type="hidden" id="domain" name="domain" value="{{$domain}}" />
        <input type="hidden" name="capf_id" id="capf_id" value="0" >
        <input type="hidden" name="utm_id" id="utm_id" value="0" >
        <input type="hidden" name="utm_source" id="utm_source" value="0" >
        <input type="hidden" name="utm_medium" id="utm_medium" value="0" >
        <input type="hidden" name="utm_campaign" id="utm_campaign" value="0" >
        <div class="row main">
            <div class="col-12">
                <div class="form-top-logo" style="display: none">
                    <p class="logo">
                        <span id="img_company_logo_top"><img style="display: none" id="company_logo_top" src="" alt="" ></span>
                        <span  style="display: none" id="company_name_top"></span>
                    </p>
                </div>
            </div>
            <div class="col-lg-8" >
                <div class="darkBG" id="loadMedia"></div>
            </div>
            <div class="col-lg-4">
                <div class="darkBG" >

                    <div class="row" id="loadData"> </div>
                    <div class="row form-row padding bottom">
                        <div class="col-12" align="center">
                            <div class="message" id="message">
                                @if(session()->has('notify'))
                                    @foreach(session('notify') as $msg)
                                        <div class="alert alert-success p-1 {{$msg[0]}}">{{$msg[1]}}</div>
                                    @endforeach
                                @endif
                                @if ($errors->any())
                                @php
                                    $collection = collect($errors->all());
                                    $errors = $collection->unique();
                                @endphp
                                    @foreach ($errors as $error)
                                        <div class="alert alert-danger p-1 error">{{$error }}</div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="submit" id="saveData" class="form-btn">Submit <i class="fa fa-chevron-right"></i></button>
                            <p class="policy">I agree to your privacy policy by submitting the form</p>
                            <p class="logo bottom"><img style="display: none" id="company_logo" src="" alt="" > <span  style="display: none" id="company_name"></span></p>
                        </div>
                    </div>
            </div>
        </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script>
   const url = document.referrer;
    urlParams = getUrlParams(url);
    var utm_id =  urlParams.utm_id;
    var utm_source =  urlParams.utm_source ;
    var utm_medium =  urlParams.utm_medium ;
    var utm_campaign =  urlParams.utm_campaign ;
    $('#utm_id').val(utm_id);
    $('#utm_source').val(utm_source);
    $('#utm_medium').val(utm_medium);
    $('#utm_campaign').val(utm_campaign);
   var website = $('#domain').val();
   website = 'sgpr.sg';
    var publisher_id = {{$publisher_id}};
    var campaign_id = {{$campaign_id?$campaign_id:0}};
    if(campaign_id){
        var actionUrl =  '{{url("/")}}/api/campaign_id_form/find/'+campaign_id+'/'+publisher_id;
        var formData = { 'campaign_id': campaign_id , 'publisher_id': publisher_id  };
    }else{
        var actionUrl =  '{{url("/")}}/api/campaign_form/find/'+website+'/'+publisher_id;
        var formData = { 'website': website , 'publisher_id': publisher_id  };
    }
    $.ajax({
        type: "GET",
        dataType: "json",
        url: actionUrl,
        data: formData ,
        success: function(data) {
            if (data.success) {
                previewData(data.form, publisher_id)
            } else {
                $('.loading').html(data.form);
            }
        }
    });


    function previewData(data, publisher_id){
        var image_src = '{{url("/")}}/assets/images/campaign_forms/';
        var media = [];
        if(data.youtube_1){
            media.push({ id:'1', type : 'youtube', url : data.youtube_1 });
        }
        if(data.youtube_2){
            media.push({ id:'2', type : 'youtube', url : data.youtube_2 });
        }
        if(data.youtube_3){
            media.push({ id:'3', type : 'youtube', url : data.youtube_3 });
        }
        if(data.image_1){
            media.push({ id:'4', type : 'image', url : data.image_1 });
        }
        if(data.image_2){
            media.push({ id:'5', type : 'image', url : data.image_2 });
        }
        if(data.image_3){
            media.push({ id:'6', type : 'image', url : data.image_3 });
        }
        show_media = media[Math.floor(Math.random() * media.length)];
        form_title = get_random_object(data.title, 1);
        form_desc = get_random_object(data.form_desc, 1);

        $('#capf_id').attr('value', data.campaign_id +','+data.advertiser_id +','+publisher_id +','+data.id  );
        form = $('#LeadForm');
            t='';
            m='';
            m +='<div class="heading">';
                if(form_title){ m +='<h2 class="form-title">'+form_title+'</h2>'; }
                if(form_desc){ m +='<p class="form-subtitle">'+form_desc+'</p>'; }
                if(data.punchline){ m +='<p class="form-punchline">'+data.punchline+'</p>'; }
            m +='</div>';
            if(show_media){
                if(show_media.type == 'youtube'){
                    const videoId = getVideoId(show_media.url);
                    const iframeMarkup = '<iframe src="https://www.youtube.com/embed/' + videoId + '" frameborder="0" width="100%" allowfullscreen></iframe>';
                    m +='<div class="video">'+ iframeMarkup +'</div>';
                }
                if(show_media.type == 'image'){
                    m +='<div class="video image"><img src="'+ image_src + show_media.url +'" alt="" width="100%" /></div>';
                }
            }


            t +='<div class="heading d-none">';
                if(form_title){ t +='<h2 class="form-title">'+form_title+'</h2>'; }
                if(form_desc){ t +='<p class="form-subtitle">'+form_desc+'</p>'; }
                if(data.punchline){ t +='<p class="form-punchline">'+data.punchline+'</p>'; }
            t +='</div>';
            if(data.company_logo){ $('#company_logo').attr('src', image_src + data.company_logo ).show(); $('#company_logo_top').attr('src', image_src + data.company_logo ).show();}
            if(data.company_name){  $('#company_name').html(data.company_name).show(); $('#company_name_top').html(data.company_name).show(); }

            for ($i = 1; $i < 6; $i++){
                var $field = data['field_'+$i];
                if($field){
                    t +='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-0 mt-lg-1">';
                  //  t +='<label for="Input_field_'+$i+'" class="form-label">'+$field['question_text']+'*</label>';
                    if($field){
                        t +='<div class="form-row">';
                        if($field['question_type']== "ShortAnswer"){
                            t +='<input type="text" class="form-control" id="Input_field_'+$i+'" name="field_'+$i+'" placeholder="'+$field['question_text']+'*" ';
                            if($field['required']){ t +=' required '; }
                            t +='>';
                        }else{
                            t +='<select class="form-select" id="Input_field_'+$i+'"  name="field_'+$i+'" ';
                            if($field['required']){ t +=' required '; }
                            t +='>';
                            if($field['question_text']){
                            t +='<option selected value="" class="holder"> '+$field['question_text']+'* </option>';
                        }
                        if($field['option_1']){
                            t +='<option value="'+ $field['option_1']+'">'+ $field['option_1']+'</option>';
                        }
                        if($field['option_2']){
                            t +='<option value="'+ $field['option_2']+'">'+ $field['option_2']+'</option>';
                        }
                        if($field['option_3']){
                            t +='<option value="'+ $field['option_3']+'">'+ $field['option_3']+'</option>';
                        }
                        if($field['option_4']){
                            t +='<option value="'+ $field['option_4']+'">'+ $field['option_4']+'</option>';
                        }
                        if($field['option_5']){
                            t +='<option value="'+ $field['option_5']+'">'+ $field['option_5']+'</option>';
                        }
                        if($field['option_6']){
                            t +='<option value="'+ $field['option_6']+'">'+ $field['option_6']+'</option>';
                        }
                            t +='</select>';
                        }
                        t +='</div>';
                    }
                    t +='</div>';
                }
            }

            $('#loadMedia', form).append(m);
            $('#loadData', form).append(t);
            $('.loading').hide();
            $(form).show();
    }

    $("#LeadForm").submit(function(e){
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');
        formData = form.serialize();
        $.ajax({
                type: "POST",
                url: actionUrl,
                data: formData,
                success: function(data)
                {
                    if (data.success) {
                        form[0].reset();
                        $('#message').html('<div class="alert alert-success p-1">'+data.form+'</div>');
                    }else{
                        $('#message').html('<div class="alert alert-danger p-1">'+data.form+'</div>');
                    }
                }
            });
    });

    function get_random_object(object_data, min = 1){
      $.each( object_data, function(key, value){ if (value === "" || value === null){ delete  object_data[key]; } });
      var max = Object.keys(object_data).length;
      var random = Math.floor(Math.random() * (max - min + 1)) + min;
      return object_data[random];
    }
    function getVideoId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url?.match(regExp);
        return (match && match[2].length === 11)?match[2]:null;
    }

    function getUrlParams(urlOrQueryString) {
        if ((i = urlOrQueryString.indexOf('?')) >= 0) {
            const queryString = urlOrQueryString.substring(i+1);
            if (queryString) {
            return _mapUrlParams(queryString);
            }
        }
        return {};
    }

    function _mapUrlParams(queryString) {
    return queryString
        .split('&')
        .map(function(keyValueString) { return keyValueString.split('=') })
        .reduce(function(urlParams, [key, value]) {
        if (Number.isInteger(parseInt(value)) && parseInt(value) == value) {
            urlParams[key] = parseInt(value);
        } else {
            urlParams[key] = decodeURI(value);
        }
        return urlParams;
        }, {});
    }
</script>
</body>
</html>
