<?php
include_once("conf.php");
include_once("models/Produk.class.php");
include_once("views/Produk.view.php");

class ProdukController {
  private $produk;

  function __construct(){
    $this->produk = new Produk(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->produk->open();
    $this->produk->getproduk();
    $data = array();
    while($row = $this->produk->getResult()){
      array_push($data, $row);
    }

    $this->produk->close();

    $view = new ProdukView();
    $view->render($data);
  }

  
  function tambah($data){
    $this->produk->open();
    $this->produk->add($data);
    $this->produk->close();
    
    header("location:produk.php");
  }
  
  function add(){
    
    $this->produk->open();
    $this->produk->close();

    $view = new ProdukView();
    $view->add_data();
  }

  function update($id, $data)
{
    $this->produk->open();
    $this->produk->edit($id, $data);
    $this->produk->close();

    header("location:produk.php");
}

function edit($id){
  $this->produk->open();

  $this->produk->getprodukById($id);
  
  $data = array(
    'produk' => $this->produk->getprodukById($id) // Inisialisasi nilai transaksi_date
  );

  $this->produk->close();

  $view = new ProdukView();
  $view->edit_data($data);
}

  function delete($id){
    $this->produk->open();
    $this->produk->delete($id);
    $this->produk->close();
    
    header("location:produk.php");
  }


}