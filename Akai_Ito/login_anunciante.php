<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>
<section class="min-vh-100 gradient-custom">

<!--nav bar-->
  <nav>
  
    <img class="logo" src="img/akai-ito-.png" alt="some text" width=150 height=50>
    <label class="name">Akai Ito</label>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="contato.php">Contato</a></li>
        <a href="register.php" class="custom-btn btn-4">Register</a>
    </ul>
  </nav>

<!--form de login-->

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              
            <form action="login_anunciante_check.php" method="POST">
              <h2 class="fw-bold mb-2 text-uppercase">Login de anunciante</h2>
              <p class="text-white-50 mb-5">Por favor insira seu login e senha!</p>

              <div class="form-outline form-white mb-4">
                <input type="text" id="typeUsername" name="username" class="form-control form-control-lg" required/>
                <label class="form-label" for="typeUsername">Nome de usuário</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" required/>
                <label class="form-label" for="typePasswordX">Senha</label>
              </div>

<!--               <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Esqueceu sua senha?</a></p> -->

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login</button>

            </div>

            <div>
              <p class="mb-0">Não possui uma conta? <a href="register_anunciante.php" class="text-white-50 fw-bold">Registre-se</a>
              </p>
            </div>
            </form>

            <?php

            error_reporting(0); 
            session_start();
            session_destroy();

            echo $_SESSION["loginMessage"];

            ?>

          </div>
        </div>
      </div>
    </div>

</section>

</body>
</html>