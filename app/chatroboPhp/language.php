<?php 
use \Statickidz\GoogleTranslate;

if (isset($_POST)) {
    require_once ('../googleTranslate/vendor/autoload.php');
    $trans = new GoogleTranslate();

    $source = htmlspecialchars($_POST['source']);
    $target = htmlspecialchars($_POST['target']);
    $text   = htmlspecialchars($_POST['text']);

    $result = $trans->translate($source, $target, $text);



    if (isset($text)) {
        return ($result);
    }else{
        return "Hata kodu TRANSLATE01";
    }
}
?>