<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
  <h1><?php echo $titulo; ?></h1>



  <?php
  	if (!is_null($lista)) {
	    foreach ($lista as $categoria) {
	      ?> <div class="row"><div class="col-lg-6"><?php echo $categoria->nombre; ?></div></div>
	        <?php
	    }
	}
  ?>
<div class="row">
  	<div class="col-lg-6">
  		<form data-toggle="validator" id="form" role="form"  method="post" accept-charset="utf-8" action="categorias/crear">
	    <div class="input-group">
	      <input type="text" class="form-control" name="nuevacat" id="nuevacat" placeholder="Introduce nueva categoría..." required>
	      <span class="input-group-btn">
	        <button class="btn btn-default" id="btn-crear" type="submit"><span class="glyphicon glyphicon-plus"></span></button>
	      </span>
	    </div><!-- /input-group -->
		</form>
  	</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</main>


<script>
$(document).ready(function () {
	function crear(e) {
		e.preventDefault();
		var nombre = $('#nuevacat').val();
		if(nombre) {
			 $.ajax({
		        url : $('#form').attr("action"),
		        type : $('#form').attr("method"),
		        data : $('#form').serialize(),
		        success:function (data) {
		        	location.reload();
		        }
		    });
		}
		else { //intentando que me salga el mensajito de chrome de campo obligatorio
			 //$('#form').find(':submit').click()
			 //$('#form')[0].checkValidity()
		}
	};

	document.getElementById("btn-crear").addEventListener("click",crear);
});
</script>
