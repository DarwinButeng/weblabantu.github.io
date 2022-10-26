<?php
session_start();
 
if ( !isset($_SESSION["iya"]) ) {
  header("Location: masuk.php");
  exit;
}

require 'functions.php';

$komentar = tampilPesan("SELECT * FROM tbl_pesan");

if ( isset($_POST["balaskomen"]) ) {
    if ( balasPesanUser($_POST) > 0 ) {
        echo "
            <script>
                alert('Pesan Berhasil Dikirim!');
                document.location.href = 'semuapesan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Pesan Gagal Dikirm!');
                document.location.href = 'semuapesan.php';
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
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                        <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href=""><b>Pesan</b></a>
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
    <br><br><br><br>

    <!-- DataTales Example -->
    <div class="container">
        <div class="card shadow mb-4 mt-4 rounded-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-secondary">Pesan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: gray;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ( $komentar as $pesan ) : ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $pesan["pengirim"]; ?></td>
                                <td><?php echo $pesan["sms"]; ?></td>
                                <td>
                                    <button style="border: none;" class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#balas">
                                        Balas
                                    </button>
                                    <a href="hapuspesan.php?id=<?php echo $pesan["id"]; ?>" onclick="return confirm('Ingin Menghapus Pesan Ini ?');" class="badge bg-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="balas" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-secondary" id="judulModal">Balas Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-1">
                            <label for="balaspesan" class="form-label text-secondary">Pesan</label>
                            <textarea class="form-control" id="balaspesan" autocomplete="off" name="balaspesan" rows="7"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="balaskomen" class="btn btn-primary btn-sm">Kirim</button>
                        </div>
                    </form>
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