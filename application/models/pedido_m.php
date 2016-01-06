<?php
class Pedido_m extends CI_Model{
    
    
    function getPedidosCliente($id){
      $query = $this->db->query("SELECT `id`, `estado`, `total`, `fecha`, `direnvioId`, `clienteId` FROM `pedido` WHERE `clienteId` = ".$id);
      return $query->result();
  }
    
    function realizarPedidoCliente( $cesta, $cliente){
        if($cesta) {  
            $query = $this->db->query(" INSERT INTO `pedido` (`id`, `estado`,`fecha`,  `clienteId`) VALUES (NULL, 'Sin procesar',CURRENT_DATE,   '.$cliente.');");
            $pedidoId= $this->db->insert_id();
            foreach ($cesta as $row){
                $query = $this->db->query("INSERT INTO `linpedido` (`id`, `cantidad`, `precio`, `pedidoId`, `valoracion`, `mensaje`, `productoId`) VALUES (NULL, '".$row["cantidad"]."', '".$row["precio"]."', '".$pedidoId."', '', '', '".$row["id"]."');");
            }
        }
    }
    function getlinped($pedidoId){
        $query = $this->db->query("SELECT `id`, `cantidad`, `precio`, `pedidoId`, `valoracion`, `mensaje`, `productoId` FROM `linpedido` WHERE `pedidoId`= ".$pedidoId);
      return $query->result();
    }
  }

