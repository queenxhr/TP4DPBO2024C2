<?php

class Produk extends DB
{
    function getProduk()
    {
        $query = "SELECT * FROM produk";
        return $this->execute($query);
    }

    function getprodukById($id)
    {
        // Query SQL untuk mengambil data produk berdasarkan ID
        $query = "SELECT * FROM produk WHERE produk.produk_id = $id";

        // Eksekusi query dan kembalikan hasilnya
        $this->execute($query);
        return $this->getResult();
    }

    function add($data)
    {
        $name = $data['produk_name'];

        $query = "insert into produk values ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM produk WHERE produk_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
    
    function edit($id, $data)
    {
        $name = mysqli_real_escape_string($this->db_link, $data['produk_name']);

        $query = "UPDATE produk SET produk_name='$name' WHERE produk_id='$id'";
        
        // Melakukan eksekusi query menggunakan fungsi execute
        return $this->execute($query);
    }
}
