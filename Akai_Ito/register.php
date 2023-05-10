<?php

session_start();
    
include("conexao.php");

    if(isset($_POST['register']))
    {
        $username=$_POST['username'];
        $user_full_name=$_POST['name'];
        $user_data_nasc=$_POST['data_nasc'];
        $user_password=$_POST['password'];
        $user_type=$_POST['usertype_select'];

        $check="SELECT * FROM user WHERE username='$username'";
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
                $sql="INSERT INTO user(username,data_nasc,usertype,full_name,password) VALUES ('$username','$user_data_nasc','$user_type','$user_full_name','$user_password')";             
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
                        $sql="select * from user where username='".$name."' AND password='".$pass."' ";
                        $result=mysqli_query($data,$sql);
                        $row=mysqli_fetch_array($result);

                        if($row["usertype"]=="anunciante")
                        {

                            $_SESSION['username']=$name;
                            $_SESSION['usertype']="anunciante";
                            header("location:anunciantehome.php");
                        }

                        elseif($row["usertype"]=="player")
                        {
                            
                            $_SESSION['username']=$name;
                            $_SESSION['usertype']="player";
                            header("location:playerhome.php");
                        }

                        else
                        {

                            $message= "username or password do not match";       
                            $_SESSION['loginMessage']=$message;
                            header("location:login.php");
                        }
                    }
                }
            else
            {
                echo "Upload Failed";
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
    <title>AAA</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <nav>
 
        <img class="logo" src="img/akai-ito-.png" alt="some text" width=150 height=50>
        <label class="name">Akai Ito</label>

        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contato</a></li>
            <li><a href="register.php" class="btn btn-danger">Register</a></li>
        </ul>
    </nav>


 <body>
    <nav>
 
        <img class="logo" src="img/akai-ito-.png" alt="some text" width=150 height=50>
        <label class="name">Akai Ito</label>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="">Contato</a></li>
        </ul>
    </nav>   
    
    <div style="text-align:center" class="form_title"> 
    
       <h1> Resgister Form </h1> 

    </div> 
    
    <div>

    <form action="register.php" method="POST">  
        <div class="container">   
            <label>Nome de usuario : </label>   
            <input type="text" placeholder="Insira nome de usuario" name="username" required>  
            <br><br>

            <label>Nome completo : </label>   
            <input type="text" placeholder="Insira nome completo" name="name" required>  
            <br><br>

           <label>Data de nascimento : </label>   
            <input type="date" min="1850-01-01" max="2012-12-30" placeholder="Insira data de nascimento" name="data_nasc" required>
            <br><br> 

           <label>Tipo de usuario : </label> 
            <select name="usertype_select" id="usertype">
                <option value="player">player</option>
                <option value="anunciante">anunciante</option>
            </select> 
            <br><br> 

            <label>Senha : </label>  
            <br>     
            <label>Formato de senha exigido : </label>   
            <ol> 
                <li>8 caracteres no mínimo</li>
                <li>1 Letra Maiúscula no mínimo</li>
                <li>1 Número no mínimo</li>
                <li>1 Símbolo no mínimo: $*&@#</li>
                <li>nao permite sequencia de caracteres repetidos</li>
            </ol>
            <input type="password" placeholder="Insira a senha" name="password" id="password"   required >
            <!-- pattern="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}$/" n funciona aaaaaaaaaaaa-->
            <label>Confirme sua senha : </label>   
            <input type="password" placeholder="Insira a senha novamente" name="password_confirmation" id="confirm_password" required>

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

            <input class="aaa" type="submit" name="register" value="Register">  
        </div>   
    </form>  

    </div>

</body>     
</html>   
