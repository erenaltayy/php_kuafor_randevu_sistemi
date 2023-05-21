<?php
session_start();
require_once("veri_tabani.php");

if(isset($_POST["ad"]) && isset($_POST["username"]) && isset($_POST["telno"]) && isset($_POST["email"]) && isset($_POST["u_password"]) && isset($_POST['u_password1'])){
    $ad = $_POST["ad"];
    $username = $_POST["username"];
    $telno = $_POST["telno"];
    $email = $_POST["email"];
    $user_password = $_POST["u_password"];
    $user_password1 = $_POST['u_password1'];
    $passwordh = password_hash($user_password, PASSWORD_DEFAULT);
    if($user_password != $user_password1){
        echo "Şifreler uyuşmuyor";
        exit();
    }
    if(strlen($user_password) < 6){
        echo "Şifreniz en az 6 haneli olmalıdır.";
        exit();
    }
    $sql = "INSERT INTO `kullanicilar` (kullanici_adi, ad_soyad, sifre, tel_no, e_posta) VALUES ('$username', '$ad', '$passwordh', '$telno', '$email')";

    $flag = mysqli_query($conn, $sql);

    $sql1 = "SELECT * FROM `kullanicilar` WHERE `kullanici_adi` = '$username'";

    $sonuc = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($sonuc);

    if($flag){
        echo "Kullanıcı kaydı yapıldı. Giriş yapabilirsiniz.";
        $_SESSION["kullanici_id"] = $row["kullanici_id"];
        header("Location: kisiselsayfa.php");
        exit();
    }else{
        echo "Kullanıcı kaydı yapılamadı, tekrar deneyiniz. ";
        exit();
    }

}
else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Kayıt Ol</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="mt-4 mb-4">Kayıt Ol</h2>
        <form action="signup.php" method="post">
          <div class="form-group">
            <label for="ad">Ad:</label>
            <input type="text" class="form-control" id="ad" name="ad">
          </div>
          <div class="form-group">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="telno">Telefon Numarası:</label>
            <input type="tel" class="form-control" id="telno" name="telno">
          </div>
          <div class="form-group">
            <label for="email">E-posta adresi:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="u_password">Şifre:</label>
            <input type="password" class="form-control" id="u_password" name="u_password">
          </div>
          <div class="form-group">
            <label for="u_password1">Şifrenizi tekrar giriniz:</label>
            <input type="password" class="form-control" id="u_password1" name="u_password1">
          </div>
          <button type="submit" class="btn btn-primary">Kayıt Ol</button>
        </form>
      </div>
    </div>
  </div>


</body>

</html>


<?php
}
mysqli_close($conn);

?>