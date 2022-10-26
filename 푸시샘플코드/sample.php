<!--http://emview.godohosting.com/api_help.php?a=37.5224417&b=126.8066471&c=%EB%8C%80%ED%95%9C%EB%AF%BC%EA%B5%AD%20%EA%B2%BD%EA%B8%B0%EB%8F%84%20%EB%B6%80%EC%B2%9C%EC%8B%9C%20%EC%98%A4%EC%A0%95%EA%B5%AC%20%EC%86%8C%EC%82%AC%EB%A1%9C742%EB%B2%88%EA%B8%B8%2019-1&d=356428050144750
-->

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, user-scalable=yes, target-densitydpi=medium-dpi">
<title>guide</title>
<style type="text/css">
	body {background:#464545; margin:0; padding:0;}
	div,a,dt,dd {font-family:'맑은 고딕'; text-decoration:none; font-size:14px; color:#fff; letter-spacing:-0.5px;}
	.project_name {background:#ffd548; color:#464545; padding:10px 0 10px 0; font-size:27px; text-align:center;}

	.project_sitemap {margin:10px;}
	.project_sitemap dt {display:block; font-size:15px; padding:10px 10px 15px 15px; background:rgba(0,0,0,0.3); margin-top:25px;}
	a {display:inline-block; text-decoration:none; padding:5px 0; color:#fff; }
	a:hover {color:#ffd548}

button {width:100%; height:28px; text-align:center;word-wrap:normal; word-break:keep-all; border-radius:5px; box-sizing:border-box; }

.input_design {height:40px; width:75%; box-sizing:border-box; padding:0 10px; font-size:13px;}

.button_pack .btn_md_black {background:#505258; color:#fff !important; padding:11px; border:1px solid #000;}

</style>

</head><script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
	var isiOS = navigator.userAgent.match('iPad') || navigator.userAgent.match('iPhone') || navigator.userAgent.match('iPod'); var isAndroid = navigator.userAgent.match('Android');
	var appPath = "https://thinkerodeng.tistory.com/300";
	var prevType = "";





	function deviceType(){
		var mobile = (/iphone|ipad|ipod|android/i.test(navigator.userAgent.toLowerCase()));

		if (mobile) {
			// 유저에이전트를 불러와서 OS를 구분합니다.
			var userAgent = navigator.userAgent.toLowerCase();
			if (userAgent.search("android") > -1)
			currentOS = "android";
			else if ((userAgent.search("iphone") > -1) || (userAgent.search("ipod") > -1)
					|| (userAgent.search("ipad") > -1))
				currentOS = "ios";
			else
				currentOS = "else";
		} else {
			// 모바일이 아닐 때
			currentOS = "nomobile";
		}

		return currentOS;
		//alert(currentOS);
	}

	function appCheck(){
		//alert(navigator.userAgent.toLowerCase());
		var mobile = (/iphone|ipad|ipod|android/i.test(navigator.userAgent.toLowerCase()));

		if (mobile) {
			// 유저에이전트를 불러와서 OS를 구분합니다.
			var userAgent = navigator.userAgent.toLowerCase();
			if (userAgent.search("jumjipandroid") > -1){
				currentOS = "nativeandroid";
			}
			else if(userAgent.search("jumjipios") > -1){
				currentOS = "nativeios";
			}
			else{
				// 모바일이 아닐 때
				if (userAgent.search("android") > -1)
					currentOS = "webandroid";
				else
					currentOS = "webios";
			}
		} else {
			// 모바일이 아닐 때
			if (userAgent.search("android") > -1)
				currentOS = "webandroid";
			else
				currentOS = "webios";

		}

		return currentOS;
		//alert(currentOS);
	}

	//1.앱 호출(푸시키)
	function getPushToken(){
		alert("getPushToken");
		if(deviceType() == 'android'){
			gaeminAndroid.getPushToken();
		}else{
			//var obj ={};
			//obj.name = "getPushToken";
			//webkit.messageHandlers.jumjipIos.postMessage(JSON.stringify(obj));
			//webkit.messageHandlers.jumjipIos.postMessage("{'name':'test'}");

			var obj ={'name':'getPushToken'};
			webkit.messageHandlers.gaeminIos.postMessage(obj);

		}
	}


	function RgetPushToken(obj , obj2){
		alert(obj);
		alert(obj2);

	}

	function appDown(){
		alert(appCheck());
		if(appCheck() == 'webandroid'){
			//구글플레이 스토어
			alert(1);
			location.href = 'intent://main_web#Intent;scheme=jumjip;package=jumjip.co.kr;end';

		}else if(appCheck() == 'webios'){
			//앱스토어로 이동
			alert(2);
			setTimeout( function () { if ( ( new Date() ).getTime() - visiteTm < 3000 ) { // 앱스토어 이동
				location.href = "https://itunes.apple.com/app/id365494029";
			} } ,1500 );
			setTimeout( function () { // 앱실행
				location.href = "jumjip-shop://";
			} ,0 );


		}else{
			alert(3);
		}
	}
	// 스토어  이동
	function moveAttendanceEvent(){
		if(isiOS) {
			// iOS 실행
			setTimeout(function () {
					window.location = "https://itunes.apple.com/kr/app/podcast/id1497555085";

			}, 500);
			//window.location = 'jumjip://main_web=' + appPath;
		} else if(isAndroid) {
			setTimeout(function () {
					//window.location = "https://play.google.com/store/apps/details?id=jumjip.co.kr" ;
					location.href = 'intent://main_web#Intent;scheme=jumjip;package=jumjip.co.kr;end';
			}, 500);
			//window.location = 'jumjip://main_web?' + appPath;
		}
	}






</script>
<body onload="">

<div>
<div class="project_name">테스트 페이지</div>

<div class="project_sitemap">





<!-- 1.푸시키 Get 으로 가져가기-->
<button onclick="javascript:getPushToken()">1.push token</button>



<button onclick="javascript:moveAttendanceEvent()">2.app down11</button>

</form>


<br>



</body>
</html>
