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
    v.id,
    v.metodo_pagamento,
    v.dt_venda,
    v.cliente,
    v.tb_situacao_id,
    s.descricao as ds_situcao 
    from tb_venda v
    inner join tb_ situacao s on s.id = v.tb_situacao_id'




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