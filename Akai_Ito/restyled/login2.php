<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <style>   

button {   
       background-color: #500E10;   
       width: 100%;  
        color: white;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }  
         
.aaa{   
       background-color: #500E10;   
       width: 100%;  
        color: white;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         } 

 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid #500E10;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px; 
        color: white; 
    }   
        
     
 .containera {   
        padding: 25px;   
        background-color: white;  
    }   

.form_title
{
    margin-top= 70px;
}

</style>  
</head>    
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
    
    <h1> Login Form Administrator </h1> 
    <h4>

        

    </h4>
    </div> 
    
    <div>

    <form action="login_check.php" method="POST">  
        <div class="containera">   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <input class="aaa" type="submit" name="submit" value="Login">  
        </div>   
    </form>  

    <div style="text-align: center">
    <?php

            error_reporting(0); 
            session_start();
            session_destroy();

            echo $_SESSION["loginMessage"];

        ?>
    </div>

    </div>

</body>     
</html>  