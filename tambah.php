<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 13</title>
</head>
<body>
    <form action="simpan.php" method="POST">

        <div>
            <label for="id">No: </label>
            <input type="text" name="id" placeholder="nomor" />
        </div>

        <div>
            <label for="nama_merk">Nama Merek: </label>
            <input type="text" name="nama_merk" placeholder="nama merek" />
        </div>

        <div>
            <label for="warna">Warna: </label>
            <input type="text" name="warna" placeholder="warna" />
        </div>

        <div>
            <label for="jenis_kelamin">Jumlah: </label>
            <input type="text" name="jumlah" placeholder="jumlah" />
        </div>

        <input type="submit" value="Simpan" name="simpan" />
    </form>
    <a href="tambah.php"><button>Ulangi</button></a><br>
    <a href="index.php"><button>Kembali</button></a>
</body>
</html>