<?php require_once(VIEW_PATH.'header.inc.php'); ?>
	
	<h1 class="display-2"><?php echo $post->title; ?></h1>
	
	<p style="font-size: 18px">
		<?php echo $post->content; ?><br />
		<?php echo $post->created; ?><br />	
	</p>
	<button type="button" class="btn btn-success" onclick=location.href="update.php?id=<?php echo $post->id;?>" >Actualizar</button>
	<button type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>

	<script type="text/javascript">
		function eliminar()
		{
			if( confirm("¿Estás seguro que quieres eliminar este blog?") )
			{
				location.href="delete.php?id=<?php echo $post->id; ?>";
			}
		}
	</script>
<?php require_once(VIEW_PATH.'footer.inc.php'); ?>