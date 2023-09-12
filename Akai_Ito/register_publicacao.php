<?php
session_start();
include("conexao.php");

    if(!isset($_SESSION['username']))
    {
        header("location:login_player.php");
    }

    elseif($_SESSION['usertype']=='admin')
    {
        header("location:login_adm.php");
    }
    
    elseif($_SESSION['usertype']=='anunciante')
    {
        header("location:login_player.php");
    }

//Funcao que verifica login

    $l = isset($_SESSION["username"]) ?$_SESSION["username"]:"";
    $s = isset($_SESSION["password"]) ?$_SESSION["password"]:"";

//Funcao que recupera dados da tabela
    
    $dados = mysqli_query($data,"select * from jogador WHERE username = '$l'");
    while ($d = mysqli_fetch_array($dados)){
        $id_user_log = $d['id'];
        $username_user_log = $d['username'];
    }

if(isset($_POST['register']))
    {

//coleta dados do form

      $publi_comment=$_POST['comment'];
      $publi_chapter=$_POST['chapter'];

//insere anuncio na tabela

        $sql="INSERT INTO forum(comentario,id_user,user_name,story_chapter) VALUES ('$publi_comment','$id_user_log','$username_user_log','$publi_chapter')";             
        $result=mysqli_query($data,$sql);

        if($result)
        {
            echo "<script type='text/javascript'>
            alert('Data Uploaded Succcessfully');
            </script>";
            
            header("location:playerhome.php");
        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogador</title>

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
            <li><a href="playerhome.php">Inicio</a></li>
            <li><a href="player_game.php">Jogo</a></li>
            <li><a href="player_perfil.php">Perfil</a></li>
            <li><a href="player_anuncios.php">Anuncios</a></li>
            <li><a href="logout.php" class="custom-btn btn-4">Logout</a></li>
        </ul>
    </nav>

    <p><br><br><br><br></p>

<!--form de registro-->
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="register_publicacao.php" method="POST" enctype="multipart/form-data">
              <h2 class="fw-bold mb-2 text-uppercase">Cadastrar publicação</h2>
              <p class="text-white-50 mb-5">Por favor insira os dados!</p>
            
              <!--Descricao-->    
              <div class="form-outline form-white mb-4">
                <label class="form-label" for="comment">Comentário: </label>
                <input type="text" name="comment" id="comment" class="form-control form-control-lg" required/>
              </div>

            <!--Capitulo-->    
            <div class="form-outline form-white mb-4">
                <label class="form-label" for="chapter">A respeito de qual capitulo é sua publicação? </label>
                <input type="text" name="chapter" id="chapter" class="form-control form-control-lg" pattern="^[0-9]+$" required/>
              </div>

              <div class="form-outline form-white mb-4">
                <input class="btn btn-outline-light btn-lg px-5" type="submit" name="register" value="Registrar publicação">
              </div>

            </div>
            </form>

    </section>
</body>
</html>