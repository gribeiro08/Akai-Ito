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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogador</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_forum.css">

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
            <li><a href="player_postagens.php">Minhas postagens</a></li>
            <li><a href="logout.php" class="custom-btn btn-4">Logout</a></li>
        </ul>
    </nav>

    <p><br><br><br><br></p>

<?php

//Funcao que apresenta o form de edicao
if(isset($_GET['id']))
{ 
    $id_edit=$_GET['id'];

//Funcao que recupera dados da tabela
    $dados_publi = mysqli_query($data,"select * from forum WHERE id='$id_edit'");
    while ($d_pb = mysqli_fetch_assoc($dados_publi)){
    $id_pb = $d_pb['id'];
    $comment_pb = $d_pb['comentario'];
    $story_chapter_pb = $d_pb['story_chapter'];}

?>

  <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="player_edicao_publicacao.php" method="POST">
              <h2 class="fw-bold mb-2 text-uppercase">Editar</h2>
              <p class="text-white-50 mb-5">Por favor insira os dados!</p>
            
            <!--Descricao-->    
            <div class="form-outline form-white mb-4">
                <label class="form-label" for="new_comment">Comentário: </label>
                <input type="text" name="new_comment" id="new_comment" class="form-control form-control-lg" placeholder="<?php echo $comment_pb; ?>"/>
            </div>

            <!--Capitulo-->    
            <div class="form-outline form-white mb-4">
                <label class="form-label" for="new_chapter">A respeito de qual capitulo é sua publicação? </label>
                <input type="text" name="new_chapter" id="new_chapter" class="form-control form-control-lg" pattern="^[0-9]+$" placeholder="<?php echo $story_chapter_pb; ?>"/>
              </div>

            <div class="form-outline form-white mb-4">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" class="form-control form-control-lg" required/>
                <input class="btn btn-outline-light btn-lg px-5" type="submit" name="editar_pb" value="Editar">
            </div>

            </div>
            </form>

<?php } ?>

            </div>
        </div>
      </div>
    </div>

</section>
</body>
</html>