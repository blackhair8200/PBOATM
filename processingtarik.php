<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
<link rel="stylesheet" href="style.css">
<?php
require "kartu.php";
session_start();

$nas1 = isset($_SESSION['nas1']) ? $_SESSION['nas1'] : null;
if (isset($_POST['tarikuang'])){
            $nas1->tariktunai($_POST['jumlah']);
            echo "Saldo Akhir Anda :<br><br>Rp.".$nas1->getsaldo();

    }?>