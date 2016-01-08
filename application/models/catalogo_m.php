<?php
class Catalogo_m extends CI_Model{
    function get_all(){
      $query = $this->db->query("SELECT `producto`.`id`, `producto`.`nombre`, `especificaciones`, `descripcion`, `precio`, `tiendaId`, `subcategoriaId`, `precio_sin_descuento`, `subcategoria`.`nombre` AS 'catnombre' FROM `producto`, `subcategoria` WHERE `subcategoria`.`id` = `producto`.`subcategoriaId`");
      return $query->result();
    }
    
    function get_producto($id){
      $query = $this->db->query("SELECT `producto`.`id`, `producto`.`nombre`, `especificaciones`, `descripcion`, `precio`, `tiendaId`, `subcategoriaId`, `precio_sin_descuento`, `subcategoria`.`nombre` AS 'catnombre' FROM `producto`, `subcategoria` WHERE `subcategoria`.`id` = `producto`.`subcategoriaId` AND `producto`.`id` = ".$id);
      return $query->result();
  }
    
    function get_catalogo_tienda($id){
      $query = $this->db->query("SELECT `producto`.`id`, `producto`.`nombre`, `especificaciones`, `descripcion`, `precio`, `tiendaId`, `subcategoriaId`, `precio_sin_descuento`, `subcategoria`.`nombre` AS 'catnombre' FROM `producto`, `subcategoria` WHERE `subcategoria`.`id` = `producto`.`subcategoriaId` AND `tiendaId` = " .$id);
      return $query->result();
    }
    
    function get_producto_comentarios($id){
      $query = $this->db->query('
      SELECT `mensaje`, `productoId`, `userName`, `pedido`.`fecha` FROM `linpedido`, `cliente`, `pedido` 
      WHERE `productoId`='.$id.' AND `cliente`.`id`=`pedido`.`clienteId` AND `pedido`.`id`=`linpedido`.`pedidoId`');
      return $query->result();
    }
    
    function get_catalogo_categoria($id){
      $query = $this->db->query("SELECT `producto`.`id`, `producto`.`nombre`, `especificaciones`, `descripcion`, `precio`, `tiendaId`, `subcategoriaId`, `precio_sin_descuento`, `subcategoria`.`nombre` AS 'catnombre' FROM `producto`, `subcategoria` WHERE `subcategoria`.`id` = `producto`.`subcategoriaId` AND `subcategoriaId` = " .$id);
      return $query->result();
    }
    function get_subcategorias(){
      $query = $this->db->query("SELECT `id`, `nombre`, `categoriaId` FROM `subcategoria`" );
      return $query->result();
    }
    
    function get_subcategoriaId($id){
      $query = $this->db->query("SELECT `id`, `nombre`, `categoriaId` FROM `subcategoria` WHERE `id` =" .$id);
      return $query->result();
    }
    
    
    
  /*  $this->db->count_all("agenda");
    return $this->db->get("agenda")->result();*/
  }

?>
