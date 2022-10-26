<?php 
session_start();
 
if ( !isset($_SESSION["iya"]) ) {
  header("Location: masuk.php");
  exit;
}

require 'functions.php';

$admin = tampilPesanAdmin("SELECT * FROM tbl_balaspesan");

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- admin css -->
  <link href="css2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- <link href="css2/css/sb-admin-2.min.css" rel="stylesheet"> -->

  <link href="css2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
    .badge {
      text-decoration: none;
    }
    .badge:hover {
      color: white;
    }
    .bungkus {
      width: 90%;
    }

    @media (min-width: 992px) {
      .bungkus {
        width: 65%;
      }
      .badge {
      text-decoration: none;
      }
      .badge:hover {
        color: white;
      }
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
            <a class="nav-link" aria-current="page" href="admin.php">Beranda</a>
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
            <a class="nav-link active" href=""><b>Riwayat</b></a>
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

  <div class="container bungkus">
    <div class="card rounded shadow" style="width: 100%; color: gray;">
        <div class="card-header">
        <h6 class="font-weight-bold text-secondary">Riwayat</h6>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush" >
              <?php foreach ( $admin as $min ) : ?>
              <li class="list-group-item" style="color: blue;">
                  <?php echo $min["balaspesan"]; ?>
                  <a href="hapuspesanadmin.php?id=<?php echo $min["id"]; ?>" onclick="return confirm('Ingin Menghapus Pesan Ini?');" class="badge bg-danger">Hapus</a>
              </li>
              <?php endforeach; ?>
          </ul>
        </div>
    </div>
  </div>
  

  <script src="js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript-->
<script src="css2/vendor/jquery/jquery.min.js"></script>
<script src="css2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="css2/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="css2/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="css2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="css2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="css2/js/demo/datatables-demo.js"></script>

</body>
</html>