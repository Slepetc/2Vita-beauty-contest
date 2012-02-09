<?include "usless/info.php";?>
<?$site_name="О сайте";?>
<?include "inside/up.php";?>


<!----------------------------------------------------------------->

	<script type="text/javascript">
	  VK.init({apiId: 2346457, onlyWidgets: true});
	</script>

<div id="plate"><div id="wtext">О нас:</div><br>

<b>Что это за сайт?</b><HR size=1 color="#EBEBEB">
&nbsp;&nbsp;&nbsp;&nbsp;Даный сайт- это своего рода конкурс популярности, где любой может получить <b>IPad второго поколения...</b>. Просто регистрируйтесь и если за вас будут голосовать больше, чем за остальных то вы непременно получите обещанный приз.<br><br><br>

<b>Как зарегистрироваться?</b><HR size=1 color="#EBEBEB">
&nbsp;&nbsp;&nbsp;&nbsp;Для этого нужно нажать на кнопку <a href="http://api.vk.com/oauth/authorize?client_id=2346457&scope=9246&response_type=code&redirect_uri=http://2vita.ru/usless/new.php"><img align="center" src="img/login.PNG"></a> вверху страницы и дать доступ приложению к некоторой информации с вашей страницы. Всё остальное система сделает сама и через несколько секунд вы попадёте на страницу вашего врофиля на нашем сайте.<br><br><br>

<b>Какой приз?</b><HR size=1 color="#EBEBEB">
&nbsp;&nbsp;&nbsp;&nbsp;Призом является не нуждающийся в представлении <a color="#000" href="http://www.apple.com/ru/ipad/"><b>IPad второго поколения</b></a><br><br><br>

<b>Что делать чтобы выиграть?</b><HR size=1 color="#EBEBEB">
&nbsp;&nbsp;&nbsp;&nbsp;Вам достаточно лишь зарегистрироваться и вы примите участие в конкурсе, но чтобы увеличить свои шансы на победу вы можете выкладывать ссылку на свой профиль или просить знакомых проголосовать за вас.<br><br><br>

<b>Когда закончится конкурс?</b><HR size=1 color="#EBEBEB">
&nbsp;&nbsp;&nbsp;&nbsp;<b>1 июня, ровно в 00:00</b> конкурс закончится и победитель получит <b>IPad</b><br><br><br>

<b>Счётчик обнулился. Почему?</b><HR size=1 color="#EBEBEB">
&nbsp;&nbsp;&nbsp;&nbsp;<b>Ежедневно после полуночи счётчик обнуляется</b>, но колличество голосов не уходит в небытиё, а прибавляется к внутреннему рейтингу участника. Сделано это для того, чтобы голосовать можно было каждый день, а не один раз.<br><br><br>

<b>За что участник может быть удалён?</b><HR size=1 color="#EBEBEB">
&nbsp;&nbsp;&nbsp;&nbsp;<i>В том случае, если нам стает известно, что пользователь рассылает спам со ссылкой на свой профиль или накручивает счётчик иным не предусмотренным способом, он будет удалён.</i><br><br><br>

</div>

			<div id="plate"><div id="vk_comments"></div>
				<script type="text/javascript">
					VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"},'ous');
				</script>
			</div>

			<script type="text/javascript">
				get_m("plate","usless/c.txt");
			</script>


		<div id="plate">
		<div id="wtext">Загрузить изображения:<HR size=1 color="#EBEBEB"></div>
		<form action=usless/upload.php?code=52569069 method=post enctype=multipart/form-data>
		<input type=file name=uploadfile>
		<input type=submit value=Загрузить></form>
		</div>


<!----------------------------------------------------------------->

<?include "inside/down.php";?>
