<?php
include_once ("models/Template.class.php");
include_once ("models/DB.class.php");
include_once ("controllers/Transaksi.controller.php");

$transaksi = new TransaksiController();

if (isset($_GET['tambah'])) {
    //memanggil add
    $transaksi->add();
} else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $transaksi->delete($id);
} else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $transaksi->edit($id);
} else if (isset($_POST['tambah'])) {
    $transaksi->tambah($_POST);
} else if (isset($_POST['update'])) {
    $id = $_POST['id_edit'];
    $transaksi->update($id, $_POST);
} else {
    $transaksi->index();
}


