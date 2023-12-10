<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
<link rel="stylesheet" href="style.css">
<?php
    require 'kartu.php';
    if (isset($_POST['login'])){
        $ceknocard = $db->prepare("SELECT * from AKUN where NO_KARTU = :inputnocard and PIN = :pin");
        $ceknocard->bindValue(":inputnocard",$_POST['nocard']);
        $ceknocard->bindValue(":pin",$_POST['pin']);
        $ceknocard->execute();
        $result = $ceknocard->fetchAll(PDO::FETCH_ASSOC);
        
        if ($ceknocard->rowCount()>0){
            echo "LOGIN BERHASIL<br>";
            var_dump($result[0]['NO_KARTU']);
            if($result[0]["jenis_kartu"] == 1){
                $nas1 = new Kartu($result[0]['NO_KARTU'],$result[0]['PIN'],$result[0]['SALDO']);
            } else if($result[0]["jenis_kartu"] == 2){
                $nas1 = new KartuGold($result[0]['NO_KARTU'],$result[0]['PIN'],$result[0]['SALDO']);
            } else {
                $nas1 = new KartuPlatinum($result[0]['NO_KARTU'],$result[0]['PIN'],$result[0]['SALDO']);
            }
            echo $nas1->getsaldo();
            // beri pilihan user ingin melakukan function apa
            session_start();
            $_SESSION['nas1'] = $nas1;
            
            require_once "pilihan.php";

            // $nas1->transfer(500,"0851");
        }
        else{
            echo"LOGIN FAILED <br>
            <a href='index.php'><button>KEMBALI</button></a>";
        }
        
        
    }
    
        
       



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