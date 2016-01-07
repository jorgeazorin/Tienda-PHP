<?php
class Catalogo_m extends CI_Model{
    function get_all(){
      $query = $this->db->query('SELECT `id`, `nombre`, `especificaciones`, `descripcion`, `precio`, `tiendaId`, `subcategoriaId`, `precio_sin_descuento` FROM `producto`');
      return $query->result();
    }
    
    function get_producto($id){
      $query = $this->db->query('SELECT `id`, `nombre`, `especificaciones`, `descripcion`, `precio`, `tiendaId`, `subcategoriaId`, `precio_sin_descuento` FROM `producto` WHERE `id` = '. $id);
      return $query->result();
  }
    
    function get_catalogo_tienda($id){
      $query = $this->db->query('SELECT `id`, `nombre`, `especificaciones`, `descripcion`, `precio`, `tiendaId`, `subcategoriaId`, `precio_sin_descuento` FROM `producto` WHERE `tiendaId` = '.$id);
      return $query->result();
    }
    
    function get_producto_comentarios($id){
      $query = $this->db->query('
      SELECT `mensaje`, `productoId`, `userName`, `pedido`.`fecha` FROM `linpedido`, `cliente`, `pedido` 
      WHERE `productoId`='.$id.' AND `cliente`.`id`=`pedido`.`clienteId` AND `pedido`.`id`=`linpedido`.`pedidoId`');
      return $query->result();
    }
    
    
  /*  $this->db->count_all("agenda");
    return $this->db->get("agenda")->result();*/
  }

?>
