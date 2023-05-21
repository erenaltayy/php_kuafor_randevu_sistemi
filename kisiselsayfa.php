<?php
session_start();
require_once("veri_tabani.php");

$ses_kullaniciID = $_SESSION["kullanici_id"];
$sql = "SELECT * FROM `randevular` WHERE `kullanici_id` = $ses_kullaniciID ";

$sonuc = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="randevu_al.php">Randevu Al</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="randevu_duzenle.php">Randevu Düzenle</a>
          </li>
                    <li class="nav-item">
            <a class="nav-link" href="randevu_iptal.php">Randevu İptal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profil.php">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cikis.php">Çıkış Yap</a>
          </li>   
        </ul>
      </div>
    </div>
  </nav>
</body>

</html>

<?php
echo "<h1>Aktif Randevular</h1>";
if(mysqli_num_rows($sonuc) > 0){
    echo "<table class='table table-hover'>";
    echo "<thead><tr><th>Randevu Tarih</th><th>Randevu Saat</th><th>Randevu Açıklama</th></tr></thead>";
    echo "<tbody>";
    while($satir = mysqli_fetch_assoc($sonuc)){
        echo "<tr>";
        echo "<td>".$satir['randevu_tarih']."</td>";
        echo "<td>".$satir['randevu_saat']."</td>";
        echo "<td>".$satir['randevu_aciklama']."</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
else{
    echo '<div class="p-3 mb-2 bg-warning text-dark"><p>Görüntülenecek aktif randevunuz bulunmamaktadır.</p></div>';
    
}
mysqli_close($conn);
?>
