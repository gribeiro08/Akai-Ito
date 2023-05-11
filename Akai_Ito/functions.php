<?php
include("conexao.php");

function deletar($data, $user, $id)
{
    if(!empty($id))
    {
        $query = "DELETE FROM user WHERE id =". (int) $id;
        $execute = mysqli_query($connect,$query);

        if($executar)
        {
            echo "dado deletado com sucesso";
        } else {
            echo "erro ao deletar!";
        }
    }

    
}
?>