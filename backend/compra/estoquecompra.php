<?php
 
//requer conexão com o banco de dados
require_once '../../backend/database/conexao.php';
 //inicia a estrutura de mensagem
 $mensagem_erro ="";

 //inicia a estrutura de tentativa try 
 try{
    //prepara a query SQL para execuçâo
    $prepara = $conexao-> prepare("
    select
    med.nome
    sum(mi.quantidade) as quantidades
    from tb_movimentacao mov
    inner join tb_mov_item mi on.movimenacao =nmov.id
    inner join tb_medicamento med on med.id = mi.medicaamento
    where mov.situacao = 3
    group by med.nome;


    ");
    //executa a query
    $preparo ->execute();

//coloca o resultado em um array usando o fetch_assoc
$relatorio = $conexao -> fetchAll();

//#### testar se deu certo,remover depois ###)
// forech (%relatorio as $linha){
// Print_r($linha)
//}

 }catch(PDOException $erro){
    //imprime o erro na tela
    print_r($erro);
    //coloca que deu erro na variavel
    $mensagem_erro = 'erro';

    
 }