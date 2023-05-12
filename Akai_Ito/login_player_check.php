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

        $sql="select * from jogador where username='".$name."' AND password='".$pass."' ";

        $result=mysqli_query($data,$sql);

        $row=mysqli_fetch_array($result);

        if($row["usertype"]=="player")
        {

            $_SESSION['username']=$name;

            $_SESSION['usertype']="player";

            header("location:playerhome.php");
        }

        else
        {

            $message= "username or password do not match";
        
            $_SESSION['loginMessage']=$message;

            header("location:login_player.php");
        }
    }

?>