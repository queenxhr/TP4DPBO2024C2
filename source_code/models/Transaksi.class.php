<?php

class Transaksi extends DB
{
    function getTransaksiJoin()
    {
        // Query SQL untuk mengambil data transaksi dengan informasi member dan produk yang di-join
        $query = "SELECT
        transaksi.transaksi_id,
        member.member_name,
        produk.produk_name,
        transaksi.transaksi_date
        FROM transaksi JOIN member ON transaksi.member_id=member.member_id JOIN produk ON transaksi.produk_id=produk.produk_id
        ORDER BY transaksi.transaksi_id";

        // Eksekusi query dan kembalikan hasilnya
        return $this->execute($query);
    }

    function gettransaksiById($id)
    {
        // Query SQL untuk mengambil data transaksi berdasarkan ID dengan informasi member dan produk yang di-join
        $query = "SELECT
                *
            FROM transaksi 
            JOIN member ON transaksi.member_id=member.member_id 
            JOIN produk ON transaksi.produk_id=produk.produk_id
            WHERE transaksi.transaksi_id = $id";

        // Eksekusi query dan kembalikan hasilnya
        $this->execute($query);
        return $this->getResult();
    }


    function add($data)
    {
        $member_id = $data['member_id'];
        $produk_id = $data['produk_id'];
        $tdate = $data['transaksi_date'];

        $query = "insert into transaksi values ('', '$member_id', '$produk_id', '$tdate')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($id, $data)
    {
        // Mendapatkan nilai dari array asosiatif $data
        $member_id = mysqli_real_escape_string($this->db_link, $data['member_id']);
        $produk_id = mysqli_real_escape_string($this->db_link, $data['produk_id']);
        $tdate = mysqli_real_escape_string($this->db_link, $data['transaksi_date']);

        // Membuat query untuk melakukan update data
        $query = "UPDATE transaksi SET member_id='$member_id', produk_id='$produk_id', transaksi_date='$tdate' WHERE transaksi_id='$id'";

        // Melakukan eksekusi query menggunakan fungsi execute
        return $this->execute($query);
    }


    function delete($id)
    {

        $query = "delete FROM transaksi WHERE transaksi_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}


?>