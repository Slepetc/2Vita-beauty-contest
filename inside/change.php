<?

include "../usless/info.php";

function strip($text) {
$srting = array("drop","query","select","from","delete","insert","update","\p");
$result = trim(htmlspecialchars(strip_tags(str_replace($srting,"",$text)))); 
return $result;
}


if($_GET['todo']=='ava' || $_GET['todo']=='del'){
	$code = strip($_COOKIE['uid']);
	if(mysql_connect($host, $user, $password) && mysql_select_db($base)){

		mysql_query("SET NAMES 'utf8'");
		$q = mysql_query("SELECT `pass` FROM `zato_n`.`us` WHERE u_id=" . $code);

		if(mysql_num_rows($q)>0){
			$f = mysql_fetch_row($q);
			if ($_COOKIE['u_pass']==$f[0]){

				$file = strip($_GET['file']);
				
				if ($_GET['todo']=='ava'){
					$sql="UPDATE `zato_n`.`us` SET photo='".$file."' WHERE u_id=".$code.";";
					mysql_query ($sql);
					echo "Аватар изменён...";

				}else{
					$sql="UPDATE `zato_n`.`foto` SET u_id=u_id+'_del' WHERE adr=".$file.";";
					mysql_query ($sql);
					echo "Изображение удалено...";
				}

			}
		}

	}

}else{
?>
<style type="text/css">
input{
	background-color: #f9f9f9;
	border: 1px solid #C0CAD5;
}
  </style>

			<form action=http://2vita.ru/inside/change.php method=GET enctype=multipart/form-data>
			<input type=hidden name=todo value="ava">
			<input type=hidden name=file value="<? echo $_GET['file'];?>">
			<input type=submit value='Поставить на аватар'></form>

<?
}
?>
