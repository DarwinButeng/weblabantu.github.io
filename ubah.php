<?php 
session_start();
 
if ( !isset($_SESSION["iya"]) ) {
  header("Location: masuk.php");
  exit;
}

require 'functions.php';

$id = $_GET["id"];

$mhs = tampilData("SELECT * FROM tbl_mahasiswa WHERE id = $id")[0]; 

if ( isset($_POST["ubah"]) ) {
  if ( ubahData($_POST) > 0 ) {
    echo "
      <script>
        alert('Data Berhasil Diubah!');
        document.location.href = 'mahasiswa.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Data Gagal Diubah!');
        document.location.href = 'mahasiswa.php';
      </script>
    ";
  }
}

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

  <link rel="stylesheet" type="text/css" href="font/css/all.min.css">

  <title>Form Mahasiswa</title>
  <style>
    .badge {
      text-decoration: none;
    }
    .badge:hover {
      color: white;
    }
    body {
        background-image: url(img/b.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
    }
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3 shadow p-3 mb-5 rounded fixed-top">
        <div class="container">
            <a class="navbar-brand text-bold"><b>Form Mahasiswa</b></a>
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
                    <a class="nav-link active btn btn-success bordered btn-sm" onclick="return confirm('Ingin Keluar?');" href="keluar.php"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a>
                </li>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>

    <div class="container">
        <div class="card shadow mb-5 rounded border" style="color: gray;">
            <div class="card-header" >
                <h6 class="font-weight-bold text-secondary">Ubah Data Mahasiswa</h6>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
                    <input type="hidden" name="gambarLama" value="<?php echo $mhs["gambar"]; ?>">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label><br>
                                <img src="img/<?php echo $mhs["gambar"]; ?>" class="img-thumbnail" alt="gambar" width="130">
                            </div>
                            <div class="mb-3">
                                <input type="file" style="color: gray;" class="form-control" id="gambar" autocomplete="off" name="gambar">
                                <small class="text-danger"><sub><b>Max. 1MB</b></sub></small>
                            </div>  
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" style="color: gray;" readonly required class="form-control" id="nama" autocomplete="off" name="nama" value="<?php echo $mhs["nama"]; ?>">
                            </div> 
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nim" class="form-label">Nim</label>
                                    <input type="text" style="color: gray;" readonly class="form-control" id="nim" autocomplete="off" name="nim" value="<?php echo $mhs["nim"]; ?>">
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" style="color: gray;" required class="form-control" id="email" autocomplete="off" name="email" value="<?php echo $mhs["email"]; ?>">
                            </div> 
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Prodi</label>
                                <input type="text" style="color: gray;" readonly required class="form-control" id="jurusan" autocomplete="off" name="jurusan" value="<?php echo $mhs["jurusan"]; ?>">
                            </div> 
                        </div>
                    </div>
                    <a href="mahasiswa.php" class="btn btn-secondary btn-sm">Batal</a>
                    <button name="ubah" type="submit" class="btn btn-primary btn-sm color-white">Ubah Data!</button>
                </form>
            </div>
        </div>
    </div>

  

  
  

  <script src="js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>

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