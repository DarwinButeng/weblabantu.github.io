<?php
require 'functions.php';

$id = $_GET["id"];

if ( hapusPesan($id) > 0 ) {
    echo "
      <script>
        alert('Pesan Berhasil Dihapus!');
        document.location.href = 'komentar.php';
      </script>
    ";
} else {
    echo "
      <script>
        alert('Pesan Berhasil Dihapus!');
        document.location.href = 'komentar.php';
      </script>
    ";
}


?>