<?php
session_start();
include("conexao.php");

//Funcao que edita os dados da tabela
    $id_edit = $_POST['id'];
    $new_legenda=$_POST['new_legenda'];
    $new_URL=$_POST['new_URL'];
    $new_img=$_POST['new_img'];
    
    $dados = mysqli_query($data,"select * from anuncios WHERE id = '$id_edit'");
    while ($d = mysqli_fetch_array($dados))
    {
        $legenda= $d['legenda'];
        $URL = $d['URL'];
        $img_an = $d['img_an'];
    }

    if($new_legenda == ''){
        $new_legenda = $legenda;
    }

    if($new_URL  == ''){
        $new_URL = $URL;
    }

    if($new_img  == NULL){
        $new_img = $img_an;
    }

    $sql = "UPDATE anuncios SET legenda = '$new_legenda', URL = '$new_URL', img_an = '$new_img' WHERE id= '$id_edit'";

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