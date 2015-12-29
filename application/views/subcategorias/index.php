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
		      			<div class="btn-group" role="group" aria-label="Botones de acción">
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