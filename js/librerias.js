function borrarcampos(){
	document.getElementById("name").value='';
	document.getElementById("message").value='';
	document.getElementById("email").value='';
}
function maximaLongitud(texto,maxlong)
{
var tecla, int_value, out_value;

if (texto.value.length > maxlong)
{
/*con estas 3 sentencias se consigue que el texto se reduzca
al tamaño maximo permitido, sustituyendo lo que se haya
introducido, por los primeros caracteres hasta dicho limite*/
in_value = texto.value;
out_value = in_value.substring(0,maxlong);
texto.value = out_value;
alert("La longitud máxima es de " + maxlong + " caractéres");
return false;
}
return true;
}
function valida(campo,evento){
	var idcampo = campo.id;
	var keyNum = ( window.event ? evento.keyCode : evento.which );
	var charval="";
	switch(campo.id)
       {
		case "name":
		charval = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ";
		charval += "abcdefghijklmnñopqrstuvwxyzáéíóúü";
		charval += "àèìòùâêîôûäëöüç";
		charval += "ÀÈÙÒÙÂÊÎÔÛÄËÏÖÇ";
		break;
		case "email":
		charval = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ";
		charval += "abcdefghijklmnñopqrstuvwxyzáéíóúü";
		charval += "àèìòùâêîôûäëöüç";
		charval += "ÀÈÙÒÙÂÊÎÔÛÄËÏÖÇ";
		charval += "0123456789";
		charval += "'-_@.";
		break;
	}
	keyChar = String.fromCharCode( keyNum );
	if(campo.id=='name')
	if(keyNum==32)
	return true;
	if(charval.indexOf( keyChar )!=-1 || keyNum==8 || keyNum==0){
	return true;
	}else{
	return false;	
	}
}      
function compruebaEmail(){
	var name = document.getElementById("name").value;
	var message = document.getElementById("message").value;
	var email = document.getElementById("email").value;
	ajax=objetoAjax();
	ajax.open("GET","comprobacionemail.php?email="+email);
	ajax.onreadystatechange=function() {
	if (ajax.readyState==4) {
	respuesta = ajax.responseText;
		if(respuesta==0){
		alert('EL EMAIL ES INCORRECTO\nINTRODUZCA UNO VALIDO POR FAVOR');
		}else{
		//enviar();
		}
		if(name.length<=3)
		alert('LA LONGITUD DEL NOMBRE DEBE SER SUPERIOR A 3');
		if(message.length==0)
		alert('ESCRIBA UN MENSAJE');
		if(respuesta!=0 && name.length>3 && message.length>0){
		enviarcorreo(name,email,message);	
		}
		
	}
 }
  ajax.send(null)
}
function enviarcorreo(name,email,message){
	alert('llega al envio');
	var divresp = document.getElementById("enviodemail");
	ajax=objetoAjax();
	ajax.open("GET","mail.php?email="+email+"&name="+name+"&message="+message,false);
	alert('bien');
	ajax.onreadystatechange=function() {
	if (ajax.readyState==4) {
		respuesta = ajax.responseText;
		alert(respuesta);
			if(respuesta=="1"){
			divresp.innerHTML="<a style='color:white;'>Su mensaje se envio correctamente</a>";
			}else{
			divresp.innerHTML="<a style='color:white;'>No se ha podido enviar su mensaje.Pruebe mas tarde</a>";
			}
		}
	}
		 ajax.send(null)
}
function objetoAjax(){
 var xmlhttp=false;
  try{
   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  }catch(e){
   try {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }catch(E){
    xmlhttp = false;
   }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
   xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}
