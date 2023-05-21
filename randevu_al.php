<?php
session_start();
require_once("veri_tabani.php");
function randevuAl($conn, $randevuID, $randevuAciklama){
    $sql = "SELECT * FROM `randevular` WHERE `randevu_id` = $randevuID";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $sql = "UPDATE `randevular` SET `randevu_musaitlik` = 0,
        `randevu_aciklama` = '$randevuAciklama',
        `kullanici_id` = " . $_SESSION['kullanici_id'] . "
        WHERE `randevu_id` = $randevuID";
        mysqli_query($conn, $sql);
        echo "<script>alert('Randevunuz Oluşturuldu'); window.location='kisiselsayfa.php';</script>";
        exit();   
    }
    else{
        echo "Müsait bir randevu bulunamadı.";
    }
}

$sql = "SELECT * FROM `randevular` WHERE `randevu_musaitlik` = 1";
$sonuc = mysqli_query($conn, $sql);

if(mysqli_num_rows($sonuc) > 0){
    echo "<h1>Randevu Listesi</h1>";
    echo '<form action="randevu_al.php" method="post">';
    echo "<table class='table table-hover'>";
    echo "<tr><th>Randevu Tarih</th><th>Randevu Saat</th><th>Randevu Seç</th></tr>";

    while($satir = mysqli_fetch_assoc($sonuc)){
        echo "<tr>";
        echo "<td>".$satir['randevu_tarih']."</td>";
        echo "<td>".$satir['randevu_saat']."</td>";
        echo "<td><input type='radio' name='secilen_randevu' value='".$satir['randevu_id']."'></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo '<div class="mb-3">';
    echo '<label for="randevu_aciklama" class="form-label">Randevu Açıklaması</label>';
    echo '<textarea class="form-control" name="randevu_aciklama" id="randevu_aciklama" rows="3"></textarea>';
    echo '</div>';
    echo "<input type='submit' name='submit' value='Randevu Al'>";
    echo "</form>";

    if(isset($_POST['submit'])){
        $secilenRandevuID = $_POST['secilen_randevu'];
        $randevuAciklama = $_POST['randevu_aciklama'];
        randevuAl($conn, $secilenRandevuID, $randevuAciklama);
    }
}
else{
    echo '<div class="p-3 mb-2 bg-warning text-dark"><p>Müsait bir randevu bulunmamaktadır.</p></div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Al</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <p>Randevu açıklaması bölümüne kısaca yaptırmak istediğiniz işlemi yazabilirsiniz (saç kesim, saç boyatma vb.).
        İşleminiz saç boyatma ise ve özel bir renk istiyorsanız ayrıca belirtebilirsiniz.
    </p>
    
    <p>Randevu oluşturmak için size uygun olan tarihi seçiniz ve Randevu Al butonuna tıklayınız.</p>
    
    
</body>
</html>
<?php
mysqli_close($conn);
?>
