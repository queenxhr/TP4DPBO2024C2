<?php
class MemberView
{
  public function render($data)
  {
    $no = 1;
    $dataMember = null;
    $title = 'Data Member';
    $addData = '
              <div class="col-1 my-3">
              <a
                href="member.php?tambah"
                type="button"
                class="btn btn-primary nav-link active"
                >Add New</a
              >
            </div>';
    $header = '
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>JOIN DATE</th>
            <th>END DATE</th>

            <th>ACTIONS</th>';
    foreach ($data as $val) {
      list($id, $name, $email, $phone, $join, $endjoin) = $val;
      $dataMember .= "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $name . "</td>
                        <td>" . $email . "</td>
                        <td>" . $phone . "</td>
                        <td>" . $join . "</td>
                        <td>" . $endjoin . "</td>
                        <td>
                          <a href='member.php?id_edit=" . $id . "' class='btn btn-warning''>Edit</a>
                          <a href='member.php?id_hapus=" . $id . "' class='btn btn-danger''>Delete</a>
                          </td>
                        ";
      $dataMember .= "</tr>";

    }

    $view = new Template("templates/skintabel.html");
    $view->replace("DATA_TABEL", $dataMember);
    $view->replace("HEADER_TABEL", $header);
    $view->replace("ADD_DATA", $addData);
    $view->replace("TITLE", $title);
    $view->write();

  }

  public function add_data()
  {
    $operasi = 'Create';
    $title = 'Member';

    $form = '
            <form action="member.php"
            method="post">
     
            <br><br><div class="card">
            
            <div class="card-header bg-primary">
            <h1 class="text-white text-center">  Create New Member </h1>
            </div><br>
    
            <label> NAME: </label>
            <input type="text" name="member_name" class="form-control"> <br>
    
            <label> EMAIL: </label>
            <input type="text" name="member_email" class="form-control"> <br>

            <label> PHONE: </label>
            <input type="text" name="member_phone" class="form-control"> <br>
            
            <label> JOIN DATE: </label>
            <input type="date" name="member_join" class="form-control"> <br>

            <label> END DATE: </label>
            <input type="date" name="member_endjoin" class="form-control"> <br>

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
    $title = 'Member';

    $form = '
    <form
    action="member.php"
    method="post">
    <br><br><div class="card">
    <div class="card-header bg-primary">
    <h1 class="text-white text-center">Update Member</h1>
    </div><br>
    <input type="hidden" name="id_edit" value="' . $data['member']['member_id'] . '" class="form-control"> <br>
    
    <label> NAME: </label>
    <input type="text" name="member_name" value="' . $data['member']['member_name'] . '"class="form-control"> <br>
    
    <label> EMAIL: </label>
    <input type="text" name="member_email" value="' . $data['member']['member_email'] . '"class="form-control"> <br>

    <label> PHONE: </label>
    <input type="text" name="member_phone" value="' . $data['member']['member_phone'] . '"class="form-control"> <br>
            
    <label> JOIN DATE: </label>
    <input type="date" name="member_join" value="' . $data['member']['member_join'] . '"class="form-control"> <br>

    <label> END DATE: </label>
    <input type="date" name="member_endjoin" value="' . $data['member']['member_endjoin'] . '"class="form-control"> <br>

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