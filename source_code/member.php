<?php
include_once ("models/Template.class.php");
include_once ("models/DB.class.php");
include_once ("controllers/Member.controller.php");

$member = new MemberController();

if (isset($_GET['tambah'])) {
    //memanggil add
    $member->add();
} else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $member->delete($id);
} else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $member->edit($id);
} else if (isset($_POST['tambah'])) {
    $member->tambah($_POST);
} else if (isset($_POST['update'])) {
    $id = $_POST['id_edit'];
    $member->update($id, $_POST);
} else {
    $member->index();
}


