<?php
   $this->load->view('inc/cabecera.php');
  // $this->load->view('inc/categorias');
?>

        <link rel="stylesheet" href="/iw/public/css/todo_catalogo.css">
<div class="subcategorias">
<ul>
    <?php foreach($categorias as $subcategoria){
            echo('<li><a href="/iw/index.php/catalogo/categoria/'.$subcategoria->id.'">'.$subcategoria->nombre.'</a></li>');
        }
    ?>

</ul>
</div>
    <main>
        <h3>Catálogo de la tienda <?php echo($tienda->nombre) ?></h3>
        <p><strong>Localización </strong> <?php echo($tienda->localizacion) ?></p>
        <p><strong>Información de contacto </strong> <?php echo($tienda->infocontacto) ?></p>
        <p><strong>Fecha de apertura: </strong> <?php echo($tienda->fechaapertura) ?></p>
        <br><br>
            <div class="catalogo">
                <h4>Productos</h4>
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
                        </div>
                    </a>
                </div>
<?php
        }
?>
             </div>

        
</main>