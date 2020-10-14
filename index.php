<?php include ("koneksi.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 13</title>
</head>
<body>
<nav>
        <a href="tambah.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Merek</th>
            <th>Warna</th>
            <th>Jumlah</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM printer";
        $query = mysqli_query($db, $sql);

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$siswa['id']."</td>";
            echo "<td>".$siswa['nama_merk']."</td>";
            echo "<td>".$siswa['warna']."</td>";
            echo "<td>".$siswa['jumlah']."</td>";

            echo "<td>";
            echo "<a href='edit.php?id=".$siswa['id']."'>Edit</a> | ";
            echo "<a href='hapus.php?id=".$siswa['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>
    <br>
	<a href="report.php">+ Download Excel</a><br>
    <hr>

    <!-- search -->
	<form>
			<label>Cari :</label>
			<input type="text" name="cari">
			<input type="submit" value="Cari">
		</form>

		<?php


		if(isset($_GET['cari'])){
			$cari = $_GET['cari'];
			echo "<b>Hasil pencarian : " . $cari . "</b>";
		}
		?>

		<table border="1">
		<tr>
			<th>No</th>
			<th>Nama Merek</th>
			<th>Warna</th>
			<th>jumlah</th>
		</tr>
		<?php 
		if(isset($_GET['cari'])){
			$cari = $_GET['cari'];
			$data = mysqli_query($db,"select * from printer where jumlah like '%".$cari."%'");				
		}else{
			$data = mysqli_query($db,"select * from printer");		
		}

		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $d['id'] ?></td>
			<td><?php echo $d['nama_merk']; ?></td>
			<td><?php echo $d['warna']; ?></td>
			<td><?php echo $d['jumlah']; ?></td>
		</tr>
		<?php } ?>
	</table>
	<br>
    <br>
    <hr>

    <!-- min max -->
	<form>
			<label>Jumlah Min :</label>
			<input type="text" name="min"><br>
			<label>Jumlah Max :</label>
			<input type="text" name="max">
			<input type="submit" name="cari" value="Cari">
		</form>

		<?php


		if(isset($_GET['min'] , $_GET['max'])){
			$min = $_GET['min'];
			$max = $_GET['max'];
			echo "<b>Hasil pencarian : " . $min . "-" . $max . "</b>";
		}
		?>

		<table border="1">
		<tr>
			<th>No</th>
			<th>Nama Merek</th>
			<th>Warna</th>
			<th>jumlah</th>
		</tr>
		<?php 
		if(isset($_GET['min'] , $_GET['max'])){
			$min = $_GET['min'];
			$max = $_GET['max'];
			$query = "SELECT * FROM printer WHERE jumlah BETWEEN '$min' AND '$max'";
			$data = mysqli_query($db,$query);				
		}else{
			$data = mysqli_query($db,"select * from printer");		
		}

		while($da = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $da['id'] ?></td>
			<td><?php echo $da['nama_merk']; ?></td>
			<td><?php echo $da['warna']; ?></td>
			<td><?php echo $da['jumlah']; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>