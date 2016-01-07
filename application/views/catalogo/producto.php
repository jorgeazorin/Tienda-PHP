<?php
   $this->load->view('inc/cabecera.php');
  // $this->load->view('inc/categorias');
?>    

<link rel="stylesheet" href="/iw/public/css/catalogo-producto.css">


<main>
        <div class="producto">
            <div class="producto_imagen">
                <div class="imagendelproducto" style="background-image: url('/iw/public/img/<?php echo $producto[0]->id;?>.jpg');}"></div>
            </div>

            <div class="producto_descripcion">
                <h1><?php echo $producto[0]->nombre;?></h1>
                <div class="precio product-info">
                    <dl class="product-info-current">
                        <dt>Precio:</dt>
                        <dd>
                            <div class="current-price">
                                <div id="product-price" class="ui-cost" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                                    <b>
                    <span itemprop="priceCurrency" content="EUR">€ </span><span id="sku-price" itemprop="price">9,24</span>
                    </b> / unidad </div>
                            </div>

                        </dd>
                    </dl>
                    <div class="buy-now">
                        <a id="buy-now" class="buy-now-btn" href="/iw/index.php/carro/add/<?php echo($producto[0]->id); ?>/1" data-batman-id="iira0hnd" data-widget-cid="widget-10">Comprar ahora</a>
                    </div>
                </div>



                <div class="seller-info-wrap">
                    <div class="seller-info">
                        <div class="seller">
                            <div class="title">Vendido por</div>
     <a class="store-lnk" target="_blank" href="/iw/catalogo/tienda/<?php echo($tienda->id); ?>" title="NO.1 Kitchen Supply  Mall">Tienda <?php echo($tienda->id); ?></a>
                            <div class="company-name notranslate">
                            </div>
                            <address><?php echo($tienda->localizacion); ?> </address>
                            <div class="seller-score">
                                <?php echo($tienda->infocontacto); ?>
                                <?php echo($tienda->infocontacto); ?>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
            
            <div class="producto_descripcion">
               <?php echo($producto[0]->descripcion); ?>
            </div>
        </div>
    <br><br><br>
        <div class="comentarios">
            <h3>Comentarios de gente que ya lo ha recibido</h3>
            <?php foreach ($comentarios as $comentario) { if( strlen ($comentario->mensaje)>0){ ?>
            <p><span><?php echo($comentario->fecha); ?></span> <strong><?php echo($comentario->userName); ?> </strong> <?php echo($comentario->mensaje); ?></p>
            <?php }} ?>
        </div>
    </main>


    <style>
        .precio.product-info {
            padding: 20px;
            background: #F4F4F4;
            float: left;
            width: 74%;
            margin: 0;
        }
        .producto{
            overflow: hidden;
        }
        
        .product-info-current {
            line-height: 18px;
        }
        
        .product-info dt {
            float: left;
            width: 75px;
            padding: 2px 10px 0 15px;
            color: #999;
            line-height: 13px;
            word-wrap: break-word;
        }
        
        .producto_descripcion {
            margin-left: 355px;
            min-width: 450px;
            overflow: hidden;
        }
        
        .product-info dd {
            margin-left: 101px;
        }
        
        .current-price {
            position: relative;
        }
        
        #product-price {
            display: inline;
        }
        
        .producto h1 {
            font-size: 18px;
            padding: 20px;
            color: #333;
            line-height: 22px;
            font-weight: 400;
            padding-top: 0;
        }
        
        .current-price b {
            font-size: 22px;
        }
        .comentarios {
    clear: both;
}
        
        .ui-cost b {
            color: #F60;
        }
        
        .producto_imagen {
            float: left;
            margin-right: 24px;
        }
        
        .imagendelproducto {
            width: 330px;
            height: 330px;
            background-size: contain;
            border: solid 1px grey;
            padding: 5px;
        }
        
        a {
            text-decoration: none !important;
        }
        
        body {
            font-family: 'Open Sans', Arial, Helvetica, sans-senif, SimSun, 宋体;
            margin: 0;
        }
        
        main {
        }
    </style>


