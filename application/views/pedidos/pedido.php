<?php
   $this->load->view('inc/cabecera.php');
  // $this->load->view('inc/categorias');
?>
<main>
    <h3>Cliente <?php echo($username);echo("  -  "); echo($email); ?></h3>
    
    <div class="pedido">
        <br><br>
        <h4>Pedido <?php echo($pedidoId); ?></h4>
        <p>Estado: <?php echo($pedido[0]->estado); ?> </p>
        <p>Fecha: <?php echo($pedido[0]->fecha); ?> </p>
        <p>Direccion de envio: <?php echo($direnvio[0]->direccion.', '. $direnvio[0]->codpostal.', '. $direnvio[0]->poblacion.', '. $direnvio[0]->provincia.', '. $direnvio[0]->pais.', '. $direnvio[0]->telefono   ); ?> </p>


                <br><br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Precio total</th>
                    <?php if($pedido[0]->estado=='entregado'){
                        echo("<th>Comentario</th>");
                    } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total=0;
                foreach($linped as $linpedpedido){ ?>
                <tr>
                    <td> <div class="pro-img" style="background-image: url('/iw/public/img/<?php echo($linpedpedido->productoId);?>.jpg');"></td>
                    <td><?php echo($linpedpedido->precio); ?>€</td>
                    <td><?php echo($linpedpedido->cantidad); $total+=($linpedpedido->precio*$linpedpedido->cantidad);?></td>
                    <td><?php echo($linpedpedido->precio*$linpedpedido->cantidad);?>€</td>
                    <?php if($pedido[0]->estado=='entregado'){
                        echo('<td>
                         <form method="post" action="/iw/pedido/comentarlinped/'.$pedidoId.'/'.$linpedpedido->id.'">
                            <p>'.$linpedpedido->mensaje.'</p>
                            <p><input type="text" name="comentario" value="" placeholder="Deja tu comentario de este artículo"></p>
                            <input type="submit" name="commit" value="Comentar"></p>
                          </form>
                        </td>');
                        
                    } ?>
                </tr>
                <?php } ?>
                
            </tbody>
        </table>
        <div class="total">
                    Total: <?php echo $total ?>€
                </div>
    </div>
</main>
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
    td{
            vertical-align: middle !important;
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
    }
    table{
        margin-bottom: 0 !important;
    }
    h2{
        margin-bottom: 50px;
    }
    .pro-img {
        width: 32px;
        background-size: cover;
        height:32px;
    }
    .producto a {
        color: #333;
        display: block;
    }
    .carroCompra {
        width: 80%;
        margin: auto;
    }
    .total {
    text-align: -webkit-right;
    padding: 7px;
    padding-right: 14%;
    background: rgba(88, 154, 179, 0.68);
    font-size: large;
    color: #424242;
    box-shadow: inset 0px 5px 17px -7px;
}
</style>