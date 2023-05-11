<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>
    <nav>
 
        <img class="logo" src="img/akai-ito-.png" alt="some text" width=150 height=50>
        <label class="name">Akai Ito</label>

        <ul>
            <li><a href="anunciantehome.php">Inicio</a></li>
            <li><a href="anunciante_anuncios.php">Anuncios</a></li>
            <li><a href="anunciante_perfil.php">Perfil</a></li>
            <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
        </ul>
    </nav>   
    
    <div style="text-align:center" class="form_title"> 
    <br><br><br><br><br>
       <h1> Editar </h1> 

    </div> 
    
    <div>
    
<?php
 session_start();
 include("conexao.php");



//Funcao para editar o usuario ?>
<?php    if(isset($_GET['id']))
        { ?>
<form action="" method="POST">  
        <div class="container">   
            <label>Nome de usuario : </label>   
            <input type="text" placeholder="Insira nome de usuario" name="new_username" required>  
            <br><br>

            <label>Nome completo : </label>   
            <input type="text" placeholder="Insira nome completo" name="new_name" required>  
            <br><br>

           <label>Data de nascimento : </label>   
            <input type="date" min="1850-01-01" max="2012-12-30" placeholder="Insira data de nascimento" name="new_data_nasc" required>
            <br><br> 

            <label>Tem certeza que deseja editar sua conta? (Após esta ação você deverá realizar login novamente com seu novo nome de usuário)</label>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <input class="aaa" type="submit" name="editar" value="Editar">
        
        <?php } 
        //Funcao que verifica login

    $l = isset($_SESSION["username"]) ?$_SESSION["username"]:"";
    $s = isset($_SESSION["password"]) ?$_SESSION["password"]:"";

//Funcao que recupera dados da tabela
 
    $dados = mysqli_query($data,"select * from user WHERE username = '$l'");
    while ($d = mysqli_fetch_array($dados)){
        $id_log = $d['id'];
    }

            if(isset($_POST['editar']))
            {
                
                $new_username=$_POST['new_username'];
                $new_user_full_name=$_POST['new_name'];
                $new_user_data_nasc=$_POST['new_data_nasc'];

                echo $id_log;

                $sql = "UPDATE user SET username = '$new_username', data_nasc = '$new_user_data_nasc', full_name = '$new_user_full_name' WHERE id= '$id_log'";
                
                if($data->query($sql)=== TRUE){
                ?>

                <script language="JavaScript">
                    alert('Conta editada com sucesso!');
                    location.href = 'login.php';
                </script>

        <?php }else{
            ?>

                <script language="JavaScript">
                    alert('Algo deu errado');
                    history.go(-1);
                </script>    
            <?php } 
            } ?>

</body>
</html>