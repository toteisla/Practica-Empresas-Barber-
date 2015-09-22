<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
<title>Pinturas Barber&aacute;</title>
<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="rokbox/mootools-release-1.11.js"></script>
<script type="text/javascript" src="rokbox/rokbox.js"></script>
<link href="rokbox/themes/dark/rokbox-style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="rokbox/themes/dark/rokbox-config.js"></script>
<script type="text/javascript">
			
			var strListaCod = "0123456789";
          
			function filtroCodigo ( evento ) 
			{
                var keyNum = ( window.event ? evento.keyCode : evento.which );
                var keyChar;

                if ( keyNum == 13 ) 
                {
                    var boton = document.getElementById( "btnSend" );
                    var campo  = document.getElementById( "strFirstName" );
                    campo.blur();
                    boton.click();
                }
                if  ( keyNum == 9 || keyNum == 8 ) 
                    return true;
                else 
                {
                    keyChar = String.fromCharCode( keyNum );
                    return strListaCod.indexOf( keyChar ) != -1;
                }
            }
   
        function AJAX() {
            if (window.XMLHttpRequest)
            {
                    //El explorador implementa la interfaz de forma nativa
                    return new XMLHttpRequest();
            } 
            else if (window.ActiveXObject)
            {
                    //El explorador permite crear objetos ActiveX
                    try {
                            return new ActiveXObject("MSXML2.XMLHTTP");
                    } catch (e) {
                            try {
                                    return new ActiveXObject("Microsoft.XMLHTTP");
                            } catch (e) {}
                    }
            }
            alert("No ha sido posible crear una instancia de XMLHttpRequest");
            return null;
        }
        
        function lista_prod() 
        {
			document.getElementById("lista_fichas").innerHTML = "";
			document.getElementById("lista_fichas_tec").innerHTML = "";
			document.getElementById("nombre_producto").innerHTML = "";
			document.getElementById("textArticulo").value = "";
			document.getElementById("textArticulo").style.backgroundColor = "#BFBCBC";
			document.getElementById("textNombre").value = "";
			document.getElementById("textNombre").style.backgroundColor = "#BFBCBC";
            var ajax = AJAX();
            var proveedor = document.getElementById("selectProveedor").value;
            var familia = document.getElementById("selectFamilia").value;
            //alert(proveedor);
            //alert(familia);
			ajax.open("GET", "./carga_productos.php?proveedor="+proveedor+"&familia="+familia, false);
			ajax.send();
			if(ajax.readyState == 4)
			{
				if(ajax.status == 200)
				{
					document.getElementById("lista_prod").innerHTML = "<div class='testi_box_client' style='font-size:13px;'>"+ajax.responseText+"</div>";
				}
				else
				{
					document.getElementById("lista_prod").innerHTML = "Ha habido un error. Disculpe las molestias";
				}
			}
        }
        
        function cargaPrFichas() 
        {
			document.getElementById("lista_fichas").innerHTML = "";
			document.getElementById("lista_fichas_tec").innerHTML = "";
			document.getElementById("nombre_producto").innerHTML = "";
			document.getElementById("textArticulo").value = "";
			document.getElementById("textArticulo").style.backgroundColor = "#BFBCBC";
			document.getElementById("textNombre").value = "";
			document.getElementById("textNombre").style.backgroundColor = "#BFBCBC";
            var ajax = AJAX();
            var proveedor = document.getElementById("selectProveedor").value;
            var familia = document.getElementById("selectFamilia").value;
			ajax.open("GET", "./carga_producto_ficha.php", false);
			ajax.send();
			if(ajax.readyState == 4)
			{
				if(ajax.status == 200)
				{
					document.getElementById("lista_prod").innerHTML = "<div class='testi_box_client' style='font-size:13px;'>"+ajax.responseText+"</div>";
				}
				else
				{
					document.getElementById("lista_prod").innerHTML = "Ha habido un error. Disculpe las molestias";
				}
			}
        }
        
		function lista_fichas(e)
		{
            var ajax = AJAX();
            var codigo = e;
            ajax.open("GET", "./carga_fichas.php?codigo="+ codigo, false);
            ajax.send();
            if(ajax.readyState == 4)
            {
				if(ajax.status == 200)
				{
					document.getElementById("lista_fichas").innerHTML = ajax.responseText;
				}
				else
				{
					document.getElementById("lista_fichas").innerHTML = "Ha habido un error. Disculpe las molestias";
				}
            }
        }
        
        function lista_familia()
		{
			document.getElementById("textArticulo").value = "";
			document.getElementById("textArticulo").style.backgroundColor = "#BFBCBC";
            var ajax = AJAX();
            var proveedor = document.getElementById("selectProveedor").value;
            var familia = document.getElementById("selectFamilia").value;
            ajax.open("GET", "./carga_familias.php?familia="+familia+"&proveedor="+proveedor, false);
            ajax.send();
            if(ajax.readyState == 4)
            {
				if(ajax.status == 200)
				{
					document.getElementById("familias").innerHTML = ajax.responseText;
				}
				else
				{
					document.getElementById("lista_prod").innerHTML = "Ha habido un error. Disculpe las molestias";
				}
            }
        }
        
        function lista_fichas_tec(e)
        {
            var ajax = AJAX();
            var codigo = e;
            ajax.open("GET", "./carga_fichas_tec.php?codigo="+ codigo, false);
            ajax.send();
            if(ajax.readyState == 4)
            {
				if(ajax.status == 200)
				{
					document.getElementById("lista_fichas_tec").innerHTML = ajax.responseText;
				}
				else
				{
					document.getElementById("lista_fichas_tec").innerHTML = "Ha habido un error. Disculpe las molestias";
				}
            }
        }
        
        function buscarArticuloCodigo()
        {
			var ajax = AJAX();
			document.getElementById("selectProveedor").selectedIndex="0";
			document.getElementById("selectFamilia").selectedIndex="0";
			document.getElementById("textNombre").value="";
			document.getElementById("lista_fichas").innerHTML = "";
			document.getElementById("lista_fichas_tec").innerHTML = "";
			document.getElementById("nombre_producto").innerHTML = "";
			var codigo = document.getElementById("textArticulo").value;
			if(codigo!="" && codigo!="Escribe aquí tu código")
			{
				ajax.open("GET", "./carga_codigo.php?codigo="+ codigo, false);
				ajax.send();
				if(ajax.readyState == 4)
				{
					if(ajax.status == 200)
					{	
						if(ajax.responseText != 1)
							document.getElementById("lista_prod").innerHTML = "<div class='testi_box_client' style='font-size:13px;'>"+ajax.responseText+"</div>";
						else
							alert("No existe un producto con ese código.");
					}
					else
					{
						document.getElementById("lista_prod").innerHTML = "Ha habido un error. Disculpe las molestias";
					}
				}
			}
			else
				alert("Escribe un codigo de artículo.");
		}
		
        function buscarArticuloNombre()
        {
			var ajax = AJAX();
			document.getElementById("selectProveedor").selectedIndex="0";
			document.getElementById("selectFamilia").selectedIndex="0";
			document.getElementById("lista_fichas").innerHTML = "";
			document.getElementById("lista_fichas_tec").innerHTML = "";
			document.getElementById("nombre_producto").innerHTML = "";
			document.getElementById("textArticulo").value="";
			var nombre = document.getElementById("textNombre").value;
			if(nombre!="" && nombre!="Escribe aquí el nombre")
			{
				ajax.open("GET", "./carga_nombre.php?nombre="+ nombre, false);
				ajax.send();
				if(ajax.readyState == 4)
				{
					if(ajax.status == 200)
					{	
						if(ajax.responseText != 1)
							document.getElementById("lista_prod").innerHTML = "<div class='testi_box_client' style='font-size:13px;'>"+ajax.responseText+"</div>";
						else
							alert("No existe un producto con ese nombre.");
					}
					else
					{
						document.getElementById("lista_prod").innerHTML = "Ha habido un error. Disculpe las molestias";
					}
				}
			}
			else
				alert("Escribe un nombre de artículo.");
		}
		
		function borrarText(elemento)
		{
			elemento.value = "";
			elemento.style.backgroundColor="#FFFFFF";
			elemento.style.color="#000000";
		}
        
        function cargarInicio()
        {
			var elemento = document.getElementById("textArticulo");
			elemento.value = "Escribe aquí tu código";
			elemento.style.backgroundColor="#BFBCBC";
			elemento.style.color="#666161";
			document.getElementById("selectProveedor").selectedIndex="0";
			document.getElementById("selectFamilia").selectedIndex="0";
		}
		
		var elementoAntiguo = "";
		var contenidoAntiguo = "";
		function ponFlecha(elemento,nombreProducto)
		{
			document.getElementById("nombre_producto").innerHTML = "<a style='font-size:10px;'><font color='#ee9803'>"+nombreProducto+"</font></a>";
			if(elementoAntiguo != elemento && elementoAntiguo != "")
			{
				elementoAntiguo.innerHTML = contenidoAntiguo;
				elementoAntiguo = elemento;
				contenidoAntiguo = elemento.innerHTML;
				elemento.innerHTML += "     <img src='./images/flecha_izquierda.png'>";
			}
			else if(elementoAntiguo == "")
			{
				elementoAntiguo = elemento;
				contenidoAntiguo = elemento.innerHTML;
				elemento.innerHTML += "     <img src='./images/flecha_izquierda.png'>";
			}
		}
        		
        </script>
</head>
<body onload="cargarInicio();">
<!-- Main Body Starts Here -->
<div id="main_body">
  <!-- Top Part Starts Here -->
  <div id="top_part">
    <!-- Top Part Image Starts Here -->
    <div id="top_part_image">
      <!-- Logo Part Starts Here -->
        <div id="main_logo"> <a href="#"><img src="images/main_logo.png"  width='200px' height='100px' alt=""  /></a> </div>
      <!-- Logo Part Ends Here -->
    </div>
    <!-- Top Part Image Ends Here -->
    <!-- Main Menu Starts Here -->
    <div id="main_menu_bg">
      <!-- Main Menu Body Starts Here -->
      <div id="main_menu_body">
        <!-- Menu Links Starts Here -->
	<div class="menu_links"> <a href="index.html" class="menu_links">Inicio</a><span class="menu_border">&nbsp;</span> <a href="about.html" class="menu_links">Quienes somos</a><span class="menu_border">&nbsp;</span> <a href="productos.php" class="menu_links">Productos</a><span class="menu_border">&nbsp;</span> <a href="contact.html" class="menu_links">Contactanos</a> </div>        <!-- Menu Links Ends Here -->      </div>
      <!-- Main Menu Body Ends Here -->
    </div>
    <!-- Main Menu Ends Here -->
  </div>
  <!-- Top Part Ends Here -->
  <!-- Content Body Starts Here -->
  <div id="inner_content_body">
    <!-- Left Content Body Starts Here -->
    <div class="left_content_body">
      <div class="page_title"> Busqueda por Proveedor 
		<select id="selectProveedor" name="itemlist" size=1 onchange="lista_familia(); lista_prod();">
			<option value=0>Selecciona un proveedor</option>
			<?php
				include_once("./ini_base_datos.php");
			
				$cadena_consulta = "SELECT DISTINCT P.nombre,P.id from proveedores P, productos Pr WHERE P.id=Pr.proveedor ORDER BY P.nombre;";
				$consulta = mysql_query( $cadena_consulta,$db_resource );
				if(mysql_num_rows($consulta)>0)
				{
					while ($fila = mysql_fetch_array($consulta)) 
					{	
						echo utf8_encode("<option value=".$fila['id'].">".$fila['nombre']."</option>");
					}
				}
				mysql_free_result($consulta);
			?>
		</select>  
      </div>
      <div class="page_title" id="familias"> Busqueda por Familia 
		<select id="selectFamilia" name="itemlist" size=1 onchange="lista_prod();">
			<option value='vacio'>Selecciona una familia</option>
			<?php			
				$cadena_consulta_2 = "SELECT nombre,id from familia;";
				$consulta_2 = mysql_query( $cadena_consulta_2,$db_resource );
				if(mysql_num_rows($consulta_2)>0)
				{
					while ($fila_2 = mysql_fetch_array($consulta_2)) 
					{	
						echo utf8_encode("<option value=".$fila_2['id'].">".$fila_2['nombre']."</option>");
					}
				
				}
				mysql_free_result($consulta_2);
				mysql_close($db_resource);
			?>
		</select>  
      </div>
       <div class="page_title"> Busqueda por Código Art&iacute;culo 
		  <input style="color:#666161;background-color:#BFBCBC" type="text" id="textArticulo" value="Escribe aquí tu código" onclick="borrarText(this);"/>
		  <input type="button" value="Buscar" id="btnBuscarArti" onclick="buscarArticuloCodigo();"/>
      </div>
      <div class="page_title"> Busqueda por Nombre Aproximado 
		  <input style="color:#666161;background-color:#BFBCBC" type="text" id="textNombre" value="Escribe aquí el nombre" onclick="borrarText(this);"/>
		  <input type="button" value="Buscar" id="btnBuscarAprox" onclick="buscarArticuloNombre();"/>
      </div>
      <div>
		  <div class="page_title" style='cursor:pointer' onclick="cargaPrFichas();" id="btnFichas">Mostrar Productos con Ficha</div>
      </div>
		<div id='lista_prod' style='height:300px; overflow:auto;'>
		</div>

    </div>
    <!-- Left Content Body Ends Here -->
    <!-- Right Content Body Starts Here -->
    <div class="right_content_body">
		<p class="page_sub_title"> Producto </p>
		<div class="testi_box_client" id='nombre_producto'>
		</div><br />
		<p class="page_sub_title"> Fichas de seguridad </p>
		<div class="testi_box_client" id='lista_fichas'>
		</div><br />
		<p class="page_sub_title"> Fichas tecnicas </p>
		<div class="testi_box_client" id='lista_fichas_tec'>
		</div>
		<p class="page_sub_title" style='padding-top:15px;'> Otros </p>
		<div class="testi_box_client" id='lista_otras_fichas'>
		</div>
    <!-- Right Content Body Ends here -->
    </div>
    <!-- Clear -->
    <div class="clear"> </div>
    <!-- Clear -->
  </div>
  <!-- Content Body Ends Here -->
  <!--Footer Starts Here -->
<div id="footer">
    <div class="left">
      <div class="footer_links" >
      <a href="index.html">Inicio</a> &nbsp;| &nbsp;<a href="about.html">Quienes somos</a> &nbsp;| &nbsp;<a href="productos.php">Productos</a> &nbsp;| &nbsp;<a href="contact.html">Contactanos</a>
    </div>
    </div>
    <div class="right" style="padding-right:30px;"> Copyright &copy; 2012 <a style="color:#ffffff;" href="www.grupomontes.com" target="_blank">AFT grupo montes</a>. All rights reserved | Design by <a style="color:#ffffff;" href="http://www.grupomontes.com/" target="_blank">AFT Design</a></div>
  </div>
  <!-- Footer Ends Here -->
</div>
<!-- Main Body Ends Here -->
</body>
</html>
