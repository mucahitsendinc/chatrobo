<?php 
/* Veri Tabanı Bilgileri */
$mysqlsunucu = "localhost";
$mysqlkullanici = "root";
$mysqlsifre = "";
$dbname="chatrobo";
/* Admin girişinde kullanılacak token */
$_TOKEN="testTokeni";
/** KULLANILMASINA İZİN VERİLEN ADMİN KOMUTLARI! */
$_ADMIN_COMMANDS=[
        ["ekle","DiyalogTabloAdı","(anahtarkelime1,...)","mesaj"],
        ["silMesaj","DiyalogTabloAdı","mesaj",""],
        ["silAnahtar","DiyalogTabloAdı","mesajNumarası","anahtarKelime"],
        ["degistirMesaj","DiyalogTabloAdı","mesajNumarası","yeniMesaj"],
        ["mesajNumaralari","DiyalogTabloAdı","",""],
        ["dialogTablolari","","",""]
    ];
/** KULLANILMASINA İZİN VERİLEN KOMUTLAR! */
$_COMMANDS=[
        ["tokenchatrobo","token"],
        ["yardim",""],
        ["cikis",""],
        ["temizle",""]
    ];
/** KULLANILMASINA İZİN VERİLEN DİLLER [" ÜLKE ", " KULLANDIĞI DİL " ]! */
$_LANGUAGES=[
    ["tr","tr"],
    ["az","az"],
    ["us","en"],
    ["de","de"],
    ["gb","en"],
    ["it","it"],
    ["fr","fr"]
];


?>