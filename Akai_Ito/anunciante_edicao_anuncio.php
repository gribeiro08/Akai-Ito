<?php
session_start();
include("conexao.php");

//Funcao que recupera os dados da tabela
    $id_edit = $_POST['id'];
    $new_legenda=$_POST['new_legenda'];
    $new_URL=$_POST['new_URL'];

  //coleta a imagem
  $new_img = $_FILES['new_img']['tmp_name'];
  $pasta = 'fotos';

//recupera os dados da tabela de acordo com o id que foi passado pelo botao na pagina anterior e os adiciona a variaveis      
    $dados = mysqli_query($data,"select * from anuncios WHERE id = '$id_edit'");
    while ($d = mysqli_fetch_array($dados))
    {
        $legenda= $d['legenda'];
        $URL = $d['URL'];
        $img_an = $d['imagem'];
    }

    //se nulo no form mantem oque ja estava salvo
    if($new_legenda == ''){
        $new_legenda = $legenda;
    }

    if($new_URL  == ''){
        $new_URL = $URL;
    }

    if($new_img != NULL){
        $file = getimagesize($new_img);
      
      //valida a extensao da imagem
        if(!preg_match('/^image\/(?:gif|jpg|jpeg|png)$/i', $file['mime'])){
            header("Location: register_anuncio.php?Alert=Formato de imagem inválido");
            exit();
        }
      
        $extensao = str_ireplace("/", "", strchr($file['mime'], "/"));
      
      //faz a pira de deixar com o codigo unico
        $novoDestino = "{$pasta}/foto_arquivo_".uniqid('', true) . '.' . $extensao;  
      
      //salva no diretorio, na pasta fotos
        move_uploaded_file ($new_img , $novoDestino );         
      
      }else{
        $novoDestino = $img_an;
    }


    //atualiza os dados da tabela
    $sql = "UPDATE anuncios SET legenda = '$new_legenda', URL = '$new_URL', imagem = '$novoDestino' WHERE id= '$id_edit'";

    if($data->query($sql)=== TRUE){
    ?>

        <script language="JavaScript">
            alert('Publicação editada com sucesso!');
            location.href = 'anunciante_anuncios.php';
        </script>

<?php   }else{ ?>

<script language="JavaScript">
    alert('Algo deu errado');
    history.go(-1);
</script> 

<?php   }   ?>