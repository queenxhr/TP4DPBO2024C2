<?php
class TransaksiView
{
  public function render($data)
  {
    $no = 1;
    $dataTransaksi = null;
    $title = 'Data Transaction';
    $addData = '
        <div class="col-1 my-3">
        <a
          href="index.php?tambah"
          type="button"
          class="btn btn-primary nav-link active"
          >Add New</a
        >
      </div>';
    $header = '
        <th>ID</th>
        <th>MEMBER NAME</th>
        <th>PRODUCT NAME</th>
        <th>TRANSACTION DATE</th>
        <th>ACTIONS</th>';
    foreach ($data['transaksi'] as $val) {
      list($id, $member_id, $produk_id, $tdate) = $val;
      $dataTransaksi .= "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $member_id . "</td>
                        <td>" . $produk_id . "</td>
                        <td>" . $tdate . "</td>
                        <td>
                          <a href='index.php?id_edit=" . $id . "' class='btn btn-warning''>Edit</a>
                          <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger''>Delete</a>
                          </td>
                        ";
      $dataTransaksi .= "</tr>";

    }


    $view = new Template("templates/skintabel.html");
    $view->replace("DATA_TABEL", $dataTransaksi);
    $view->replace("HEADER_TABEL", $header);
    $view->replace("TITLE", $title);
    $view->replace("ADD_DATA", $addData);
    $view->write();

  }

  public function add_data($data)
  {
    $operasi = 'Create';
    $title = 'Transaction';

    $form = '
        <form 
        action="index.php"
        method="post">
 
        <br><br><div class="card">
        
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Create New Transaction </h1>
        </div><br>

        <label> MEMBER NAME: </label>
        <select name="member_id" class="form-control">
          DATA_MEMBER
        </select>

        <label> PRODUCT NAME: </label>
        <select name="produk_id" class="form-control">
          DATA_PRODUK
        </select>

        <label> TRANSACTION DATE: </label>
        <input type="date" name="transaksi_date" class="form-control"> <br>

        <button class="btn btn-success" type="submit" name="tambah"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

        </div>
        </form>';

    $optionsmember = '';
    foreach ($data['member'] as $member) {
      $optionsmember .= "<option value='{$member['member_id']}'>{$member['member_name']}</option>";
    }

    $optionsproduk = '';
    foreach ($data['produk'] as $produk) {
      $optionsproduk .= "<option value='{$produk['produk_id']}'>{$produk['produk_name']}</option>";
    }

    $view = new Template("templates/skinform.html");
    $view->replace("FORM", $form);
    $view->replace("TITLE", $title);
    $view->replace("OPERASI", $operasi);
    $view->replace('DATA_MEMBER', $optionsmember);
    $view->replace('DATA_PRODUK', $optionsproduk);
    $view->write();

  }

  public function edit_data($data)
{
    $operasi = 'Update';
    $title = 'Transaction';
    $optionsmember = ''; // Inisialisasi opsi dropdown anggota
    $optionsproduk = ''; // Inisialisasi opsi dropdown produk

    // Bangun opsi dropdown untuk anggota
    foreach($data['member'] as $id => $nama) {
        $selected = ($id == $data['transaksi']['member_id']) ? "selected" : ""; // Menandai anggota yang cocok sebagai terpilih
        $optionsmember .= "<option value='".$id."' ".$selected.">".$nama."</option>";
    }

    // Bangun opsi dropdown untuk produk
    foreach($data['produk'] as $id => $nama) {
        $selected = ($id == $data['transaksi']['produk_id']) ? "selected" : ""; // Menandai produk yang cocok sebagai terpilih
        $optionsproduk .= "<option value='".$id."' ".$selected.">".$nama."</option>";
    }

    $form = '
    <form
    action="index.php"
    method="post">
    <br><br><div class="card">
    <div class="card-header bg-primary">
    <h1 class="text-white text-center">Update Transaction</h1>
    </div><br>
    <input type="hidden" name="id_edit" value="' . $data['transaksi']['transaksi_id'] . '" class="form-control"> <br>
    <label>MEMBER NAME:</label>
    <select name="member_id" class="form-control">
    ' . $optionsmember . '
    </select>

    <label>PRODUCT NAME:</label>
    <select name="produk_id" class="form-control">
    ' . $optionsproduk . '
    </select>

    <label>TRANSACTION DATE:</label>
    <input type="date" name="transaksi_date" class="form-control" value="' . $data['transaksi']['transaksi_date'] . '"> <br>

    <button class="btn btn-success" type="submit" name="update">Submit</button><br>
    <a class="btn btn-info" type="submit" name="cancel" href="index.php">Cancel</a><br>

    </div>
    </form>';

    $view = new Template("templates/skinform.html");
    $view->replace("FORM", $form);
    $view->replace("TITLE", $title);
    $view->replace("OPERASI", $operasi);
    $view->write();
}




}