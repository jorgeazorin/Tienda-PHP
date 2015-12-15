<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
  <h1><?php echo $titulo; ?></h1>

  <?php
    foreach ($lista as $persona) {
      ?> <li>  <?php echo $persona->nombre; ?><li>
        <?php
    }
  ?>
</main>
