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
					<td id="<?php echo 'title'.$post->id;?>"><h5><a href="read.php?id=
								<?php echo $post->id;?>"><?php echo $post->title;?></a></h5></td>
					<td id="<?php echo 'content'.$post->id;?>"><?php echo $post->content;?></td>
					<td id="<?php echo 'created'.$post->id;?>"><?php echo $post->created;?></td>
					<td>
						<button value="<?php echo $post->id;?>" type="button" class="btn btn-info edit" 
								data-toggle="modal" data-target="#editBlog">Editar</button>
						<button value="<?php echo $post->id;?>" type="button" class="btn btn-danger delete" 
								data-toggle="modal" data-target="#deleteBlog">Eliminar</button>
					</td>
				</tr>				
			</tbody>		
		<?php endforeach; ?>
	</table>

	<!--Begin modal windows-->

	<!--Edit blog modal-->
	<div id="editBlog" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!--Contenido-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title t1">Editar blog</h4>
					<button type="button" class="close" data-dismiss="modal">x</button>	
				</div>
				<div class="modal-body">

					<form method="POST" action="create.php"
							onsubmit="return validate(this)">
						<div class="container">
							<div class="form-group">						
								<label for="title">Título</label>									
								<input id="title" name="title" type="text" size="75" class="form-control" autofocus/>
							</div>
							<div class="form-group">
								<label for="content">Content</label><br />
								<div class="input-grup">
							  		<textarea class="form-control" id="content" name="content"></textarea>
								</div>
								<input type="hidden" id="hiddenID" name="hiddenID">
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

	<!--Add blog modal-->
	<div id="addBlog" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!--Content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title t1">Agregar blog</h4>
					<button type="button" class="close" data-dismiss="modal">x</button>	
				</div>
				<div class="modal-body">

					<form method="POST" action="create.php" onsubmit="validate()">
						<div class="container">
							<div class="form-group">						
								<label for="title">Título</label>									
								<input id="title" name="title" type="text" size="75" 
										class="form-control" autofocus/>
							</div>
							<div class="form-group">
								<label for="content">Content</label><br />
								<div class="input-grup">
							  		<textarea class="form-control" id="content" name="content"></textarea>
								</div>
								<input type="hidden" id="hiddenID" name="hiddenID">
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

	<div id="deleteBlog" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">x</button>
				</div>
				<div class="modal-body">
					<p id="lblEliminar"></p>
					<button id="buttonDelete" class="btn btn-danger" type="button" 
							onclick="eliminar(this)">Eliminar
					</button>
					<button class="btn" type="button" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		//it receive a form and it validate if all the fields are complete
		function validate(form)
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


		$(".newPost").click(function()
		{
			$("#title").val("");
			$("#content").text("");
			$("#hiddenID").val("");
		})
		
		$(".edit").click(function()
		{
			var idPost = $(this).val();
			$("#title").val( $("#title" + idPost).text());
			$("#content").text( $("#content" + idPost).text() );
			$("#hiddenID").val(idPost);
		})

		$(".delete").click(function()
		{
			var postName =$("#title" + $(this).val()).text();
			$("#lblEliminar").text("¿Estás seguro que deseas eliminar el post '" + postName + "'?");
			$("#buttonDelete").val($(this).val());
		})

		function eliminar(button)
		{
			location.href="delete.php?id=" + button.value;
		}
	</script>
<?php require_once(VIEW_PATH.'footer.inc.php'); ?>