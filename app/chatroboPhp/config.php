<?php 
/* Admin girişinde kullanılacak token */
$_TOKEN="testTokeni";
/** KULLANILMASINA İZİN VERİLEN KOMUTLAR! */
$_ADMIN_COMMANDS=[
        ["ekle","DiyalogTabloAdı","(anahtarkelime1,...)","mesaj"],
        ["silMesaj","DiyalogTabloAdı","mesaj",""],
        ["silAnahtar","DiyalogTabloAdı","mesajNumarası","anahtarKelime"],
        ["degistirMesaj","DiyalogTabloAdı","mesajNumarası","yeniMesaj"],
        ["mesajNumaralari","DiyalogTabloAdı","",""],
        ["dialogTablolari","","",""]
    ];
$_COMMANDS=[
        ["tokenchatrobo","token"],
        ["help",""],
        ["yardim",""],
        ["quit",""],
        ["clear",""]
    ];

/* Veri Tabanı Bilgileri */
$mysqlsunucu = "localhost";
$mysqlkullanici = "root";
$mysqlsifre = "";
$dbname="chatrobo";

?>