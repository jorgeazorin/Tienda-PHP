<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
	<h1><?php echo $titulo; ?> <?php echo $tiendaid; ?></h1>





<?php
	if(!is_null($lista)) {
	?>
	<table class="table table-hover"> 
		<thead> 
			<tr> 
				<th>ID</th> 
				<th>Nombre</th>
				<th>Especificaciones</th>
				<th>Descripción</th> 
				<th>Precio</th>
				<th>Acciones</th> 
			</tr> 
		</thead>
		<tbody>
			<?php 
			foreach ($lista as $producto) {
			?>
				<tr> 
					<th scope="row">
						<span class="idprod"><?php echo $producto->id; ?></span>
					</th> 
					<td>
						<label><?php echo $producto->nombre; ?></label>
						<input placeholder="Nombre..." class="form-control" type="text" style="display:none" />
					</td>  
					<td>
						<label><?php echo $producto->especificaciones; ?></label>
						<input placeholder="Especificaciones..." class="form-control" type="text" style="display:none" />
					</td>
					<td>
						<label><?php echo $producto->descripcion; ?></label>
						<input placeholder="Descripción..." class="form-control" type="text" style="display:none" />
					</td> 
					<td>
						<label><?php echo $producto->precio; ?></label>
						<input placeholder="Precio..." class="form-control" type="text" style="display:none" />
					</td>
					<td>
						<div class="btn-group">
							<a href='#' title="Guardar cambios" style="display:none" class="btn btn-success btn-guardar"><span class="glyphicon glyphicon-check"></span></a>
							<a href='#' title="Editar producto" class="btn btn-warning btn-editar" data-estado="mostrando"><span class="glyphicon glyphicon-edit"></span></a>
							<a href='#' title="Borrar producto" class="btn btn-danger btn-borrar"><span class="glyphicon glyphicon-trash"></span></a>
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
						<input placeholder="Especificaciones..." class="form-control" type="text" />
					</td>
					<td>
						<input placeholder="Descripción..." class="form-control" type="text"  />
					</td> 
					<td>
						<input placeholder="Precio..." class="form-control" type="text" />
					</td>
					<td>
						<a id="btn-crear" href='#' title="Crear producto" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-plus"></span></a>
					</td>
				</tr> 
		</tbody> 
	</table>



	<?php
	}
	else
	{
		?><p>Parece que no tienes ningún producto en esta tienda...</p>
		<table class="table table-hover"> 
		<thead> 
			<tr> 
				<th>ID</th> 
				<th>Nombre</th>
				<th>Especificaciones</th>
				<th>Descripción</th> 
				<th>Precio</th>
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
						<input placeholder="Especificaciones..." class="form-control" type="text" />
					</td>
					<td>
						<input placeholder="Descripción..." class="form-control" type="text"  />
					</td> 
					<td>
						<input placeholder="Precio..." class="form-control" type="text" />
					</td>
					<td>
						<a id="btn-crear" href='#' title="Crear producto" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-plus"></span></a>
					</td>
				</tr> 
	<?php
	}
	?>























</main>






<script>


</script>
