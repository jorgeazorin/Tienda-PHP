<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aliexpress</title>
    <link rel="stylesheet" href="/iw/public/css/cabecera.css">
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.3.min.js"); ?>"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.min.js"); ?>"></script>

</head>
<body>
    <div class="cabecera">
        <div class="titulocabecera">
            <div class="logo_img"></div>
            <div class="menu">
                <ul>
                    <?php
                    if($this->session->userdata('userName')=="admin") //cabecera ADMIN
                    {
                        ?>
                        <li><a href="/iw/admin"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Ir a principal</a></li>
                        <li><a href="/iw/admin/categorias"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Administrar categorías</a></li>
                        <li><a href="/iw/login/cerrarsesion"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>Salir</a></li>
                        <?php
                    } 

                    //cabecera LOGEADO
                    else if($this->session->userdata('userName')!=false)
                    {
                        ?>
                        <li><a href="/iw/index.php/catalogo/"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Catálogo</a></li>
                        <li><a href="/iw/index.php/carro/"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Carrito</a></li>
                        <li><a href="/iw/logout"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>Logout</a></li>
                        <li><a href="/iw/cliente"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Usuario</a></li>
                        <?php
                    }

                    else 
                    {    
                    ?>
                    <li><a href="/iw/index.php/catalogo/"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Catálogo</a></li>
                    <li><a href="/iw/index.php/cliente/login/"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>Login</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        
    </div>