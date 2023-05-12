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

        $sql="select * from user where username='".$name."' AND password='".$pass."' ";
        $result=mysqli_query($data,$sql);
        $row=mysqli_fetch_array($result);

        if($row["usertype"]=="anunciante")
        {

            $_SESSION['username']=$name;
            $_SESSION['usertype']="anunciante";
            header("location:anunciantehome.php");
        }

        elseif($row["usertype"]=="player")
        {
            
            $_SESSION['username']=$name;
            $_SESSION['usertype']="player";
            header("location:playerhome.php");
        }

        elseif($row["usertype"]=="admin")
        {
            
            $_SESSION['username']=$name;
            $_SESSION['usertype']="admin";
            header("location:adminhome.php");
        }

        else
        {

            $message= "username or password do not match";        
            $_SESSION['loginMessage']=$message;
            header("location:login.php");
        }
    }

?>