<?php
session_start();
 
if ( !isset($_SESSION["iya"]) ) {
  header("Location: masuk.php");
  exit;
}

require 'functions.php';

$mahasiswa = tampilData("SELECT * FROM tbl_mahasiswa"); 

if ( isset($_POST["tambah"]) ) {
  if ( tambahData($_POST) > 0 ) {
    echo "
      <script>
        alert('Data Berhasil Ditambahkan!');
        document.location.href = 'mahasiswa.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Data Gagal Ditambahkan!');
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
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- admin css -->
  <link href="css2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" type="text/css" href="font/css/all.min.css">

  <!-- <link href="css2/css/sb-admin-2.min.css" rel="stylesheet"> -->

  <link href="css2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <title>Form Mahasiswa</title>
  <style>
    .badge {
      text-decoration: none;
    }
    .badge:hover {
      color: white;
    }
    .satu:nth-child(even) {
      background-color: #F8F8FF;
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
            <a class="nav-link active" href=""><b>Mahasiswa</b></a>
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
  <br><br><br>

  <!-- DataTales Example -->
  <div class="container">
    <button type="button" class="btn btn-primary btn-sm shadow mt-5" data-bs-toggle="modal" data-bs-target="#formModal">
      Tambah Data Mahasiswa!
    </button>
    <div class="card shadow mb-4 mt-4 rounded-3">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-secondary">Daftar Mahasiswa</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: gray;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Prodi</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Prodi</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ( $mahasiswa as $mhs ) : ?>
              <tr class="satu">
                  <td><?php echo $i; ?></td>
                  <td><img src="img/<?php echo $mhs["gambar"]; ?>" width="70" height="40"></td>
                  <td><?php echo $mhs["nama"]; ?></td>
                  <td><?php echo $mhs["nim"]; ?></td>
                  <td><?php echo $mhs["jurusan"]; ?></td>
                  <td><?php echo $mhs["email"]; ?></td>
                  <td>
                    <a href="cetak.php?id=<?php echo $mhs["id"]; ?>" class="badge bg-secondary" target="_blank"><i class="fa-solid fa-print"></i> Cetak</a>
                    <a href="detail.php?id=<?php echo $mhs["id"]; ?>" class="badge bg-primary"><i class="fa-solid fa-circle-info"></i> Detail</a>
                    <a href="ubah.php?id=<?php echo $mhs["id"]; ?>" class="badge bg-success"><i class="fa-solid fa-pen-to-square"></i> Ubah</a>
                    <a href="hapus.php?id=<?php echo $mhs["id"]; ?>" onclick="return confirm('Ingin Menghapus <?php echo $mhs['nama']; ?> ?');" class="badge bg-danger"><i class="fa-solid fa-trash"></i> Hapus</a>
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


  <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-secondary" id="judulModal">Tambah Data Mahasiswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-1">
              <label for="nim" class="form-label text-secondary">Nim</label>
              <input type="text" style="color: gray;" required class="form-control" id="nim" autocomplete="off" name="nim">
            </div>
            <div class="mb-1">
              <label for="nama" class="form-label text-secondary">Nama</label>
              <input type="text" style="color: gray;" required class="form-control" id="nama" autocomplete="off" name="nama">
            </div>
            <div class="mb-1">
              <label for="jurusan" class="form-label text-secondary">Prodi</label>
              <input type="text" style="color: gray;" required class="form-control" id="jurusan" autocomplete="off" name="jurusan">
            </div>
            <div class="mb-1">
              <label for="email" class="form-label text-secondary">Email</label>
              <input type="email" style="color: gray;" required class="form-control" id="email" autocomplete="off" name="email">
            </div>
            <div class="mb-1">
              <label for="gambar" class="form-label text-secondary">Gambar</label>
              <input type="file" style="color: gray;" class="form-control" id="gambar" autocomplete="off" name="gambar">
              <small class="text-danger"><sub><b>Max. 1MB</b></sub></small>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
              <button type="submit" name="tambah" class="btn btn-primary btn-sm">Tambah Data</button>
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