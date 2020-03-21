<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Directorio Web</title>
<script src="js/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){
	$("li div").hide();
	$(".link").click(function(){
		$(this).find("div").show();
	});
});
</script>
</head>

<body>
<ul>
  <li class='link'>Sistemas
  	<div><?php include_once "sistemas.html";?></div>
  </li>  
  <li class='link'>Idiomas
  	<div><?php include_once "idiomas.html";?></div>
  </li>
  <li class='link'>Trabajo
	  <div><?php include_once "trabajo.html";?></div>
  </li>
  <li class='link'>Economia
	  <div><?php include_once "economia.html";?></div>
  </li>
  <li class='link'>Musica
	  <div><?php include_once "musica.html";?></div>
  </li>  
  <li class='link'>Filosofia
	  <div><?php include_once "filosofia.html";?></div>
  </li>    
  <li class='link'>Religion
	  <div><?php include_once "religion.html";?></div>
  </li>  
  <li class='link'>Proyectos
	  <div><?php include_once "proyectos.html";?></div>
  </li>        
  <li class='link'>Instituto SISE
	  <div><?php include_once "sise.html";?></div>
  </li> 
  <li class='link'>Telecomunicaciones
	  <div><?php include_once "telecomunicaciones.html";?></div>
  </li> 
  <li class='link'>Electronica
	  <div><?php include_once "electronica.html";?></div>
  </li>     
  <li class='link'>Tesis
	  <div><?php include_once "tesis.html";?></div>
  </li>  
  <li class='link'>Interesante
	  <div><?php include_once "interesante.html";?></div>
  </li>      
</ul>
</body>
</html>