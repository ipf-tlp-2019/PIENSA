<?php
require 'database.php';

$message = '';

if (!empty($_POST['e-mail']) && !empty($_POST['password_'])) {

  $sql = "INSERT INTO usuario (e_mail, password_1) VALUES (:email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->BindParam(':email',$_POST['e-mail']);
  $password = password_hash($_POST['password_'], PASSWORD_BCRYPT);
  $stmt->BindParam(':password', $password);

if ($stmt->execute()) {
  $message = 'Se ha creado EXITOSAMENTE un usuario';
} else {
  $message = 'Disculpe, ha ocurrido un error creando su contraseña';
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
  <title>Registro</title>
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
        <div class="col-8">

          <div class="modal-header">
            <section>
              <img src="img/pi_icon_2.jpg" width="50" height="50" alt="logo">
              <a class="navbar-brand text-brand" href="indx.php">PI<span class="color-b">ensa</span></a>
            </section>
            
<?php if (!empty($message)): ?>
<p> <?= $message ?></p>
<?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- registro -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">

        <div class="container">

          <div>
            <div class="title-box-d">
              <h3 class="title-d">Registrate</h3>
              <span> o <a href="login.php">Iniciar sesión</a></span>
            </div>
            <div>
              <form action="registro.php" method="post" class="form-a">
                <div class="row">
                  <div class="col-md-12 mb-2">
                    <div class="form-group">
                      <label for="Type">Apellido/s, nombre/s</label>
                      <input type="text" name="nombre" class="form-control form-control-lg form-control-a"
                        placeholder="Apellido/s, nombre/s">
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <label for="Type">DNI</label>
                      <input type="text" name="dni" class="form-control form-control-lg form-control-a" placeholder="DNI">
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <label for="city">Fecha de nacimiento</label>
                      <input type="date" name="fecha_nacimiento" class="form-control form-control-lg form-control-a" placeholder="dd/mm/aaaa">
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <label for="bedrooms">Teléfono</label>
                      <input type="text" name="telefono" class="form-control form-control-lg form-control-a" placeholder="3704-000000">
                    </div>
                  </div>

                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <label for="bathrooms">Año de ingreso</label>
                      <input type="text" name="año" class="form-control form-control-lg form-control-a" placeholder="aaaa">
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <label for="garages">E-mail</label>
                      <input type="email" name="e-mail" class="form-control form-control-lg form-control-a" placeholder="E-mail">
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <label for="garages">Contraseña</label>
                      <input type="password" name="password_" class="form-control form-control-lg form-control-a" placeholder="6 Dígitos">
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <label for="Type">Repetir contraseña</label>
                      <input type="password" name="confirmar_password"
                        class="form-control form-control-lg form-control-a" placeholder="Repetir contraseña">
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <br>
                    <button type="button" class="btn btn-success">Estudiante</button>
                    <button type="button" class="btn btn-success">Docente</button>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" value="send" class="btn btn-success">Guardar</button>
                    <br>
                    <br>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- fin modal -->
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