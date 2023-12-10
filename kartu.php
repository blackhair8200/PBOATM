<?php

    $db = new PDO('mysql:host=localhost;dbname=Pbo','root','');
    class Kartu{
        // atribut
        public $nomorkartu;
        public $pin;
        public $saldo;

        public function __construct($nocard,$pin,$saldo)
        {
            $this->nomorkartu = $nocard;
            $this->pin = $pin;
            $this->saldo = $saldo;
        }
        
        public function getpin(){
            return $this->pin;
        }

        public function getnokartu(){
            return $this->nomorkartu;
        }
        public function setortunai($jumlah){
            $this->saldo += $jumlah;
            $db = new PDO('mysql:host=localhost;dbname=Pbo','root','');
            $saldoakun = $db->prepare("UPDATE AKUN set SALDO = {$this->saldo} where NO_KARTU = '{$this->nomorkartu}'");
            $saldoakun->execute();
        }
        public function getsaldo(){
            return $this->saldo ;
        }
        public function tariktunai($jumlah){
            if ($jumlah<=$this->getsaldo()){
                if($jumlah <= 5000000){
                    // connection 
                    $db = new PDO('mysql:host=localhost;dbname=Pbo','root','');
                    global $db;
                    $this->saldo -= $jumlah;
                    $saldoakun = $db->prepare("UPDATE AKUN set SALDO = {$this->saldo} where NO_KARTU = '{$this->nomorkartu}'");
                    $saldoakun->execute();
                    return true;
                }
                else{
                    echo "Anda tidak diperkenankan tarik tunai melebihi 5.000.000";
                    return false;
                }


            }
            else{
                echo "Jumlah Saldo Kurang. ";
                return false;
            }
            
        }
        
        public function transfer($jumlah,$nomorkartutujuan,$pin = null){
            // pengecekan apakah saldo pengirim cukup
            if ($this->saldo >= $jumlah ){
                // cek parameter pin

                if($pin !== null){
                    if($this->pin !== $pin){
                        echo"PIN Salah <br>
                        <a href='pilihan.php'><button>KEMBALI</button></a>";
                        return false;
                    }
                    else{
                    $db = new PDO('mysql:host=localhost;dbname=Pbo','root','');
                    global $db;
                    echo "Transfer Berhasil<br>";
                    // ambil saldo nomor kartu tujuan untuk ditambahkan
                    $saldocardtujuan = $db->prepare("SELECT * from AKUN where NO_KARTU = '{$nomorkartutujuan}'");
                    $saldocardtujuan->execute();
                    $hasilsaldo = $saldocardtujuan->fetchAll(PDO::FETCH_ASSOC);
                    //penambahan saldo awal + inputan
                    $total = $jumlah + $hasilsaldo[0]['SALDO'];
                    //proses penambahan saldo ke DB
                    $tambahsaldo = $db->prepare("UPDATE AKUN set SALDO = {$total} where NO_KARTU = '{$nomorkartutujuan}'");
                    $tambahsaldo->execute();

                    // proses pengurangan saldo pengirim
                    $this->saldo-=$jumlah;
                    $saldopengirim = $db->prepare("UPDATE AKUN set SALDO = {$this->saldo} where NO_KARTU = '{$this->nomorkartu}'");
                    $saldopengirim->execute();
                    return true;
                    }
                    
                }
            
                else{
                // connection 
                $db = new PDO('mysql:host=localhost;dbname=Pbo','root','');
                global $db;
                echo "Transfer Berhasil<br>";
                // ambil saldo nomor kartu tujuan untuk ditambahkan
                $saldocardtujuan = $db->prepare("SELECT * from AKUN where NO_KARTU = '{$nomorkartutujuan}'");
                $saldocardtujuan->execute();
                $hasilsaldo = $saldocardtujuan->fetchAll(PDO::FETCH_ASSOC);
                //penambahan saldo awal + inputan
                $total = $jumlah + $hasilsaldo[0]['SALDO'];
                //proses penambahan saldo ke DB
                $tambahsaldo = $db->prepare("UPDATE AKUN set SALDO = {$total} where NO_KARTU = '{$nomorkartutujuan}'");
                $tambahsaldo->execute();

                // proses pengurangan saldo pengirim
                $this->saldo-=$jumlah;
                $saldopengirim = $db->prepare("UPDATE AKUN set SALDO = {$this->saldo} where NO_KARTU = '{$this->nomorkartu}'");
                $saldopengirim->execute();
                return true;
                }
                
            
            }
            else{
                echo "Saldo Anda Tidak Mencukupi<br>" ;
                return false;
            }
        }
    }


    class KartuGold extends Kartu{
        public function tariktunai($jumlah){
            if ($jumlah<=$this->getsaldo()){
                if($jumlah <= 10000000){
                    // connection 
                    $db = new PDO('mysql:host=localhost;dbname=Pbo','root','');
                    global $db;
                    $this->saldo -= $jumlah;
                    $saldoakun = $db->prepare("UPDATE AKUN set SALDO = {$this->saldo} where NO_KARTU = '{$this->nomorkartu}'");
                    $saldoakun->execute();
                    return true;
                }
                else{
                    echo "Anda tidak diperkenankan tarik tunai melebihi 10.000.000";
                    return false;
                }


            }
            else{
                echo "Jumlah Saldo Kurang. ";
                return false;
            }
            
        }

    }

    class KartuPlatinum extends Kartu{
        public function tariktunai($jumlah){
            if ($jumlah<=$this->getsaldo()){
                if($jumlah <= 15000000){
                    // connection 
                    $db = new PDO('mysql:host=localhost;dbname=Pbo','root','');
                    global $db;
                    $this->saldo -= $jumlah;
                    $saldoakun = $db->prepare("UPDATE AKUN set SALDO = {$this->saldo} where NO_KARTU = '{$this->nomorkartu}'");
                    $saldoakun->execute();
                    return true;
                }
                else{
                    echo "Anda tidak diperkenankan tarik tunai melebihi 15.000.000";
                    return false;
                }


            }
            else{
                echo "Jumlah Saldo Kurang. ";
                return false;
            }
            
        }

    }

    // $db = new PDO('mysql:host=localhost;dbname=Pbo','root','');
    // class Kartu{
    //     // atribut
    //     public $nomorkartu;
    //     protected $pin;
    //     protected $saldo;

    //     public function __construct($nocard,$pin,$saldo)
    //     {
    //         $this->nomorkartu = $nocard;
    //         $this->pin = $pin;
    //         $this->saldo = $saldo;
    //     }
        
    //     public function getnokartu(){
    //         return $this->nomorkartu;
    //     }
    //     public function getpin(){
    //         return $this->pin;
    //     }
    //     public function setortunai($jumlah){
    //         $this->saldo += $jumlah;
    //         $db = new PDO('mysql:host=localhost;dbname=Pbo','root','');
    //         $saldoakun = $db->prepare("UPDATE AKUN set SALDO = {$this->saldo} where NO_KARTU = '{$this->nomorkartu}'");
    //         $saldoakun->execute();
    //     }
    //     public function getsaldo(){
    //         return $this->saldo ;
    //     }
    //     public function tariktunai($jumlah){
    //         if ($jumlah<=$this->getsaldo()){
    //             if($jumlah <= 5000000){
    //                 // connection 
    //                 $db = new PDO('mysql:host=localhost;dbname=Pbo','root','');
    //                 global $db;
    //                 $this->saldo -= $jumlah;
    //                 $saldoakun = $db->prepare("UPDATE AKUN set SALDO = {$this->saldo} where NO_KARTU = '{$this->nomorkartu}'");
    //                 $saldoakun->execute();
    //                 return true;
    //             }
    //             else{
    //                 echo "Anda tidak diperkenankan tarik tunai melebihi 5.000.000";
    //                 return false;
    //             }


    //         }
    //         else{
    //             echo "Jumlah Saldo Kurang. ";
    //             return false;
    //         }
            
    //     }
    //     public function transfer($jumlah,$nomorkartutujuan){
    //         // pengecekan apakah saldo pengirim cukup
    //         if ($this->saldo >= $jumlah ){
    //             // connection 
    //             $db = new PDO('mysql:host=localhost;dbname=Pbo','root','');
    //             global $db;

    //             // ambil saldo nomor kartu tujuan untuk ditambahkan
    //             $saldocardtujuan = $db->prepare("SELECT * from AKUN where NO_KARTU = '{$nomorkartutujuan}'");
    //             $saldocardtujuan->execute();
    //             $hasilsaldo = $saldocardtujuan->fetchAll(PDO::FETCH_ASSOC);
    //             //penambahan saldo awal + inputan
    //             $total = $jumlah + $hasilsaldo[0]['SALDO'];
    //             //proses penambahan saldo ke DB
    //             $tambahsaldo = $db->prepare("UPDATE AKUN set SALDO = {$total} where NO_KARTU = '{$nomorkartutujuan}'");
    //             $tambahsaldo->execute();

    //             // proses pengurangan saldo pengirim
    //             $this->saldo-=$jumlah;
    //             $saldopengirim = $db->prepare("UPDATE AKUN set SALDO = {$this->saldo} where NO_KARTU = '{$this->nomorkartu}'");
    //             $saldopengirim->execute();
    //         } 
    //         else{
    //             echo "Saldo Anda Tidak Mencukupi" ;
    //         }
    //     }
    // }

    // // belum diubah codenya
    // class KartuGold extends Kartu{
    //     public function tariktunai($jumlah){

    //         if ($jumlah<=$this->getsaldo()){
    //             if($jumlah <= 10000000){
    //                 $this->saldo -= $jumlah;
    //                 return true;
    //             }
    //             else{
    //                 return false;
    //             }


    //         }
    //         else{
    //             echo "Jumlah Saldo Kurang";
    //             return false;
    //         }
    //     }
    // }
?>
    
