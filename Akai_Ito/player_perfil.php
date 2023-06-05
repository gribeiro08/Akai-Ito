<?php
session_start();
include("conexao.php");

//controle de sessao
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
        <h1 class="titulo_pagina">Perfil do jogador</h1>
    </div>
    

    <?php
 
//Funcao que verifica login

    $l = isset($_SESSION["username"]) ?$_SESSION["username"]:"";
    $s = isset($_SESSION["password"]) ?$_SESSION["password"]:"";

//Funcao que recupera dados da tabela
     
    $dados = mysqli_query($data,"select * from jogador WHERE username = '$l'");
    while ($d = mysqli_fetch_array($dados)){
        $id_log = $d['id'];
        $name_log = $d['username'];
        $nickname = $d['nickname'];
        $data_nasc_log = $d['data_nasc'];
        $full_name_log = $d['full_name'];
        $password_log = $d['password'];
        //no caso de um novo campo da tabela, adicionar nova variavel $nomeDaSuaVariavel=$d['nome igual dela igual a salva no banco de dados']
    }

//Funcao para deletar conta a partir do id

    if(isset($_GET['id']))
    { ?>
        <div class="aviso_delete" style="text-align:center">
            <h4>Tem certeza que deseja deletar esta conta?</h4> 
            <form action="" method="post" >
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <input type="submit" name="deletar"  class="custom-btn btn-4" value="Deletar">
            </form>
        </div>

    <?php } 

        if(isset($_POST['deletar']))
        {
            $sql = "DELETE FROM jogador WHERE id= '$id_log'";
            
            if($data->query($sql)=== TRUE){
            ?>

            <script language="JavaScript">
                alert('Cliente removido com sucesso!');
                location.href = 'index.php';
            </script>

       <?php }else{
           ?>

            <script language="JavaScript">
                alert('Algo deu errado');
                history.go(-1);
            </script>    
        <?php } 
        } ?>

<!--display do perfil do user-->
        
<div class="quadrado">
    <header class="perfil">
    <!-- suposta imagem do usuario <img class="perfil-foto" src="#" /> -->
      <div class="titulo">
        <h1>Nome de usuario: <?php echo $name_log; ?></h1>
        <h2>Apelido de Usuário: <?php echo $nickname; ?></h2>
        <h3>Nome completo: <?php echo $full_name_log; ?></h3>
      </div>
    </header>

    <main class="projetos">
            <br>
        <h4>ID do usuario: <?php echo $id_log; ?></h4>
            <br>
        <h4>Data de nascimento: <?php echo $data_nasc_log; ?></h4>
            <br>
        <h4>Senha: <?php echo $password_log; ?></h4>
            <br>
        <!--adicione aqui o novo campo-->
    </main>
  </div>

  
    <br>
<!--    <div> Isso aqui faz o print direto das informaçoes / melhorei ali em cima
        <h4>ID do usuario: <?php echo $id_log; ?></h4>
        <h4>Nome de usuario: <?php echo $name_log; ?></h4>
        <h4>Data de nascimento: <?php echo $data_nasc_log; ?></h4>
        <h4>Nome completo: <?php echo $full_name_log; ?></h4>
        <h4>Senha: <?php echo $password_log; ?></h4>
    </div> -->
    

<!--botao deletar roda o if dentro desta mesma pagina, botao editar direciona para a pagina de ediçao-->    
    
    <div style="text-align:center">
        <a href="player_edit_perfil.php?id=<?php echo $id_log; ?>" class="custom-btn btn-4">Editar conta</a></li>
        <a href="player_perfil.php?id=<?php echo $id_log; ?>" class="custom-btn btn-4">Deletar conta</a></li>
    </div>
       
</section>
</body>
</html>