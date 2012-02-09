<?
/*
$host = "localhost";
$base="zato_n";
$user = "zato_us";
$password = "7spxcgQp";
$id = '2346457';
$secret = '111111';
*/
include "info.php";

if (strlen($_GET['code'])>0 && mysql_connect($host, $user, $password) && mysql_select_db($base)){

	mysql_query("SET NAMES 'utf8'");
	$code = $_GET['code'];

	$resp = file_get_contents('https://api.vk.com/oauth/token?client_id='.$id.'&code='.$code.'&client_secret='.$secret);

	$data = json_decode($resp,true);
	$ein=$data['expires_in']*10;
	
	if ($data['access_token']) {
		$at=$data['access_token'];
		$u_id=$data['user_id'];
		$q = mysql_query("SELECT pass,name FROM `zato_n`.`us` WHERE u_id=" . $u_id);
		if(mysql_num_rows($q)>0 ){
			$f = mysql_fetch_row($q);

			SetCookie("u_pass",$f[0],time()+$ein,'/');
			SetCookie("uid",$u_id,time()+$ein,'/');
			SetCookie("name",$f[1],time()+$ein,'/');


			$q = mysql_query("UPDATE `zato_n`.`us` SET at = '".$at."' WHERE u_id=" . $u_id . ";");

			$resp = file_get_contents('https://api.vkontakte.ru/method/getUserInfoEx?uid='.$u_id.'&access_token='.$at);
			$data = json_decode($resp,true);
			$data = $data['response'];

			$sql="UPDATE `zato_n`.`us` SET name='".$data['user_name']."', sex=".$data['user_sex'].", bdate='".$data['user_bdate']."', city='".$data['user_city']."' WHERE u_id=".$u_id.";";
			mysql_query ($sql);

		}else{

			$resp = file_get_contents('https://api.vkontakte.ru/method/getUserInfoEx?uid='.$u_id.'&access_token='.$at);
			$data = json_decode($resp,true);
			$data = $data['response'];

			$u_pass = md5(uniqid(rand(),true));
			$sql="INSERT INTO `zato_n`.`us` (`u_id`, `name`, `sex`,`bdate`, `city`, `photo`, `pass`, `at`) VALUES ( ".$u_id.", '".$data['user_name']."', ".$data['user_sex'].",'".$data['user_bdate']."', '".$data['user_city']."', '".$data['user_photo']."', '".$u_pass."', '".$at."' );";
			mysql_query ($sql);

			SetCookie("u_pass",$u_pass,time()+$ein,'/');
			SetCookie("uid",$u_id,time()+$ein,'/');
			SetCookie("name",$data['user_name'],time()+$ein,'/');



		}
		header('Location: /page.php?code='.$u_id);
		exit;
	}else{
		header('Location: /error.php');
		exit;
	}
}else{
	header('Location: /error.php');
	exit;
}


?>


