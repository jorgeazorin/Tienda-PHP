<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
  <h1><?php echo $titulo; ?></h1>

  <h3>Categorías de la web</h3>
  <a href='admin/categorias' class="btn btn-default" id="btn-categorias">Administrar categorías de los productos</a>

  <h3>Lista de tiendas</h3>


	<?php
	if(!is_null($lista_tiendas)) {
	?>
	<table class="table table-hover"> 
		<thead> 
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
						<input placeholder="Fecha de apertura..." class="form-control" type="text" style="display:none" />
					</td> 
					<td>
						<label><?php echo $tienda->infocontacto; ?></label>
						<input placeholder="Info de contacto..." class="form-control" type="text" style="display:none" />
					</td>
					<td>
						<div class="btn-group">
							<a href='#' style="display:none" class="btn btn-success btn-guardar"><span class="glyphicon glyphicon-check"></span></a>
							<a href='#' class="btn btn-info">Ver productos</a>
							<a href='#' class="btn btn-warning btn-editar" data-estado="mostrando"><span class="glyphicon glyphicon-edit"></span></a>
						</div>
					</td>
				</tr> 
			<?php
			}
			?>

		</tbody> 
	</table>

	<?php
	}
	else
	{
		?><p>Parece que no tienes ninguna tienda registrada...</p>
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
    	var inputs = dad.find('input[type="text"]');
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
		var inputs = dad.find('input[type="text"]');
		var id = dad.find('.idtienda')[0].innerHTML;

		var datos = {}
		datos.id = id;
		for(var i=0;i<inputs.length;i++) 
		{
	    	var texto = inputs[i].value;
	    	if(!texto) {
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
		        }
		    });
	});


});
</script>
