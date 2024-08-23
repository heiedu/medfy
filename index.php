<?php
$erro = null;
if($_GET){
  if($_GET['erro']){
    $erro = $_GET['erro'];
  }
}


?>
<html>
  <head>
    <title>login | Medify</title>
    <link rel="stylesheet" href="index.css" />
    <meta charset="utf-8" />
  </head>
  <body>
    <div class="overlay">
    <section class="conteiner">
      <article>
        <p>Bem vindo!</p>
        <p>á</p>
        <h1>Medify<span> </span></h1>
      </article>
      <form action="backend/login/login.php" method="post">
        <p>insira suas credenciais para entrar</p>
        <input type="text" name="usuario" placeholder="E-mail ou número de telefone" class="Grande" />
        <input type="text" name="senha" placeholder="senha" class="Grande" />
        <button class="entrar">Entrar</button>
        <p class="pp">Esqueceu a senha?</p>
      </form>
      <?php

      if($erro != null){
        switch($erro){
          case '401':
            echo("<p class=\"erro\">Usuário ou senha inválido</p>");
            break;
            case '500':
            echo("<p class=\"erro\">Erro no servidor, tente novamente, mais tarde</p>");
              break;
        }
      }
      ?>
    </section>
    </div>
  </body>
</html>
