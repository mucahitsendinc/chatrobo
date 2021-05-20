<?php
include 'functions.php';
session_start();
echo'<pre>';
print_r($_SESSION);
echo'</pre>';
echo'<br>'.translateMessage('tr',"en",'Ayarlar');
?>