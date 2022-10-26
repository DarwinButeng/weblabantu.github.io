<?php 

session_start();
 
if ( isset($_SESSION["iya"]) ) {
  header("Location: admin.php");
  exit;
}

require 'functions.php';

// pesan user
$tampilkanpesan = tampilPesan("SELECT * FROM tbl_pesan");

// pesan admin
$tampilkanPesanAdmin = tampilPesanAdmin("SELECT * FROM tbl_balaspesan");

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">

  <!-- admin css -->
  <link href="css2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- <link href="css2/css/sb-admin-2.min.css" rel="stylesheet"> -->

  <link href="css2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3 shadow p-3 mb-5 rounded fixed-top">
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
                        <a class="nav-link active" href=""><b>Pesan</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontakuser.php">Kontak</a>
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
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-secondary">Pesan</h6>
            </div>
            <div class="card-body" style="padding: 30px 50px 30px 50px;">
                <div class="row" style="color: gray;">
                    
                </div>
                <div class="row">
                    <div class="col-6">
                        <?php foreach ( $tampilkanpesan as $pesanuser ) : ?>
                        <!-- user -->
                        <div class="mb-3">
                            <p style="color: green;"><sub><span style="color: red;"><b>(<?php echo $pesanuser["pengirim"]; ?>)</b></span></sub> <br> <?php echo $pesanuser["sms"]; ?></p>
                        </div> 
                        <div class="mb-3">
                            
                        </div> 
                        <?php endforeach; ?>
                    </div>
                    <div class="col-6">
                        <?php foreach ( $tampilkanPesanAdmin as $pesanAdmin ) : ?>
                        <!-- user -->
                        <div class="mb-3">
                           
                        </div> 
                        <div class="mb-3" style="text-align: right;">
                            <sub><span style="color: red;"><b>(Admin)</b></span></sub><br>
                            <span style="color: blue;"><?php echo $pesanAdmin["balaspesan"]; ?></span>
                        </div>
                        <?php endforeach; ?> 
                    </div>
                </div>
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