<?php 

session_start();
 
if ( isset($_SESSION["iya"]) ) {
  header("Location: admin.php");
  exit;
}

require 'functions.php';

$kontaks = tampilKontak("SELECT * FROM tbl_kontak");

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

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
        width: 65%;
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
                        <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="datamahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesanbalas.php">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href=""><b>Kontak</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentang.php">Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>

    <div class="container bungkus">
        <div class="card shadow mb-4 mt-4 rounded-3" style="width: 100%;">
            <div class="card-header">
                <h6 class="font-weight-bold text-secondary">Kontak</h6>
            </div>
            <div class="card-body">
                <table border="0" cellpadding="10" style="color: gray;">
                    <?php foreach ( $kontaks as $kontak ) : ?>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $kontak["alamat"]; ?></td>
                    </tr>
                    <tr>
                        <td>Sekretariat</td>
                        <td>:</td>
                        <td><?php echo $kontak["sekretariat"]; ?></td>
                    </tr>
                    <tr>
                        <td>No.Hp</td>
                        <td>:</td>
                        <td><?php echo $kontak["telepon"]; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $kontak["email"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

  
  

  <script src="js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>