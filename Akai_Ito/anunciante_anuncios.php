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

//Funcao que recupera dados da tabela anunciante
    
    $dados = mysqli_query($data,"select * from anunciante WHERE username = '$l'");
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
    <title>Anunciante</title>

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

<!--btn para cadastrar novo anuncio-->
    <div style="text-align:center">
        <a href="register_anuncio.php" class="custom-btn btn-4">Cadastrar novo anuncio</a>
    </div>
    <?php             
//Funcao para deletar anuncio a partir do id

if(isset($_GET['id_d']))
{ $id_delete = $_GET['id_d'];
    ?>
    <div class="aviso_delete" style="text-align:center">
        <h4>Tem certeza que deseja deletar este anuncio?</h4>
        <form action="" method="post" >
            <input type="hidden" name="id_d" value="<?php echo $_GET['id_d'] ?>">
            <input type="submit" name="deletar"  class="custom-btn btn-4" value="Deletar">
        </form>
    </div>

<?php  

    if(isset($_POST['deletar']))
    {
        $sql = "DELETE FROM anuncios WHERE id= '$id_delete'";
        
        if($data->query($sql)=== TRUE){
/*o script a seguir deleta o anuncio, aparece o aviso mas n da refresh na pagina*/
        ?>

        <script language="JavaScript">
            alert('Anuncio removido com sucesso!');     
            location.href = 'anunciante_anuncios.php';       
        </script>

   <?php }else{?>
       
        <script language="JavaScript">
            alert('Algo deu errado');
            history.go(-1);
        </script>    
        
    <?php } 
    } 
}?>
<?php
//Funcao que recupera dados da tabela anuncios

    $dados_an = mysqli_query($data,"select * from anuncios WHERE id_user = '$id_user_log'");
    while ($d_an = mysqli_fetch_assoc($dados_an)){
        $id_an = $d_an['id'];
        $legenda_an = $d_an['legenda'];
        $url_an = $d_an['URL'];
        $img_an = $d_an['imagem'];

?>

<!--Tem que rever pq n a imagem n aparece, pode ser pq no banco esta como BLOB, num sei-->

    <div class="container_an">
        <div class="gallery">

            <div class="gallery-item">
                <div class="card">
                    <div class="card-header">

                        <!--botao de editar-->
                        <a href="anunciante_edit_anuncio.php?id=<?php echo $id_an;?>"><img class="user-image" src="https://cdn-icons-png.flaticon.com/512/1159/1159633.png"></a>
                        <!--botao de deletar-->
                        <a href="anunciante_anuncios.php?id_d=<?php echo $id_an;?>"><img class="user-image" src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png"></a>
                        <!--titulo da imagem-->
                        <p class="user-name"><?php echo $d_an['legenda']?></p>
                            
    </div>
                            <a href="<?php echo $d_an['URL']?>"><img class="gallery-image" src="<?php echo $d_an['imagem']?>" alt="<?php echo $d_an['legenda']?>"></a>
                    </div>
                        
			                
		                
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