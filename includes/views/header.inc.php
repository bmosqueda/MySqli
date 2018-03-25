<!DOCTYPE HTML>
<html lang="es">
<head>
	<title>Universidad de Colima</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<script src="<?php echo JQUERY_PATH.DS.'jquery.js' ?>"></script>
  	<link href="<?php echo BOOTSTRAP_PATH.DS.'css'.DS.'bootstrap.min.css' ?>" rel="stylesheet" media="screen"></style>
  	<script src="<?php echo BOOTSTRAP_PATH.DS.'js'.DS.'bootstrap.min.js'?>"></script>
  	<script type="text/javascript"></script>
  	<!-- <style type="text/css">
  		.cabecera
  		{
  			width: 100%; /* hacemos que la cabecera ocupe el ancho completo de la página */
			left: 0; /* Posicionamos la cabecera al lado izquierdo */
			top: 136; /* Posicionamos la cabecera pegada arriba */
			position: fixed; /* Hacemos que la cabecera tenga una posición fija */
			height: 140px;
			padding-left: 15px;
  		}
  	</style> -->
  	<script src="axios.js"></script>
</head>
	
<body>

	<div class="cabecera" style="background-color: #70A225">
		<img src="<?php echo IMAGES_PATH.'logoUdC.png'?>" alt="Logo Universidad de Colima" 
			href="<?php echo VIEW_PATH.'index.wiew.php'?>" style=" width: 616px; height: 135px;">
		<div class="cabecera" style="background-color: white; height: 80px; width: 100%">
			<button type="button" class="btn btn-primary newPost" data-toggle="modal" 
					data-target="#addBlog">Nuevo</button>
		</div>
	</div>
		<br>
	<div class="container-fluid" style="z-index: 1100;">
		
