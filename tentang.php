<?php 

session_start();
 
if ( isset($_SESSION["iya"]) ) {
  header("Location: admin.php");
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
            <a class="nav-link" href="pesanbalas.php">Pesan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontakuser.php">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href=""><b>Tentang</b></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br><br><br>

  <div class="container">
    <div class="card shadow">
      <div class="card-header">
        <h6 class="font-weight-bold text-secondary">Tentang</h6>
      </div>
      <div class="card-body">
        <div class="accordion accordion-flush shadow" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Pilih 1
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"><code>"Ingatlah kehidupan kampus dengan terus mengasah. Jangan habiskan waktumu untuk berkeluh kesah." - Najwa Shihab</code></div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Pilih 2
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"><code>"Jadilah mahasiswa cerdas yang mengikuti setiap pergerakan berdasarkan pertimbangan maslahat dan mudaratnya untuk kepentingan bangsa."</code></div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Pilih 3
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"><code>"Bukan kehidupan kampus yang menjadi lebih mudah, akan tetapi engkau yang tumbuh menjadi lebih kuat dan perkasa karena ditempa dalam organisasi."</code></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <script src="js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>

</body>
</html>