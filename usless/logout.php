<?
$H=getenv("HTTP_REFERER");
SetCookie("u_pass","",time() - 3600,"/");
SetCookie("uid","",time() - 3600,"/");
SetCookie("name","",time() - 3600,"/");
header('Location: '.$H);
exit;

?>
