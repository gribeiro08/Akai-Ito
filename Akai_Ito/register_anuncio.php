<?php
session_start();
include("conexao.php");

if(!isset($_SESSION['username']))
{
    header("location:login_anunciante.php");
}

elseif($_SESSION['usertype']=='admin')
{
    header("location:login_adm.php");
}

elseif($_SESSION['usertype']=='player')
{
    header("location:login_anunciante.php");
}

//Funcao que verifica login

    $l = isset($_SESSION["username"]) ?$_SESSION["username"]:"";
    $s = isset($_SESSION["password"]) ?$_SESSION["password"]:"";

//Funcao que recupera dados da tabela
    
    $dados = mysqli_query($data,"select * from anunciante WHERE username = '$l'");
    while ($d = mysqli_fetch_array($dados)){
        $id_user_log = $d['id'];
    }

//coleta dados do form

if(isset($_POST['register']))
    {
        $an_legenda=$_POST['description'];
        $an_url=$_POST['url'];
        $an_img=$_FILES['image'];

            $sql="INSERT INTO anuncios(legenda,URL,img_an,id_user) VALUES ('$an_legenda','$an_url','$an_img','$id_user_log')";             
            $result=mysqli_query($data,$sql);

            if($result)
            {
                echo "<script type='text/javascript'>
                alert('Data Uploaded Succcessfully');
                </script>";
                
                header("location:anunciante_anuncios.php");
            }

           

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anunciante</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>
<section class="min-vh-100 gradient-custom">    
<!--navbar-->
    <nav>

        <img class="logo" src="img/akai-ito-.png" alt="some text" width=150 height=50>
        <label class="name">Akai Ito</label>

        <ul>
            <li><a href="anunciantehome.php">Inicio</a></li>
            <li><a href="anunciante_anuncios.php">Anuncios</a></li>
            <li><a href="anunciante_perfil.php">Perfil</a></li>
            <li><a href="logout.php" class="custom-btn btn-4">Logout</a></li>
        </ul>
    </nav>

    <p><br><br><br><br></p>

<!--titulo-->
    <div style="text-align:center">
        <h1 class="titulo_pagina">Anuncios</h1>
        <br><br>
    </div>

    <form action="register_anuncio.php" method="POST" enctype="multipart/form-data">
		<label for="image">Imagem:</label>
		<input type="file" name="image"/>
		<br/>
        <label for="description">Descricao:</label>
		<input type="text" name="description"/>
		<br/>
        <label for="url">URL:</label>
		<input type="url" name="url"/>
		<br/>
		<button class="btn btn-outline-light btn-lg px-5" type="submit" name="register">Registrar</button>
	</form>

    </section>
</body>
</html>