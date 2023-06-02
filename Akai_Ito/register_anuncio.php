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

//Funcao que recupera dados da tabela
    
    $dados = mysqli_query($data,"select * from anunciante WHERE username = '$l'");
    while ($d = mysqli_fetch_array($dados)){
        $id_user_log = $d['id'];
    }

if(isset($_POST['register']))
  {

//coleta dados do form

$an_legenda=$_POST['description'];
$an_url=$_POST['url'];

//insere anuncio na tabela

    $sql="INSERT INTO anuncios(legenda,URL,img_an,id_user) VALUES ('$an_legenda','$an_url','$id_user_log')";             
    $result=mysqli_query($data,$id);

 /*       if($result)
        {
            echo "<script type='text/javascript'>
            alert('Data Uploaded Succcessfully');
            </script>";
            
            header("location:anunciante_anuncios.php");
        }
*/
  $foto = $_FILES['foto']['tmp_name'];
  $pasta = 'fotos';

  $file = getimagesize($foto);

  if(!preg_match('/^image\/(?:gif|jpg|jpeg|png)$/i', $file['mime'])){
      header("Location: register_anuncio.php?Alert=Formato de imagem inválido");
      exit();
  }

  $extensao = str_ireplace("/", "", strchr($file['mime'], "/"));

  $novoDestino = "{$pasta}/foto_arquivo_".uniqid('', true) . '.' . $extensao;  

  move_uploaded_file ($foto , $novoDestino );

  $database = ('imagens');

    $id_anuncio => $id; //esse id deve ser puxado baseado no ultimo id(pk) inserido na tabela anuncios
    $dir = $novoDestino;

  $sql_img="INSERT INTO img_anuncio($id_anuncio, $dir) VALUES ('$id_anuncio','$dir')";     
 
  header('Location: anunciante_anuncios.php?Alert=Anuncio cadastrado com sucesso');

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
<section class="min-vh-100 gradient-custom">    
<!--navbar-->
    <nav>

        <img class="logo" src="img/akai-ito-.png" alt="some text" width=150 height=50>
        <label class="name">Akai Ito</label>

        <ul>
            <li><a href="anunciantehome.php">Inicio</a></li>
            <li><a href="anunciante_anuncios.php">Anuncios</a></li>
            <li><a href="anunciante_perfil.php">Perfil</a></li>
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

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="register_anuncio.php" method="POST" enctype="multipart/form-data">
              <h2 class="fw-bold mb-2 text-uppercase">Cadastrar anuncio</h2>
              <p class="text-white-50 mb-5">Por favor os dados!</p>
            
              <!--Descricao-->    
              <div class="form-outline form-white mb-4">
                <input type="text" name="description" id="description" class="form-control form-control-lg" required/>
                <label class="form-label" for="description">Descricao: </label>
              </div>

              <!--URL-->    
              <div class="form-outline form-white mb-4">
                <input type="url" name="url" id="url" class="form-control form-control-lg" required/>
                <label class="form-label" for="url">URL: </label>
              </div>

              <!--Imagem-->    
              <div class="form-outline form-white mb-4">
                <input type="file" accept='.png,.gif,.jpg,.jpeg' name="foto" id="foto" class="form-control form-control-lg" onchange="Filevalidation()" required/>
                <label class="form-label" for="foto">Imagem: </label>
              </div>

              <div class="form-outline form-white mb-4">
                <input class="btn btn-outline-light btn-lg px-5" type="submit" name="register" value="Registrar anuncio">
              </div>

            </div>
            </form>

    </section>
</body>
</html>