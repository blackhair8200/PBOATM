<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
<link rel="stylesheet" href="style.css">
<div class="subcontainer">
    <h2>Bank Ilham</h2>
    <form action='menu.php' method="POST">
        <label for="nocard">_No Kartu :</label>
        <input type="text" name="nocard" id="nocard" autocomplete="off">
        <label for="pin">_PIN :</label>
        <input type="password" name="pin" id="pin" autocomplete="off">
        <input type="submit" name="login" value="">
    </form>
</div>
<?php
    // require 'kartu.php';
    // if (isset($_POST['login'])){
    //     $ceknocard = $db->prepare("SELECT * from AKUN where NO_KARTU = :inputnocard and PIN = :pin");
    //     $ceknocard->bindValue(":inputnocard",$_POST['nocard']);
    //     $ceknocard->bindValue(":pin",$_POST['pin']);
    //     $ceknocard->execute();
    //     $result = $ceknocard->fetchAll(PDO::FETCH_ASSOC);

        
    //     if ($ceknocard->rowCount()>0){
    //         echo "LOGIN BERHASIL<br>";
    //         var_dump($result[0]['NO_KARTU']);
    //         $nas1 = new Kartu($result[0]['NO_KARTU'],$result[0]['PIN'],$result[0]['SALDO']);
    //         echo $nas1->getsaldo();
    //         // beri pilihan user ingin melakukan function apa
    //         session_start();
    //         $_SESSION['nas1'] = $nas1;
            
    //         require_once "pilihan.php";

    //         // $nas1->transfer(500,"0851");
    //     }
    //     else{
    //         echo"LOGIN FAILED";
    //     }
        
        
    // }
    
        
       



    // $nas1 = new Kartu("0878",123,1000);
    // $nas2 = new KartuGold("0851",123,10000);
    // $nas3 = new Kartu("0878",123,9000);


    // echo $nas1->getsaldo()."<br>";
    // echo $nas2->getsaldo()."<br>";
    // echo $nas3->getsaldo()."<br>";

    // $nas2->transfer(1000,$nas1);
    // echo $nas1->getsaldo()."<br>";
    // echo $nas2->getsaldo()."<br>";

    // $nas2->tariktunai(15000000);






?>