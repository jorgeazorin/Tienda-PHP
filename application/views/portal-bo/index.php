<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
  <h1><?php echo $titulo; ?></h1>

  <h3>Categorías de la web</h3>
  <a href='admin/categorias' class="btn btn-default" id="btn-categorias"><i class="glyphicon glyphicon-cog"></i>Administrar categorías de los productos</a>

  <h3>Lista de tiendas</h3>


	<?php
	if(!is_null($lista_tiendas)) {
	?>
	<table class="table table-hover"> 
		<thead style="background-color:grey"> 
			<tr> 
				<th>ID</th> 
				<th>Nombre</th>
				<th>Localización</th>
				<th>Fecha apertura</th> 
				<th>Info contacto</th>
				<th>Acciones</th> 
			</tr> 
		</thead>
		<tbody>
			<?php 
			foreach ($lista_tiendas as $tienda) {
			?>
				<tr> 
					<th scope="row">
						<span class="idtienda"><?php echo $tienda->id; ?></span>
						<span class="error" style="color:red;display:none">Todos los campos son obligatorios</span>
					</th> 
					<td>
						<label><?php echo $tienda->nombre; ?></label>
						<input placeholder="Nombre..." class="form-control" type="text" style="display:none" />
					</td>  
					<td>
						<label><?php echo $tienda->localizacion; ?></label>
						<input placeholder="Localización..." class="form-control" type="text" style="display:none" />
					</td>
					<td>
						<label><?php echo $tienda->fechaapertura; ?></label>
						<input placeholder="Fecha de apertura..." class="form-control" type="date" style="display:none" />
					</td> 
					<td>
						<label><?php echo $tienda->infocontacto; ?></label>
						<input placeholder="Info de contacto..." class="form-control" type="text" style="display:none" />
					</td>
					<td>
						<div class="btn-group">
							<a href='#' title="Guardar cambios" style="display:none" class="btn btn-success btn-guardar"><span class="glyphicon glyphicon-check"></span></a>
							<a href='admin/tiendas/<?php echo $tienda->id; ?>' title="Ver sus productos" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
							<a href='#' title="Editar tienda" class="btn btn-warning btn-editar" data-estado="mostrando"><span class="glyphicon glyphicon-edit"></span></a>
							<a href='#' title="Borrar tienda" class="btn btn-danger btn-borrar"><span class="glyphicon glyphicon-trash"></span></a>
						</div>
					</td>
				</tr> 
			<?php
			}
			?>
			<tr> 
					<th scope="row">
						<span class="error" style="color:red;display:none"></span>
					</th> 
					<td>
						<input placeholder="Nombre..." class="form-control" type="text" />
					</td>  
					<td>
						<input placeholder="Localización..." class="form-control" type="text" />
					</td>
					<td>
						<input placeholder="Fecha de apertura..." class="form-control" type="date"  />
					</td> 
					<td>
						<input placeholder="Info de contacto..." class="form-control" type="text" />
					</td>
					<td>
						<a id="btn-crear" href='#' title="Crear tienda" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-plus"></span></a>
					</td>
				</tr> 
		</tbody> 
	</table>



	<?php
	}
	else
	{
		?><p>Parece que no tienes ninguna tienda registrada...</p>
		<table class="table table-hover"> 
		<thead style="background-color:grey"> 
			<tr> 
				<th>ID</th> 
				<th>Nombre</th>
				<th>Localización</th>
				<th>Fecha apertura</th> 
				<th>Info contacto</th>
				<th>Acciones</th> 
			</tr> 
		</thead>
		<tr> 
					<th scope="row">
						<span class="error" style="color:red;display:none"></span>
					</th> 
					<td>
						<input placeholder="Nombre..." class="form-control" type="text" />
					</td>
					<td>
						<input placeholder="Localización..." class="form-control" type="text" />
					</td>
					<td>
						<input placeholder="Fecha de apertura..." class="form-control" type="date"  />
					</td> 
					<td>
						<input placeholder="Info de contacto..." class="form-control" type="text" />
					</td>
					<td>
						<a id="btn-crear" href='#' title="Crear tienda" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-plus"></span></a>
					</td>
				</tr> 
	<?php
	}
	?>


</main>

<script>
$(document).ready(function() {
    $('.btn-editar').click(function () {
    	var estado = $(this).attr("data-estado");
    	var dad = $(this).parent().parent().parent();
    	var labels = dad.find('label');
    	var inputs = dad.find('input');
    	var btn = dad.find(".btn-guardar");

    	if(estado=="mostrando") //pasamos a la vista de editar
    	{
    		$(this).attr("data-estado","editando"); //le cambiamos el flag

    		//ocultamos los labels
	        labels.hide();

	        //rellenamos los inputs
	        for(var i=0;i<labels.length;i++) {
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
		var inputs = dad.find('input');
		var id = dad.find('.idtienda')[0].innerHTML;
		var errormensaje = dad.find(".error")[0];
		$(".error").hide();
		var datos = {}
		datos.id = id;
		for(var i=0;i<inputs.length;i++) 
		{
	    	var texto = inputs[i].value;
	    	if(!texto) {
	    		errormensaje.style.display="inline";
	    		return; //si hay un campo sin rellenar, no es valido
	    	}
	    	if(i==0)
	    		datos.nombre = texto;
	    	if(i==1)
	    		datos.localizacion = texto;
	    	if(i==2)
	    		datos.fechaapertura = texto;
	    	if(i==3)
	    		datos.infocontacto = texto;
	    }
	    //console.log(datos);
	    $.ajax({
	        url : 'admin/tiendas/' + id + '/editar',
	        type : 'POST',
	        data : datos,
	        success:function (data) {
	        	location.reload();
	        },
	        error: function(data){
       			alert("fail");
    		}
		});
	});

	 $('#btn-crear').click(function () {
	 	var dad = $(this).parent().parent();
	 	var inputs = dad.find(':input[type="text"]');
	 	var errormensaje = dad.find(".error")[0];
	 	$(".error").hide();
	 	//comprobamos que los campos esten rellenos
	 	var datos = {}
        for(var i=0;i<inputs.length;i++) {
        	var input = inputs[i].value;
	    	if(!input)
	    	{
	    		errormensaje.innerHTML="Todos los campos son obligatorios";
	    		errormensaje.style.display="inline";
	    		return;
	    	}
	    	if(i==0)
	    		datos.nombre = input;
	    	if(i==1)
	    		datos.localizacion = input;
	    	if(i==2)
	    		datos.infocontacto = input;
        }
        var fecha = dad.find(':input[type="date"]')[0].value;
        if(!fecha)
        {
        	errormensaje.innerHTML="Todos los campos son obligatorios";
	    	errormensaje.style.display="inline";
        	return;
        }
        else
        	datos.fechaapertura = fecha;
        $.ajax({
	        url : 'admin/tiendas/crear',
	        type : 'post',
	        data : datos,
	        success:function (data) {
	        	location.reload();
	        }
		});

	 });

	 $('.btn-borrar').click(function () {

	 	var id = $(this).parent().parent().parent().find('.idtienda')[0].innerHTML;
	 	bootbox.confirm("¿Estás seguro? Perderás todos los productos que sean de esta tienda.", function(seguro) {
			if(seguro)
			{
			 	$.ajax({
			        url : 'admin/tiendas/' + id + '/borrar',
			        type : 'delete',
			        success:function (data) {
			        	location.reload();
			        }
				});
			}
	 	});
	 });


});
</script>
