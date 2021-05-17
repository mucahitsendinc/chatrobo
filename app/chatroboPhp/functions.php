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

?>