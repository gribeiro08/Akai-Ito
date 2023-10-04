<?php
function cadastrar($username, $user_full_name, $user_data_nasc, $user_password, $user_type){
    include("conexao.php");
    

//caso o tipo de usuario seja = 'anunciante' 

    if($user_type=='anunciante')
    {   
        //verifica se o nome de usuario nao existe 
        $check="SELECT * FROM anunciante WHERE username='$username'";
        $check_user=mysqli_query($data,$check);
        $row_count=mysqli_num_rows($check_user);

        //caso exista mostra essa mensagem
        if($row_count==1)
        {
        echo "<script type='text/javascript'>
            alert('Nome de usuário já existente.');
            </script>";
        }
        //caso o nome de usuario nao exista
        else 
        {
            //insere na tabela anunciante  
            $sql="INSERT INTO anunciante
            /*nomes que estao no banco de dados (tem que ser igual e na mesma ordem)*/
            (username,
            data_nasc,
            usertype,
            full_name,
            password) VALUES 
            /*variaveis com valores do form (tem que estar na mesma ordem)*/
            ('$username',
            '$user_data_nasc',
            '$user_type',
            '$user_full_name',
            '$user_password')";        

            $result=mysqli_query($data,$sql);
            
            //se a inserção der certo notifica
            if($result)
            {
                echo "<script type='text/javascript'>
                alert('Dado inserido com sucesso');
                </script>";
                
                //se nao der certo faz isso (mas normalmente funciona)
                if($data===false)
                {
                    die("connection error");
                }    

                //se estiver dando certo ele busca o nome de usuario e senha na tabela e se forem correspondentes o usuario é redirecionado com sucesso
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
                    
                    //se o nome de usuario ou senha nao forem correspondentes ele manda para tela de login
                    else
                    {      
                        header("location:login_anunciante.php");
                    }
                }
            }
        else //se nao funcionar a inserção ele notifica
        {
            echo "<script type='text/javascript'>
            alert('Algo deu errado.');
            </script>";
            header("location:register.php");
        }

        }
    }

/* caso o tipo de usuario seja = 'player' */      

    elseif($user_type=='player')
    {    
        //verifica se o nome de usuario nao existe
        $check="SELECT * FROM jogador WHERE username='$username'";
        $check_user=mysqli_query($data,$check);
        $row_count=mysqli_num_rows($check_user);

        //caso exista mostra essa mensagem
        if($row_count==1)
        {
        echo "<script type='text/javascript'>
            alert('Nome de usuário já existente.');
            </script>";
        }
        //caso o nome de usuario nao exista
        else 
        {
            //insere na tabela jogador       
            $sql="INSERT INTO jogador
            /*nomes que estao no banco de dados (tem que ser igual e na mesma ordem)*/
            (username,
            data_nasc,
            usertype,
            full_name,
            password) VALUES 
            /*variaveis com valores do form (tem que estar na mesma ordem)*/
            ('$username',
            '$user_data_nasc',
            '$user_type',
            '$user_full_name',
            '$user_password')";          

            $result=mysqli_query($data,$sql);

            //se a inserção der certo notifica
            if($result)
            {
                echo "<script type='text/javascript'>
                alert('Dado inserido com sucesso');
                </script>";
                
                //se nao der certo faz isso (mas normalmente funciona)
                if($data===false)
                {
                    die("connection error");
                }    

                //se estiver dando certo ele busca o nome de usuario e senha na tabela e se forem correspondentes o usuario é redirecionado com sucesso
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
                    
                    //se o nome de usuario ou senha nao forem correspondentes ele manda para tela de login
                    else
                    {      
                        header("location:login_player.php");
                    }
                }
            }else //se nao funcionar a inserção ele notifica
        {
            echo "<script type='text/javascript'>
            alert('Algo deu errado.');
            </script>";
            header("location:register.php");
        }

        }
    }

    else{
        echo "<script type='text/javascript'>
                alert('Tipo de usuário nao existe');
                </script>";
    }
}

?>