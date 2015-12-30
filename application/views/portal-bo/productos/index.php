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

					if(count($subcategoria->productos)>0) //si tiene productos...
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
						?></tbody> </table>
						<?php
					}
				}
			}
		}
	}
	?>
			<h2>Añadir nuevo producto para la tienda</h2>
			<div class="container form-crear-prod"> 
						<p>
							Nombre:
							<input placeholder="Nombre..." class="form-control" type="text" />
						</p>
						<p>
							Especificaciones:
							<input placeholder="Especificaciones..." class="form-control" type="text" />
						</p>
						<p>
							Descripción;
							<input placeholder="Descripción..." class="form-control" type="text"  />
						</p>
						<p>
							Precio:
							<input placeholder="Precio..." class="form-control" type="text" />
						</p>

						<p>
							Categoría:
							<select id="nuevocat">
								<?php
								if(!is_null($lista_subcategorias)) 
								{ //si no es nula
									echo "<option value='-1'>Selecciona una categoría...</option>";
									foreach ($lista_subcategorias as $categoria) 
									{
										echo "<option value=" . $categoria->id . ">" . $categoria->nombre . "</option>";
									}
								}
								else
								{
									echo "<option value=-1>No existe ninguna categoría...</option>";
								}
								?>
							</select>

							<span style="display:none">
								Subcategoría:
								<select id="nuevosubcat">
									<?php
									echo "<option value='-1'>Selecciona una subcategoría...</option>";
										foreach ($lista_subcategorias as $categoria)
										{
											foreach ($categoria->subcategorias as $subcategoria)
											{
												echo "<option style='display:none' value=" . $subcategoria->id . " data-catid=" . $subcategoria->categoriaId . ">" . $subcategoria->nombre . "</option>";
											}
										}
									?>
								</select>
							</span>


						</p>






						<p>
							<a href='#' title="Crear producto" class="btn btn-primary btn-success btn-crear">
								<span class="glyphicon glyphicon-plus"></span>
							</a>
						</p>
			</div> 





	<!--<pre>
	<?php 
		//print_r($lista_subcategorias);
	?>
	</pre>-->


</main>






<script>

$('select#nuevocat').change(function() {
      // var seleccionao = $("select option:selected").attr('value');
      var catselecc = $(this).val();
      if(catselecc!=-1) { //cargar las subcategorias
      	//lo que habra que hacer es, que borre las subcategorias que no sean de esa cat

      	//analiza cada opcion
      	$("#nuevosubcat option").each(function()
		{
			$(this).hide();
			var catid = $(this).attr("data-catid");
			if(catid==catselecc || catid==undefined)
				$(this).show();
		});

      	$("#nuevosubcat").parent().show();
      }
      else
      {
      	$("#nuevosubcat").parent().hide();
      }


});

$(".btn-crear").click(function() {
	var form = $(".form-crear-prod");
	var inputs = form.find(":input");

	var valores_post = [];
	for(var i = 0; i< inputs.length;i++) {
		var input = inputs[i];
		if(input.nodeName=="INPUT") //input
		{
			if(input.value=="")
			{
				//console.log("ERROR INPUT VACIO");
				return;
			}

		}
		else if(input.nodeName=="SELECT") //select
		{
			if(input.value=="-1")
			{
				//console.log("ERROR SELECT VACIO");
				return;
			}
		}

		valores_post[i] = input.value;
	}

	console.log(valores_post);
	$.ajax({
	    url : '<?php echo $tiendaid; ?>/crearprod',
	    type : 'POST',
	    data : {datos:valores_post},
	    success:function (data) {
	    	location.reload();
	    }
	});
});

</script>
