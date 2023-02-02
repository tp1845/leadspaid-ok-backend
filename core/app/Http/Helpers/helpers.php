<?php

use App\Advertiser;
use App\GeneralSetting;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\campaign_forms_leads;
use App\campaigns;
use App\lgen_spend;
use App\Publisher;
function sidebarVariation()
{

    /// for sidebar
    $variation['sidebar'] = 'bg_img';

    //for selector
    $variation['selector'] = 'capsule--rounded';

    //for overlay
    $variation['overlay'] = 'overlay--indigo';

    //Opacity
    $variation['opacity'] = 'overlay--opacity-8'; // 1-10

    return $variation;
}

function systemDetails()
{
    $system['name'] = 'leadspaid';
    $system['version'] = '1.0';
    return $system;
}

function getLatestVersion()
{
    $param['purchasecode'] = env("PURCHASECODE");
    $param['website'] = @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI'] . ' - ' . env("APP_URL");
    $url = 'https://license.viserlab.com/updates/version/' . systemDetails()['name'];
    $result = curlPostContent($url, $param);
    if ($result) {
        return $result;
    } else {
        return null;
    }
}

function slug($string)
{
    return Illuminate\Support\Str::slug($string);
}

function shortDescription($string, $length = 120)
{
    return Illuminate\Support\Str::limit($string, $length);
}

function shortCodeReplacer($shortCode, $replace_with, $template_string)
{
    return str_replace($shortCode, $replace_with, $template_string);
}


function verificationCode($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}

function getNumber($length = 8)
{
    $characters = '1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



//moveable
function uploadImage($file, $location, $size = null, $old = null, $thumb = null)
{
    $path = makeDirectory($location);
    if (!$path) throw new Exception('File could not been created.');

    if (!empty($old)) {
        removeFile($location . '/' . $old);
        removeFile($location . '/thumb_' . $old);
    }


    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();


    if ($file->getClientOriginalExtension() == 'gif') {
        copy($file->getRealPath(), $location . '/' . $filename);
    } else {

        $image = Image::make($file);
        if (!empty($size)) {
            $size = explode('x', strtolower($size));
            $image->resize($size[0], $size[1]);
        }
        $image->save($location . '/' . $filename);

        if (!empty($thumb)) {

            $thumb = explode('x', $thumb);
            Image::make($file)->resize($thumb[0], $thumb[1])->save($location . '/thumb_' . $filename);
        }
    }

    return $filename;
}

//moveable uploadVideo
function uploadVideo($file, $location, $size = null, $old = null, $thumb = null)
{
    $path = makeDirectory($location);
    if(!$path)
    {
        throw new Exception('File could not been created.');
    }

    if(!empty($old))
    {
        removeFile($location . '/' . $old);
        removeFile($location . '/thumb_' . $old);
    }
    //    $filenameWithExt = $file->getClientOriginalName();
    //
    //    $file_name = pathinfo($filenameWithExt, PATHINFO_FILENAME);

    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();


    $file->move($location, $filename);

    return $filename;
}

function uploadFile($file, $location, $size = null, $old = null)
{
    $path = makeDirectory($location);
    if (!$path) throw new Exception('File could not been created.');

    if (!empty($old)) {
        removeFile($location . '/' . $old);
    }

    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
    $file->move($location, $filename);
    return $filename;
}

function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}


function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}


function activeTemplate($asset = false)
{

    $gs = GeneralSetting::first(['active_template']);

    $template = $gs->active_template;

    $sess = session()->get('template');

    if (trim($sess) != null) {
        $template = $sess;
    }
    if ($asset) return 'assets/templates/' . $template . '/';
    return 'templates.' . $template . '.';
}

function activeTemplateName()
{
    $gs = GeneralSetting::first(['active_template']);
    $template = $gs->active_template;
    $sess = session()->get('template');
    if (trim($sess) != null) {
        $template = $sess;
    }
    return $template;
}


function reCaptcha()
{
    $reCaptcha = \App\Extension::where('act', 'google-recaptcha2')->where('status', 1)->first();
    return $reCaptcha ? $reCaptcha->generateScript() : '';
}


function analytics()
{
    $analytics = \App\Extension::where('act', 'google-analytics')->where('status', 1)->first();
    return $analytics ? $analytics->generateScript() : '';
}

function tawkto()
{
    $tawkto = \App\Extension::where('act', 'tawk-chat')->where('status', 1)->first();
    return $tawkto ? $tawkto->generateScript() : '';
}


function fbcomment()
{
    $comment = \App\Extension::where('act', 'fb-comment')->where('status', 1)->first();
    return  $comment ? $comment->generateScript() : '';
}

function getCustomCaptcha($height = 46, $width = '300px', $bgcolor = '#003', $textcolor = '#abc')
{
    $textcolor = '#' . App\GeneralSetting::first()->base_color;
    $captcha = \App\Extension::where('act', 'custom-captcha')->where('status', 1)->first();

    $code = rand(100000, 999999);
    $char = str_split($code);
    $ret = '<link href="https://fonts.googleapis.com/css?family=Henny+Penny&display=swap" rel="stylesheet">';
    $ret .= '<div style="height: ' . $height . 'px; line-height: ' . $height . 'px; width:' . $width . '; text-align: center; background-color: ' . $bgcolor . '; color: ' . $textcolor . '; font-size: ' . ($height - 20) . 'px; font-weight: bold; letter-spacing: 20px; font-family: \'Henny Penny\', cursive;  -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;  display: flex; justify-content: center;">';
    foreach ($char as $value) {
        $ret .= '<span style="    float:left;     -webkit-transform: rotate(' . rand(-60, 60) . 'deg);">' . $value . '</span>';
    }
    $ret .= '</div>';
    $captchaSecret = hash_hmac('sha256', $code, $captcha->shortcode->random_key->value);
    $ret .= '<input type="hidden" name="captcha_secret" value="' . $captchaSecret . '">';
    return $ret;
}


function captchaVerify($code, $secret)
{
    $captcha = \App\Extension::where('act', 'custom-captcha')->where('status', 1)->first();
    $captchaSecret = hash_hmac('sha256', $code, $captcha->shortcode->random_key->value);
    if ($captchaSecret == $secret) {
        return true;
    }
    return false;
}

function getTrx($length = 12)
{
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function currency()
{
    $data['crypto'] = 8;
    $data['fiat'] = 2;
    return $data;
}


function getAmount($amount, $length = 0)
{
    if (0 < $length) {
        return number_format($amount + 0, $length);
    }
    return $amount + 0;
}

function removeElement($array, $value)
{
    return array_diff($array, (is_array($value) ? $value : array($value)));
}

function cryptoQR($wallet, $amount, $crypto = null)
{

    $varb = $wallet . "?amount=" . $amount;
    return "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$varb&choe=UTF-8";
}

//moveable
function curlContent($url)
{
    //open connection
    $ch = curl_init();
    //set the url, number of POST vars, POST data

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //execute post
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);

    return $result;
}

//moveable
function curlPostContent($url, $arr = null)
{
    if ($arr) {
        $params = http_build_query($arr);
    } else {
        $params = '';
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}


function inputTitle($text)
{
    return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
}


function titleToKey($text)
{
    return strtolower(str_replace(' ', '_', $text));
}


function str_slug($title = null)
{
    return \Illuminate\Support\Str::slug($title);
}

function str_limit($title = null, $length = 10)
{
    return \Illuminate\Support\Str::limit($title, $length);
}

//moveable
function getIpInfo()
{
    $ip = null;
    $deep_detect = TRUE;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }


    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);


    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;

    $data['country'] = $country ?? null;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');


    return $data;
}

//moveable
function osBrowser()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    $data['os_platform'] = $os_platform;
    $data['browser'] = $browser;

    return $data;
}

function site_name()
{
    $general = GeneralSetting::first();
    $sitname = str_word_count($general->sitename);
    $sitnameArr = explode(' ', $general->sitename);
    if ($sitname > 1) {
        $title = "<span>$sitnameArr[0] </span> " . str_replace($sitnameArr[0], '', $general->sitename);
    } else {
        $title = "<span>$general->sitename</span>";
    }

    return $title;
}


//moveable
function getTemplates()
{
    $param['purchasecode'] = env("PURCHASECODE");
    $param['website'] = @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI'] . ' - ' . env("APP_URL");
    $url = 'https://license.viserlab.com/updates/templates/' . systemDetails()['name'];
    $result = curlPostContent($url, $param);
    if ($result) {
        return $result;
    } else {
        return null;
    }
}


function getPageSections($arr = false)
{

    $jsonUrl = resource_path('views/') . str_replace('.', '/', activeTemplate()) . 'sections.json';
    $sections = json_decode(file_get_contents($jsonUrl));
    if ($arr) {
        $sections = json_decode(file_get_contents($jsonUrl), true);
        ksort($sections);
    }
    return $sections;
}




function notify($user, $type, $shortCodes = null)
{

    send_email($user, $type, $shortCodes);
    send_sms($user, $type, $shortCodes);
}


/*SMS EMIL moveable*/

function send_sms($user, $type, $shortCodes = [])
{
    $general = GeneralSetting::first(['sn', 'sms_api']);
    $sms_template = \App\SmsTemplate::where('act', $type)->where('sms_status', 1)->first();
    if ($general->sn == 1 && $sms_template) {

        $template = $sms_template->sms_body;

        foreach ($shortCodes as $code => $value) {
            $template = shortCodeReplacer('{{' . $code . '}}', $value, $template);
        }
        $template = urlencode($template);

        $message = shortCodeReplacer("{{number}}", $user->mobile, $general->sms_api);
        $message = shortCodeReplacer("{{message}}", $template, $message);
        $result = @curlContent($message);
    }
}

function send_email($user, $type = null, $shortCodes = [])
{
    $general = GeneralSetting::first();

    $email_template = \App\EmailTemplate::where('act', $type)->where('email_status', 1)->first();
    if ($general->en != 1 || !$email_template) {
        return;
    }

    $message = shortCodeReplacer("{{name}}", $user->username, $general->email_template);
    $message = shortCodeReplacer("{{message}}", $email_template->email_body, $message);

    if (empty($message)) {
        $message = $email_template->email_body;
    }

    foreach ($shortCodes as $code => $value) {
        $message = shortCodeReplacer('{{' . $code . '}}', $value, $message);
    }
    $config = $general->mail_config;

    if ($config->name == 'php') {
        send_php_mail($user->email, $user->username, $general->email_from, $email_template->subj, $message);
    } else if ($config->name == 'smtp') {
        send_smtp_mail($config, $user->email, $user->username, $general->email_from, $general->sitetitle, $email_template->subj, $message);
    } else if ($config->name == 'sendgrid') {
        send_sendGrid_mail($config, $user->email, $user->username, $general->email_from, $general->sitetitle, $email_template->subj, $message);
    } else if ($config->name == 'mailjet') {
        send_mailjet_mail($config, $user->email, $user->username, $general->email_from, $general->sitetitle, $email_template->subj, $message);
    }
}

function send_email_publisher($user, $type, $link, $email_type)
{
    $general = GeneralSetting::first();
    $email_template = \App\EmailTemplate::where('act',$type)->where('email_status', 1)->first();
    if ($general->en != 1 || !$email_template) { return; }
    $sendto_email=$user->email;
    $receiver_name = $user->name;
    if($email_type == 'verify'){
        $subject= $email_template->subj;
        $message = '<p style="color: rgb(193,205,220);">Please verify your <a href="https://leadspaid.com/"  style="color: rgb(193,205,220);" >LeadsPaid.com</a> account by clicking this link</p>';
        $message .= '<p style="color: rgb(193,205,220);"><a href='.$link.'  style="color: rgb(193,205,220); font-size: 18px;">'.$link.'</a></p>';
    }elseif($email_type == 'account'){
        $subject= 'Your LeadsPaid.com Account has been activated. Login Now »';
        $message = '<p style="color: rgb(193,205,220);"> Your LeadsPaid.com account has been activated! <br/>  Please login to <a href="https://www.leadspaid.com/login-publisher" style="color: rgb(193,205,220);">https://www.leadspaid.com/login-publisher</a>  to Add your App or Webite.</p>';
    } elseif($email_type == 'admin_on_publisher_registered'){
        $sendto_email= 'arun.saba@leadspaid.com';
        $receiver_name = 'Admin';
        $subject= 'New Publisher registered - Approve Now';
        $message = '<p style="color: rgb(193,205,220);">A new Publisher ('. $user->company_name .') has registered for an Publisher account.<br/> <a href="https://www.leadspaid.com/admin">Approve it in admin panel</a>.</p>';
    }
    send_general_email($sendto_email, $subject, $message, $receiver_name);
}

function send_email_adv($user, $type = null, $link)
{
    $general = GeneralSetting::first();
    $email_template = \App\EmailTemplate::where('act',$type)->where('email_status', 1)->first();
    if ($general->en != 1 || !$email_template) { return; }
    $sendto_email=$user->email;
    $receiver_name = $user->name;
    $subject= $email_template->subj;
    $message = '<p style="color: rgb(193,205,220);">Please verify your <a href="https://leadspaid.com/"  style="color: rgb(193,205,220);" >LeadsPaid.com</a> account by clicking this link</p>';
    $message .= '<p style="color: rgb(193,205,220);"><a href='.$link.'  style="color: rgb(193,205,220); font-size: 18px;">'.$link.'</a></p>';
    send_general_email($sendto_email, $subject, $message, $receiver_name);
}


function send_email_campaign_approval($user, $type, $data)
{
    $general = GeneralSetting::first();
    $email_template = \App\EmailTemplate::where('act',$type)->where('email_status', 1)->first();
    if ($general->en != 1 || !$email_template) { return; }
    $sendto_email=$user->email;
    $receiver_name = $user->name;
    $subject= 'Your campaign has been approved - ' . $data['campaign_name'];
    $message = '<p style="color: rgb(193,205,220);">Your campaign '.$data['campaign_name'].' has been approved.</p>';
    $message .= '<p style="color: rgb(193,205,220);">Please <a href="'.$data['campaign_url'].'">click here</a> to check.</p>';
    send_general_email($sendto_email, $subject, $message, $receiver_name);
}

function send_email_adv_activated($user, $type = null, $name)
{
    $general = GeneralSetting::first();
    $email_template = \App\EmailTemplate::where('act',$type)->where('email_status', 1)->first();
    if ($general->en != 1 || !$email_template) { return; }
    $sendto_email=$user->email;
    $receiver_name = $user->name;
    $subject= 'Your LeadsPaid.com Account has been activated. Create Campaign Now »';
    $message = '<p style="color: rgb(193,205,220);"> Your LeadsPaid.com account has been activated! <br/>  Please login to <a href="https://www.leadspaid.com/login-advertiser" style="color: rgb(193,205,220);">https://www.leadspaid.com/login-advertiser</a>  to create your first lead generation campaign.</p>';
    send_general_email($sendto_email, $subject, $message, $receiver_name);
}

function send_email_adv_admin($user, $type = null, $username)
{
    $general = GeneralSetting::first();
    $email_template = \App\EmailTemplate::where('act',$type)->where('email_status', 1)->first();
    if ($general->en != 1 || !$email_template) { return; }
    $sendto_email= 'arun.saba@leadspaid.com';
    $receiver_name = 'Admin';
    $subject= 'New Advertiser registered - Approve Now';
    $message = '<p style="color: rgb(193,205,220);">A new Advertiser ('. $user->company_name .') has registered for an Advertiser account.<br/> <a href="https://www.leadspaid.com/admin">Approve it in admin panel</a>.</p>';
    send_general_email($sendto_email, $subject, $message, $receiver_name);
}

function send_email_contact_admin($name,$type = null,$email,$company,$phone,$messages,$enquiry_about){
    $general = GeneralSetting::first();
    $email_template = \App\EmailTemplate::where('act',$type)->where('email_status', 1)->first();
    if ($general->en != 1 || !$email_template) { return; }
    $sendto_email='arun.saba@leadspaid.com';
    $receiver_name = 'Admin';
    $subject="Message from: Contact Us Page";

    $message = '<h3 style="color: rgb(193,205,220);"><b>Message from: Contact Us Page </b></h3>';
    $message .= '<p style="color: rgb(193,205,220);"><b>What is your Enquiry About : </b> '.$enquiry_about.'</p>';
    $message .= '<p style="color: rgb(193,205,220);"><b>Name : </b> '.$name.'</p>';
    $message .= '<p style="color: rgb(193,205,220);"><b>Email : </b> '.$email.'</p>';
    $message .= '<p style="color: rgb(193,205,220);"><b>Company : </b> '.$company.'</p>';
    $message .= '<p style="color: rgb(193,205,220);"><b>Phone : </b> '.$phone.'</p>';
    $message .= '<p style="color: rgb(193,205,220);"><b>Message : </b> '.$messages.'</p>';
    send_general_email($sendto_email, $subject, $message, $receiver_name);
}

function send_php_mail($receiver_email, $receiver_name, $sender_email, $subject, $message)
{
    $gnl = GeneralSetting::first();
    $headers = "From: $gnl->sitename <$sender_email> \r\n";
    $headers .= "Reply-To: $gnl->sitename <$sender_email> \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    @mail($receiver_email, $subject, $message, $headers);
}

function send_smtp_mail($config, $receiver_email, $receiver_name, $sender_email, $sender_name, $subject, $message)
{
    $mail = new PHPMailer(true);
    $gnl = GeneralSetting::first();
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = $config->host;
        $mail->SMTPAuth   = true;
        $mail->Username   = $config->username;
        $mail->Password   = $config->password;
        if ($config->enc == 'ssl') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } else {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }
        $mail->Port       = $config->port;
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom($sender_email, $sender_name);
        $mail->addAddress($receiver_email, $receiver_name);
        $mail->addReplyTo($sender_email, $gnl->sitename);
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->send();
    } catch (Exception $e) {
        throw new Exception($e);
    }
}

function send_sendGrid_mail($config, $receiver_email, $receiver_name, $sender_email, $sender_name, $subject, $message)
{
    $sendgridMail = new \SendGrid\Mail\Mail();
    $sendgridMail->setFrom($sender_email, $sender_name);
    $sendgridMail->setSubject($subject);
    $sendgridMail->addTo($receiver_email, $receiver_name);
    $sendgridMail->addContent("text/html", $message);
    $sendgrid = new \SendGrid($config->appkey);
    try {
        $response = $sendgrid->send($sendgridMail);
    } catch (Exception $e) {
        // echo 'Caught exception: '. $e->getMessage() ."\n";
    }
}

function send_mailjet_mail($config, $receiver_email, $receiver_name, $sender_email, $sender_name, $subject, $message)
{
    $mj = new \Mailjet\Client($config->public_key, $config->secret_key, true, ['version' => 'v3.1']);
    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => $sender_email,
                    'Name' => $sender_name,
                ],
                'To' => [
                    [
                        'Email' => $receiver_email,
                        'Name' => $receiver_name,
                    ]
                ],
                'Subject' => $subject,
                'TextPart' => "",
                'HTMLPart' => $message,
            ]
        ]
    ];
    $response = $mj->post(\Mailjet\Resources::$Email, ['body' => $body]);
}

function getPaginate($paginate = 20)
{
    return $paginate;
}

function menuActive($routeName, $type = null)
{
    if ($type == 3) {
        $class = 'side-menu--open';
    } elseif ($type == 2) {
        $class = 'sidebar-submenu__open';
    } else {
        $class = 'active';
    }
    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}
function getImage($image, $size = null)
{
    $clean = '';
    $size = $size ? $size : 'undefined';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    } else {
        return route('placeholderImage', $size);
    }
}

function get_image($image, $clean = '')
{
    return file_exists($image) && is_file($image) ? asset($image) . $clean : asset('assets/images/default.png');
}

function imagePath()
{
    $data['gateway'] = [
        'path' => 'assets/images/gateway',
        'size' => '800x800',
    ];
    $data['verify'] = [
        'withdraw' => [
            'path' => 'assets/images/verify/withdraw'
        ],
        'deposit' => [
            'path' => 'assets/images/verify/deposit'
        ]
    ];
    $data['image'] = [
        'default' => 'assets/images/default.png',
    ];
    $data['withdraw'] = [
        'method' => [
            'path' => 'assets/images/withdraw/method',
            'size' => '800x800',
        ]
    ];
    $data['ticket'] = [
        'path' => 'assets/images/support',
    ];
    $data['language'] = [
        'path' => 'assets/images/lang',
        'size' => '64x64'
    ];
    $data['logoIcon'] = [
        'path' => 'assets/images/logoIcon',
    ];
    $data['favicon'] = [
        'size' => '128x128',
    ];
    $data['extensions'] = [
        'path' => 'assets/images/extensions',
    ];
    $data['seo'] = [
        'path' => 'assets/images/seo',
        'size' => '600x315'
    ];
    $data['profile'] = [
        'user' => [
            'path' => 'assets/images/user/profile',
            'size' => '350x300'
        ],
        'admin' => [
            'path' => 'assets/admin/images/profile',
            'size' => '400x400'
        ]
    ];
    return $data;
}

function diffForHumans($date)
{
    $lang = session()->get('lang');
    \Carbon\Carbon::setlocale($lang);
    return \Carbon\Carbon::parse($date)->diffForHumans();
}

function showDateTime($date, $format = 'd M, Y h:i A')
{
    $lang = session()->get('lang');
    \Carbon\Carbon::setlocale($lang);
    return \Carbon\Carbon::parse($date)->translatedFormat($format);
}

//moveable
function send_general_email($email, $subject, $message, $receiver_name = '')
{

    $general = GeneralSetting::first();

    if ($general->en != 1 || !$general->email_from) {
        return;
    }

    $message = shortCodeReplacer("{{message}}", $message, $general->email_template);
    $message = shortCodeReplacer("{{name}}", $receiver_name, $message);

    $config = $general->mail_config;

    if ($config->name == 'php') {
        send_php_mail($email, $receiver_name, $general->email_from, $subject, $message);
    } else if ($config->name == 'smtp') {
        send_smtp_mail($config, $email, $receiver_name, $general->email_from, $general->sitename, $subject, $message);
    } else if ($config->name == 'sendgrid') {
        send_sendgrid_mail($config, $email, $receiver_name, $general->email_from, $general->sitename, $subject, $message);
    } else if ($config->name == 'mailjet') {
        send_mailjet_mail($config, $email, $receiver_name, $general->email_from, $general->sitename, $subject, $message);
    }
}

function getContent($data_keys, $singleQuery = false, $limit = null, $orderById = false)
{
    if ($singleQuery) {
        $content = \App\Frontend::where('data_keys', $data_keys)->latest()->first();
    } else {
        $article = \App\Frontend::query();
        $article->when($limit != null, function ($q) use ($limit) {
            return $q->limit($limit);
        });
        if ($orderById) {
            $content = $article->where('data_keys', $data_keys)->orderBy('id')->get();
        } else {
            $content = $article->where('data_keys', $data_keys)->latest()->get();
        }
    }
    return $content;
}

function gatewayRedirectUrl()
{
    return 'user.deposit';
}

function number_format_short($n, $precision = 1)
{
    if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = '';
    } else if ($n < 900000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
        $suffix = 'K';
    } else if ($n < 900000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
        $suffix = 'M';
    } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        $suffix = 'B';
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
        $suffix = 'T';
    }
    // Remove unecessary zeroes after decimal.

    if ($precision > 0) {
        $dotzero = '.' . str_repeat('0', $precision);
        $n_format = str_replace($dotzero, '', $n_format);
    }
    return $n_format . $suffix;
}

function returnUrl()
{
    if (session('pricePlan')) {
        return 'advertiser.price.plan';
    }
    return 'user.deposit';
}

function returnMsg()
{
    if (session('pricePlan')) {
        return 'Plan Purchased Successfully';
    }
    return 'Deposit Success';
}

function paginateLinks($data, $design = 'admin.partials.paginate')
{
    return $data->appends(request()->all())->links($design);
}

function urlToDomain($url)
{
    $parse = parse_url($url);
    $domain = @$parse['host'] ? $parse['host'] : $parse['path'];
    $domain = str_replace("www.", "", $domain);
    return $domain;
}

function countDigits($MyNum){
  $MyNum = (int)$MyNum;
  if($MyNum != 0)
    return 1 + countDigits($MyNum/10);
  else
    return 0;
}

function get_invoice_format($invoice){
    if(countDigits($invoice)==1){
        return 'INV000000'.$invoice;
    }elseif(countDigits($invoice)==2){
        return 'INV00000'.$invoice;
    }elseif(countDigits($invoice)==3){
         return 'INV0000'.$invoice;
    }elseif(countDigits($invoice)==4){
         return 'INV000'.$invoice;
    }elseif(countDigits($invoice)==5){
         return 'INV00'.$invoice;
    }elseif(countDigits($invoice)==6){
         return 'INV0'.$invoice;
    }elseif(countDigits($invoice)==7){
         return 'INV'.$invoice;
    }
}
function get_form_leads_by_id($id){

    return campaign_forms_leads::where('form_id',$id)->count();

}

function get_campiagn_leads_by_id($id,$start_date=null,$end_date=null){
    if ($start_date === null){
        $start_date = date("Y-m-d",strtotime("-1 week +1 day"));
        $end_date = date("Y-m-d",strtotime("+1 day"));
    }
    return campaign_forms_leads::where('campaign_id',$id)->whereBetween('lgen_date', array($start_date, $end_date))->get()->count();
}
function get_campiagn_cost_by_id($id,$start_date=null,$end_date=null){
    if ($start_date === null){
        $start_date = date("Y-m-d",strtotime("-1 week +1 day"));
        $end_date = date("Y-m-d",strtotime("+1 day"));
    }
    $cost_row= lgen_spend::where('campaign_id',$id)->whereBetween('lgen_date', array($start_date, $end_date))->select(['cost'])->get()->sum('cost');
 
    return $cost_row;
}
function get_total_campaign($id){
    return campaigns::where('advertiser_id',$id)->count();
}
function get_total_leads_by_campaignid($id){ 
    return campaign_forms_leads::where('campaign_id', $id)->get()->count();
}
function get_total_active_campaign($id){
    return campaigns::where('advertiser_id',$id)->where('approve', 1)->where('status', '=', 1)->get()->count();
}
function get_active_campaign_budget($id){
    return campaigns::where('advertiser_id',$id)->where('approve', 1)->where('status', '=', 1)->select(['daily_budget'])->get()->sum('daily_budget');
}
function get_assigned_advertisers($publisher_id){
    $assign_advertiser = Advertiser::whereJsonContains('assign_publisher',  (string) $publisher_id  )->select(['id', 'name', 'company_name'])->withCount('campaigns')->get()->toarray();
    return $assign_advertiser;
}

function get_publisher_type($type){
    $role = auth()->guard('publisher')->user()->role;
    if($role == 2){ $name ='Campaign Manager'; } elseif($role == 3){  $name = 'Campaign Executive'; } else { $name =  'Publisher Admin'; }
    if($type == 'name'){ return $name;  }else{   return $role;  }
}

function get_publisher_username(){
    $username = auth()->guard('publisher')->user()->username;
    return substr($username, 0, strpos($username, "@"));
}


function get_campaign_name_by_id($id){
    
    $data=campaigns::where('id',$id)->first();
     
    if(!empty($data)){
        return $data->name;
    }else{
        return  '';
    }
}

function get_publisher_name_by_id($id){
    $data=publisher::where('id', $id)->first();

    if(!empty($data)){
        return $data->name;
    }else{
        return  '';
    }
}
