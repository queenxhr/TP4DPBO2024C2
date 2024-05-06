<?php
    class ProdukView {
        public function render($data){
            $no = 1;
            $dataProduk = null;
            $title ='Data Product';
            $addData = '
        <div class="col-1 my-3">
        <a
          href="produk.php?tambah"
          type="button"
          class="btn btn-primary nav-link active"
          >Add New</a
        >
      </div>';
            $header  ='
            <th>ID</th>
            <th>NAME</th>
            <th>ACTIONS</th>';
            foreach($data as $val){
              list($id, $name,) = $val;
              $dataProduk .= "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $name . "</td>
                        
                        <td>
                          <a href='produk.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
                          <a href='produk.php?id_hapus=" . $id . "' class='btn btn-danger''>Delete</a>
                          </td>
                        </tr>";
              
            }
            $view = new Template("templates/skintabel.html");
            $view->replace("DATA_TABEL", $dataProduk);
            $view->replace("HEADER_TABEL", $header);
            $view->replace("ADD_DATA", $addData);
            $view->replace("TITLE", $title);
            $view->write();

        }

        public function add_data(){
          $operasi = 'Create';
            $title ='Product';
            
            $form  ='
            <form
            action="produk.php"
            method="post">
     
            <br><br><div class="card">
            
            <div class="card-header bg-primary">
            <h1 class="text-white text-center">  Create New Product </h1>
            </div><br>
    
            <label> PRODUCT NAME: </label>
            <input type="text" name="produk_name" class="form-control"> <br>

            <button class="btn btn-success" type="submit" name="tambah"> Submit </button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
    
            </div>
            </form>';
    
          
            $view = new Template("templates/skinform.html");
            $view->replace("FORM", $form);
            $view->replace("TITLE", $title);
            $view->replace("OPERASI", $operasi);
            $view->write();
    
        }

        public function edit_data($data)
  {
    $operasi = 'Update';
    $title = 'Product';

    $form = '
    <form
    action="produk.php"
    method="post">
    <br><br><div class="card">
    <div class="card-header bg-primary">
    <h1 class="text-white text-center">Update Product</h1>
    </div><br>
    <input type="hidden" name="id_edit" value="' . $data['produk']['produk_id'] . '" class="form-control"> <br>
    
    <label> PRODUCT NAME: </label>
    <input type="text" name="produk_name" value="' . $data['produk']['produk_name'] . '"class="form-control"> <br>

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