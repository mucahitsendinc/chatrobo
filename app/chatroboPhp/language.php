<?php 
require_once ('../googleTranslate/vendor/autoload.php');
use \Statickidz\GoogleTranslate;

$source = 'tr';
$target = 'en';
$text = "ben yürüyorum";

$trans = new GoogleTranslate();
$result = $trans->translate($source, $target, $text);



if (isset($_POST['langpost'])) {
    echo strval($result);
}else{
    echo"yok";
}
?>