<?php

session_start();
$host="localhost";

    $user="root";

    $password="";

    $db="akaiito";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['register']))
    {
        $username=$_POST['username'];
        $user_full_name=$_POST['name'];
        $user_data_nasc=$_POST['data_nasc'];
        $user_password=$_POST['password'];
        $user_type=$_POST['usertype']; /*addlashes($_POST['usertype_select']);

        switch($user_type)
        {
            case '1':
                $user_type = 'player';
            break;
            case '2':
                $user_type = 'anunciante';
            break;
        } */

        $sql="INSERT INTO user(username,data_nasc,usertype,full_name,password) VALUES ('$username','$user_data_nasc','$user_type','$user_full_name','$user_password')";
        
        $result=mysqli_query($data,$sql);

        if($result)
        {
            echo "Data Uploaded Succcessfully";
        }
        
        else
        {
            echo "Upload Failed";
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
            <label>Username : </label>   
            <input type="text" placeholder="Insira username" name="username" required>  
            <p></p>

            <label>Full name : </label>   
            <input type="text" placeholder="Insira nome completo" name="name" required>  
            <p></p>

            <label>Birth Date : </label>   
            <input type="date" placeholder="Insira data de nascimento" name="data_nasc" required>
            <p></p>

<!--           <label>User Type : </label> 
            <select name="usertype_select" id="usertype">
                <option value="1">player</option>
                <option value="2">anunciante</option>
            </select> -->

            <label>Usertype (player ou anunciante) : </label>   
            <input type="text" placeholder="Insira tipo de usuario" name="usertype" required>  
            <p></p>

            <label>Password : </label>   
            <input type="password" placeholder="Insira senha" name="password" required>  

            <input class="aaa" type="submit" name="register" value="Register">  
        </div>   
    </form>  

    </div>

</body>     
</html>   


