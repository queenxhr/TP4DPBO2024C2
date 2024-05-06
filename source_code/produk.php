<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Produk.controller.php");

$produk = new ProdukController();

if (isset($_GET['tambah'])) {
    //memanggil add
    $produk->add();
} else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $produk->delete($id);
} else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $produk->edit($id);
} else if (isset($_POST['tambah'])) {
    $produk->tambah($_POST);
} else if (isset($_POST['update'])) {
    $id = $_POST['id_edit'];
    $produk->update($id, $_POST);
} else {
    $produk->index();
}