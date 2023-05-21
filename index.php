<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Bilmem Ne Kuaför</title>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .header {
      background-color: #343a40;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    .services {
      margin-top: 30px;
    }

    .footer {
      background-color: #343a40;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
  </style>
</head>

<body>
  <header class="header">
    <h1>Bilmem Ne Kuaför</h1>
  </header>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="https://github.com/erenaltayy/php_kuafor_randevu_sistemi">Hakkımızda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Giriş Yap</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Kayıt Ol</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h2 class="mt-4">Yapılan İşlemler</h2>
    <ul class="list-group services">
      <li class="list-group-item">Saç Kesimi</li>
      <li class="list-group-item">Saç Boyama</li>
      <li class="list-group-item">Saç Şekillendirme</li>
      <li class="list-group-item">Saç Bakımı</li>
      <li class="list-group-item">Perma</li>
      <li class="list-group-item">Saç Uzatma</li>
      <li class="list-group-item">Saç Tasarımı</li>
      <li class="list-group-item">Sakal Düzenleme</li>
      <li class="list-group-item">Kaş ve Kirpik Bakımı</li>
      <li class="list-group-item">Manikür ve Pedikür</li>
      <li class="list-group-item">Cilt bakımı</li>
    </ul>

    <div class="mt-4">
      <p>Kaydolmak için <a href="signup.php">tıklayınız</a></p>
      <p>Giriş yapmak için <a href="login.php">tıklayınız</a></p>
    </div>
  </div>

  <footer class="footer">
    <p>Tüm hakları saklıdır &copy; 2023 Bilmem Ne Kuaför</p>
    <p>Github linkine ulaşmak için <a href="https://github.com/erenaltayy/php_kuafor_randevu_sistemi">tıklayınız.</a></p>
  </footer>

  
</body>

</html>
