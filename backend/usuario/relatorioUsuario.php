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
  u.id,
  u.nome,
  u.sobrenome,
  u.telefone,
  u.login,
  u.tipo,
  t.descricao
from tb_usuario u
  inner join tb_tipo t on t.id = u.tipo
    ");
    //executa a query
    $preparo->execute();
    //Coloca o resultado em um array usando o 
    $relatorio=$preparo->fetchALL();



}catch(PDOException $erro){
    //imprime o erro na tela
    print_r($erro);
    //Coloca que deu erro na variavel mensagem_erro
    $mensagem_erro = 'erro';
}






?>