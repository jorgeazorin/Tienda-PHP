<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<?php
   $this->load->view('inc/cabecera.php');
  // $this->load->view('inc/categorias');
?>
    <link rel="stylesheet" href="/iw/public/css/login.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<body>

  <section class="container">
  
      <table><tr><td>
            <div class="login">
      <h1>Login a Aliexpress</h1>
           <form method="post" action="/iw/index.php/cliente/doLogin">
        <p><input type="text" name="login" value="" placeholder="Nombre de Usuario"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
                </div>
          </td>
          <td>
               <div class="login">
      <h1>Registrarse en Aliexpress</h1>
          <form method="post" action="/iw/index.php/cliente/doRegistro">
        <p><input type="text" name="login" value="" placeholder="Nombre de Usuario"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
          <p><input type="text" name="email" value="" placeholder="email"></p>
        <p class="submit"><input type="submit" name="commit" value="Registrar"></p>
      </form>
          </div>
          
          </td>
          
          
          
          </tr></table>
       
    
</body>
</html>

