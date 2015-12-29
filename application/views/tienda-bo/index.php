<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
  <h1><?php echo $titulo; ?></h1>
  <!--<button id="btn-categorias" type="button" class="btn btn-primary">Administrar tus categorías</button>-->
  <a href='/iw/tiendas/<?php echo $id; ?>/admin/categorias' class="btn btn-default" id="btn-categorias">Administrar tus categorías</a>
</main>
