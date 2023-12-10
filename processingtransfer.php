<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
<link rel="stylesheet" href="style.css">
<?php
require "kartu.php";
$tgl = date('Y-m-d');
session_start();
$_SESSION['jumlah'] = $_POST['jumlah'];
$_SESSION['tujuan'] = $_POST['nocardtujuan'];
$nas1 = isset($_SESSION['nas1']) ? $_SESSION['nas1'] : null;

if (isset($_POST['transfer']) && $_POST['jumlah'] > 100){
        echo "
        <div class='subcontainer'>
        <form action='processingtransfer2.php' method='POST'>
        <label for='pin'>Masukkan PIN Anda :</label>
        <input type='password' name='pin' id='pin' autocomplete='off'>
        <input type='submit' name='transfer2' value='lanjutkan'>
        </form>
        </div>";
    }
elseif (isset($_POST['transfer'])){
        $nas1->transfer($_POST['jumlah'],$_POST['nocardtujuan']);
        echo "Saldo Akhir Anda".$nas1->getsaldo();
        $inserttransaksi = $db->prepare("INSERT into TRANSAKSI (NO_KARTU,TANGGAL_TRANSAKSI)value('{$nas1->getnokartu()}',$tgl)");
        $inserttransaksi->execute();
}    
    
?>
    