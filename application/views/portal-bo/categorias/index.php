<?php
  $this->load->view('inc/cabecera.php');
 ?>

<link href = "<?php echo base_url(); ?>assets/css/lista-categorias.css” rel=”stylesheet" type="text/css" />

<main>
	<h1><?php echo $titulo; ?></h1>


<div class="just-padding">
	<div class="list-group list-group-root well">

		<?php
		if (!is_null($lista)) {
			$i=0;
			foreach ($lista as $categoria) {?>
		    <a href="#categoria-<?php echo $categoria->id; ?>" class="list-group-item clickable" data-toggle="collapse">
		    	<div class="row">
		    		<div class="col-sm-4">
		      			<h4><i class="glyphicon glyphicon-chevron-right"></i>Categoría <?php echo $categoria->nombre; ?></h4>
		      		</div>
		      		<div class="col-sm-4">
		      			<div id="text<?php echo $categoria->id; ?>" class="input-group text-edit" style="display:none">
		      				<div>
		      					<input type="text" id="input<?php echo $categoria->id; ?>" value="<?php echo $categoria->nombre; ?>" placeholder="Nuevo nombre de categoría..." class="form-control">
		      				</div>
		      				<span class="input-group-btn">
			        			<button class="btn btn-success btn-guardar-cambios" data-id="<?php echo $categoria->id; ?>"><span class="glyphicon glyphicon-check"></span></button>
			      			</span>
		      			</div>
		      		</div>
		      		<div class="col-sm-4">
		      			<div class="btn-group" role="group" aria-label="Acciones de categorías">
		      				<button title="Editar categoría" class="btn btn-warning btn-editar" data-id="<?php echo $categoria->id; ?>"><span class="glyphicon glyphicon-edit"></span>
		      				</button>
		      				<button title="Borrar categoría" class="btn btn-danger btn-borrar" data-id="<?php echo $categoria->id; ?>"><span class="glyphicon glyphicon-trash"></span>
		      			</button>
		      			</div>
		      		</div>

		  		</div>
		    </a>
		    <div class="list-group collapse" id="categoria-<?php echo $categoria->id; ?>">

		    <?php
		    	if (!is_null($subcategorias[$i]))
		    	{
			    	foreach ($subcategorias[$i] as $subcategoria)
			    	{
			    		?>
			    		<a href='#' class='list-group-item'>
			    		<div data-id="<?php echo $subcategoria->id; ?>" data-catid="<?php echo $subcategoria->categoriaId; ?>" class="row">
		    				<div class="col-sm-4">
			    				<strong><?php echo $subcategoria->nombre; ?></strong>
			    			</div>

			    			<div class="col-sm-4">
			    				

			    			<div id="textsubcat<?php echo $subcategoria->id; ?>" class="input-group text-edit" style="display:none">
			      				<div>
			      					<input type="text" id="inputsubcat<?php echo $subcategoria->id; ?>" value="<?php echo $subcategoria->nombre; ?>" placeholder="Nuevo nombre de subcategoría..." class="form-control">
			      				</div>
			      				<span class="input-group-btn">
				        			<button class="btn btn-success btn-guardar-cambios-subcat" data-catid="<?php echo $subcategoria->categoriaId; ?>" data-id="<?php echo $subcategoria->id; ?>"><span class="glyphicon glyphicon-check"></span></button>
				      			</span>
		      				</div>


			    			</div>

			    			<div class="col-sm-4">
			    				<div class="btn-group btn-group-sm" role="group" aria-label="Acciones de subcategorías">
			    					<button title="Editar subcategoría" class="btn btn-warning btn-editar-subcat" data-id="<?php echo $subcategoria->id; ?>"><span class="glyphicon glyphicon-edit"></span>
		      						</button>
		      						<button title="Borrar subcategoría" class="btn btn-danger btn-borrarsubcat"><span class="glyphicon glyphicon-trash"></span>
		      						</button>
		      					</div>
			    			</div>
			    		</div>
			    		</a>



			    		<?php
			    	}
			    }


		    ?>
		    	<div class="row">
				  	<div class="col-sm-4">
					    <div class="input-group">
					      <input type="text" class="form-control nuevasubcat" placeholder="Introduce nueva subcategoría..." required>
					      <span class="input-group-btn">
					        <button data-idcat="<?php echo $categoria->id; ?>" class="btn btn-primary btn-crear-subcat"><span class="glyphicon glyphicon-plus"></span></button>
					      </span>
					    </div><!-- /input-group -->
				  	</div><!-- /.col-lg-6 -->
				</div><!-- /.row -->

		    </div>
		    <?php
		    $i++;
			}
		}
		?>

	  
	</div>
	<div class="row">
		  	<div class="col-sm-4">
			    <div class="input-group">
			      <input type="text" class="form-control" name="nuevacat" id="nuevacat" placeholder="Introduce nueva categoría..." required>
			      <span class="input-group-btn">
			        <button class="btn btn-primary" id="btn-crear"><span class="glyphicon glyphicon-plus"></span></button>
			      </span>
			    </div><!-- /input-group -->
		  	</div><!-- /.col-lg-6 -->
	</div><!-- /.row -->
</div>
  










</main>


<script>

$(document).ready(function () {

	$("#btn-crear").click(function () {
		console.log("CLICK");
		var nombre = $('#nuevacat').val();
		if(nombre) {	
			 $.ajax({
		        url : 'categorias/crear',
		        type : 'POST',
		        data : {nuevacat:nombre},
		        success:function (data) {
		        	location.reload();
		        }
		    });
		}
		else { //intentando que me salga el mensajito de chrome de campo obligatorio
			 //$('#form').find(':submit').click()
			 //$('#form')[0].checkValidity()
		}
	});

	//crear subcategoria
	$(".btn-crear-subcat").click(function(){
		var data = $(this).parent().parent().find(".nuevasubcat")[0].value;
		var idcat = $(this).attr("data-idcat");
		if(data)
		{
			$.ajax({
	        url : 'categorias/' + idcat + '/crearsubcat',
	        type : 'POST',
	        data: {nombre:data},
	        success:function() {
	        	location.reload();
	        }
			});
		}
	});


	//borrar una categoria
	$(".btn-borrar").click(function(){
		event.stopPropagation();
		var data = $(this).attr('data-id');
  		$.ajax({
	        url : 'categorias/' + data + '/borrar',
	        type : 'delete',
	        success:function (data) {
	        	location.reload();
	        }
		});
	});

	//borrar una subcategoria
	$(".btn-borrarsubcat").click(function(){
		var nodo = $(this).parent().parent().parent();
		var data = nodo.attr('data-id');
		var idcat = nodo.attr("data-catid");
  		$.ajax({
	        url : 'categorias/' + idcat + '/subcat/' + data + '/borrar',
	        type : 'delete',
	        success:function (data) {
	        	location.reload();
	        }
		});
	});

	//mostrar form de editar categoria
	$(".btn-editar").click(function(){
		event.stopPropagation();
		$(".text-edit").hide(); //ocultamos los demas
		var id = $(this).attr('data-id');
		var textinput = "#text" + id;
		if($(textinput).css('display') == 'none' ){ //eso es que queremos abrir el inputtext
    		$(textinput).show();
		}
	});

	//mostrar form de editar subcategoria
	$(".btn-editar-subcat").click(function(){
		$(".text-edit").hide(); //ocultamos los demas
		var id = $(this).attr('data-id');
		var textinput = "#textsubcat" + id;
		if($(textinput).css('display') == 'none' ){ //eso es que queremos abrir el inputtext
    		$(textinput).show();
		}
	});

	//guardar cambios para cambiar nombre de categoria
	$(".btn-guardar-cambios").click(function(){
		event.stopPropagation();
		var id = $(this).attr('data-id');
		//console.log(id);
		var nombre = $("#input" + id).val();
		if(nombre!=undefined && nombre!="")
		{
			$.ajax({
		        url : 'categorias/' + id + '/editar',
		        type : 'POST',
		        data : {nuevonombre:nombre},
		        success:function (data) {
		        	location.reload();
		        }
		    });
		}


	});

	//guardar cambios para cambiar nombre de subcategoria
	$(".btn-guardar-cambios-subcat").click(function(){
		var id = $(this).attr('data-id');
		var catid = $(this).attr('data-catid');
		var nombre = $("#inputsubcat" + id).val();
		if(nombre!=undefined && nombre!="")
		{
			$.ajax({
		        url : 'categorias/' + catid + '/subcat/' + id + '/editar',
		        type : 'POST',
		        data : {nuevonombre:nombre},
		        success:function (data) {
		        	location.reload();
		        }
		    });
		}


	});


	$('.list-group-item clickable').on('click', function() {
		var derecha = $(this).find("i")[0].outerHTML.indexOf("right") > -1;
		if(derecha)
		{
	    	$('.glyphicon-chevron-right', this)
	      .toggleClass('glyphicon-chevron-right')
	      .toggleClass('glyphicon-chevron-down');
	  	}
	  	else
	  	{
	  		$('.glyphicon-chevron-down', this)
	      .toggleClass('glyphicon-chevron-down')
	      .toggleClass('glyphicon-chevron-right');
	  	}
  	});
});
</script>
