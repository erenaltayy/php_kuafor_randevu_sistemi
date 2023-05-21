<?php
$servername  = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "kuafor";

$conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

if(!$conn){
    die("Veritabanına bağlanılamadı: ". mysqli_connect_error());
}

?>