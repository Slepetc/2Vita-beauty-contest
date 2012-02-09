<?


function strip($text) {
$srting = array("drop","query","select","from","delete","insert","update","\p");
$result = trim(htmlspecialchars(strip_tags(str_replace($srting,"",$text)))); 
return $result;
}

/*
$host = "localhost";
$base="zato_n";
$user = "zato_us";
$password = "7spxcgQp";
*/
include "info.php";

if (strlen($_POST['id'])>0 && strlen($_POST['text'])>0 && mysql_connect($host, $user, $password) && mysql_select_db($base)){

mysql_query("SET NAMES 'utf8'");

$code = strip($_POST['id']);
$text = strip($_POST['text']);
$text=nl2br($text);
//$text=iconv("utf-8", "windows-1251", $text);

//echo $code;
//echo $text;

$q = mysql_query("SELECT `pass` FROM `zato_n`.`us` WHERE u_id=" . $code);
	if(mysql_num_rows($q)>0){
		$f = mysql_fetch_row($q);

		//echo $f[0].'<br>';
		//echo $code.'<br>';
		//echo $_COOKIE['u_pass'].'<br>';
		//echo $_COOKIE['uid'].'<br>';

		if ($_COOKIE['u_pass']==$f[0] && $_COOKIE['uid']==$code){
			$q = mysql_query("UPDATE `zato_n`.`us` SET ab = '".$text."' WHERE u_id=" . $code . ";");
			//echo $q;
			$H=getenv("HTTP_REFERER");
			header('Location: '.$H);
			exit;
		}else{
			header('Location: /error.php');
			exit;
		}

	}else{
		header('Location: /error.php');
		exit;
	}



}else{
	header('Location: /error.php');
	exit;
}
?>
