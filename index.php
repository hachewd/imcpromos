<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Pragma" content="no-cache">
<title>imc Promos</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="main.css" rel="stylesheet">
<script>
$(document).ready(function(){
	$('#promociones a').each(function(i,e){
		$(e).click(function(){
			$(this).next().toggle('slow');
		});
	});
	$('#promocion_destacada a').each(function(i,e){
		$(e).click(function(){
			$(this).next().toggle('slow');
		});
	});
});
</script>
</head>

<body>
<?php
$database = "imcpromo";
$host = "68.178.216.41 ";
$user = "imcpromo";
$password = "Imcpromo@0710";

//arrays para guardar las promociones
$ar_promos = array();
$ar_destacados = array();


//consultas a la bd para obtener los destacados y las promos normales

$connection = mysql_connect($host,$user,$password);

mysql_select_db($database, $connection);

$query_destacados = "SELECT * FROM promociones where es_destacado = 1 and visible = 1 and date(fecha_inicio) <= NOW() and date(fecha_final) >= NOW()";

$query_promociones = "SELECT * FROM promociones where es_destacado = 0 and visible = 1 and date(fecha_inicio) <= NOW() and date(fecha_final) >= NOW()";

$destacados = mysql_query($query_destacados);

$promociones = mysql_query($query_promociones);

//paso los destacados a un array
while ($dest = mysql_fetch_array($destacados)) {
	array_push($ar_destacados, $dest);
}

//paso también las promos normales a un array
while ($prom = mysql_fetch_array($promociones)) {
	array_push($ar_promos, $prom);
}

//cierro la conexión
mysql_close($connection);

//saco un item random entre todos los destacados
$indice_destacado = array_rand($ar_destacados, 1);
$destacado_seleccionado = $ar_destacados[$indice_destacado];

//random al array de promociones
shuffle($ar_promos);


?>
<div id="container">
<?php
if ($destacado_seleccionado) {
?>
  <section id="promocion_destacada">
    <article><a href="#"><span class="imagen"><img src="images/<?=$destacado_seleccionado['imagen']?>" alt="<?=$destacado_seleccionado['titular']?>" height="80"></span> <span class="detalle">
      <h2><?=$destacado_seleccionado['titular']?></h2>
      <p><?=$destacado_seleccionado['destacado']?></p>
      </span> </a>
      <div class="share"> <strong>Compartir en redes sociales:</strong> <a href="#"><img src="images/facebook.png" width="40" alt="Facebook"></a> <a href="#"><img src="images/twitter.jpg" width="40" alt="Twitter"></a> </div>
    </article>
  </section>
  <?php
}
  ?>
  <section id="promociones">
  <?php
  foreach($ar_promos as $promo) {
  ?>
    <article><a href="#"><span class="imagen"><img src="images/<?=$promo['imagen']?>" alt="<?=$promo['titular']?>" height="80"></span> <span class="detalle">
      <h2><?=$promo['titular']?></h2>
      <p><?=$promo['destacado']?></p>
      </span> </a>
      <div class="share"> <strong>Compartir en redes sociales:</strong> <a href="#"><img src="images/facebook.png" width="40" alt="Facebook"></a> <a href="#"><img src="images/twitter.jpg" width="40" alt="Twitter"></a> </div>
    </article>
    <?php
 	 }
	?>
  </section>
  <footer><img src="images/logo_imc.png" alt="imc Promos"></footer>
</div>
</body>
</html>
