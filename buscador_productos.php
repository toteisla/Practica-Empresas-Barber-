<html>

<head>
<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  Anand Raman (anand_raman@poboxes.com) -->
<!-- Web Site:  http://www.angelfire.com/ar/diduknow -->



<!-- Begin
function SelObj(formname,selname,textname,str) {
this.formname = formname;
this.selname = selname;
this.textname = textname;
this.select_str = str || '';
this.selectArr = new Array();
this.initialize = initialize;
this.bldInitial = bldInitial;
this.bldUpdate = bldUpdate;
}

function initialize() {
if (this.select_str =='') {
for(var i=0;i<document.forms[this.formname][this.selname].options.length;i++) {
this.selectArr[i] = document.forms[this.formname][this.selname].options[i];
this.select_str += document.forms[this.formname][this.selname].options[i].value+":"+
document.forms[this.formname][this.selname].options[i].text+",";
   }
}
else {
var tempArr = this.select_str.split(',');
for(var i=0;i<tempArr.length;i++) {
var prop = tempArr[i].split(':');
this.selectArr[i] = new Option(prop[1],prop[0]);
   }
}
return;
}
function bldInitial() {
this.initialize();
for(var i=0;i<this.selectArr.length;i++)
document.forms[this.formname][this.selname].options[i] = this.selectArr[i];
document.forms[this.formname][this.selname].options.length = this.selectArr.length;
return;
}

function bldUpdate() {
var str = document.forms[this.formname][this.textname].value.replace('^\\s*','');
if(str == '') {this.bldInitial();return;}
this.initialize();
var j = 0;
pattern1 = new RegExp("^"+str,"i");
for(var i=0;i<this.selectArr.length;i++)
if(pattern1.test(this.selectArr[i].text)) 
document.forms[this.formname][this.selname].options[j++] = this.selectArr[i];
document.forms[this.formname][this.selname].options.length = j;
if(j==1){
document.forms[this.formname][this.selname].options[0].selected = true;
//document.forms[this.formname][this.textname].value = document.forms[this.formname][this.selname].options[0].text;
   }
}
function setUp() {
obj1 = new SelObj('menuform','itemlist','entry');
// menuform is the name of the form you use
// itemlist is the name of the select pulldown menu you use
// entry is the name of text box you use for typing in
obj1.bldInitial(); 
}
//  End -->
</script>

</head>

<BODY style="font-family: Verdana">
<BODY OnLoad="javascript:setUp()">

</b></p>

<center>
<form name="menuform" onSubmit="javascript:window.location = document.menuform.itemlist.options[document.menuform.itemlist.selectedIndex].value;return false;">
<br>
<input type="text" name="entry" size="30" onKeyUp="javascript:obj1.bldUpdate();">
<br>
<select name="itemlist" size=5>
	<?php
		include_once("./ini_base_datos.php");
	
		$cadena_consulta = "SELECT nombre,id from productos;";
		$consulta = mysql_query( $cadena_consulta,$db_resource );
		if(mysql_num_rows($consulta)>0)
		{
			while ($fila = mysql_fetch_array($consulta)) 
			{	
				echo "<option value=".$fila['id'].">".$fila['nombre']."</option>";
			}
		}
	?>
</select>
</form>
</center>
</body>

</html>
