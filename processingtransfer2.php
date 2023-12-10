<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
<link rel="stylesheet" href="style.css">
<?php
require "kartu.php";
session_start();
$tgl = date('Y-m-d');
$nas1 = isset($_SESSION['nas1']) ? $_SESSION['nas1'] : null;
if (isset($_POST['transfer2'])){
    // echo $_POST['pin'];
    $jumlah = $_SESSION['jumlah'];
    $nocardtujuan = $_SESSION['tujuan'];


    $process = $nas1->transfer($jumlah,$nocardtujuan,$_POST['pin']);
    echo "Saldo Akhir Anda :<br><br>Rp.".$nas1->getsaldo();
    if ($process){
    $inserttransaksi = $db->prepare("INSERT into TRANSAKSI (NO_KARTU,TANGGAL_TRANSAKSI)value('{$nas1->getnokartu()}',$tgl)");
    $inserttransaksi->execute();}
}


?>