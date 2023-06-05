<?php
session_start();
include("conexao.php");

//Funcao que recupera os dados da tabela
    $id_edit = $_POST['id'];
    $new_comment=$_POST['new_comment'];
    $new_chapter=$_POST['new_chapter'];

//recupera os dados da tabela de acordo com o id que foi passado pelo botao na pagina anterior e os adiciona a variaveis    
    $dados_publi = mysqli_query($data,"select * from forum WHERE id='$id_edit'");
    while ($d_pb = mysqli_fetch_assoc($dados_publi))
    {
    $id_pb = $d_pb['id'];
    $comment_pb = $d_pb['comentario'];
    $story_chapter_pb = $d_pb['story_chapter'];
  	}

    //se nulo no form mantem oque ja estava salvo
    if($new_comment == ''){
      $new_comment = $comment_pb;
    }

    if($new_chapter  == ''){
      $new_chapter = $story_chapter_pb;
    }

    
    //atualiza os dados da tabela
    $sql = "UPDATE forum SET comentario = '$new_comment', story_chapter = '$new_chapter' WHERE id= '$id_edit'";
    
    if($data->query($sql)=== TRUE){
    ?>

        <script language="JavaScript">
            alert('Publicação editada com sucesso!');
            location.href = 'player_postagens.php';
        </script>

<?php   }else{ ?>

<script language="JavaScript">
    alert('Algo deu errado');
    history.go(-1);
</script> 

<?php   }   ?>