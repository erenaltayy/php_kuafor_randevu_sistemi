<?php
session_start();
require_once("veri_tabani.php");

if(isset($_POST["username"]) && isset($_POST["u_password"])){
    $username = $_POST["username"];
    $user_password = $_POST["u_password"];
    $passwordh = password_hash($user_password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM `kullanicilar` WHERE `kullanici_adi` = '$username'";

    $sonuc = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($sonuc) > 0){
        $row = mysqli_fetch_assoc($sonuc);
        $db_upass = $row["sifre"];

        if(password_verify($user_password , $db_upass)){
            $_SESSION["kullanici_id"] = $row["kullanici_id"];
            header("Location: kisiselsayfa.php");
            exit();
        }
        else{
            echo '<div class="p-3 mb-2 bg-warning text-dark"><p>Şifrenizi yanlış girdiniz.</p></div>';
        }
    }
    else{
        echo '<div class="p-3 mb-2 bg-warning text-dark"><p>Kullanıcı bulunamadı.</p></div>';
    }
}
else{
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Giriş Yap</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="mt-4 mb-4">Giriş Yap</h2>
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="u_password">Şifre:</label>
            <input type="password" class="form-control" id="u_password" name="u_password">
          </div>
          <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
      </div>
    </div>
  </div>

</html>
<?php
}
mysqli_close($conn);
?>