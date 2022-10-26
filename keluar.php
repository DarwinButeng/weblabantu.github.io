<?php

session_start();
$_SESSION = [];
session_unset();
session_destroy();

echo "
    <script>
        alert('Berhasil Keluar');
    </script>
 ";

echo "
    <script>
        document.location.href = 'index.php';
    </script>
    ";

// header("Location: index.php");
exit;

?>