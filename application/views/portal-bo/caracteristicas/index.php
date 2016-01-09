<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
	<a href="<?php echo base_url(); ?>admin/tiendas/<?php echo $idtienda; ?>" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Atrás</a>
	<h1><?php echo $titulo . " " . $nombreprod ?></h1>

	<ol class="breadcrumb">
		<li><a href="/iw/admin">Principal</a></li>
		<li><a href="/iw/admin/tiendas/<?php echo $idtienda; ?>"><?php echo $nombretienda; ?></a></li>
		<li class="active"><?php echo $nombreprod ?></li>
	</ol>
	

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
						<span class="error" style="color:red;display:none">Campos obligatorios</span>	
					</th> 
					<td>
						<label><?php echo $caracteristica->nombre; ?></label>
						<input placeholder="Nombre..." class="form-control" type="text" style="display:none" />
					</td>  
					<td>
						<label><?php echo $caracteristica->stock; ?></label>
						<input placeholder="Stock..." class="form-control" type="number" min="0" step="any" style="display:none" />
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
						<span class="error" style="color:red;display:none">Campos obligatorios</span>
					</th> 
					<td>
						<input placeholder="Nombre..." class="form-control" type="text" />
					</td>  
					<td>
						<input placeholder="Stock..." class="form-control" type="number" min="0" step="any" />
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
						<span class="error" style="color:red;display:none">Campos obligatorios</span>	
					</th> 
					<td>
						<input placeholder="Nombre..." class="form-control" type="text" />
					</td>  
					<td>
						<input placeholder="Stock..." class="form-control"  type="number" min="0" step="any" />
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
	//crear caracteristica
	$("#btn-crear").click(function(){
		$(".error").hide(); //escondemos errores
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
		else
		{
			padre.find(".error")[0].style.display="inline";
		}
	});

	$('.btn-borrar').click(function () {
	 	var id = $(this).parent().parent().parent().find('.idcaracteristica')[0].innerHTML;
	 	$.ajax({
	        url : '<?php echo $idprod; ?>/caracteristica/' + id + '/borrar',
	        type : 'delete',
	        success:function (data) {
	        	location.reload();
	        }
		});
	});



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
		$(".error").hide(); //escondemos errores
		var dad = $(this).parent().parent().parent();
		var inputs = dad.find(':input');
		var id = dad.find('.idcaracteristica')[0].innerHTML;

		var datos = {}
		datos.id = id;

		for(var i=0;i<inputs.length;i++) 
		{
	    	var texto = inputs[i].value;
	    	if(!texto) {
	    		dad.find(".error")[0].style.display="inline";
	    		return; //si hay un campo sin rellenar, no es valido
	    	}
	    	if(i==0)
	    		datos.nombre = texto;
	    	if(i==1)
	    		datos.stock = texto;
	    }
	    $.ajax({
	        url : '<?php echo $idprod; ?>/caracteristica/' + id + '/editar',
	        type : 'POST',
	        data : datos,
	        success:function (data) {
	        	location.reload();
	        }
		});
	});


});
</script>