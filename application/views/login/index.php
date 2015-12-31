<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
	<h1>Login</h1>

	<label for="usuario">Usuario:</label>
	<input placeholder="Introduce tu nombre de usuario o email..." type="text" class="form-control" id="usuario">
	<label for="password">Contraseña:"</label>
	<input placeholder="Introduce tu contraseña..." type="password" class="form-control" id="password">
	<button id="btn-login" type="button" class="btn btn-success">Iniciar sesión</button>
	¿No tienes cuenta?
	<button type="button" class="btn">Regístrate</button>

</main>

<script>
$("#btn-login").click(function() {
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
	        	//location.reload();
	        	//console.log(data);
	        	window.location.href=data;
	        }
		});
	}
});
</script>
