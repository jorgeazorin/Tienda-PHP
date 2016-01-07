<?php
   $this->load->view('inc/cabecera.php');
  // $this->load->view('inc/categorias');
?>

        <link rel="stylesheet" href="/iw/public/css/todo_catalogo.css">

    <main>
        <h3>Catálogo de la tienda <?php echo($tienda->id) ?></h3>
            <div class="catalogo">
<?php
        foreach ($TodoElCatalogo as $row){
  ?>
                <div class="producto">
                    <a href="/iw/index.php/catalogo/producto/<?php echo $row->id;?>" target="_blank">
                        <div class="pro-img" style="background-image: url('/iw/public/img/<?php echo $row->id;?>.jpg');}">
                        </div>
                        <div class="pro-info">
                            <div class="g-orders"> 284 vendidos</div>
                            <span class="g-price">US $<?php echo $row->precio;?></span>
                                <del class="g-del-price">  <?php if($row->precio_sin_descuento!=0){ echo ("US $"); echo $row->precio_sin_descuento; }?></del>
                        </div>
                    </a>
                </div>
<?php
        }
?>
             </div>

        
</main>