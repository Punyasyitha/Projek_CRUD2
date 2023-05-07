<?php
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require 'functions1.php';

if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>INPUT MAHASISWA</title>
	<style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
	  body{
   		background-color: #F97B22;
	  }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
	  a {
            display: inline-block;
            padding: 8px 16px;
            color: black;
            text-decoration: none;
            font-family:Georgia, 'Times New Roman', Times, serif;
            font-size: 20px;
            background-color: #FFBF9B;
            border: 1px solid #245953;
            border-radius: 4px;
            margin: 16px 0;
	  }
    button {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
	a:hover {
        background-color: #FFF9DE;
        color: #FFBF9B;
    }
    </style>
</head>
<body>
	<h2 style="text-align: center;">TAMBAH DATA MAHASISWA</h2>
		<a href="index.php"><b>KEMBALI</b></a>
		<br/>
	<br/>
	<form method="post" action=" " enctype="multipart/form-data">
		<section class="base">
		<div>
          <label>NRP</label>
          <input type="text" name="NRP" autofocus="" required="" />
        </div>
        <div>
          <label>Nama</label>
         <input type="text" name="Nama" />
        </div>
        <div>
          <label>Jenis Kelamin</label>
         <input type="text" name="Jenis_Kelamin" required="" />
        </div>
        <div>
          <label>Jurusan</label>
         <input type="text" name="Jurusan" required="" />
        </div>
		<div>
          <label>Email</label>
         <input type="text" name="Email" required="" />
        </div>
		<div>
          <label>Alamat</label>
         <input type="text" name="Alamat" required="" />
        </div>
		<div>
          <label>No.Handphone</label>
         <input type="text" name="No_Handphone" required="" />
        </div>
		<div>
          <label>Asal Sekolah</label>
         <input type="text" name="Asal_Sekolah" required="" />
        </div>
		<div>
          <label>Matkul Favorit</label>
         <input type="text" name="Matkul_Favorit" required="" />
        </div>
        <div>
          <label>Foto</label>
         <input type="file" name="Gambar" required="" />
        </div>
        <div>
         <button type="submit" name="submit">SUBMIT</button>
        </div>
        </section>
	</form>

</body>
</html>
		