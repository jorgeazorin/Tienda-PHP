<?php
   $this->load->view('inc/cabecera.php');
  // $this->load->view('inc/categorias');
?>

<main>
    <h3><?php echo($username);echo("  -  "); echo($email); ?></h3>
    <div class="pedidos">
        <br><br>
        <h4>Pedidos del cliente</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>estado</th>
                    <th>total</th>
                    <th>fecha</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total=0;
                foreach($pedidos as $pedido){ ?>
                <tr>
                    <td><?php echo($pedido->estado); ?></td>
                    <td><?php echo($pedido->total); ?></td>
                    <td><?php echo($pedido->fecha); ?></td>
                    <td><a href="/iw/index.php/pedido/verpedido/<?php echo($pedido->id); ?>">Ver</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="direcciones">
         <br><br>
        <h4>Direcciones de entrega</h4>
        <a href="#" class="btn-anadir">Añadir otra dirección</a><br>

        <div class="panel panel-default panel-crear" style="display:none">
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

        <?php
        if(!is_null($direcciones))
        foreach($direcciones as $direccion){

            ?>

            <div class="panel panel-default panel-editar">
              <!-- Default panel contents -->
              <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <?php echo($username);?></div>
              <span class="error" style="color:red;display:none">Campos obligatorios</span>
              <div class="panel-body">
                <div class="container">
                    <div class="row">
                        <i class="glyphicon glyphicon-map-marker"></i> 
                        <label><?php echo $direccion->direccion; ?></label>
                        <input placeholder="Dirección..." class="form-control" type="text" style="display:none"/>
                    </div>
                    <div class="row">
                        <label><?php echo $direccion->poblacion; ?></label>
                        <input placeholder="Población..." class="form-control" type="text" style="display:none" />
                        <label><?php echo $direccion->provincia; ?></label>
                        <input placeholder="Provincia..." class="form-control" type="text" style="display:none"/>
                        <label><?php echo $direccion->codpostal; ?></label>
                        <input placeholder="Código postal..." class="form-control" type="number" min="0" step="any" style="display:none"/>
                    </div>
                    <div class="row">
                        <label><?php echo $direccion->pais; ?></label>
                        <input placeholder="País..." class="form-control" type="text" style="display:none"/>
                    </div>
                    <div class="row">
                        <i class="glyphicon glyphicon-earphone"></i>
                        <label><?php echo $direccion->telefono; ?></label>
                        <input placeholder="Teléfono..." class="form-control" type="number" min="0" step="any" style="display:none"/>
                    </div>
                    <div class="row">
                        <button data-idenvio="<?php echo $direccion->id; ?>" class="btn btn-warning btn-guardarcambios" style="display:none">Guardar</button>
                        <button type="button" class="btn btn-link btn-editar">Modificar</button>|
                        <button type="button" data-idborrar="<?php echo $direccion->id; ?>" class="btn btn-link btn-borrar">Eliminar</button>
                    </div>
                </div>
              </div>
            </div>

            <?php
        } ?>

    </div>

</main>

<script>

$(document).ready(function () {

    $('.btn-borrar').click(function () {
        var id = $(this).attr("data-idborrar");
        console.log(id);
        $.ajax({
            url : 'cliente/direcciones/' + id + '/borrar',
            type : 'delete',
            success:function (data) {
                location.reload();
            }
        });
    });

    $('.btn-editar').click(function() {
        var labels = $(".panel-editar").find("label");
        var inputs = $(".panel-editar").find(":input");
        if( labels.is(":visible"))
        {
            inputs.show();
            labels.hide();
            for(var i=0;i<labels.length;i++) 
            {
                inputs[i].value = labels[i].innerHTML;
            }
        }
        else
        {
            inputs.hide();
            labels.show();
        }
        $(".btn-borrar").show();
        $(".btn-editar").show();

    })

    $(".btn-guardarcambios").click(function() {
        var valores_post = [];
        var inputs = $(".panel-editar").find(":input");
        for(var i = 0; i<inputs.length;i++) {
            if(inputs[i].value=="" && inputs[i].nodeName!="BUTTON")
            {
                //error
                $(".panel-editar").find(".error")[0].style.display="inline";
                return;
            }
            else if (inputs[i].nodeName!="BUTTON")
            {
            valores_post[i] = inputs[i].value;
            }
        }

        var idenvio = $(this).attr("data-idenvio");

        $.ajax({
            url : 'cliente/<?php echo $idusuario;?>/direcciones/' + idenvio + '/modificar',
            type : 'POST',
            data : {datos:valores_post},
            success:function (data) {
                location.reload();
            }
        });
    });

    $(".btn-crear").click(function() {
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
        url : 'cliente/<?php echo $idusuario;?>/direcciones/crear',
        type : 'POST',
        data : {datos:valores_post},
        success:function (data) {
            location.reload();
        }
         });

    })

    $('.btn-anadir').click(function() {
        if($(".panel-crear").is(":visible"))
        {
            $(".panel-crear").hide();
            $(".panel-crear").find(":input").val(""); //limpiamos
        }
        else
            $(".panel-crear").show();
    })





});
</script>