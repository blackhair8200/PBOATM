<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
<link rel="stylesheet" href="style.css">
<?php
// proses.php

// Include the file with the class definition
require_once 'kartu.php';

// Mulai sesi
session_start();

// Ambil objek Kartu dari sesi
$nas1 = isset($_SESSION['nas1']) ? $_SESSION['nas1'] : null;

// Periksa apakah objek Kartu telah diinisialisasi
if ($nas1 instanceof Kartu) {
    if (isset($_POST['ceksaldo'])) {
        echo"Saldo Anda Saat Ini :<br><br>Rp.".$nas1->getsaldo();
    }
    elseif (isset($_POST['setor'])) {
        echo "<div class='subcontainer'>
        <form action='processingsetor.php' method='POST'> 
        <label for='jumlah'>Jumlah Uang :</label>
        <input type='number' name='jumlah' id='jumlah'>
        <input type='submit' name='setorkan' value='Setorkan'>
        </form>
        </div>";
        
    }
    elseif (isset($_POST['tarik'])) {
        echo "<div class='subcontainer'>
        <form action='processingtarik.php' method='POST'> 
        <label for='jumlah'>Jumlah Uang Yang Ditarik :</label>
        <input type='number' name='jumlah' id='jumlah'>
        <input type='submit' name='tarikuang' value='Tarik Uang'>
        </form>
        </div>";

    }
    elseif (isset($_POST['transfer'])) {
        echo "<div class='subcontainer'>
        <form action='processingtransfer.php' method='POST'> 
        <label for='nocardtujuan'>Nomor Kartu Tujuan :</label>
        <input type='text' name='nocardtujuan' id='nocardtujuan' autocomplete='off'><br>

        <label for='jumlah'>Jumlah Uang Yang Ditransfer :</label>
        <input type='number' name='jumlah' id='jumlah'><br>

        <input type='submit' name='transfer' value='TRANSFER'>
        </form>
        </div>";
    }
} else {
    echo "Objek Kartu tidak ditemukan dalam sesi.";
}
?>
