<html>

<head>
<title>Selecci�n en lista desplegable por primeros caracteres</title>
<p align="center"><b>Selecci�n en lista desplegable por primeros caracteres
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

<font size="2">Por favor entra las primeras letras del elemento deseado:<br>
</font><br>
<input type="text" name="entry" size="30" onKeyUp="javascript:obj1.bldUpdate();">
<br>
<select name="itemlist" size=5>
<option value="page.html">ALL
<option value="page.html">ALL CATALOG
<option value="page.html">ALL CLUSTERS
<option value="page.html">ALL CLUSTERS HASH EXPRESSIONS
<option value="page.html">ALL COL COMMENTS
<option value="page.html">ALL COL PRIVS
<option value="page.html">ALL COL PRIVS MADE
<option value="page.html">ALL COL PRIVS SENT
<option value="page.html">ALL CONSTRAINTS
<option value="page.html">ALL CONS COLUMNS
<option value="page.html">ALL DB LINKS
<option value="page.html">ALL DEF AUDIT
<option value="page.html">ALL DEPENDENCIES
<option value="page.html">ALL ERRORS
<option value="page.html">ALL HISTOGRAMS
<option value="page.html">ALL INDEXES
<option value="page.html">ALL IND COLUMNS
<option value="page.html">ALL JOBS
<option value="page.html">ALL OBJECTS
<option value="page.html">ALL REFRESH
<option value="page.html">ALL REFRESH NOW
<option value="page.html">ALL USERS
<option value="page.html">ALL VIEWS
<option value="page.html">AUDIT ACTIONS
<option value="page.html">BOOKS
<option value="page.html">CLIENTS
<option value="page.html">CLOSED
<option value="page.html">COLUMN PRIVILEGES
<option value="page.html">DBA ANALYZE COST
<option value="page.html">DBA FROM CLIENTS
<option value="page.html">DBA FROM NEIGHBORS
<option value="page.html">DBA PROFILES
<option value="page.html">DBA REFRESH ALL
<option value="page.html">DBA REFRESH PAGE
<option value="page.html">DBA REPORT
<option value="page.html">DBA RGROUP
<option value="page.html">DBA ROLE
<option value="page.html">DBA ROLE SUMMARY
<option value="page.html">DBA ROLLBACK SEGS
</select>
</form>
</center>
</body>

</html>
