<?php
//Requerconexão com o banco de dados 
require_once '../../backend/database/conexao.php';


//inicializa variavel de mensagem
$mensagem_erro='';

//inicia a estrutura de tentativa try
try{
    //prepara a query SQL para execução
    $preparo = $conexao->prepare("
    select
  id,
  nome,
  valor,
  controlado,
 alta_vigilancia,
 ativo
from medicamento
    ");
    //executa a query
    $preparo->execute();
    //Coloca o resultado em um array usando o 
    $relatorio=$preparo->fetchALL();


//#### testar se deu certo, remover depois ####
//foreach($relatorio as $linha){
// print_r($linha);
//}

}catch(PDOException $erro){
  //imprime o erro na tela
  print_r($erro);
  //coloca que deu erro na varivel mensagem_erro
  $mensagem_erro = 'erro';
}




?>