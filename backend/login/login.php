<?php
require_once '../database/conexao.php';

$usuario = $_POST["usuario"];
$senha = sha1($_POST["senha"]);

echo("o nome do usuário é".$usuario);
echo("E a senha é:" .$senha);


try{
    $estagio = $conexao->prepare('select id from tb_usuario where login = :usuario and senha = :senha');
    $estagio->bindParam(':usuario',$usuario,PDO::PARAM_STR);
    $estagio->bindParam(':senha',$senha,PDO::PARAM_STR);
    $estagio->execute();
    $resultado = $estagio->fetchAll();
    print_r($resultado);
    if(count($resultado)==1){
        // o usuário pode logar no sistema
        header('location: ../../paginas/home/home.php');
        die();
    }else{
        // não autenticado
        header ('location: ../../index.html?erro=401');
    }

}catch(PDOException $erro){
      echo('Erro:' .$erro->getMessage());
      // retorno erro
      header ('location: ../../index.html?erro=500');
      die();
}

?>