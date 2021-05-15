<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include 'config.php';
include 'functions.php';
if (isset($_POST['message'])) {
    $message=$_POST['message'];
    /** Komutlar */
    if ($message[0]=="/") {

        $fullcommand=array_filter(explode(" ",$message));
        $command=str_replace("/","",$fullcommand[0]);
        $variable=$fullcommand[1];
        $check=0;
        foreach ($_COMMANDS as $val) {
             if (in_array($command,$val)) {
                 $check++;
            }
        }
        if ($check==0) {
            echo "Komut geçersiz veya hatalı! <br>/yardim veya /help yazabilirsin.";
            die;
        }

        if ($command=="tokenchatrobo" && safer($variable)==$_TOKEN) {
            echo "success";
            $_SESSION['chatrobo']="admin";
        }else if ($command=="quit" && $_SESSION['chatrobo']=="admin") {
            echo "quit";
            unset($_SESSION['chatrobo']);
        }else if ($command=="clear") {
            echo "clear";
        }else if($command=="yardim" || $command=="help"){
            foreach ($_COMMANDS as $val ) {
                foreach ($val as $arraycommand) {
                    if ($val[0]==$arraycommand) {
                        echo'/'. $arraycommand.' ';
                    }else{
                        echo $arraycommand.'<br>';
                    }
                }
            }
        }else{
            echo "Komut geçersiz veya hatalı! <br>/yardim veya /help yazabilirsin.";
        }


        die;
    }


    /** Mesajlar */
    
    echo"Mesajını aldım";

}
?>