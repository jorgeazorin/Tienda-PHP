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
        <h2>Catálogo</h2>
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
                            <span class="g-orders categoria"><?php echo $row->catnombre;?></span>
                        </div>
                    </a>
                </div>
<?php
        }
?>
             </div>

        
</main>