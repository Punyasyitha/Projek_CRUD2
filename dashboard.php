<?php
	session_start();

	if( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}
  ?>
  
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-6.4/css/all.css">
    <title>DASHBOARD</title>
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

  <div class="container">
    <br>
     <h1 class="text-center mr-2 mt-5">SELAMAT DATANG DI HALAMAN UTAMA</h1><hr class="bg-dark">
   
    <div class="row text-white justify-content-center mt-3">
      <div class="card bg-info ml-5" style="width: 18rem;">
        <div class="card-body w-auto h-auto ">
          <div class="card-body-icon">
            <i class="fa-solid fa-user-graduate mr-2"></i>
          </div>
          <h5 class="card-title" style="text-align:center; font-family:Times New Roman;">JUMLAH MAHASISWA SAINDATIKA ANGK. 2022</h5>
          <div class="display-4" style="font-weight:bold;">149</div>  
          <a href=""><p class="card-text text-white">Lihat Detail<i class="fa-solid fa-angles-right ml-2"></i></p></a>
        </div>
      </div>

      <div class="card bg-success ml-5" style="width: 18rem;">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa-solid fa-building"></i>
          </div>
          <h5 class="card-title" style="text-align:center; font-family:Times New Roman;">JUMLAH PRODI SAINDATIKA</h5>
          <div class="display-4" style="font-weight:bold;">2</div>  
          <a href=""><p class="card-text text-white">Lihat Detail<i class="fa-solid fa-angles-right ml-2"></i></p></a>
        </div>
      </div>

      <div class="card bg-danger ml-5" style="width: 18rem;">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa-solid fa-people-group"></i>
          </div>
          <h5 class="card-title" style="text-align:center; font-family:Times New Roman;">HIMA TEK. INFORMATIKA & SAINS DATA</h5>
          <div class="display-4" style="font-weight:bold;">HIMIT</div>  
          <a href=""><p class="card-text text-white">Lihat Detail<i class="fa-solid fa-angles-right ml-2"></i></p></a>
        </div>
      </div>
    </div>

      <div class="row justify-content-center mt-5">
        <div class="card ml-5 text-white text-center" style="width: 18rem; display: inline-block; vertical-align: top;">
          <div class="card-header bg-danger display-4">
            <i class="fa-brands fa-instagram"></i>
          </div>
          <div class="card-body">
            <h5 class="card-title text-danger"style="font-family: Georgia ;">INSTAGRAM</h5>
            <p class="card-text text-dark" style="font-family: Georgia ;"><b>PENS (EEPIS)</b></p>
            <a href="#" class="btn btn-danger">FOLLOW</a>
          </div>
        </div>

        <div class="card ml-5 text-white text-center" style="width: 18rem; display: inline-block; vertical-align: top;">
          <div class="card-header bg-success display-4">
            <i class="fa-brands fa-twitter"></i>
          </div>
          <div class="card-body">
            <h5 class="card-title text-success"style="font-family: Georgia;">TWITTER</h5>
            <p class="card-text text-dark" style="font-family: Georgia ;"><b>PENS (EEPIS)</b></p>
            <a href="#" class="btn btn-success">FOLLOW</a>
          </div>
        </div>

        <div class="card ml-5 text-white text-center" style="width: 18rem; display: inline-block; vertical-align: top;">
          <div class="card-header bg-info display-4">
            <i class="fa-brands fa-instagram"></i>
          </div>
          <div class="card-body">
            <h5 class="card-title text-info" style="font-family: Georgia;" >INSTAGRAM</h5>
            <p class="card-text text-dark" style="font-family: Georgia ;"><b>HIMIT</b></p>
            <a href="#" class="btn btn-info">FOLLOW</a>
          </div>
        </div>
      </div>
  </div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
  </body>
</html>