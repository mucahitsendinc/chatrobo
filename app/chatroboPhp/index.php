<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include 'config.php';
include 'functions.php';
if (isset($_POST['newmessage'])) {
    $message=$_POST['newmessage'][1];
    /** Komutlar */
  //  print_r( $message);die;
    if ($message[0]=="/") { 
        
        $fullcommand=array_filter(explode(" ",$message));
        $command=str_replace("/","",$fullcommand[0]);
        $variable=$fullcommand[1];
        $check=0;
      ///  echo $command.'<br>'.$fullcommand[2];die;
        foreach ($_COMMANDS as $val) {
             if (in_array($command,$val)) {
                 $check++;
            }
        }
        if ($check==0 && $_SESSION['chatrobo']!="admin") {
            echo "Komut geçersiz veya hatalı! <br>/yardim veya /help yazabilirsin.";
            die;
        }

        if ($command=="tokenchatrobo" ) {
            if(safer($variable)==$_TOKEN){
                echo "success";
                $_SESSION['chatrobo']="admin";
            }else{
                /* Komut kullanımı ALERT */
                $onclick="document.getElementById('message').value='/'+document.getElementById('".$command."').innerHTML+' '";
                echo "Komut kullanımı şu şekilde olmalı :<br>";
                echo'<a class="commands" onclick="'.$onclick.'">/<span id="'.$command.'" >'. $command.' değer</span></a> <br>';
            }
            
        }else if ($command=="cikis" && $_SESSION['chatrobo']=="admin") {
            echo "quit";
            unset($_SESSION['chatrobo']);
        }else if ($command=="temizle") {
            echo "clear";
        }else if($command=="yardim" || $command=="help"){
            echo'ChatRobo Komutları,İhtiyacın olan komutu nasıl kullanacağını öğrenmek için bana gönderirsen sana söyleyebilirim.<br><br>';
            if ($_SESSION['chatrobo']=="admin") {
                foreach ($_ADMIN_COMMANDS as $val ) {
                    foreach ($val as $arraycommand) {
                        if ($val[0]==$arraycommand) {
                            $onclick="document.getElementById('message').value='/'+document.getElementById('".$arraycommand."').innerHTML";
                            echo'<a class="commands" onclick="'.$onclick.'">/<span id="'.$arraycommand.'" >'. $arraycommand.'</span></a> <br>';
                        }
                    }
                }
            }
            foreach ($_COMMANDS as $val ) {
                foreach ($val as $arraycommand) {
                    if ($val[0]==$arraycommand) {
                        $onclick="document.getElementById('message').value='/'+document.getElementById('".$arraycommand."').innerHTML";
                        echo'<a class="commands" onclick="'.$onclick.'">/<span id="'.$arraycommand.'" >'. $arraycommand.'</span></a> <br>';
                    }
                }
            }
        }else if($command=="ekle" && $_SESSION['chatrobo']="admin"){
            $commandParams=(count($fullcommand));
            if ($commandParams<4) {
                /* Komut kullanımı ALERT */
                $onclick="document.getElementById('message').value='/'+document.getElementById('".$command."').innerHTML+' '";
                echo "Komut kullanımı şu şekilde olmalı :<br>";
                echo'<a class="commands" onclick="'.$onclick.'">/<span id="'.$command.'" >'. $command.' (anahtarkelime1,...) mesaj</span></a> <br>';
            }else{
                echo "dogru";
            }
        }else{
            echo "Komut geçersiz veya hatalı! <br>/yardim veya /help yazabilirsin.";
        }


        die;
    }


    /** Mesajlar */
    if (!isset($_SESSION['messages'])) {
        
        echo translateMessage("tr","en",$message);
    }else{
        echo"Merhabadan sonraki mesajlar...";
    }
    

}else if (isset($_POST['adminchecker'])) {
    if ($_SESSION['chatrobo']=="admin") {
        echo "success";
    }
}
usleep(300000);
?>