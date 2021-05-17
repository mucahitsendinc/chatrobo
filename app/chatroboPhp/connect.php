<?php
if (!isset($mysqlsunucu)) { include'config.php'; }
try {
    $db = new PDO("mysql:host=$mysqlsunucu;dbname=$dbname;charset=utf8", $mysqlkullanici, $mysqlsifre);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>