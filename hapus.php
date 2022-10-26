<?php
require 'functions.php';

$id = $_GET["id"];

if ( hapusData($id) > 0 ) {
    echo "
      <script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'mahasiswa.php';
      </script>
    ";
} else {
    echo "
      <script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'mahasiswa.php';
      </script>
    ";
}


?>