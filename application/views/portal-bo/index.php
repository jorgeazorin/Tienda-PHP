<?php
  $this->load->view('inc/cabecera.php');
 ?>


<main>
  <h1><?php echo $titulo; ?></h1>

  <h3>Categorías de la web</h3>
  <a href='admin/categorias' class="btn btn-default" id="btn-categorias">Administrar categorías de los productos</a>

  <h3>Lista de tiendas</h3>


<?php
	  	if (!is_null($lista_tiendas)) {
		    foreach ($lista_tiendas as $tienda) {
		      ?> <div class="row">

		      	</div>
		        <?php
		    }
		}
	  ?>


<?php
if(!is_null($lista_tiendas)) {
?>
<table class="table table-striped"> 
	<caption>Lista de tiendas.</caption> 
	<thead> 
		<tr> 
			<th>ID</th> 
			<th>Localización</th>
			<th>Fecha apertura</th> 
			<th>Info contacto</th> 
		</tr> 
	</thead>
	<tbody>
		<?php 
		foreach ($lista_tiendas as $tienda) {
		?>
			<tr> 
				<th scope="row"><?php echo $tienda->id; ?></th> 
				<td><?php echo $tienda->localizacion; ?></td> 
				<td><?php echo $tienda->fechaapertura; ?></td> 
				<td><?php echo $tienda->infocontacto; ?></td> 
			</tr> 
		<?php
		}
		?> 
	</tbody> 
</table>

<?php
}
else
{
	?><p>Parece que no tienes ninguna tienda registrada...</p>
<?php
}
?>


</main>
