<?php require_once(VIEW_PATH.'header.inc.php'); ?>
	
	<table class="table">
		<thead style="color: white">
			<tr style="background-color: #70A225">
				<th>Autor</th>
				<th>Contenido</th>
				<th>Fecha</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<?php foreach($posts as $post): ?>
		<tbody>	
			<tr>				
				<td> <h5><a href="read.php?id=<?php echo $post->id;?>"> <?php echo $post->title;?> </a></h5> </td>
				<td> <?php echo $post->content;?> </td>
				<td> <?php echo $post->created;?> </td>
				<td>
					<button value="<?php echo $post->id;?>" type="button" class="btn btn-info edita" data-toggle="modal" data-target="#editarBlog">Editar</button>
					<button type="button" value="<?php echo $post->id;?>" class="btn btn-danger" data-toggle="modal" data-target="#eliminarBlog">Eliminar</button>
				</td>
			</tr>				
		</tbody>		
		<?php endforeach; ?>
	</table>

	<!--Editar blog modal-->
	<div id="editarBlog" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!--Contenido-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">x</button>
					<h4 class="modal-title t1">Editar blog</h4>
				</div>
				<div class="modal-body">



					<form method="GET" action="<?php 
						echo sanitize_output($_SERVER['REQUEST_URI']);?>" onsubmit="return validar(this)">

						<div class="container">
							<div class="form-group">						
								<label for="titulo">Título</label>									
								<input id="title" name="title" type="text" size="75" value="<?php echo sanitize_output($title); ?>" class="form-control" autofocus/>
							</div>
							<div class="form-group">
								<label for="content"o>Content</label><br />
								<div class="input-grup">
							  		<textarea class="form-control" id="content" name="content"><?php echo sanitize_output($content);?></textarea>
								</div>
							</div>
							<input type="submit" class="btn btn-primary" value="Guardar"></p>
						</div>
					</form>



				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<div id="eliminarBlog" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">x</button>
				</div>
				<div class="modal-body">
					<p>¿Estás seguro que deseas eliminar el blog "<?php echo $post->title;?>"</p>
					<button class="btn btn-danger" type="button" onclick=location.href="delete.php?id=this.value";>Eliminar
					</button>
					<button class="btn" type="button" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

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

		$(".edita").click(function()
		{
			var idPost = $(this).val();

			//alert(idPost);
			$(".t1").html(idPost);
		})
	</script>
<?php require_once(VIEW_PATH.'footer.inc.php'); ?>