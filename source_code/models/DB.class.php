<?php

class DB
{
    var $db_host = "";
    var $db_user = "";
    var $db_pass = "";
    var $db_name = "";
    var $db_link = "";
    var $result = 0;

    function __construct($db_host, $db_user, $db_pass, $db_name)
    {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }

    function open()
    {
        $this->db_link = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    }

    function execute($query)
    {
        $this->result = mysqli_query($this->db_link, $query);
        return $this->result;
    }
    function executeAffected($query = "")
    {
        // mengeksekusi query
        mysqli_query($this->db_link, $query);
        return mysqli_affected_rows($this->db_link);
    }
    function getResult()
    {
        return mysqli_fetch_array($this->result);
    }

    //method untuk execute array member dan produk di dropdown form
    function executeKhusus($query) {
        $result = mysqli_query($this->db_link, $query);
        if (!$result) {
            // Jika eksekusi query gagal, tangani kesalahan di sini
            die("Query execution failed: " . mysqli_error($this->db_link));
        }
        return $result;
    }

    function close()
    {
        mysqli_close($this->db_link);
    }
}

?>