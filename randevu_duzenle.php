<?php
session_start();
require_once("veri_tabani.php");

$ses_kullaniciID = $_SESSION["kullanici_id"];
$sql = "SELECT * FROM `randevular` WHERE `kullanici_id` = $ses_kullaniciID ";

$sonuc = mysqli_query($conn, $sql);

if(mysqli_num_rows($sonuc) > 0){
    echo "<h1>Randevu Listesi</h1>";
    echo '<form action="randevu_duzenle.php" method="post">';
    echo "<table class='table table-hover'>";
    echo "<tr><th>Randevu Tarih</th><th>Randevu Saat</th><th>Randevu Açıklama</th><th>Randevu Seç</th></tr>";

    while($satir = mysqli_fetch_assoc($sonuc)){
        echo "<tr>";
        echo "<td>".$satir['randevu_tarih']."</td>";
        echo "<td>".$satir['randevu_saat']."</td>";
        echo "<td>".$satir['randevu_aciklama']."</td>";
        echo "<td><input type='radio' name='secilen_randevu' value='".$satir['randevu_id']."'></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo '<div class="mb-3">';
    echo '<textarea class="form-control" name="yeniAciklama" id="yeniAciklama" rows="3"></textarea>';
    echo '<input type="submit" name="submit" id="submit">';
    echo '</div>';
      
    echo "</form>";

    if(isset($_POST['submit'])){
        $secilenRandevuID = $_POST['secilen_randevu'];
        $yeniAciklama = $_POST['yeniAciklama'];
        $sql1 = "UPDATE `randevular` SET `randevu_aciklama` = '$yeniAciklama'
        WHERE `randevu_id` = $secilenRandevuID";
        mysqli_query($conn, $sql1);
        echo "<script>alert('Randevunu açıklamanız güncellendi.'); window.location='kisiselsayfa.php';</script>";
    }
}
else{
    echo "Görüntülenecek randevu bulunamadı.";
}

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Düzenle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

</body>
</html>
