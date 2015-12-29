<?php
  // $this->load->view('inc/cabecera.php');
  // $this->load->view('inc/categorias');
?>


    <main>
        <h2>Catálogo</h2>
            <div class="catalogo">
<?php
        foreach ($TodoElCatalogo as $row){
  ?>
                <div class="producto">
                    <a href="/ic/catalogo/producto/<?php echo $row->id;?>.jpg" target="_blank">
                        <div class="pro-img" style="background-image: url('/ic/public/img/<?php echo $row->id;?>.jpg');}">
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

        
<style>
    a{
      text-decoration: none !important;
    }
    body{
      font-family: 'Open Sans', Arial, Helvetica, sans-senif, SimSun, 宋体;
        margin: 0;
    }
     .pro-info {
        position: relative;
        height: 40px;
        padding-top: 20px;
     }
    .g-orders {
        position: absolute;
        right: 0;
        top: 28px;
        line-height: 25px;
    }
    
    .g-price {
        display: block;
        color: #545454;
        font-weight: 700;
        font-size: 18px;
        margin-right: 10px;
    }
    .related-recommend .g-del-price {
        color: #999;
    }
    del {
        text-decoration: line-through;
        display: table-row;
    }
    main{
        background-color: #eee;
    }
    .producto:hover {
box-shadow: 0 3px 6px 0 rgba(51,51,51,.298039)
    }
    .producto {
            min-width: 253px;
            box-shadow: 0 0 14px 0px rgba(0, 0, 0, 0);
    transition: all 0.3s;
        display: inline-block;
        background: white;
        padding: 10px;
        margin-right: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }
    .pro-img {
        margin: auto;
        background-image: url("/ic/public/img/1.jpg");
    }
    .pro-img {
        width: 210px;
        background-size: cover;
        height: 210px;
    }
    .producto a {
        color: #333;
        display: block;
    }
    .catalogo {
    }
</style>
</main>