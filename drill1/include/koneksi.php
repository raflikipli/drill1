<?php
    $conn=mysqli_connect("localhost", "root", "", "drill1" );
    if (!$conn){
        die('koneksi gagal'.mysqli_connect_error());
    }
?>