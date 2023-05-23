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
            <li><a href="logout.php" class="custom-btn btn-4">Logout</a></li>
        </ul>
    </nav>

<p><br><br><br><br></p>

<!--titulo-->

    <div style="text-align:center">
        <h1 class="titulo_pagina">Seja bem vindo Jogador</h1>
    </div>

<!--btn para cadastrar nova publicação-->
    <div style="text-align:center">
        <a href="register_publicacao.php" class="custom-btn btn-4">Cadastrar nova publicação</a>
    </div>


    <?php
//Funcao que recupera dados da tabela anunciante

    $dados_publi = mysqli_query($data,"select * from forum");
    while ($d_pb = mysqli_fetch_assoc($dados_publi)){
        $id_pb = $d_pb['id'];
        $comment_pb = $d_pb['comentario'];
        $user_id_pb = $d_pb['id_user'];
        $user_name_pb = $d_pb['user_name'];
        $story_chapter_pb = $d_pb['story_chapter'];

/*
        echo $id_pb, '<br>'; 
        echo $comment_pb, '<br>'; 
        echo $user_id_pb, '<br>';
        echo $user_name_pb, '<br>';
        echo $story_chapter_pb, '<br>';              */

?>

        <div class="card">
            <div class="card-header">
                <img class="user-image" src="https://scontent-mia1-2.cdninstagram.com/t51.2885-19/s150x150/16123842_1714482082215051_562655198405722112_n.jpg">
                <p class="user-name"><?php echo $d_pb['user_name']?></p>
            </div>

            <div class="card-content">
                <p><?php echo $d_pb['comentario']?></p>
                <hr>
            </div>

            <div class="card-actions">
                <p><?php echo $d_pb['story_chapter']?></p>
            </div>
        </div>  

<?php    
}
?>
    
    

<!--
    exemplo de card
    <div class="card">
        <div class="card-header">
            <img class="user-image" src="https://scontent-mia1-2.cdninstagram.com/t51.2885-19/s150x150/16123842_1714482082215051_562655198405722112_n.jpg">
            <p class="user-name">untiporaro__</p>
            <p class="time">1h</p>
        </div>

        <div class="card-image">
            <img src="https://c.tadst.com/gfx/750w/sunrise-sunset-sun-calculator.jpg" width="100%">
        </div>

        <div class="card-content">
            <p class="likes">13 me gusta</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <p>
            <a href="#" class="hashtag">#sunset</a>
            <a href="#" class="hashtag">#nofilterneeded</a>
            <a href="#" class="hashtag">#yaNoMasHashtags</a>
            </p>
            <hr>
        </div>

        <div class="card-actions">
            <a href="#" class="action-icons"><i class="fa fa-heart-o"></i></a>
            <input class="comments-input" type="text" placeholder="Añade un Comentario..." />
            <a href="#" class="action-icons"><i class="fa fa-ellipsis-h"></i></a>
        </div>
</div>  

-->

</section>
</body>
</html>