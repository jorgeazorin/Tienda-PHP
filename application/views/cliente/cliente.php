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
</main>