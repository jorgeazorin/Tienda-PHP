<?php
   $this->load->view('inc/cabecera.php');
  // $this->load->view('inc/categorias');
?>
<main>

<div class="carroCompra">
    <h3>Carrito de la compra</h3>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>P.U.</th>
            <th>P.T.</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        
<?php
            $total=0;
        if($carro) {        
            foreach ($carro as $row){
?>
        <tr>
            <td> <a href="/iw/index.php/catalogo/producto/<?php echo $row["id"];?>"><div class="pro-img" style="background-image: url('/iw/public/img/<?php echo $row["id"];?>.jpg');"></div></a></td>
            <td><?php echo $row["nombre"];?></td>
            <td><?php echo $row["cantidad"];?></td>
            <td><?php echo $row["precio"];?>€</td>
            <td><?php echo ($row["precio"]*$row["cantidad"]);$total+=($row["precio"]*$row["cantidad"]);?>€</td>
            <td><a href="/iw/index.php/carro/delete/<?php echo $row["unique_id"];?>">Eliminar</a></td>
        </tr>
<?php
        }}
?>
        
        </tbody>
    </table>
    <div class="total">
        Total: <?php echo $total ?>€
    </div>
    <div class="botones">
        <a href="/iw/index.php/pedido/realizarpedido/">Realizar pedido</a>
    </div>
</div>

<style>
    a{
      text-decoration: none !important;
    }
    .botones a {
    margin: 10px;
    padding: 7px;
    background: #6BABB9;
    width: 120px;
    text-align: center;
    color: #FFFFFF;
    /* text-shadow: 0 0 3px rgba(0, 0, 0, 0.64); */
    display: -webkit-box;
    border-radius: 4px;
    box-shadow: 0 0 3px black;
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
    </main>