<?php require_once(VIEW_PATH.'header.inc.php'); ?>
	
	<table class="table">
		<thead style="color: white" id="thead">
			<tr style="background-color: #70A225">
				<th>Autor</th>
				<th>Contenido</th>
				<th>Fecha</th>
				<th>Opciones</th>
			</tr>
		</thead>
			<tbody id="tbody"></tbody>
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

					<form id="formEdit">
						<div class="container">
							<div class="form-group">						
								<label for="title">Título</label>									
								<input id="titleEdit" name="title" type="text" size="75" class="form-control" autofocus/>
							</div>
							<div class="form-group">
								<label for="content">Content</label><br />
								<div class="input-grup">
							  		<textarea class="form-control" id="contentEdit" name="content"></textarea>
								</div>
								<input type="hidden" id="hiddenIDEdit" name="hiddenID">
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

					<form id="formAdd">
						<div class="container">
							<div class="form-group">						
								<label for="titleAdd">Título</label>									
								<input id="titleAdd" name="title" type="text" size="75" 
										class="form-control" autofocus/>
							</div>
							<div class="form-group">
								<label for="contentAdd">Content</label><br />
								<div class="input-grup">
							  		<textarea class="form-control" id="contentAdd" name="content"></textarea>
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

	<!--Delete blog-->
	<div id="deleteBlog" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">x</button>
				</div>
				<div class="modal-body">
					<p id="lblEliminar"></p>
					<button id="deleteButton" class="btn btn-danger" type="button" 
							onclick="deleteClick(this)">Eliminar
					</button>
					<button class="btn" type="button" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!--View blog-->
	<div id="viewBlog" class="modal fade" data-backdrop="static" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 id="viewTitle"></h1>
					<button type="button" class="close" data-dismiss="modal">x</button>
				</div>
				<div class="modal-body">
					<h1 style="font-size: 24px" id="viewContent"></h1>
					<br>
					<h1 style="font-size: 16px" id="viewCreated"></h1>
					<br>
					<button class="btn" type="button" data-dismiss="modal">Aceptar</button>
				</div>
			</div>
		</div>
	</div>

	<!--End modal windows-->

	<script type="text/javascript">
		const tbody = document.getElementById('tbody')
		const properties =['title', 'content', 'created']

		const titleEdit = document.getElementById('titleEdit')
		const contentEdit = document.getElementById('contentEdit')
		const hiddenIDEdit = document.getElementById('hiddenIDEdit')
		const formEdit = document.getElementById('formEdit')

		const titlAdd = document.getElementById('titleAdd')
		const contentAdd = document.getElementById('contentAdd')
		const formAdd = document.getElementById('formAdd')

		const deleteButton = document.getElementById('deleteButton')

		$(".newPost").click(function()
		{
			$("#titleAdd").val("");
			$("#contentAdd").val("");
		})
		
		//Like the buttons in the table are generated dinamically this method must be declared of this way
		$("tbody").on('click', 'button.edit', function()
		{
			var idPost = $(this).val();
			let title = document.getElementById("tdtitle" + idPost);
			titleEdit.value = title.textContent;

			let content = document.getElementById("tdcontent" + idPost);
			contentEdit.value = content.textContent;

			hiddenIDEdit.value = idPost;
		})

		//Like the buttons in the table are generated dinamically this method must be declared of this way
		$("tbody").on('click', 'button.delete', function()
		{
			let title = document.getElementById('tdtitle' + $(this).val());
			console.log(title);
			$("#lblEliminar").text("¿Estás seguro que deseas eliminar el post '" + title.textContent + "'?");
			$("#deleteButton").val($(this).val());
		})

		$(".view").click(function()
		{
			var idPost = this.id;
			$("#viewTitle").text($('#title' + idPost).text());
			$("#viewContent").text($('#content' + idPost).text());
			$("#viewCreated").text($('#created' + idPost).text());
		})

		function eliminar(button)
		{
			location.href="delete.php?id=" + button.value;
		}

		function addRow(data)
		{
			let tr = document.createElement('tr');
			tr.id = "tr" + data['id'];
			properties.forEach(property => {
				let td = document.createElement("td")
				td.textContent = data[property]
				td.id = 'td' + property + data['id']
				tr.appendChild(td)			
			})

			let td = document.createElement("td");

			let editButton = document.createElement("button")
			editButton.value = data['id']
			editButton.classList.add("btn")
			editButton.classList.add("btn-info")
			editButton.classList.add("edit")
			editButton.type = "button"
			editButton.className = "btn btn-info edit"
			editButton.setAttribute('data-toggle', "modal")
			editButton.setAttribute('data-target', "#editBlog")
			editButton.textContent = "Editar"

			td.appendChild(editButton)			

			let deleteButton = document.createElement("button")
			deleteButton.value = data['id']
			deleteButton.classList.add("btn")
			deleteButton.classList.add("btn-danger")
			deleteButton.classList.add("delete")
			deleteButton.type = "button"
			deleteButton.className = "btn btn-danger delete"
			deleteButton.setAttribute('data-toggle', "modal")
			deleteButton.setAttribute('data-target', "#deleteBlog")
			deleteButton.textContent = "Eliminar"

			td.appendChild(deleteButton)

			tr.appendChild(td)

			tbody.appendChild(tr)
			// console.log(JSON.stringify(data))
		}

		function editRow(data, idRow)
		{
			let tr = document.getElementById(idRow);
			console.log(tr);
			let tds = tr.childNodes;
			console.log(tds);

			for (var i = 0; i < 2; i++) 
			{
				tds[i].textContent = data[properties[i]]
				console.log(tds[i].textContent);
			}

			let buttons = tds[3].childNodes;
			buttons[0].value = data['id'];
			buttons[1].value = data['id'];

			//this line do close the modal but don´t retunrn the control to the page
			// document.getElementById("editBlog").style.display = 'none';
			$('#editBlog').modal('hide');
		}

		function deleteRow(id)
		{
			document.getElementById('tr' + id['id']).remove();
		}

		//Axios http methods
		window.onload = () => {
	      window.axios.get('postAPI.php')
	        .then(({data}) => {
        	// console.log(JSON.stringify(data))
	          data.forEach(row => {
	            addRow(row)
	          })
	        })
	    }


	    formEdit.addEventListener('submit', function(ev) {
		  ev.preventDefault()

		  window.axios.put('postAPI.php?id=' + hiddenIDEdit.value, { title: titleEdit.value, content: contentEdit.value })
		    .then(({data})=> {
		      editRow(data, 'tr' + data['id'])
		      console.log(JSON.stringify(data))
		    })
		})

		formAdd.addEventListener('submit', function(ev){
			ev.preventDefault()

			window.axios.post('postAPI.php', { title: titleAdd.value, content: contentAdd.value })
				.then(({data})=> {
					console.log(JSON.stringify(data))
					addRow(data)
					$('#addBlog').modal('hide');
				})
		})

		function deleteClick(button){
			window.axios.delete('postAPI.php?id=' + button.value)
				.then(({data})=> {
					console.log(JSON.stringify(data))
					deleteRow(data)
					$('#deleteBlog').modal('hide');
				})
		}

	</script>
<?php require_once(VIEW_PATH.'footer.inc.php'); ?>