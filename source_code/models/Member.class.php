<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM member";
        return $this->execute($query);
    }

    function getmemberById($id)
    {
        // Query SQL untuk mengambil data member berdasarkan ID
        $query = "SELECT * FROM member WHERE member.member_id = $id";

        // Eksekusi query dan kembalikan hasilnya
        $this->execute($query);
        return $this->getResult();
    }

    function add($data)
    {
        $name = $data['member_name'];
        $email = $data['member_email'];
        $phone = $data['member_phone'];
        $join = $data['member_join'];
        $endjoin = $data['member_endjoin'];

        $query = "insert into member values ('', '$name', '$email', '$phone', '$join', '$endjoin')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM member WHERE member_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
    function edit($id, $data)
    {
        $name = mysqli_real_escape_string($this->db_link, $data['member_name']);
        $email = mysqli_real_escape_string($this->db_link, $data['member_email']);
        $phone = mysqli_real_escape_string($this->db_link, $data['member_phone']);
        $join = mysqli_real_escape_string($this->db_link, $data['member_join']);
        $endjoin = mysqli_real_escape_string($this->db_link, $data['member_endjoin']);

        $query = "UPDATE member SET member_name='$name', member_email='$email', member_phone='$phone', member_join='$join', member_endjoin='$endjoin'WHERE member_id='$id'";

        // Melakukan eksekusi query menggunakan fungsi execute
        return $this->execute($query);
    }

}


