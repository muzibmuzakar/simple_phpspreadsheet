<?php

include("koneksi.php");

if(isset($_POST['simpan'])){

    $id = $_POST['id'];
    $nama_merk = $_POST['nama_merk'];
    $warna = $_POST['warna'];
    $jumlah = $_POST['jumlah'];

    $sql = "INSERT INTO printer ( id, nama_merk, warna, jumlah) VALUE ('$id', '$nama_merk', '$warna', '$jumlah')";
    $query = mysqli_query($db, $sql);

    if( $query ) {
        header('Location: index.php?status=sukses');
    } else {
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>