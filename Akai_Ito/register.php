<?php

session_start();
    
include("conexao.php");

if(isset($_POST['register']))
{
    $username=$_POST['username'];
    $user_full_name=$_POST['name'];
    $user_data_nasc=$_POST['data_nasc'];
    $user_password=$_POST['password'];
    $user_type=$_POST['usertype'];

//caso o tipo de ussuario seja = 'anunciante' 
    if($user_type=='anunciante')
    {    
        $check="SELECT * FROM anunciante WHERE username='$username'";
        $check_user=mysqli_query($data,$check);
        $row_count=mysqli_num_rows($check_user);

        if($row_count==1)
        {
        echo "<script type='text/javascript'>
            alert('Nome de usuário já existente.');
            </script>";
        }
        else 
        {
            $sql="INSERT INTO anunciante(username,data_nasc,usertype,full_name,password) VALUES ('$username','$user_data_nasc','$user_type','$user_full_name','$user_password')";             
            $result=mysqli_query($data,$sql);

            if($result)
            {
                echo "<script type='text/javascript'>
                alert('Data Uploaded Succcessfully');
                </script>";
                
                
                if($data===false)
                {
                    die("connection error");
                }    

                if($_SERVER["REQUEST_METHOD"]=="POST")
                {
                    $name = $_POST['username'];
                    $pass = $_POST['password'];
                    $sql="select * from anunciante where username='".$name."' AND password='".$pass."' ";
                    $result=mysqli_query($data,$sql);
                    $row=mysqli_fetch_array($result);

                    if($row["usertype"]=="anunciante")
                    {
                        
                        $_SESSION['username']=$name;
                        $_SESSION['usertype']="anunciante";
                        header("location:anunciantehome.php");
                    }

                    else
                    {      
                        header("location:login_anunciante.php");
                    }
                }
            }
        else
        {
            echo "<script type='text/javascript'>
            alert('Algo deu errado.');
            </script>";
            header("location:register.php");
        }

        }
    }

/*caso o tipo de ussuario seja = 'player'  */      
    elseif($user_type=='player')
    {    
        $check="SELECT * FROM jogador WHERE username='$username'";
        $check_user=mysqli_query($data,$check);
        $row_count=mysqli_num_rows($check_user);

        if($row_count==1)
        {
        echo "<script type='text/javascript'>
            alert('Nome de usuário já existente.');
            </script>";
        }
        else 
        {
            $sql="INSERT INTO jogador(username,data_nasc,usertype,full_name,password) VALUES ('$username','$user_data_nasc','$user_type','$user_full_name','$user_password')";             
            $result=mysqli_query($data,$sql);

            if($result)
            {
                echo "<script type='text/javascript'>
                alert('Data Uploaded Succcessfully');
                </script>";
                
                
                if($data===false)
                {
                    die("connection error");
                }    

                if($_SERVER["REQUEST_METHOD"]=="POST")
                {
                    $name = $_POST['username'];
                    $pass = $_POST['password'];
                    $sql="select * from jogador where username='".$name."' AND password='".$pass."' ";
                    $result=mysqli_query($data,$sql);
                    $row=mysqli_fetch_array($result);

                    if($row["usertype"]=="player")
                    {
                        
                        $_SESSION['username']=$name;
                        $_SESSION['usertype']="player";
                        header("location:playerhome.php");
                    }

                    else
                    {      
                        header("location:login_player.php");
                    }
                }
            }
        else
        {
            echo "<script type='text/javascript'>
            alert('Algo deu errado.');
            </script>";
            header("location:register.php");
        }

        }
    }
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
            <a href="register.php" class="custom-btn btn-4">Register</a>
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
            
              <!--Nome de usuario-->    
              <div class="form-outline form-white mb-4">
                <input type="text" id="typeUsername" name="username" class="form-control form-control-lg" required/>
                <label class="form-label" for="typeUsername">Nome de usuário</label>
              </div>

              <!--Nome completo-->  
              <div class="form-outline form-white mb-4">
                <input type="text" id="typeFullName" name="name" class="form-control form-control-lg" required/>
                <label class="form-label" for="typeFullName">Nome completo</label>
              </div>

              <!--Data de nascimento-->  
              <div class="form-outline form-white mb-4">
                <input type="date" min="1850-01-01" max="2012-12-30" id="data_nasc" name="data_nasc" class="form-control form-control-lg" required/>
                <label class="form-label" for="data_nasc">Data de nascimento</label>
              </div>

              <!--Tipo de usuario --> 
              <div class="form-outline form-white mb-4">
                <select id="usertype" name="usertype" class="form-control form-control-lg" required>
                <option value="" disabled selected>Selecione um tipo</option>
                <option value="player">Jogador</option>
                <option value="anunciante">Anunciante</option>
                </select>
                <label class="form-label" for="usertype">Selecione o tipo de conta</label>
              </div>

              <!--Senha-->  
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

              <!--Confirmaçao de senha--> 
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

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Esqueceu sua senha?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="register">Registrar</button>

            </div>
            </form>

            </div>
        </div>
      </div>
    </div>

</section>

</body>
</html>