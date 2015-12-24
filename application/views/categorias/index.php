<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
  <h1><?php echo $titulo; ?></h1>

  <?php
  	if (!is_null($lista)) {
	    foreach ($lista as $categoria) {
	      ?> <li><?php echo $categoria->nombre; ?></li>
	        <?php
	    }
	}
  ?>
<div class="row">
  	<div class="col-lg-6">
	    <div class="input-group">
	      <input type="text" class="form-control" placeholder="Search for...">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button">Go!</button>
	      </span>
	    </div><!-- /input-group -->
  	</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</main>
