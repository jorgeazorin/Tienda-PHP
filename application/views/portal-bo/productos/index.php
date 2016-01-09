<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
	<a href="<?php echo base_url(); ?>admin" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Atrás</a>
	<h1><?php echo $titulo; ?> <?php echo $nombretienda; ?></h1>

	<ol class="breadcrumb">
  		<li><a href="/iw/admin">Principal</a></li>
  		<li class="active"><?php echo $nombretienda; ?></li>
	</ol>

	<?php

	if(!is_null($lista)) 
	{ //si no es nula
		?>
			<table class="table table-hover"> 
				<thead style="background-color:grey"> 
					<tr> 
						<th>ID</th> 
						<th>Nombre</th>
						<th>Especificaciones</th>
						<th>Descripción</th> 
						<th>Precio</th>
						<th>Subcategoría</th>
						<th>Acciones</th> 
					</tr> 
				</thead>
				<tbody>
		<?php
		foreach ($lista as $producto)
		{

				//echo "Producto " . $producto->nombre ;
				?>

				<!--AQUI IRA LA TABLA HTML-->
				<tr id="fila-editable"> 
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
						<input placeholder="Precio..." class="form-control" type="number" min="0" step="any" style="display:none" />
					</td>
					<td>

							<?php
								foreach ($lista_subcategorias as $categoria)
								{
									if(!empty($categoria->subcategorias))
									{
										foreach ($categoria->subcategorias as $subcategoria)
										{
											if($subcategoria->id== $producto->subcategoriaId)
											{
												echo "<label>" . $subcategoria->nombre . "</label>";
												break;
											}
										}
									}
								}
							?>

						<select style="display:none" class="form-control" id="subcatedit">
						<?php
							foreach ($lista_subcategorias as $categoriaselect)
							{
								foreach ($categoriaselect->subcategorias as $subcategoriaselect)
								{
									echo "<option value=" . $subcategoriaselect->id .  ">" . $subcategoriaselect->nombre . "</option>";
								}
							}
						?>
						</select>
						<span class="error" style="color:red;display:none">Campos obligatorios</span>
					</td>

					<td>
						<div class="btn-group">
							<a href='#' title="Guardar cambios" style="display:none" class="btn btn-success btn-guardar"><span class="glyphicon glyphicon-check"></span></a>
							<a href='<?php echo $tiendaid; ?>/productos/<?php echo $producto->id; ?>' title="Administrar sus características" class="btn btn-info btn-caract"><span class="glyphicon glyphicon-eye-open"></span></a>
							<a href='#' title="Editar producto" class="btn btn-warning btn-editar" data-estado="mostrando"><span class="glyphicon glyphicon-edit"></span></a>
							<a href='#' title="Borrar producto" class="btn btn-danger btn-borrar"><span class="glyphicon glyphicon-trash"></span></a>
						</div>
					</td>
				</tr>
			<?php
		}
		?>
	</tbody> </table>
	<?php	
	}
	?>
			<div id="crear-prod">
				<h2>Añadir nuevo producto para la tienda <span class="error" style="color:red;display:none">Campos obligatorios</span></h2>
				<div class="container form-crear-prod">
					<div class="row">
						<div class="col-sm-2">
							<input placeholder="Nombre..." class="form-control" type="text" />
						</div>
						<div class="col-sm-2">
							<input placeholder="Especificaciones..." class="form-control" type="text" />
						</div>
						<div class="col-sm-2">
							<input placeholder="Descripción..." class="form-control" type="text"  />
						</div>
						<div class="col-sm-2">
							<input placeholder="Precio..." class="form-control" type="number" min="0" step="any" />
						</div>

						<div class="col-sm-2">
							<select class="form-control" id="nuevosubcat">
								<?php
								echo "<option value='-1'>Selecciona...</option>";
									foreach ($lista_subcategorias as $categoria)
									{
										foreach ($categoria->subcategorias as $subcategoria)
										{
											echo "<option value=" . $subcategoria->id . " data-catid=" . $subcategoria->categoriaId . ">" . $subcategoria->nombre . "</option>";
										}
									}
								?>
							</select>
						</div>

						<div class="col-sm-2">
							<button title="Crear producto" class="btn btn-primary btn-success btn-crear">
								<span class="glyphicon glyphicon-plus"></span>
							</button>
						</div>
					</div>
				</div> 
			</div>

</main>






<script>

 $('.btn-editar').click(function () {
	var estado = $(this).attr("data-estado");
	var dad = $(this).parent().parent().parent();
	var labels = dad.find('label');
	var inputs = dad.find(':input');
	var btn = dad.find(".btn-guardar");

	if(estado=="mostrando") //pasamos a la vista de editar
	{
		$(this).attr("data-estado","editando"); //le cambiamos el flag

		//ocultamos los labels
        labels.hide();

        //rellenamos los inputs
        for(var i=0;i<labels.length;i++) {
        	if(inputs[i].nodeName=="SELECT")
        	{
        		//selecciona por defecto la opcion que tenia en el label
        		$("select#subcatedit option").each(function() 
        		{
        			if(this.text == labels[i].innerHTML)
        			{
        				this.selected=true;
        			}
        		});
        	}
        	else
        		inputs[i].value = labels[i].innerHTML;
        }

        //mostramos resultados
        inputs.show();
        btn.show();

	}
	else
	{
		//volvemos a la normalidad
		$(this).attr("data-estado","mostrando");
		inputs.hide();
		btn.hide();
		labels.show();
	}
});



$('.btn-guardar').click(function () {
	var dad = $(this).parent().parent().parent();
	var inputs = dad.find(':input');
	var id = dad.find('.idprod')[0].innerHTML;

	$(".error").hide(); //escondemos errores

	var datos = {}
	datos.id = id;
	for(var i=0;i<inputs.length;i++) 
	{
    	var texto = inputs[i].value;
    	if(!texto) {
    		$("#fila-editable").find(".error")[0].style.display="inline";
			return;
    	}
    	if(i==0)
    		datos.nombre = texto;
    	if(i==1)
    		datos.especificaciones = texto;
    	if(i==2)
    		datos.descripcion = texto;
    	if(i==3)
    		datos.precio = texto;
    	if(i==4) 
    		datos.subcategoriaId = texto;
    }
    var tiendaid = "" + <?php echo $tiendaid; ?>;
    datos.tiendaId = tiendaid;


    console.log(datos);
    
    $.ajax({
        url : '<?php echo $tiendaid; ?>/editarprod/' + id,
        type : 'POST',
        data : datos,
        success:function (data) {
        	location.reload();
        }
	});
});



$(".btn-crear").click(function() {
	var form = $(".form-crear-prod");
	var inputs = form.find(":input");


	$(".error").hide(); //escondemos errores

	var valores_post = [];
	for(var i = 0; i< inputs.length;i++) {
		var input = inputs[i];
		if(input.nodeName=="INPUT") //input
		{
			if(input.value=="")
			{
				$("#crear-prod").find(".error")[0].style.display="inline";
				return;
			}

		}
		else if(input.nodeName=="SELECT") //select
		{
			if(input.value=="-1")
			{
				$("#crear-prod").find(".error")[0].style.display="inline";
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


$(".btn-borrar").click(function() {
	var padre = $(this).parent().parent().parent();
	var idprod = padre.find(".idprod")[0].innerText;
	//borrar un producto
	bootbox.confirm("¿Estás seguro? También se borrarán sus diferentes características.", function(seguro) {
		if(seguro)
		{
			$.ajax({
				url : '<?php echo $tiendaid; ?>/borrarprod/' + idprod,
				type : 'delete',
				success:function (data) {
					location.reload();
				}
			});
		}
	});
});
</script>
