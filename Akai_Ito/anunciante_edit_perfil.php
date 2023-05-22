<?php
session_start();

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
<section class="h-auto gradient-custom">

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
/*conexao com o banco de dados e inicio da sessao*/
 session_start();
 include("conexao.php");

 if(isset($_GET['id']))
        { ?>

  <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="anunciante_edit_perfil.php" method="POST">
              <h2 class="fw-bold mb-2 text-uppercase">Editar</h2>
              <p class="text-white-50 mb-5">Por favor insira seus dados!</p>
            
              <!--Nome de usuario-->    
              <div class="form-outline form-white mb-4">
                <input type="text" id="new_username" name="new_username" class="form-control form-control-lg" required/>
                <label class="form-label" for="new_username">Nome de usuário</label>
              </div>

              <!--Nome completo-->  
              <div class="form-outline form-white mb-4">
                <input type="text" id="new_name" name="new_name" class="form-control form-control-lg" required/>
                <label class="form-label" for="new_name">Nome completo</label>
              </div>

              <!--Data de nascimento-->  
              <div class="form-outline form-white mb-4">
                <input type="date" min="1850-01-01" max="2012-12-30" id="new_data_nasc" name="new_data_nasc" class="form-control form-control-lg" required/>
                <label class="form-label" for="new_data_nasc">Data de nascimento</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" class="form-control form-control-lg" required/>
                <input class="btn btn-outline-light btn-lg px-5" type="submit" name="editar" value="Editar">
              </div>

            </div>
            </form>

<?php } 
//Funcao que verifica login

    $l = isset($_SESSION["username"]) ?$_SESSION["username"]:"";
    $s = isset($_SESSION["password"]) ?$_SESSION["password"]:"";

//Funcao que recupera dados da tabela
 
    $dados = mysqli_query($data,"select * from anunciante WHERE username = '$l'");
    while ($d = mysqli_fetch_array($dados)){
        $id_log = $d['id'];
    }

            if(isset($_POST['editar']))
            {
                
                $new_username=$_POST['new_username'];
                $new_user_full_name=$_POST['new_name'];
                $new_user_data_nasc=$_POST['new_data_nasc'];

                echo $id_log;

                $sql = "UPDATE anunciante SET username = '$new_username', data_nasc = '$new_user_data_nasc', full_name = '$new_user_full_name' WHERE id= '$id_log'";
                
                if($data->query($sql)=== TRUE){
                ?>

                <script language="JavaScript">
                    alert('Conta editada com sucesso!');
                    location.href = 'login_anunciante.php';
                </script>

        <?php }else{
            ?>

                <script language="JavaScript">
                    alert('Algo deu errado');
                    history.go(-1);
                </script>    
            <?php } 
            } ?>

            </div>
        </div>
      </div>
    </div>

</section>

</body>
</html>