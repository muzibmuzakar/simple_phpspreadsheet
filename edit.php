<?php

include("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: index.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM printer WHERE id=$id";
$query = mysqli_query($db, $sql);
$printer = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 13</title>
</head>
<body>
    <form action="simpan-edit.php" method="POST">

        <div>
            <label for="id">No: </label>
            <input type="text" name="id" placeholder="nomor" value="<?php echo $printer['id'] ?>"/>
        </div>

        <div>
            <label for="nama_merk">Nama Merek: </label>
            <input type="text" name="nama_merk" placeholder="nama merek" value="<?php echo $printer['nama_merk'] ?>"/>
        </div>

        <div>
            <label for="warna">Warna: </label>
            <input type="text" name="warna" placeholder="warna" value="<?php echo $printer['warna'] ?>" />
        </div>

        <div>
            <label for="jenis_kelamin">Jumlah: </label>
            <input type="text" name="jumlah" placeholder="jumlah" value="<?php echo $printer['jumlah'] ?>" />
        </div>

        <input type="submit" value="Simpan" name="simpan" />
    </form>
    <a href="index.php"><button>Kembali</button></a>
</body>
</html>