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
    <link rel="stylesheet" type="text/css" href="css/style_anuncios.css">

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

<!--titulo-->
<div style="text-align:center">
        <h1 class="titulo_pagina">Anuncios</h1>
        <br><br>
    </div>
    
<?php
//Funcao que recupera dados da tabela anunciante

$dados = mysqli_query($data,"select * from anuncios");
while ($d = mysqli_fetch_assoc($dados)){
    $id_an = $d['id'];
    $legenda_an = $d['legenda'];
    $url_an = $d['URL'];
    $img_an = $d['img_an'];

?>

<!--Tem que rever pq n a imagem n aparece, pode ser pq no banco esta como BLOB, num sei-->

<div class="container_an">
    <div class="gallery">

        <div class="gallery-item">
                    <a href="<?php echo $d['URL']?>"><img class="gallery-image" src="<?php echo $d['img_an']?>" alt="<?php echo $d['legenda']?>"></a>
            </div>    
         </div>
    </div>
</div>

<?php    
}
?>


</section>
</body>
</html>

