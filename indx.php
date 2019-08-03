<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT ID_USUARIO, e_mail, password_1 FROM usuario WHERE ID_USUARIO=:id');

$records->bindParam(':id', $_SESSION['user_id']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);

$user=null;

if (count($results) > 0 ) {
  $user = $results;

}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    body {
      background-image: linear-gradient(to right, rgba(0, 255, 76, 0), rgba(0, 255, 98, 0.377));
    }
  </style>
  <meta charset="utf-8">
  <title>Piensa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="icon" href="img/pi_icon_2.jpg" type="image/png" sizes="16x16">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <div class="modal-header">
            <section>
              <img src="img/pi_icon_2.jpg" width="50" height="50" alt="logo">
              <a class="navbar-brand text-brand" href="indx.php">PI<span class="color-b">ensa</span></a>
            </section>
          </div>
          
          <div>
            <br>
            <h4>Para ingresar a la página de Piensa debes registrarte y luego iniciar sesión </h4>
            <br>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
  
            <?php ?>
            <?php if(!empty($user)): ?>
            <br> BIENVENIDO. <?= $user['e_mail'] ?>
            <br> Tu estas logueado
            <a href="finlogin.php">Cerrar sesión</a>
            <?php else: ?>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <div>
            <h5><small id="emailHelp" class="form-text text-muted"> Si no te has registrado aún, hazlo ahora</small>
            </h5>
          </div>
          <div class="col-md-6 mb-2">
            <h4> <a href="registro.php" target="_blank">Registrate</a> </h4>
          </div>
          <div>
            <h5><small id="emailHelp" class="form-text text-muted"> Si no haz iniciado sesión aún, hazlo ahora</small>
            </h5>
          </div>
          <div>
            <h4> <a href="login.php" target="_blank">Iniciar Sesión</a> </h4>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  </section>
  <section>

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/scrollreveal/scrollreveal.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
  </section>
</body>

</html>