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

//Funcao que recupera dados da tabela jogador
    
    $dados = mysqli_query($data,"select * from jogador WHERE username = '$l'");
    while ($d = mysqli_fetch_array($dados)){
        $id_user_log = $d['id'];
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

<!--titulo-->
    <div style="text-align:center">
        <h1 class="titulo_pagina">Minhas publicações</h1>
        <br><br>
    </div>

<!--btn para cadastrar nova publicação-->
    <div style="text-align:center">
        <a href="register_publicacao.php" class="custom-btn btn-4">Cadastrar nova publicação</a>
    </div>

<?php             
//Funcao para deletar anuncio a partir do id

if(isset($_GET['id_d']))
{ $id_delete = $_GET['id_d'];
    ?>
    <div class="aviso_delete" style="text-align:center">
        <h4>Tem certeza que deseja deletar esta publicação?</h4>
        <form action="" method="post" >
            <input type="hidden" name="id_d" value="<?php echo $_GET['id_d'] ?>">
            <input type="submit" name="deletar"  class="custom-btn btn-4" value="Deletar">
        </form>
    </div>

<?php  

    if(isset($_POST['deletar']))
    {
        $sql = "DELETE FROM forum WHERE id= '$id_delete'";
        
        if($data->query($sql)=== TRUE){
/*o script a seguir deleta o anuncio, aparece o aviso mas n da refresh na pagina*/
        ?>

        <script language="JavaScript">
            alert('Publicação removido com sucesso!');   
            location.href = 'player_postagens.php';         
        </script>

   <?php }else{?>
       
        <script language="JavaScript">
            alert('Algo deu errado');
            history.go(-1);
        </script>    
        
    <?php } 
    } 
}

//Funcao que recupera dados da tabela forum

    $dados_publi = mysqli_query($data,"select * from forum WHERE id_user='$id_user_log'");
    while ($d_pb = mysqli_fetch_assoc($dados_publi)){
        $id_pb = $d_pb['id'];
        $comment_pb = $d_pb['comentario'];
        $user_id_pb = $d_pb['id_user'];
        $user_name_pb = $d_pb['user_name'];
        $story_chapter_pb = $d_pb['story_chapter'];
    
?>

<!--Tem que rever pq n a imagem n aparece, pode ser pq no banco esta como BLOB, num sei-->


        <div class="card">
            <div class="card-header">
                <img class="user-image" src="https://i.pinimg.com/originals/4b/3e/02/4b3e0279e016cc145240de10c8a06fb6.png">
                <p class="user-name"><?php echo $d_pb['user_name']?></p>
                <p>&nbsp&nbsp&nbsp&nbsp</p>
                <!--botao de editar-->
                <a href="player_edit_postagem.php?id=<?php echo $id_pb;?>"><img class="user-image" src="https://cdn-icons-png.flaticon.com/512/1159/1159633.png"></a>
                <!--botao de deletar-->
                <a href="player_postagens.php?id_d=<?php echo $id_pb;?>"><img class="user-image" src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png"></a>

            </div>

            <div class="card-content">
                <p><?php echo $d_pb['comentario']?></p>
                <hr>
            </div>

            <div class="card-actions">
                <p>Capítulo: <?php echo $d_pb['story_chapter']?></p>
            </div>
        </div>  
    
<?php    
}
?>


</section>
</body>
</html>