<?php
error_reporting(0);
header('Origin: https://facebook.com');
define('API_SECRET', 'c1e620fa708a1d5696fb991c1bde5662');
define('BASE_URL', 'https://api.facebook.com/restserver.php');
function sign_creator(&$data){
	$sig = "";
	foreach($data as $key => $value){$sig .= "$key=$value";}
	$sig .= API_SECRET;
	$sig = md5($sig);
	return $data['sig'] = $sig;
}
function cURL($method = 'GET', $url = false, $data){
	$c = curl_init();
	$useragent = 'Opera/9.80 (Series 60; Opera Mini/6.5.27309/34.1445; U; en) Presto/2.8.119 Version/11.10';
	$opts = array(
		CURLOPT_URL => ($url ? $url : BASE_URL).($method == 'GET' ? '?'.http_build_query($data) : ''),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => true,
		CURLOPT_USERAGENT => $useragent
	);
	if($method == 'POST'){
		$opts[CURLOPT_POST] = true;
		$opts[CURLOPT_POSTFIELDS] = $data;
	}
	curl_setopt_array($c, $opts);
	$d = curl_exec($c);
	curl_close($c);
	return $d;
}
	if(isset($_POST['u'], $_POST['p'])){$_GET = $_POST;}
	$data = array(
	"api_key" => "3e7c78e35a76a9299309885393b02d97",
	"credentials_type" => "password",
	"email" => @$_GET['u'],
	"format" => "JSON",
	"generate_machine_id" => "1",
	"generate_session_cookies" => "1",
	"locale" => "vi_vn",
	"method" => "auth.login",
	"password" => @$_GET['p'],
	"return_ssl_resources" => "0",
	"v" => "1.0");
	sign_creator($data);
	$response = cURL('GET', false, $data);
	exit($response);
?>