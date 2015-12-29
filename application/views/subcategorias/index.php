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
		      		<div class="col-sm-4"><h4><?php echo $subcategoria->nombre; ?></h4></div>
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
	//borrar una categoria
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
		/*
  		$.ajax({
	        url : '/iw/tiendas/<?php echo $idtienda; ?>/admin/categorias/' + data + '/borrar',
	        type : 'delete',
	        success:function (data) {
	        	location.reload();
	        }
		});
		*/
	});
});
</script>