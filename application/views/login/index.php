<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>

	<div class="container">
	    <div class="row">
			<div class="col-md-4 col-md-offset-4">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Acceso restringido</h3>
				 	</div>
				  	<div class="panel-body">
	                    <fieldset>
				    	  	<div class="form-group">
				    	  		<span id="error-nombre" style="color:red;display:none"></span>
				    		    <input class="form-control" placeholder="Nombre de usuario..." id="usuario">
				    		</div>
				    		<div class="form-group">
				    			<span id="error-password" style="color:red;display:none"></span>
				    			<input class="form-control" placeholder="Introduce tu contraseña..." id="password" type="password">
				    		</div>
				    		<button id="btn-login" class="btn btn-lg btn-warning btn-block">Login</button>
				    		¿No eres un administrador?
				    		<a href="/iw/cliente/login/" class="btn btn-lg btn-info btn-block">Inicia sesión en la tienda</a>

				    	</fieldset>
				    </div>
				</div>
			</div>
		</div>
	</div>

</main>

<script>
$("#btn-login").click(function() {
	$("#error-nombre").hide();
	$("#error-password").hide();
	var login =	$("#usuario").val();
	var password = $("#password").val();
	if(login && password)
	{
		var datos = {};
		datos.login=login;
		datos.password=password;
		$.ajax({
	        url : 'login/validar',
	        type : 'POST',
	        data : datos,
	        success:function (data) {
	        	//window.location.href=data;
	        	if(data=="ERROR")
	        	{
	        		$("#error-nombre").html("¡Creedenciales incorrectas!").show();
	        		$("#usuario").val("");
					$("#password").val("");
	        	}
	        	else
	        	{
	        		window.location.href=data;
	        	}
	        }
		});
	}
	else
	{
		if(!login) {
			$("#error-nombre").html("¡El nombre no puede estar vacío!").show();
		}
		if(!password) {
			$("#error-password").html("¡La contraseña no puede estar vacía!").show();
		}
	}
});
</script>
