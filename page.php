<?

/*
$host = "localhost";
$base="zato_n";
$user = "zato_us";
$password = "7spxcgQp";

$id = '2346457';

$sex = array(1 => "Женский", 2 => "Мужской");
*/
include "usless/info.php";

$empty="&nbsp;&nbsp;&nbsp;&nbsp;Пока тут пусто...";



function inf($text) {
	if($text==""){$text="Скрыт";}
	echo $text;
}


if (strlen($_GET['code'])>0 && mysql_connect($host, $user, $password) && mysql_select_db($base)){

mysql_query("SET NAMES 'utf8'");

$code = $_GET['code'];
$c=(int)file_get_contents ("usless/c.txt");
$code_id=$code . $c;
$q = mysql_query("SELECT `u_id`, `name`, `sex`,`bdate`, `city`, `photo`, `pass`, `at`, `ab` FROM `zato_n`.`us` WHERE u_id=" . $code);
	if(mysql_num_rows($q)>0){
		for ($c=0; $c<mysql_num_rows($q); $c++)
		{
			$f = mysql_fetch_row($q);

		}

		$resp = file_get_contents('http://api.vkontakte.ru/method/likes.getList?type=sitepage&count=0&owner_id='.$id.'&item_id='.$code_id);
		//echo $resp;
		$data = json_decode($resp,true);
		//echo $data['response']['count'];
		$q = mysql_query("UPDATE `zato_n`.`us` SET rat = '".$data['response']['count']."' WHERE u_id=" . $code . ";");






	}else{
		header('Location: error.php');
		exit;
	}


}else{
	header('Location: error.php');
	exit;
}

$site_name=$f[1];

?>

<?include "inside/up.php";?>


	<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?47"></script>
	<script type="text/javascript">
		VK.init({apiId: 2346457, onlyWidgets: true});
		var log=<? echo($logged==1 && $_COOKIE['uid']==$code); ?>0;
	</script>
		<?
		include "inside/about.php";
		?>
	<table class="" border="0">
	<tr>
		<td class="subbody" width="1%">
		<div id="plate"><img id="ava" vspace="10" hspace="10" src="<?echo $f[5];?>" ><div id="ava_st"></div></div>
		
		<div id="plate"><div id="name"><?echo $f[1];?><HR size=1 color="#EBEBEB"></div></div>

		<div id="plate">
			<div id="wtext">Проголосовать:<HR size=1 color="#EBEBEB"></div>
			<!-- Put this div tag to the place, where the Like block will be
			<div id="vk_like"></div>
			<!-- <script type="text/javascript">

			VK.Widgets.Like("vk_like", {type: "button", height: 24},<? echo $code;?>);
			</script> -->
			<? include "inside/vote.php" ?>
		</div>

		<div id="plate">
			<div id="inf">
				Город: <?inf($f[4]);?><br><HR size=1 color="#EBEBEB">
				День рождения: <?inf($f[3]);?><br><HR size=1 color="#EBEBEB">
				Пол: <?inf($sex[$f[2]]);?><br>

			</div>
		</div>




		</td>
		
		<td class="subbody">
			<div id="plate">
			<div id="wtext">О себе:<HR size=1 color="#EBEBEB"></div>
				<?
				//$ab=iconv("windows-1251","utf-8", $f[8]);
				$ab=$f[8];
				if($logged==1 && $_COOKIE['uid']==$code){
				$ab=str_replace("<br />","",$ab);
				?>

				<form action="usless/add.php" method="post">

					<input name="id" type="hidden" value="<? echo $code;?>">
					<textarea name="text" id="text" rows=20><? echo $ab;?></textarea><!-- readonly -->
				    	<p><input type="submit" value="Отправить"></p>
				</form>
				<? }else{ 
				?><?
				if($ab==""){$ab=$empty;}
				echo $ab;
				?><br><?

				} ?>

			</div>

			<? include "inside/addload.php" ?>

			<div id="plate">
				<div id="wtext">Изображения участника:<HR size=1 color="#EBEBEB"></div>
				<div id="fotos"></div>
			</div>
			<script type="text/javascript">
				get_m("fotos","inside/fotos.php?code=<? echo $code; ?>");
			</script>

			<div id="plate">
				<div id="wtext">Комментарии:<HR size=1 color="#EBEBEB"></div>
				<!-- Put this div tag to the place, where the Comments block will be -->
				<div id="vk_comments"></div>
				<script type="text/javascript">
				VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"},<? echo $code;?>);
				</script>
			</div>
		</td>

	</tr>
	</table>


<?include "inside/down.php";?>
