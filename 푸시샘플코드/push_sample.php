<?php

define("GOOGLE_API_KEY", "AAAAYU1qQ4k:APA91bFfiDSDPbePpfQSrSQgDPLXyN-LFb5_hLJSSPxY5bFJHiCAc_MWRmKn0jyF5TKh-AAD2FAMuLZeuENjFDnxh0c7ZdUrr9d_ycPMv4EvFdDNILOXQYc7yoPgRrjNG3LVZ3559tJm");
define("GOOGLE_GCM_URL", "https://fcm.googleapis.com/fcm/send");

function send_gcm_notify($reg_id, $title, $message ,$url , $deviceType) {

	$fields;
	if($deviceType == 'android'){
		//android
		$fields = array(
			'registration_ids'  => array( $reg_id ),
			'data'              => array( "msg" => $message ,"title" => $title , "url" => $url ),
		);
	}else{
		//ios
		$fields = array(
			 'registration_ids'  => array( $reg_id ),
			 'mutable_content'=> true,
			 'url'=> $url,
			 'notification' => array( "subtitle" => $message ,
									  "title" => "알림"  ,
									  "url" => $url  ,
									  'push_message'=> $message,

									  'sound'=>'Default',
									  "body" => $message )
		);
	}

    $headers = array(
        'Authorization: key=AAAAYU1qQ4k:APA91bFfiDSDPbePpfQSrSQgDPLXyN-LFb5_hLJSSPxY5bFJHiCAc_MWRmKn0jyF5TKh-AAD2FAMuLZeuENjFDnxh0c7ZdUrr9d_ycPMv4EvFdDNILOXQYc7yoPgRrjNG3LVZ3559tJm',
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, GOOGLE_GCM_URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Problem occurred: ' . curl_error($ch));
    }

    curl_close($ch);
    echo $result;
 }

$reg_id = "d8z8sUChNXg:APA91bHkw2CG875gG1g8-UKVDHgI_d5RUvDZ3HlozRb_ktvAUmt4TNlRyDLHbj9V8o-PdFQIkjTXb6ucXOm0uMfCGefAbj5H9nGMNPgklYe2rKsscEYQYgOV3MYz8FDScWdKK_BoJj5x";	//푸시 보낼 디바이스 토큰
$title = "상단타이틀제목";				//푸시 title 문구
$msg = "테스트입니다..";				//푸시 body 문구
$url = "https://www.naver.com/";	//푸시클릭시 이동할 url 주소
$deviceType = "android";			//디바이스 타입 : android or ios

//http://snap40.cafe24.com/jumjip/push_sample.php

send_gcm_notify($reg_id, $title,  $msg , $url , $deviceType);
?>
