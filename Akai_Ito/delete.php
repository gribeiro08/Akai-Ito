<?php

include("conexao.php");

if($_GET['id_log']);
{
    
    $user_id=$_GET['id_log'];

    $sql="DELETE FROM user WHERE id='$user_id' ";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        header("location:index.php");   
    }
}

?>