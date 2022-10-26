<?php
require 'functions.php';

$id = $_GET["id"];

if ( hapusPesanAdmin($id) > 0 ) {
    echo "
      <script>
        alert('Pesan Berhasil Dihapus!');
        document.location.href = 'history.php';
      </script>
    ";
} else {
    echo "
      <script>
        alert('Pesan Berhasil Dihapus!');
        document.location.href = 'history.php';
      </script>
    ";
}


?>