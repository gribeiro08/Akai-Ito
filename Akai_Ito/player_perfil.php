<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>
    <nav>

    <img class="logo" src="img/akai-ito-.png" alt="some text" width=150 height=50>
    <label class="name">Akai Ito</label>

    <ul>
        <li><a href="playerhome.php">Inicio</a></li>
        <li><a href="player_game.php">Jogo</a></li>
        <li><a href="player_perfil.php">Perfil</a></li>
        <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
    </ul>
    </nav>
    <p><br><br><br><br></p>

    <h1>Perfil do jogador</h1>

    <?php
    session_start();
    include("conexao.php");
    
    $l = isset($_SESSION["username"]) ?$_SESSION["username"]:"";
    $s = isset($_SESSION["password"]) ?$_SESSION["password"]:"";

    
    $dados = mysqli_query($data,"select * from user WHERE username = '$l'");
    while ($d = mysqli_fetch_array($dados)){
        $id_log = $d['id'];
        $name_log = $d['username'];
        $data_nasc_log = $d['data_nasc'];
        $full_name_log = $d['full_name'];
        $password_log = $d['password'];
    }

    //O deletar e Update não estao funcionais ;-;
    //delete ta me matando aaaaaaaa

    if(isset($_GET['id']))
    { ?>
        <h2>Tem certeza que deseja deletar esta conta?</h2> 
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <input type="submit" name="deletar" value="Deletar">
        </form>

    <?php } 

        if(isset($_POST['deletar']))
        {
            $query = "DELETE FROM user WHERE id=". (int) $_POST['id'];
        }

    ?>
    
    <br>
    <div>
        <h4>ID do usuario: <?php echo $id_log; ?></h4>
        <h4>Nome de usuario: <?php echo $name_log; ?></h4>
        <h4>Data de nascimento: <?php echo $data_nasc_log; ?></h4>
        <h4>Nome completo: <?php echo $full_name_log; ?></h4>
        <h4>Senha: <?php echo $password_log; ?></h4>
    </div>

    <a href="" class="btn btn-danger">Editar conta</a></li>
    <a href="player_perfil.php?id=<?php echo $id_log; ?>" class="btn btn-danger">Deletar conta</a></li>
    
       

</body>
</html>