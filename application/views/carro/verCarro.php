<?php
   $this->load->view('inc/cabecera.php');
  // $this->load->view('inc/categorias');
?>
<main>
<form method="post" action="/iw/pedido/realizarpedido/">
    <?php 
      if(strlen($errorenvio)>1){
                  echo('<div class="alert alert-danger" role="alert"> <strong>Oh no!</strong> Añada una dirección de envío. </div>');
      }
      ?>
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
            <td> <a href="/iw/catalogo/producto/<?php echo $row["id"];?>"><div class="pro-img" style="background-image: url('/iw/public/img/<?php echo $row["id"];?>.jpg');"></div></a></td>
            <td><?php echo $row["nombre"];?></td>
            <td><?php echo $row["cantidad"];?></td>
            <td><?php echo $row["precio"];?>€</td>
            <td><?php echo ($row["precio"]*$row["cantidad"]);$total+=($row["precio"]*$row["cantidad"]);?>€</td>
            <td><a href="/iw/carro/delete/<?php echo $row["unique_id"];?>">Eliminar</a></td>
        </tr>
<?php
        }
?>
        
        </tbody>
    </table>
    <div class="total">
        Total: <?php echo $total ?>€
    </div>
    
    
    
    
    <?php
                if($this->session->userdata('userName')){
                ?>
     <div class="direcciones">
         <br><br>
        <h4>Direcciones de entrega</h4>
        

       

        <?php
        if(!is_null($direcciones))
        foreach($direcciones as $direccion){

            ?>
<div class="radio">
  <label>
    <input type="radio" name="direccion" id="optionsRadios1" value="<?php echo ($direccion->id) ;?>" checked>
    <?php echo ($direccion->direccion.', '.$direccion->poblacion.', '.$direccion->provincia.', '.$direccion->codpostal.', '.$direccion->pais.', '.$direccion->telefono); ?>
  </label>
</div>
            <?php
        } ?>
         
         <?php
            
        if(!is_null($direcciones)){

            ?>
    <div class="botones">
        <input type="submit" name="commit" value="Realizar pedido">
    </div>
</div>
<?php } ?>
         <br><br>
         <h5>Añadir nueva dirección</h5>
         <div class="panel panel-default panel-crear">
              <!-- Default panel contents -->
              <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <?php echo($username);?></div>
              <span class="error" style="color:red;display:none">Campos obligatorios</span>
              <div class="panel-body">
                <div class="container">
                    <div class="row">
                        <i class="glyphicon glyphicon-map-marker"></i> <input type="text" placeholder="Dirección..." class="form-control" id="nueva-direccion">
                    </div>
                    <div class="row">
                        <input type="text" placeholder="Población..." class="form-control" id="nueva-poblacion">
                        <input type="text" placeholder="Provincia..." class="form-control" id="nueva-provincia">
                        <input placeholder="Código postal..." class="form-control" id="nuevo-codpostal" type="number" min="0" step="any">
                    </div>
                    <div class="row">
                        <input type="text" placeholder="País..." class="form-control" id="nuevo-pais">
                    </div>
                    <div class="row">
                        <i class="glyphicon glyphicon-earphone"></i><input type="number" min="0" step="any" placeholder="Teléfono..." class="form-control" id="nuevo-telefono">
                    </div>
                    <div class="row">
                        <button class="btn btn-warning btn-crear">Guardar</button><button class="btn btn-anadir">Cancelar</button>
                    </div>
                </div>
              </div>
        </div>
    </div>
    
    
    
    <?php }
        
        else{
                  echo('<br><div class="alert alert-warning" role="alert"> <strong></strong> Debes logearte para continuar la compra. </div>');
        }} ?>
    
    
    
    
    </form>
    </main>
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
.container {
    max-width: 98% !important;
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
<script>
    $(document).ready(function () {
    
 $(".btn-crear").click(function(e) {
        e.preventDefault();
        var valores_post = [];
        $(".error").hide(); //escondemos errores
        var inputs = $(".panel-crear").find(":input"); //limpiamos
        for(var i = 0; i< inputs.length;i++) {
            if(inputs[i].value=="" && inputs[i].nodeName!="BUTTON")
            {
                //error
                $(".panel-crear").find(".error")[0].style.display="inline";
                return;
            }
            else if (inputs[i].nodeName!="BUTTON")
            {
            valores_post[i] = inputs[i].value;
            }
        }
        $.ajax({
        url : '/iw/cliente/<?php echo $idusuario;?>/direcciones/crear',
        type : 'POST',
        data : {datos:valores_post},
        success:function (data) {
            location.reload();
        }
         });

    })
    });
</script>


