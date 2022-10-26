<?php 
session_start();
 
if ( !isset($_SESSION["iya"]) ) {
  header("Location: masuk.php");
  exit;
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="font/css/all.min.css">

  <title>Form Mahasiswa</title>
  <style>
    body {
      background-image: url(img/b.jpg);
      background-size: cover;
      background-repeat: no-repeat;
      height: 100vh;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3 shadow mb-5 p-3 rounded fixed-top">
    <div class="container">
      <a class="navbar-brand text-bold "><b>Form Mahasiswa</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href=""><b>Beranda</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="komentar.php">Pesan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="semuapesan.php">Diskusi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.php">Riwayat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontakadmin.php">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tentang2.php">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active btn btn-success bordered btn-sm" onclick="return confirm('Ingin Keluar?');" href="keluar.php"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br><br><br>

  <div class="container">
    <div class="card text-center rounded-3 shadow" style="width: 100%; color: gray;">
      <div class="card-body">
        <h5 class="card-title"><h2>Selamat Datang Admin!</h2></h5>
        <p class="card-text">HIDUP ADALAH KUMPULAN KEJADIAN-KEJADIAN.</p>
      </div>
    </div>
  </div>
  

  <script src="js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>

</body>
</html>