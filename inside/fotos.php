<?
include "../usless/info.php";

function strip($text) {
$srting = array("drop","query","select","from","delete","insert","update","\p");
$result = trim(htmlspecialchars(strip_tags(str_replace($srting,"",$text)))); 
return $result;
}

$error="Что-то пошло не так...";
$no="&nbsp;&nbsp;&nbsp;&nbsp;Пользователь пока ничего не загрузил(";

if(strlen($_GET['code'])>0 && mysql_connect($host, $user, $password) && mysql_select_db($base)){

mysql_query("SET NAMES 'utf8'");
$code=strip($_GET['code']);
$q = mysql_query("SELECT `adr`, `mini` FROM `zato_n`.`foto` WHERE u_id=".$code);
if(mysql_num_rows($q)>0){
			for ($c=0; $c<mysql_num_rows($q); $c++)
			{
				$f = mysql_fetch_row($q);
				echo '<a href="#"><img class="item mini" id="rd" src="'.$f[1].'" onclick="bigfoto(\''.$f[0].'\');" /></a>';


			}

}else{echo $no;}


}else{echo $error;}



























?>
