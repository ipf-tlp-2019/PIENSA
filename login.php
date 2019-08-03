<?php

session_start();


require 'database.php';

if (!empty($_POST['e-mail']) && !empty($_POST['password_'])) {
  
$records = $conn->prepare('SELECT ID_USUARIO, e_mail, password_1 FROM usuario WHERE e_mail=:email');
$records->bindParam(':email', $_POST['e-mail']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);


$message = '';

if (count($results) > 0 && password_verify($_POST['password_'], $results['password_1'])){
  $_SESSION['user_id'] = $results['ID_USUARIO'];
  header('locationn:  /indx.php');
} else {
  $message = 'Disculpe, los datos no son correctos';
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
  <title>IniciarSecion</title>
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

    <img src="img/pi_icon_2.jpg" width="50" height="50" alt="logo">
    <a class="navbar-brand text-brand" href="indx.php">PI<span class="color-b">ensa</span></a>
  </section>

  <section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <div class="content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
              <span> o <a href="registro.php">Registrate</a></span>
              <div>
                
              <?php if (!empty($message)): ?>
              <p> <?= $message ?></p>
              <?php endif; ?>

              </div>
            </div>
            <form action="loguin.php" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 mb-2">
                    <div class="form-group">
                      <label for="Type">E-mail</label>
                      <input type="text" name="e-mail" class="form-control form-control-lg form-control-a"
                        placeholder="E-mail">
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <label for="Type">Contraseña</label>
                      <input type="password" name="password_" class="form-control form-control-lg form-control-a"
                        placeholder="6 Dígitos">
                    </div>

                  </div>
                </div>
                <div class="col-md-12">
                  <!-- utiliza input para el botton,Fazt -->
                  <button type="submit" value="send" class="btn btn-a">Iniciar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>



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

</body>

</html>