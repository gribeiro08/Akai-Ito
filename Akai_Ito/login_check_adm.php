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

        $sql="select * from user_adm where username='".$name."' AND password='".$pass."' ";

        $result=mysqli_query($data,$sql);

        $row=mysqli_fetch_array($result);

        if($row["usertype"]=="admin")
        {

            $_SESSION['username']=$name;

            $_SESSION['usertype']="admin";

            header("location:adminhome.php");
        }

        else
        {

            $message= "username or password do not match";
        
            $_SESSION['loginMessage']=$message;

            header("location:login_adm.php");
        }
    }

?>