<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
	<h1><?php echo $titulo; ?> <?php echo $tiendaid; ?></h1>

	<?php

	if(!is_null($lista_subcategorias)) 
	{ //si no es nula
		foreach ($lista_subcategorias as $categoria) 
		{
		?>
			<h3>Categoría <?php echo $categoria->nombre; ?></h3>
			<?php 
			if(count($categoria->subcategorias)==0) {
				echo "<h4>No hay subcategorías...</h4>";
			}
			else
			{
				foreach ($categoria->subcategorias as $subcategoria)
				{
					echo "<h4>Subcategoría " . $subcategoria->nombre . " ---- " . count($subcategoria->productos) . " productos</h4>";
					if(count($subcategoria->productos)==0)
					{
						?>



						<table class="table table-hover"> 
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
									<a href='#' title="Crear producto" class="btn btn-primary btn-success btn-crear"><span class="glyphicon glyphicon-plus"></span></a>
								</td>
							</tr> 
						</table>




					<?php	
					}
					else //no esta vacio, a crear la tabla
					{
						?>
							<table class="table table-hover"> 
								<thead style="background-color:grey"> 
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
						foreach ($subcategoria->productos as $producto)
						{ //aqui iremos añadiendo filas de productos
							//echo "Producto " . $producto->nombre ;
							?>

							<!--AQUI IRA LA TABLA HTML-->
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
									<a href='#' title="Crear producto" class="btn btn-primary btn-success btn-crear"><span class="glyphicon glyphicon-plus"></span></a>
								</td>
							</tr> 
							</tbody> 
							</table>


						<?php
					}
				}
			}
		}
	}
	?>





	<!--<pre>
	<?php 
		//print_r($lista_subcategorias);
	?>
	</pre>-->


</main>






<script>


</script>
