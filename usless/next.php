<?
include "info.php";
$file="c.txt";
if (mysql_connect($host, $user, $password) && mysql_select_db($base) && $_GET['pass']=='canabis'){

	$count=(int)file_get_contents ($file);
	$count++;
	$countf = fopen ($file, "r+");
	flock($countf,2);
	fputs ( $countf, $count);
	fclose ($countf);	

	$q = mysql_query("UPDATE `zato_n`.`us` SET rat = '0';");


}else{
	echo "Error";
}

/*
include "info.php";

if (mysql_connect($host, $user, $password) && mysql_select_db($base) && $_GET['pass']=='canabis'){

	$count=(int)file_get_contents ("c.txt");
	$count++;
	$countf = fopen ("c.txt", "r+");
	flock($countf,2);
	fputs ( $countf, $count);
	fclose ($countf);	


	$text="Приз+от+сайта+2Vita.ru";

	$q = mysql_query("SELECT `u_id`, `at`, `rat` FROM `zato_n`.`us` ORDER BY `rat` DESC LIMIT 1");
	$f = mysql_fetch_row($q);
	//echo $f[1];

	$resp = file_get_contents('https://oauth.vkontakte.ru/access_token?client_id='.$id.'&client_secret='.$secret.'&grant_type=client_credentials');
	//echo $resp;
	$data = json_decode($resp,true);
	$app_at=$data['access_token'];

	if($f[2]>0){
		$q = mysql_query("UPDATE `zato_n`.`us` SET rat = '0';");
		//$resp = file_get_contents('https://api.vkontakte.ru/method/secure.addRating?timestamp='.time().'&random='.rand().'&uid=8783338&rate=1&access_token='.$f[1].'&client_secret='.$secret.'&message='.htmlspecialchars($text));
		$resp = file_get_contents('https://api.vkontakte.ru/method/secure.addRating?timestamp='.time().'&random='.rand().'&uid='.$f[0].'&rate=1&access_token='.$app_at.'&client_secret='.$secret.'&message='.htmlspecialchars($text));
		echo $resp;
		//$data = json_decode($resp,true);
	}else{
		echo "NO winner";

	}


}else{
echo "Error";
}
*/
?>

