<?php 
/*$dosya = fopen ("messages/sender.txt" , 'w'); //dosya oluşturma işlemi
$yaz="chatrobox"; //dosya içine ne yazmak istiyorsanız buraya yazın. $değer
fwrite ( $dosya , $yaz ) ;
fclose ($dosya);
*/

/*
$Dosya = fopen("messages/sender.txt", "r") or exit("Dosya Açılamadı !");
$say=0;
while(!feof($Dosya))
{
    $bak=fgets($Dosya);
    $metin=array_filter(explode(" ",$bak));
    if (count($metin)<2) {
        echo $bak." (".count($metin).") parçalanamadı<br>";
    }else{
        
        echo "----<br>";
        foreach ($metin as $key ) {
            echo $key.'<br>';
        }
        echo "----<br>";
    }
}
 
fclose($Dosya);

*/


/*
$dizi=["asd","dsa","hehe","hebele","hübele"];
$dizi2=[
    ['asd',1,"adasd"],
    ['asaddad',12,"adahfsd"],
    ['asdafgd',13,"adavbsd"],
    ['asdfgd',15,"adavbcsd"]
];
$jsontest=json_encode($dizi,JSON_UNESCAPED_UNICODE);
$jsontest2=json_encode($dizi2,JSON_UNESCAPED_UNICODE);
$dosya = fopen ("messages/sender.txt" , 'w'); //dosya oluşturma işlemi
 //dosya içine ne yazmak istiyorsanız buraya yazın. $değer
fwrite ( $dosya , $jsontest2 ) ;
fclose ($dosya);
*/

$file=fopen("messages/chatrobodialogs.json","r");

$readfile=fgets($file); 


fclose($file);
echo '<pre>';
print_r(json_decode($readfile)); 
echo '</pre>';

echo'--<br>';
$file= file_get_contents("messages/chatrobodialogs.json");
$json=json_decode($file);

echo $json[0][1];

?>