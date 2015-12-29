<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
	<h1><?php echo $titulo; ?></h1>
	<h1>Tienda <?php echo $idtienda; ?></h1>
	<h1>Categoria <?php echo $idcat; ?></h1>

	<div class="container">
	  <?php
	  	if (!is_null($lista)) {
		    foreach ($lista as $subcategoria) {
		      ?> <div class="row">
		      		<div class="col-sm-4">
		      			<h4><?php echo $subcategoria->nombre; ?></h4>
		      		</div>

		      		<div class="col-sm-4">
		      			<div id="text<?php echo $subcategoria->id; ?>" class="input-group text-edit" style="display:none">
		      				<div>
		      					<input type="text" id="input<?php echo $subcategoria->id; ?>" value="<?php echo $subcategoria->nombre; ?>" placeholder="Nuevo nombre de subcategoría..." class="form-control">
		      				</div>
		      				<span class="input-group-btn">
			        			<button class="btn btn-success btn-guardar-cambios" data-id="<?php echo $subcategoria->id; ?>"><span class="glyphicon glyphicon-check"></span></button>
			      			</span>
		      			</div>
		      		</div>

		      		<div class="col-sm-4">
		      			<div class="btn-group" role="group" aria-label="Botones de acción">
		      			<button title="Editar subcategoría" class="btn btn-warning btn-editar" data-id="<?php echo $subcategoria->id; ?>"><span class="glyphicon glyphicon-edit"></span>
		      			</button>
		      			<button title="Borrar subcategoría" class="btn btn-danger btn-borrar" data-id="<?php echo $subcategoria->id; ?>"><span class="glyphicon glyphicon-trash"></span>
		      			</button>
		      			</div>
		      		</div>
		      	</div>
		        <?php
		    }
		}
	  ?>


  	<div class="row">
	  	<div class="col-sm-4">
		    <div class="input-group">
		      <input type="text" class="form-control" name="nuevasubcat" id="nuevasubcat" placeholder="Introduce nueva subcategoría..." required>
		      <span class="input-group-btn">
		        <button title="Añade una nueva subcategoría" class="btn btn-primary" id="btn-crear"><span class="glyphicon glyphicon-plus"></span></button>
		      </span>
		    </div><!-- /input-group -->
	  	</div><!-- /.col-->
	</div><!-- /.row -->


	</div><!--container-->
</main>

<script>
$(document).ready(function () {
	//crear subcategoria
	$("#btn-crear").click(function(){
		var data = $("#nuevasubcat").val();
		if(data)
		{
			$.ajax({
	        url : '/iw/tiendas/<?php echo $idtienda; ?>/admin/categorias/<?php echo $idcat; ?>/crearsubcat',
	        type : 'POST',
	        data: {nombre:data},
	        success:function() {
	        	location.reload();
	        }
			});
		}
	});

	//mostrar form de editar
	$(".btn-editar").click(function(){
		$(".text-edit").hide(); //ocultamos los demas
		var id = $(this).attr('data-id');
		var textinput = "#text" + id;
		if($(textinput).css('display') == 'none' ){ //eso es que queremos abrir el inputtext
    		$(textinput).show();
		}
	});

	//guardar cambios para cambiar nombre de subcategoria
	$(".btn-guardar-cambios").click(function(){
		var id = $(this).attr('data-id');
		var nombre = $("#input" + id).val();
		if(nombre!=undefined && nombre!="")
		{
			$.ajax({
		        url : '/iw/tiendas/<?php echo $idtienda; ?>/admin/categorias/<?php echo $idcat; ?>/subcat/' + id + '/editar',
		        type : 'POST',
		        data : {nuevonombre:nombre},
		        success:function (data) {
		        	location.reload();
		        }
		    });
		}


	});

	//borrar una subcategoria
	$(".btn-borrar").click(function(){
		var data = $(this).attr('data-id');
  		$.ajax({
	        url : '/iw/tiendas/<?php echo $idtienda; ?>/admin/categorias/<?php echo $idcat; ?>/subcat/' + data + '/borrar',
	        type : 'delete',
	        success:function (data) {
	        	location.reload();
	        }
		});
	});


});
</script>