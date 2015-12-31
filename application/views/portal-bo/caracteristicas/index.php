<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
	<h1><?php echo $titulo; ?></h1>

	

	<?php
	if(!is_null($lista)) {
	?>
	<table class="table table-hover"> 
		<thead style="background-color:grey"> 
			<tr> 
				<th>ID</th> 
				<th>Nombre</th>
				<th>Stock</th>
				<th>Acciones</th> 
			</tr> 
		</thead>
		<tbody>
			<?php 
			foreach ($lista as $caracteristica) {
			?>
				<tr> 
					<th scope="row">
						<span class="idcaracteristica"><?php echo $caracteristica->id; ?></span>
					</th> 
					<td>
						<label><?php echo $caracteristica->nombre; ?></label>
						<input placeholder="Nombre..." class="form-control" type="text" style="display:none" />
					</td>  
					<td>
						<label><?php echo $caracteristica->stock; ?></label>
						<input placeholder="Stock..." class="form-control" type="text" style="display:none" />
					</td>

					<td>
						<div class="btn-group">
							<a href='#' title="Guardar cambios" style="display:none" class="btn btn-success btn-guardar"><span class="glyphicon glyphicon-check"></span></a>
							<a href='#' title="Editar característica" class="btn btn-warning btn-editar" data-estado="mostrando"><span class="glyphicon glyphicon-edit"></span></a>
							<a href='#' title="Borrar característica" class="btn btn-danger btn-borrar"><span class="glyphicon glyphicon-trash"></span></a>
						</div>
					</td>
				</tr> 
			<?php
			}
			?>
			<tr> 
					<th scope="row">
						
					</th> 
					<td>
						<input placeholder="Nombre..." class="form-control" type="text" />
					</td>  
					<td>
						<input placeholder="Stock..." class="form-control" type="text" />
					</td>
					<td>
						<a id="btn-crear" href='#' title="Crear característica" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-plus"></span></a>
					</td>
				</tr> 
		</tbody> 
	</table>



	<?php
	}
	else
	{
		?><p>Parece que no tienes ninguna característica para este producto...</p>
		<table class="table table-hover"> 
		<thead style="background-color:grey"> 
			<tr> 
				<th>ID</th> 
				<th>Nombre</th>
				<th>Stock</th>
				<th>Acciones</th> 
			</tr> 
		</thead>
		<tr> 
					<th scope="row">
						
					</th> 
					<td>
						<input placeholder="Nombre..." class="form-control" type="text" />
					</td>  
					<td>
						<input placeholder="Stock..." class="form-control" type="text" />
					</td>
					<td>
						<a id="btn-crear" href='#' title="Crear característica" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-plus"></span></a>
					</td>
				</tr> 
	<?php
	}
	?>


</main>

<script>
$(document).ready(function () {
	//crear subcategoria
	$("#btn-crear").click(function(){
		var padre = $(this).parent().parent();
		var inputs = padre.find(":input");

		var nombre = inputs[0].value;
		var stock = inputs[1].value;

		if(nombre && stock)
		{
			console.log(nombre);
			console.log(stock);
			var datos = {};
			datos.nombre = nombre;
			datos.stock = stock;
			$.ajax({
	        url : '<?php echo $idprod; ?>/crearcaracteristica',
	        type : 'POST',
	        data: datos,
	        success:function() {
	        	location.reload();
	        }
			});

		}
	});


});
</script>