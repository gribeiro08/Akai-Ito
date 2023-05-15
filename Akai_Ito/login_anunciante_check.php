<?php


session_start();

include("conexao.php");


if($data===false)
{
    die("connection error");
}    

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = $_POST['username'];

        $pass = $_POST['password'];

        $sql="select * from anunciante where username='".$name."' AND password='".$pass."' ";

        $result=mysqli_query($data,$sql);

        $row=mysqli_fetch_array($result);

        if($row["usertype"]=="anunciante")
        {

            $_SESSION['username']=$name;

            $_SESSION['usertype']="anunciante";

            header("location:anunciantehome.php");
        }

        else
        {

            $message= "Nome de usuário ou senha inválidos";
        
            $_SESSION['loginMessage']=$message;

            header("location:login_anunciante.php");
        }
    }

?>