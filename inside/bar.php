<li><a href="/">Главная</a></li><li><a href="/ous.php">О сайте</a></li><?
		if (isset($_COOKIE['u_pass']) && isset($_COOKIE['uid']) && isset($_COOKIE['name'])){
			$logged=1;
			?><li><a href='page.php?code=<?echo $_COOKIE['uid'];?>'><?echo $_COOKIE['name'];?></a></li><li><a href="usless/logout.php">Выйти</a></li><?
		}else{
			$logged=0;
			?><li><a id="login" href="http://api.vk.com/oauth/authorize?client_id=2346457&scope=9246&response_type=code&redirect_uri=http://2vita.ru/usless/new.php">Зарегистрироваться или войти</a></li><?
		}


/*
			<li><a href="">Главная</a></li>
			<li><a href='page.php?code=<?echo $_COOKIE['uid'];?>'><?echo $_COOKIE['name'];?></a></li><li><a href="logout.php">Выйти</a></li>
			<li><a href="http://api.vk.com/oauth/authorize?client_id=2346457&scope=9246&response_type=code&redirect_uri=http://2vita.ru/new.php">Войти через ВКонтакте</a></li>

onclick="window.open('http://vkontakte.ru/share.php?url=http://2vita.ru/&description=Заходите,+регистрируйтесь,+выигрывайте IPad 2...');"



<li><a href="/">Главная</a></li><li><a href="/ous.php">О сайте</a></li><?
		if (isset($_COOKIE['u_pass']) && isset($_COOKIE['uid']) && isset($_COOKIE['name'])){
			$logged=1;
			?><li><a href='page.php?code=<?echo $_COOKIE['uid'];?>'><?echo $_COOKIE['name'];?></a></li><li><a href="usless/logout.php">Выйти</a></li><?
		}else{
			$logged=0;
			?><li><a id="login" href="http://api.vk.com/oauth/authorize?client_id=2346457&scope=9246&response_type=code&redirect_uri=http://2vita.ru/usless/new.php">Войти через ВКонтакте</a></li><?
		}




*/



		?>


