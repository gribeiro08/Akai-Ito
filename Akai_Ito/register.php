<?php

session_start();
    
include("conexao.php");

//acontece quando o botao de registrar é apertado
if(isset($_POST['register']))
{
    //adiciona o que foi digitado nas variaveis
    //na inserçaõ de um novo campo deve fazer mais um: 
    //$nomeDaSuaVariavel=$_POST['nome colocado no id/nome do campo do form']
    $username=$_POST['username'];
    $user_full_name=$_POST['name'];
    $user_data_nasc=$_POST['data_nasc'];
    $user_password=$_POST['password'];
    $user_type=$_POST['usertype'];

    include('registerF.php');

    cadastrar($username, $user_full_name, $user_data_nasc, $user_password, $user_type);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

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
        </ul>
    </nav>

<!--form de registro-->
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="register.php" method="POST">
              <h2 class="fw-bold mb-2 text-uppercase">Registro</h2>
              <p class="text-white-50 mb-5">Por favor insira seus dados!</p>
            
              <!--Campo Nome de usuario-->    
              <div class="form-outline form-white mb-4">
                <input type="text" id="typeUsername" name="username" class="form-control form-control-lg" required/>
                <label class="form-label" for="typeUsername">Nome de usuário</label>
              </div>

              <!--Campo Nome completo-->  
              <div class="form-outline form-white mb-4">
                <input type="text" id="typeFullName" name="name" class="form-control form-control-lg" required/>
                <label class="form-label" for="typeFullName">Nome completo</label>
              </div>

              <!--Campo Data de nascimento-->  
              <div class="form-outline form-white mb-4">
                <input type="date" min="1850-01-01" max="2012-12-30" id="data_nasc" name="data_nasc" class="form-control form-control-lg" required/>
                <label class="form-label" for="data_nasc">Data de nascimento</label>
              </div>

              <!--Campo Tipo de usuario --> 
              <div class="form-outline form-white mb-4">
                <select id="usertype" name="usertype" class="form-control form-control-lg" required>
                <option value="" disabled selected>Selecione um tipo</option>
                <option value="player">Jogador</option>
                <option value="anunciante">Anunciante</option>
                </select>
                <label class="form-label" for="usertype">Selecione o tipo de conta</label>
              </div>

              <!--Campo Senha-->  
              <div class="form-outline form-white mb-4">
                <input type="password" name="password" id="password" class="form-control form-control-lg" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})" required/>
                <label class="form-label" for="password">Senha <br> Formato de senha exigido :</label>
                    <ol>        
                        <li>8 caracteres no mínimo</li>
                        <li>1 Letra Maiúscula no mínimo</li>
                        <li>1 Letra Minuscula no mínimo</li>
                        <li>1 Número no mínimo</li>
                    </ol> 
              </div>

              <!--Campo Confirmaçao de senha--> 
              <div class="form-outline form-white mb-4">
                <input type="password" name="password_confirmation" id="confirm_password" class="form-control form-control-lg" required/>
                <label class="form-label" for="confirm_password">Confirme sua senha</label>
              </div>

              <!--Verifica confirmaçao de senha-->
              <script>
                var password = document.getElementById("password")
                , confirm_password = document.getElementById("confirm_password");   

                function validatePassword(){
                if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Senhas diferentes!");
                } else {
                    confirm_password.setCustomValidity('');
                }
                }

                password.onchange = validatePassword;
                confirm_password.onkeyup = validatePassword;
            </script>

              <button class="btn btn-outline-light btn-lg px-5" id="cadastrarUser" type="submit" name="register">Registrar</button>

            </div>
            </form>

            </div>
        </div>
      </div>
    </div>

</section>

</body>
</html>
