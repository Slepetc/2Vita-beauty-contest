<?
/*
$host = "localhost";
$base="zato_n";
$user = "zato_us";
$password = "7spxcgQp";

$id = '2346457';
$sex = array( 0 => "", 1 => "Женский", 2 => "Мужской");
*/
include "usless/info.php";

function inf($text) {
	if($text==""){$text="Скрыт";}
	echo $text;
}


if (mysql_connect($host, $user, $password) && mysql_select_db($base)){

mysql_query("SET NAMES 'utf8'");

	$q = mysql_query("SELECT `u_id`, `name`,`photo`, `sex`,`bdate`, `city`, `ab` FROM `zato_n`.`us` WHERE sex=1 ORDER BY `rat` DESC LIMIT 1 ");
	$f = mysql_fetch_row($q);

	$q = mysql_query("SELECT `u_id`, `name`,`photo` FROM `zato_n`.`us` WHERE sex=1 ORDER BY `rat` DESC LIMIT 99 OFFSET 1");
	//$f = mysql_fetch_row($q);

}else{
	header('Location: error.php');
	exit;
}
?>






		<?include "inside/up.php";?>
		<?
		include "inside/about.php";
		?>

		<div id="plate">
		<table border="0"><tr><td colspan="3">
				<div id="wtext">Лидер дня:<HR size=1 color="#EBEBEB"></div>

			</td></tr><tr><td>
			<?
			echo '<a href="page.php?code='.$f[0].'"><img align-text="left" id="rd" src="'.$f[2].'">';
			?>
			</td><td><div id="os">
				<div id="name"><?echo $f[1];?><HR size=1 color="#EBEBEB"></div>
				<div id="inf">
					Город: <?inf($f[5]);?><br><HR size=1 color="#EBEBEB">
					День рождения: <?inf($f[4]);?><br><HR size=1 color="#EBEBEB">
					Пол: <?inf($sex[$f[3]]);?><br>

				</div>

			</div></td><td>

			<!--βeta<? include "vote.php" ?>-->

			</td></tr>
			
		</table>
		</div>

		<!--</td>
	</tr>
	<tr>
		<td class="subbody">-->
		<div id="pole"><div id="container" class="clearfix"><?
			for ($c=0; $c<mysql_num_rows($q); $c++)
			{
				$f = mysql_fetch_row($q);
				//$a=getimagesize($f[2]);
				//echo "<br>" . $f[2] . "<br><HR COLOR='#444444'>";
				echo '<a href="page.php?code='.$f[0].'"><img class="item mini" id="rd" src="'.$f[2].'" width="70px" height="auto"></a>';


			}
			
			
		    ?>
		</div></div>
  <script src="js/jquery.isotope.min.js"></script>
  <script>
    $(function(){

      var $container = $('#container');
    
      $container.imagesLoaded( function(){
        $container.isotope({
          itemSelector : '.item',
        });
      });
    
    
    });
  </script>

<?include "inside/down.php";?>

