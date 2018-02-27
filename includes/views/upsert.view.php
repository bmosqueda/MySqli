<?php require_once(VIEW_PATH.'header.inc.php'); ?>

	<form method="POST" action="<?php 
		echo sanitize_output($_SERVER['REQUEST_URI']);?>" onsubmit="return validar(this)">

		<div class="container">
			<div class="form-group">						
				<label for="titulo">Título</label>									
				<input id="title" name="title" type="text" size="75" value="<?php echo sanitize_output($title); ?>" class="form-control" autofocus/>
			</div>
			<div class="form-group">
				<label for="content">Content</label><br />
				<div class="input-group">
					  	<textarea class="form-control" id="content" name="content"><?php echo sanitize_output($content);?></textarea>
				</div>
			</div>
			<input type="submit" class="btn btn-primary" value="Guardar"></p>
		</div>
	</form>

	<script type="text/javascript">
		function validar(form)
		{
			var mensaje = "Debes escribir algo en los campos: \n";
			var vacio = false;

			if( form.elements["title"].value == "" )
			{
				mensaje += "- Título\n";
				vacio = true;
			}

			if( form.elements["content"].value == "")
			{
				mensaje += "- Contenido";
				vacio = true;
			}

			if( vacio )
				alert(mensaje);

			return !vacio;
		}
	</script>

<?php require_once(VIEW_PATH.'footer.inc.php'); ?>