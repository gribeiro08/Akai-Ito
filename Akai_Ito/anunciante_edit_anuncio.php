<?php
/*conexao com o banco de dados e incicio de sessao */
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
            <li><a href="logout.php" class="custom-btn btn-4">Logout</a></li>
        </ul>
  </nav>

<?php

//Funcao que recupera dados da tabela
$id_edit = $_GET['id'];

$dados = mysqli_query($data,"select * from anuncios WHERE id = '$id_edit'");
while ($d = mysqli_fetch_array($dados))
{
    $legenda= $d['legenda'];
    $URL = $d['URL'];
    $img_an = $d['imagem'];
}

//Funcao para apresentar o codigo de edicao
 if(isset($_GET['id']))
{ 

?>

<!--form de edicao-->
  <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="anunciante_edicao_anuncio.php" method="POST" enctype="multipart/form-data"> <!--ao click do botao ele envia para o anunciante_edicao_anuncio.php, pq sim (tava dando erro, essa foi a unica formja de arrumar)-->
              <h2 class="fw-bold mb-2 text-uppercase">Editar</h2>
              <p class="text-white-50 mb-5">Por favor insira os dados!</p>
            
              <!--Nome de usuario-->    
              <div class="form-outline form-white mb-4">
                <input type="text" id="new_legenda" name="new_legenda" class="form-control form-control-lg" placeholder="<?php echo $legenda; ?>"/>
                <label class="form-label" for="new_legenda">Legenda: </label>
              </div>

              <!--Nome completo-->  
              <div class="form-outline form-white mb-4">
                <input type="text" id="new_URL" name="new_URL" class="form-control form-control-lg" placeholder="<?php echo $URL; ?>"/>
                <label class="form-label" for="new_URL">URL: </label>
              </div>

              <!--Data de nascimento-->  
              <div class="form-outline form-white mb-4">
                <input type="file" id="new_img" name="new_img" class="form-control form-control-lg"/>
                <label class="form-label" for="new_img">Imagem: </label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" class="form-control form-control-lg" required/>
                <input class="btn btn-outline-light btn-lg px-5" type="submit" name="editar" value="Editar"> <!--ele envia o id da publicacao pra pagina anuncio_edicao_anuncio.php onde ocorre de fato a ediçao-->
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