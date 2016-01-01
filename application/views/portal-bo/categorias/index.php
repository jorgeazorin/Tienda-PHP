<?php
  $this->load->view('inc/cabecera.php');
 ?>

<link href = "<?php echo base_url(); ?>assets/css/lista-categorias.css” rel=”stylesheet" type="text/css" />

<main>
	<h1><?php echo $titulo; ?></h1>


<div class="just-padding">
	<div class="list-group list-group-root">

		<?php
		if (!is_null($lista)) {
			$i=0;
			foreach ($lista as $categoria) {?>
		    <a href="#categoria-<?php echo $categoria->id; ?>" class="list-group-item" data-toggle="collapse">
		    	<div class="row">
		    		<div class="col-sm-4">
		      			<i class="glyphicon glyphicon-chevron-right"></i><?php echo $categoria->nombre; ?>
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
			    		echo "<a href='#'' class='list-group-item'>" . $subcategoria->nombre . "</a>";
			    }
		    ?>

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


	//borrar una categoria
	$(".btn-borrar").click(function(){
		var data = $(this).attr('data-id');
  		$.ajax({
	        url : 'categorias/' + data + '/borrar',
	        type : 'delete',
	        success:function (data) {
	        	location.reload();
	        }
		});
	});

	//mostrar form de editar
	$(".btn-editar").click(function(){
		event.stopPropagation();
		$(".text-edit").hide(); //ocultamos los demas
		var id = $(this).attr('data-id');
		var textinput = "#text" + id;
		if($(textinput).css('display') == 'none' ){ //eso es que queremos abrir el inputtext
    		$(textinput).show();
		}
	});

	//guardar cambios para cambiar nombre de categoria
	$(".btn-guardar-cambios").click(function(){
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


	$('.list-group-item').on('click', function() {
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
