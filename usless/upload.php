<?
include "info.php";

function strip($text) {
$srting = array("drop","query","select","from","delete","insert","update","\p");
$result = trim(htmlspecialchars(strip_tags(str_replace($srting,"",$text)))); 
return $result;
}


$max_filesize = 10524288;
$allowed_filetypes = array('image/jpg','image/png','image/jpeg','image/bmp');

$rn=mt_rand();
$uploaddir = '../uploads/'.$rn."_";
$uploaddir_mini = '../uploads/'."mini/".$rn."_";

$tegs='<style type="text/css">
input{
	background-color: #f9f9f9;
	border: 1px solid #C0CAD5;
}
  </style>';

$error=$tegs."Что-то пошло не так... <a href='http://2vita.ru/inside/postload.php'><input type='button' value='Назад' ></a>";
$ierror=$tegs."С изображением что-то не так... <a href='http://2vita.ru/inside/postload.php'><input type='button' value='Назад' ></a>";

$max_x=250;
$max_y=300;

$min_x=100;
$min_y=100;

$mini_x=70;

if(strlen($_GET['code'])>0 && mysql_connect($host, $user, $password) && mysql_select_db($base)){
	
	mysql_query("SET NAMES 'utf8'");
	$code=strip($_GET['code']);

	$q = mysql_query("SELECT `pass` FROM `zato_n`.`us` WHERE u_id=" . $code);

	if(mysql_num_rows($q)>0){
		$f = mysql_fetch_row($q);
		if ($_COOKIE['u_pass']==$f[0] && $_COOKIE['uid']==$code){


			// Каталог, в который мы будем принимать файл:
			$file=strip($_FILES['uploadfile']['tmp_name']);
			$uploadfile = $uploaddir.$code.'_'.$code.".png";
			$uploadfile_mini=$uploaddir_mini.$code.'_'.$code.".png";
			$img = getimagesize($file);

			// Копируем файл из каталога для временного хранения файлов:
			if (filesize($file)<$max_filesize && in_array($img['mime'],$allowed_filetypes)){






				if($min_x<$img['0'] && $min_y<$img['1']){

					include 'SimpleImage.php';
					$image = new SimpleImage();
					$image->load($file);

					if($image->getWidth()>$max_x){
						$image->resizeToWidth($max_x);
					}

					if($image->getHeight()>$max_y){
						$image->resizeToHeight($max_y);
					}



					$image->save($uploadfile,IMAGETYPE_PNG);
					$image->resizeToWidth($mini_x);
					$image->save($uploadfile_mini,IMAGETYPE_PNG);


					$sql="INSERT INTO `zato_n`.`foto` (`u_id`, `x`, `y`,`adr`,`mini`) VALUES ( '".$code."', '".$image->getWidth()."', '".$image->getHeight()."', '".$uploadfile."', '".$uploadfile_mini."'  );";
					$q=mysql_query($sql);
				
					$H=getenv("HTTP_REFERER");
					header('Location: '.$H);


				}else{echo $ierror;
				//header('Location: /error.php');
				}

			}else{echo $ierror;
			//header('Location: /error.php');
			}

		}else{echo $error;
		//header('Location: /error.php');
		}

	}else{echo $error;
	//header('Location: /error.php');
	}

}else{echo $error;
//header('Location: /error.php');
}

?>


