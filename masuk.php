<?php
session_start();
 
if ( isset($_SESSION["iya"]) ) {
  header("Location: admin.php");
  exit;
}

require 'functions.php';

if ( isset($_POST["masuk"]) ) {
  
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "SELECT * FROM tbl_user WHERE username = '$username'";

  $result = mysqli_query($db, $query);
  
  // cek usernamenya
  if ( mysqli_num_rows($result) === 1 ) {
    // cek passwordnya
    $row = mysqli_fetch_assoc($result);
    if ( password_verify($password, $row["password"]) ) {

      // set session
      $_SESSION["iya"] = true;

      echo "
          <script>
            alert('Login Berhasil!');
          </script>
         ";

      echo "
          <script>
            document.location.href = 'admin.php';
          </script>
        ";

      // header("Location: admin.php");
      exit; 
    }
  }

  $error = true;

}

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
      box-sizing: border-box;
    }
    .bungkus {
      width: 85%;
    }

    @media (min-width: 992px) {
      .bungkus {
        width: 35%;
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
            <a class="nav-link active" aria-current="page" href="index.php"><b>Beranda</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="datamahasiswa.php">Mahasiswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pesanbalas.php">Pesan</a>
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
  <br><br><br><br><br><br>

  <div class="container bungkus">
    <div class="card rounded-3 shadow" style="width: 100%; color: gray;">
      <div class="card-body">
        <h5 class="card-title"><h2 class="text-center">Daftar Masuk</h2></h5>
        <hr>
        <?php if ( isset($error) ) : ?>
          <div class="alert alert-warning" role="alert">
            <b>Nim</b> Atau <b>Password</b> Salah!
          </div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nim</label>
                <input type="text" style="color: gray;" required class="form-control" id="username" name="username" autocomplete="off" autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label> 
                <input type="password" required class="form-control" id="password" name="password" autocomplete="off" autofocus>
            </div>
            <a href="index.php" class="btn btn-secondary btn-sm">Batal</a>
            <button type="submit" name="masuk" class="btn btn-primary btn-sm">Masuk!</button>
        </form>
      </div>
    </div>
  </div>
  

  <script src="js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>