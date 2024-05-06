<?php
include_once ("conf.php");
include_once ("models/Transaksi.class.php");
include_once ("models/Member.class.php");
include_once ("models/Produk.class.php");
include_once ("views/Transaksi.view.php");

class TransaksiController
{
  private $transaksi;
  private $member;
  private $produk;

  function __construct()
  {
    $this->transaksi = new Transaksi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->produk = new Produk(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index()
  {
    $this->transaksi->open();
    $this->member->open();
    $this->produk->open();

    $this->transaksi->getTransaksiJoin();
    $this->member->getMember();
    $this->produk->getProduk();

    $data = array(
      'transaksi' => array(),
      'member' => array(),
      'produk' => array()
    );

    while ($row = $this->transaksi->getResult()) {

      array_push($data['transaksi'], $row);
    }
    while ($row = $this->member->getResult()) {
      array_push($data['member'], $row);
    }
    while ($row = $this->produk->getResult()) {
      array_push($data['produk'], $row);
    }
    $this->transaksi->close();
    $this->member->close();
    $this->produk->close();

    $view = new TransaksiView();
    $view->render($data);
  }


  function tambah($data)
  {
    $this->transaksi->open();
    $this->transaksi->add($data);
    $this->transaksi->close();

    header("location:index.php");
  }

  function add()
  {

    $this->member->open();
    $this->produk->open();

    $this->member->getMember();
    $this->produk->getProduk();

    $data = array(
      'member' => array(),
      'produk' => array()
    );

    while ($row = $this->member->getResult()) {
      array_push($data['member'], $row);
    }
    while ($row = $this->produk->getResult()) {
      array_push($data['produk'], $row);
    }
    $this->member->close();
    $this->produk->close();

    $view = new TransaksiView();
    $view->add_data($data);
  }

  function update($id, $data)
  {
    $this->transaksi->open();
    $this->transaksi->edit($id, $data);
    $this->transaksi->close();

    header("location:index.php");
  }

  function edit($id)
  {
    $this->transaksi->open();
    $this->member->open();
    $this->produk->open();

    $this->transaksi->gettransaksiById($id);
    $this->member->getMember();
    $this->produk->getProduk();

    $data = array(
      'transaksi' => $this->transaksi->gettransaksiById($id), // Inisialisasi nilai transaksi_date
      'member' => array(),
      'produk' => array()
    );

    // Mendapatkan nama member dari hasil query
    while ($row = $this->member->getResult()) {
      $data['member'][$row['member_id']] = $row['member_name'];
    }

    // Mendapatkan nama produk dari hasil query
    while ($row = $this->produk->getResult()) {
      $data['produk'][$row['produk_id']] = $row['produk_name'];
    }

    $this->transaksi->close();
    $this->member->close();
    $this->produk->close();

    $view = new TransaksiView();
    $view->edit_data($data);
  }


  function delete($id)
  {
    $this->transaksi->open();
    $this->transaksi->delete($id);
    $this->transaksi->close();

    header("location:index.php");
  }

}