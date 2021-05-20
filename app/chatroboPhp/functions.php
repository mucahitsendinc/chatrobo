<?php 

function safer($metin){
    $safe=$metin;
    $safe=str_replace("'","",$safe);
    $safe=str_replace('"','',$safe);
    $safe=str_replace('insert','',$safe);
    $safe=str_replace('select','',$safe);
    $safe=str_replace('drop','',$safe);
    $safe=str_replace('truncate','',$safe);
    $safe=str_replace('where','',$safe);
    $safe=str_replace('or','',$safe);
    $safe=str_replace('not','',$safe);
    $safe=str_replace('but','',$safe);
    $safe=str_replace('like','',$safe);
    $safe=str_replace('>','',$safe);
    $safe=str_replace('<','',$safe);
    $safe=str_replace('=','',$safe);
    $safe=str_replace('tokenchatrobo','',$safe);
    return $safe;
}
function getUserIP() {
    return "213.14.151.225";
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])){
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else if(isset($_SERVER['HTTP_X_FORWARDED'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    }else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    }else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    }else if(isset($_SERVER['HTTP_FORWARDED'])){
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    }else if(isset($_SERVER['REMOTE_ADDR'])){
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    }else{
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}
function getButton($color,$msg,$onclick=""){
    /*
    echo'<button class="green">Mesaj Ekle</button>';
    echo'<button class="primary">Mesaj Düzenle</button>';
    echo'<button class="red">Mesaj Sil</button>';
    echo'<button class="orange">Mesaj Listele</button>';
    */
    if ($onclick!="") {
        $onclick='onclick="'.$onclick.'"';
    }
    echo'<button class="'.$color.'" "'.$onclick.'">'.$msg.'</button>';
}
function translateMessage($source,$target,$msg){
    $curl = curl_init();
    $langurl=str_replace("localhost","localhost:8080",str_replace("index.php","language.php",('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'])));
    curl_setopt($curl, CURLOPT_URL, $langurl);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "text=".$msg."&source=".$source."&target=".$target);

    $sonuc = curl_exec($curl);
    curl_close($curl);
    return  trim($sonuc,1);
}
?>