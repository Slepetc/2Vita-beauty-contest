
function get_m(body,adr) {
	document.getElementById(body).innerHTML="<img src='img/lo.gif'class='load'>";
	$.get(adr, {a: "a"},function(data){
	document.getElementById(body).innerHTML=data;
	});
}


function bigfoto(adr) {
	document.getElementById('ava_st').innerHTML="<img src='img/lo.gif'class='load'>"
	document.getElementById('ava').src=adr;
	document.getElementById('ava').onload=ava_r(adr);
}

function ava_r(adr) {
	document.getElementById('ava_st').innerHTML='';
	if (log==10){
		document.getElementById('ava_st').innerHTML='<iframe frameborder="no" scrolling="no" width="200" height="30" src="http://2vita.ru/inside/change.php?file='+adr+'"></iframe>';
	}
}
