<?php
session_start();
require_once("veri_tabani.php");

$ses_kullaniciID = $_SESSION["kullanici_id"];
$sql = "SELECT * FROM kullanicilar  WHERE `kullanici_id` = $ses_kullaniciID";
$sonuc =mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($sonuc);

echo "<table class='table table-hover'>";
echo "<th>Profil Bilgilerim</th>";
echo "<tr><td>Ad Soyad</td><td>".$row['ad_soyad']."</td></tr>";
echo "<tr><td>Kullanıcı Adı</td><td>".$row['kullanici_adi']."</td></tr>";
echo "<tr><td>Telefon Numarası</td><td>".$row['tel_no']."</td></tr>";
echo "<tr><td>E-posta adresi</td><td>".$row['e_posta']."</td></tr>";

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    
</body>
</html>

<?php
mysqli_close($conn);
?>
