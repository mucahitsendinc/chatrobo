<?php
session_start();
require 'functions.php';
require 'config.php';
if (isset($_POST['langpost'])) {
    
    echo'<i class="fas fa-long-arrow-alt-left" id="chatrobo-settings-closeBtn" onclick="chatroboSettingsClose()"></i>
    <h1 id="chatrobo-settings-h1">'.translateMessage('tr',$_SESSION["language"],'Ayarlar').'</h1><div id="chatrobo-settings-content">';
    foreach ($_LANGUAGES as $lang) {
        $add="";
        if ($lang[0]=="tr" && !isset($_SESSION['country'])) {
            $add="current";
        }else if (!empty($_SESSION['country']) && isset($_SESSION['country']) ) {
            if ($lang[0]==$_SESSION['country']) {
                $add="current";
            }
        }
        echo '<span id="'.$lang[0].'" class="flags flag-icon flag-icon-'.$lang[0].' '.$add.'" onclick="chatLang(\''.$lang[0].'\',\''.$lang[1].'\');"></span>';
    }
    echo '</div>';

}else if (isset($_POST['newlang'])) {
    
    $newlang=htmlspecialchars($_POST['newlang'][0]);
    $newcountry=htmlspecialchars($_POST['newlang'][1]);
    $oldcountry="tr";
    if (isset($_SESSION['country'])) {
        $oldcountry=$_SESSION['country'];
    }
    $say=0;
    foreach ($_LANGUAGES as $lang) {
        if ($lang[1]==$newcountry && $lang[0]==$newlang) {
           // echo $lang[0].'-'.$lang[1].'  '.$newcountry.'-'.$newlang;
            $say++;
            $_SESSION['country']=$newlang;
            $_SESSION['language']=$newcountry;
            $return=array('process'=>'success','old'=>$oldcountry,'new'=>$newlang,'newtitle'=>translateMessage('tr',$newcountry,'Ayarlar'));

            echo json_encode($return);
            die;
        }
        
        
        
    }
    $return = array('process'=>'error','country'=>$newcountry,'new'=>$newlang,'sessionCountry'=>$_SESSION['country'],'sessionLang'=>$_SESSION['language']);
    echo json_encode($return);
}
?>
