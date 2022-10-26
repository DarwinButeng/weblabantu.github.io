<?php

require_once __DIR__ . '/vendor/autoload.php';

session_start();
 
if ( !isset($_SESSION["iya"]) ) {
  header("Location: masuk.php");
  exit;
}

require 'functions.php';

$id = $_GET["id"];

$mhs = tampilKontak("SELECT * FROM tbl_mahasiswa WHERE id = $id")[0];

$kontaks = tampilKontak("SELECT * FROM tbl_kontak");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>Form Mahasiswa</title>
</head>
<body>
	<div class="card text-left rounded-3 py-3 px-3" style="border: 2px solid;">
		<h1 class="text-center" style="font-size: 25px; font-weight: bold;">FORM MAHASISWA</h1>';

		foreach ( $kontaks as $kontak ) {
			$html .= '<center><p class="text-center" style="text-align: center; padding-bottom: -17px;">Sekretariat: '. $kontak["sekretariat"] .', Alamat: '. $kontak["alamat"] .',
      Email: <span style="text-decoration: underline; color:blue;">'. $kontak["email"] .'</span> No.Hp: '. $kontak["telepon"] .'</p></center>
      <hr style="width: 90%; font-weight: bold;">';
		}

$html .= '<div class="row" style="text-align: right;">
          <p style="text-align: right; font-size:12px; padding-right: 30px;">'. date('l, d M Y') .'.</p>
      </div>
      <div class="row" style="padding-left: 30px;">
        <div class="col-12">
          <table border="0" cellpadding="5" style="font-size: 20px;">
              <tr>
              		<td rowspan="4"><img src="img/'. $mhs["gambar"] .'" class="img-thumbnail" alt="gambar" width="200" height="60">
                  <td style="padding-left: 18px;"><b style="font-weight: bold;">Nama</b></td>
                  <td><b style="font-weight: bold;">:</b></td>
                  <td>'.  $mhs["nama"] .'</td>
              </tr>
              <tr>
                  <td style="padding-left: 18px;"><b style="font-weight: bold;">Nim</b></td>
                  <td><b style="font-weight: bold;">:</b></td>
                  <td>'. $mhs["nim"] .'</td>
              </tr>
              <tr>
                  <td style="padding-left: 18px;"><b style="font-weight: bold;">Prodi</b></td>
                  <td><b style="font-weight: bold;">:</b></td>
                  <td>'. $mhs["jurusan"] .'</td>
              </tr>
              <tr>
                  <td style="padding-left: 18px;"><b style="font-weight: bold;">Email</b></td>
                  <td><b style="font-weight: bold;">:</b></td>
                  <td>'. $mhs["email"] .'</td>
              </tr>
          </table>
        </div>
      </div>
      <hr style="width: 90%; font-weight: bold;">
      <div class="row">
        <div class="col">
          <p style="padding-left: 30px; font-size:12px;"><b style="font-weight: bold;">Catatan:</b> Kartu digunakan sebagaimana mestinya!</p>
        </div>
      </div>';

$html .= '</div>
<script src="js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
</body>
</html>';
    

$mpdf->WriteHTML($html);
$mpdf->Output('Kartu-Mahasiswa', \Mpdf\Output\Destination::INLINE);

?>