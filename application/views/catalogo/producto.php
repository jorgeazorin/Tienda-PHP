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
                            <div class="company-name notranslate">
                                <input type="hidden" id="hid_storeId" value="414474">

                                <a class="store-lnk" target="_blank" href="http://www.aliexpress.com/store/414474" title="NO.1 Kitchen Supply  Mall">NO.1 Kitchen Supply  Mall</a>
                            </div>
                            <address>
 China (Mainland) (Zhejiang)  </address>
                            <input type="hidden" id="hid-feedback-url" value="http://www.aliexpress.com/store/feedback-score/414474.html">
                            <div class="seller-score">
                                <a class="seller-score-lnk" rel="nofollow" title="Feedback Score 5379">
                                    <b>5379</b>
                                </a>
                                <a class="seller-level-lnk" rel="nofollow">
                                    <img alt="" src="http://i00.i.aliimg.com/wimg/feedback/icon/24-s.gif" title="This is the Feedback Symbol for Feedback Scores from 5000-9999.">
                                </a>
                            </div>
                            <div class="seller-feedback">
                                <a class="feedback-rate" rel="nofollow">
                                    <b>97.4%</b>
                                </a> Valoraciones positivas
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            
            <div class="producto_descripcion">
               La ventana de instrucciones almacena las instrucciones pendientes ya decodificadas y se utiliza un bit para indicar si esa instrucción está disponible. Po su naturaleza, la emisión de las instrucciones depende del alineamiento y del orden:
La emisión es alineada si no pueden introducirse nuevas instrucciones en la ventana de instrucciones hasta que ésta no esté totalmente vacía. En la emisión no alineada, mientras que exista espacio en la ventana, se pueden ir introduciendo instrucciones para ser emitidas.
En la emisión ordenada se respeta el orden en que las instrucciones se han ido introduciendo en la ventana de instrucciones; si una instrucción incluida en la ventana de instrucciones no puede emitirse, las instrucciones que la siguen tampoco podrán emitirse, aunque tengan sus operandos y la unidad que necesitan esté disponible. En cambio, en la emisión desordenada no existe este bloqueo, ya que pueden emitirse todas las instrucciones que dispongan de sus operandos y de la correspondiente unidad funcional.
               
            </div>
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


