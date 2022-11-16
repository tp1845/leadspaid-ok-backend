<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>Singapore PR Application 2022 </title>
  <style>
    body {
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
      color: #333;
    }

    * {
      box-sizing: border-box;
    }

    .container {
      width: 300px;
      margin: 10px auto;
    }

    .video {
      margin-bottom: 5px;
      padding: 0 5px;
    }

    .video iframe {
      border: 1px solid #000;
    }

    .form-title {
      text-align: center;
      font-size: 25px;
      font-weight: bold;
      margin: 0 0 0 0;
      padding: 0;
    }

    .form-subtitle {
      text-align: center;
      font-size: 14px;
      margin: 0 0 10px 0;
      padding: 0;
    }

    .form-row {
      width: 100%;
      margin-bottom: 8px;
      padding: 0 5px;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .form-row.form-check {
      flex-direction: row;
    }

    .form-row .form-label {
      display: none;
      width: 100%;
      margin-bottom: 5px;
    }

    .form-row .form-control,
    .form-row .form-select {
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
      background-color: #000;
      border-radius: 3px;
      cursor: pointer;
      margin-top: 2px;
    }

    .policy {
      margin: 5px 0 0 0;
      padding: 0;
      font-size: 12px;
      color: #666;
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
    }

    .logo img{ display: inline-block; width: 120px; }

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
        <input type="text" id="domain" name="domain" value="{{$domain}}" />

        <input type="text" name="capf_id" id="capf_id" value="0" >
        <div id="loadData"></div>
        <div class="message">
            @if(session()->has('notify'))
                @foreach(session('notify') as $msg)
                    <div class="alert {{$msg[0]}}">{{$msg[1]}}</div>
                @endforeach
            @endif
            @if ($errors->any())
            @php
                $collection = collect($errors->all());
                $errors = $collection->unique();
            @endphp
                @foreach ($errors as $error)
                    <div class="alert error">{{$error }}</div>
                @endforeach
            @endif
        </div>
          <div class="form-row">
            <button type="submit" id="saveData" class="form-btn">Submit</button>
            <p class="policy">I agree to your privacy policy by submitting the form</p>
            <p class="logo"><img src="logo.png" alt="" > <span> A1 Immigration Consultancy</span></p>
          </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script>
   // var website = document.referrer?document.referrer:false;
   var website = $('#domain').val();
    var publisher_id = {{$publisher_id}};
    var actionUrl =  '/api/campaign_form/find/'+website+'/'+publisher_id;
    var formData = { 'website': website , 'publisher_id': publisher_id  };
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
        $('#capf_id').attr('value', data.campaign_id +','+data.advertiser_id +','+publisher_id +','+data.id  );
        form = $('#LeadForm');
         console.log(data);
            t='';
            // t +=' <input type="text" name="c_id" value="'+data.id+'" >';
            //if(data.youtube_1){ t +='<div class="video">  <iframe width="100%" height="175" src="'+data.youtube_1+' " title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div>'; }
            if(data.form_title){ t +='<h2 class="form-title">'+data.form_title+'</h2>'; }
            if(data.offer_desc){ t +='<p class="form-subtitle">'+data.offer_desc+'</p>'; }
            for ($i = 1; $i < 6; $i++){
                var $field = data['field_'+$i];
                if($field){
                    t +='<div class="form-row">';
                    t +='<label for="Input_field_'+$i+'" class="form-label">'+$field['question_text']+'*</label>';
                    if($field){
                        if($field['question_type']== "ShortAnswer"){
                            t +='<input type="text" class="form-control" id="Input_field_'+$i+'" name="field_'+$i+'" placeholder="'+$field['question_text']+'*"  required >';
                        }else{
                            t +='<select class="form-select" id="Input_field_'+$i+'"  name="field_'+$i+'" required>';
                            t +='<option selected value="" class="holder"> '+$field['question_text']+'* </option>';
                            t +='<option value="'+ $field['option_1']+'">'+ $field['option_1']+'</option>';
                            t +='<option value="'+ $field['option_2']+'">'+ $field['option_2']+'</option>';
                            t +='<option value="'+ $field['option_3']+'">'+ $field['option_3']+'</option>';
                            t +='<option value="'+ $field['option_4']+'">'+ $field['option_4']+'</option>';
                            t +='</select>';
                        }
                    }
                    t +='</div>';
                }
            }
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
                            alert('Leads Saved');
                        }else{
                            alert('Try Again');
                        }
                    }
                });
        });

        </script>
</body>
</html>
