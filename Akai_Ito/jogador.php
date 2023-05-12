<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akai-Ito Pagina inicial</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>
<section class="vh-100   gradient-custom">

<!--nav bar-->
    <nav>
 
        <img class="logo" src="img/akai-ito-.png" alt="some text" width=150 height=50>
        <label class="name">Akai Ito</label>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="jogador.php">Jogador</a></li>
            <li><a href="anunciante.php">Anunciante</a></li>
        </ul>
    </nav>

<!---->

    <div class="section1">

        <label class="img_text">Jogador</label>        
        <div class="main_img"></div>

    </div>

<!--imagem do gatinho fofo dando joia-->
    <div class="container">

        <div class="row">

            <div class="col-md-4">
                <img class="welcome_img" src="img/exemplo2.jpg">
            </div>        

                <div class="col-md-8">

<!--texto de boas vindas-->
                    <div style="text-align:center">
                        <h1 class="titulo_pagina">Bem vindo a aba de jogador</h1>
                    </div>

<!--descriçao a respeito do site-->
                    <p class="descricao_pagina">Após o jogador realizar login, podera jogar nosso date simulator e interagir com a comudade atraves do nosso forum</p>

                    <div style="text-align:center">
                        <a href="login_player.php" class="custom-btn btn-4">Login</a>
                        <a href="register_player.php" class="custom-btn btn-4">Register</a>
                    </div>
            </div>

        </div>  

    </div>
 
</section>  
</body>
</html>