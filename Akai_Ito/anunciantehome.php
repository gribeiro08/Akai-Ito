<?php
session_start();

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
<section class="vh-100 gradient-custom">

<!--navbar-->
    <nav>
        <img class="logo" src="img/akai-ito-.png" alt="some text" width=150 height=50>
        <label class="name">Akai Ito</label>

        <ul>
            <li><a href="anunciantehome.php">Inicio</a></li>
            <li><a href="anunciante_anuncios.php">Anuncios</a></li>
            <li><a id="perfil" href="anunciante_perfil.php">Perfil</a></li>
            <li><a href="logout.php" class="custom-btn btn-4">Logout</a></li>
        </ul>
    </nav>

<p><br><br><br><br></p>

<!--titulo-->

    <div style="text-align:center">
        <h1 class="titulo_pagina">Seja bem vindo Anunciante</h1>
    </div>


</section>
</body>
</html>