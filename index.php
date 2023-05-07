<?php
	session_start();

	if( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}
	require 'functions1.php';
	$mahasiswa = query("SELECT * FROM tbl_mahasiswa");
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR MAHASISWA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-6.4/css/all.css">
	<style>
      .nav-link:hover{
        background-color: #A4D0A4;
}

      .display-4{
          font-weight: bold;
      }

      .card-body-icon{
        position: absolute;
        z-index:0;
        top:65px;
        right:10px;
        opacity: 0.4;
        font-size:100px;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
  <a class="navbar-brand" href="#"><b>SAINDATIKA</b> | EEPIS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Daftar Mahasiswa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Daftar Tugas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Jadwal Kuliah</a>
      </li>
    </ul>
    <form class="form-inline ml-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
    </form>
      <div class="icon ml-4">
        <h5>
        <i class="fas fa-envelope mr-3" data-toggle="tooltip" title="Surat Masuk"></i>
        <i class="fas fa-bell mr-3" data-toggle="tooltip" title="Notifikasi"></i>
        <a href="logout.php">
        <i class="fas fa-arrow-right-from-bracket mr-3 text-dark" data-toggle="tooltip" title="Sign Out"></i>
        </a>
        </h5>
      </div>
  </div>
</nav>

    <div class="max-auto" style="margin-top: 50px; margin-bottom: 50px; margin-left: 50px; margin-right: 50px">
    <h1 class="text-center mt-3">Daftar Mahasiswa</h1>
	<br>
    <a class="btn btn-success" href="tambah1.php">TAMBAH MAHASISWA</a>
    <div class="text-center"><!DOCTYPE html>
	<br>
	<table id="table" class="table table-striped table-bordered table-hover table-warning" style="width:100%">
		<thead>
		<tr>
			<th>No</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Jurusan</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>No. Handphone</th>
			<th>Asal Sekolah</th>
			<th>Matkul Favorit</th>
			<th>Foto</th>
			<th>Opsi</th>
		</tr>
		</thead>
		<tbody>
		<?php 
		$no = 1;?>
		<?php foreach ($mahasiswa as $d):?> 
			<tr>
				<td><?= $no; ?>
				<td><?php echo $d['NRP']; ?></td>
				<td><?php echo $d['Nama']; ?></td>
                <td><?php echo $d['Jenis_Kelamin']; ?></td>
				<td><?php echo $d['Jurusan']; ?></td>
				<td><?php echo $d['Email']; ?></td>
				<td><?php echo $d['Alamat']; ?></td>
				<td><?php echo $d['No_Handphone']; ?></td>
				<td><?php echo $d['Asal_Sekolah']; ?></td>
				<td><?php echo $d['Matkul_Favorit']; ?></td>
				<td><img src="img/<?= $d['Gambar']; ?>" width="80px"></td>
				<td>
					<a class="btn btn-primary" href="edit_baru.php?id=<?php echo $d['No']; ?>">EDIT</a>
					<a class="btn btn-success mt-2" href="download.php?Gambar=<?php echo $d['Gambar']; ?>">DOWNLOAD</a>
					<a class="btn btn-danger mt-2" href="hapus.php?id=<?php echo $d['No']; ?>"onclick="return confirm('Apakah yakin ingin menghapus data tersebut?');">HAPUS</a>
				</td>
			</tr>
			<?php $no++; endforeach;?>
		</tbody>
	</table>
	<script>
		$(document).ready(function () {
    $('#table').DataTable();
});
	</script>
</body>
</html>