			<? if($logged==1 && $_COOKIE['uid']==$code){
			?><div id="plate">
			<div id="wtext">Загрузить ещё изображение:<HR size=1 color="#EBEBEB"></div>
			<iframe onload='get_m("fotos","inside/fotos.php?code=<? echo $code; ?>");' frameborder="no" scrolling="no" width="400" height="40" src="http://2vita.ru/inside/postload.php"></iframe>
			</div>	
			<?}?>
