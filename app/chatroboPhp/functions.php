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
?>