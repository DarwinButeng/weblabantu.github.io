<?php 
session_start();
 
if ( !isset($_SESSION["iya"]) ) {
  header("Location: masuk.php");
  exit;
}

require 'functions.php';

$id = $_GET["id"];

$mhs = tampilData("SELECT * FROM tbl_mahasiswa WHERE id = $id")[0];

$kontaks = tampilKontak("SELECT * FROM tbl_kontak");

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
    .bungkus {
      width: 90%;
    }

    @media (min-width: 992px) {
      .bungkus {
        width: 55%;
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
            <a class="nav-link active" href="mahasiswa.php"><b>Mahasiswa</b></a>
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
            <a class="nav-link active btn btn-success bordered btn-sm" onclick="return confirm('Ingin Keluar ?');" href="keluar.php"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br><br><br>

  <div class="container bungkus">
    <a href="mahasiswa.php" class="btn btn-primary btn-sm mb-3 shadow">Kembali</a>
    <div class="card text-left rounded-3 shadow py-3 px-3" style="width: 100%; color: gray;">
      <h4 class="text-center">FORM MAHASISWA</h4>
      <?php foreach ( $kontaks as $kontak ) : ?>
      <small class="text-center">Sekretariat: <?php echo $kontak["sekretariat"]; ?>, Alamat: <?php echo $kontak["alamat"]; ?> <br>
      Email: <span style="text-decoration: underline; color:blue;"><?php echo $kontak["email"]; ?></span> No.Hp: <?php echo $kontak["telepon"]; ?></small>
      <?php endforeach; ?>
      <hr>
      <div class="row" style="text-align: right;">
        <div class="col-6"></div>
        <div class="col-6">
          <small><?php echo date('l, d M Y'); ?>.</small>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
            <img src="img/<?php echo $mhs["gambar"]; ?>" class="img-thumbnail" alt="gambar" width="">
        </div>
        <div class="col-8">
          <table border="0" cellpadding="5">
              <tr>
                  <td><b>Nama</b></td>
                  <td><b>:</b></td>
                  <td><?php echo $mhs["nama"]; ?></td>
              </tr>
              <tr>
                  <td><b>Nim</b></td>
                  <td><b>:</b></td>
                  <td><?php echo $mhs["nim"]; ?></td>
              </tr>
              <tr>
                  <td><b>Prodi</b></td>
                  <td><b>:</b></td>
                  <td><?php echo $mhs["jurusan"]; ?></td>
              </tr>
              <tr>
                  <td><b>Email</b></td>
                  <td><b>:</b></td>
                  <td><?php echo $mhs["email"]; ?></td>
              </tr>
          </table>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">
          <small><b>Catatan :</b> Kartu digunakan sebagaimana mestinya!</p>
        </div>
      </div>
  </div>
  

  <script src="js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>

</body>
</html>