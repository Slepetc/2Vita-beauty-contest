<style type="text/css">
input{
	background-color: #f9f9f9;
	border: 1px solid #C0CAD5;
}
  </style>

			<form action=http://2vita.ru/usless/upload.php?code=<? echo $_COOKIE['uid']; ?> method=post enctype=multipart/form-data>
			<input type=file name=uploadfile>
			<input type=submit value=Загрузить></form>
