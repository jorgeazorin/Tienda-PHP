<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function index($tiendaid)
	{

   // $this->load->model("Categoria_m",'', TRUE);
    $data['titulo']="Listado de de productos de la tienda ";
    $data['tiendaid']=$tiendaid;

    $this->load->model("Producto_m",'', TRUE);


    $lista_productos = $this->Producto_m->getProductosTienda($tiendaid);
    $data['lista']=$lista_productos;


    $this->load->model("Categoria_m",'', TRUE);
    $lista_categorias = $this->Categoria_m->getCategorias() ;
    $data['lista_categorias']=$lista_categorias;

    //error_log(print_r($variable, TRUE)); 

    $this->load->model("Subcategoria_m",'', TRUE);
    $lista_subcategorias = array();
    $lista_kaka;

    for($i=0;$i<count($lista_categorias);++$i) //para cada categoria
    {
      $idcat = $lista_categorias[$i]->id;
      $subcats = $this->Subcategoria_m->getSubcategorias($idcat); //obtenemos las subcategorias de esa categoria

      for($j=0;$j<count($subcats);++$j) //para cada subcategoria
      {
        $subcatid = $subcats[$j]->id;
        $prods_subcat = array();
        for($k=0;$k<count($lista_productos);++$k)
        {
          $producto = $lista_productos[$k];
          if($producto->subcategoriaId== $subcatid) //si ese producto pertenece a esa subcategoria
          {
            array_push($prods_subcat,$producto); //lo guardamos en su array de products de subcat
          }
        }

        $subcats[$j]->productos = $prods_subcat;


      }


      //$lista_subcategorias["" . $idcat] = $subcats;
      $lista_subcategorias[$i] = $lista_categorias[$i];
      $lista_subcategorias[$i]->subcategorias = $subcats;
    }

    $data['lista_subcategorias']=$lista_subcategorias;

		$this->load->view('portal-bo/productos/index', $data);

	}
public function nuevo($idtienda)
  {
    $this->load->model("Producto_m",'', TRUE);
    $datos = $_POST['datos'];

    $this->Producto_m->crear($datos,$idtienda);
  }

/*
  public function borrar($idcat)
  {
    $this->load->model("Categoria_m",'', TRUE);
    $this->Categoria_m->borrar($idcat);
  }

  public function editar($idcat)
  {
    $this->load->model("Categoria_m",'', TRUE);
    $nombre = $_POST['nuevonombre'];
    $this->Categoria_m->actualizar($idcat,$nombre);
  }
*/
}
