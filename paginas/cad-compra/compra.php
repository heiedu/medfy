<?php
//Inclui o relatório de usuários
include_once '../cad-compra/compra.php';


//Inicializa uma variavel com nome de mensagem com valor null
$mensagem = null;
//Verifica se recebeu alguma informação por meio de GET
if($_GET){
  // Verifica se essa informção é um status
if($_GET['status']){
  //Utiliza a estrutura de decisão switch para verificar qual
  //status foi recebido e atribuir uma mensagem conforme necessário
  switch($_GET['status']){
    case 201:
      //Criado
      $mensagem = 'Adicionado com sucesso!';
      break;
      case 400:
        //Bad Request
        $mensagem = 'Inserção não funcionou';
        break;
        case 500:
          //Erro no servidor
          $mensagem = 'Erro ao tentar inserir informações';
          break; 
          
  }
}}
?>

<html>
  <head>
    <title>Ordem de Compra | Medify</title>
    <link rel="stylesheet" href="compra.css"/>
    <link rel=stylesheet href="../../cad-ordemcompra/compra.php">
  </head>
  <body>
   <?php
   include_once '../../componentes/menu/menu.php';
   ?>
<section class="pagina">
  <header>
    <h1>Adiministração | Ordem de Compra<h1>
</header>
<form action="../../backend/compra/criarcompra.php" method="post">
 
<div class="inputs">   
        <div class="linha">
        <input type="date" name="dt_solicitacao" placeholder="dt_solicitação">
       </div>
       <div class="linha"> 
        <input type="date"name="dt_previsao" placeholder="dt_ de Previsão">
       </div>
       <div class="linha">
       <input type="date" name="dt_pagamento" placeholder="dt_Pagamento">

<div class="controles">
  <button type="subimit" class="salvar">Salvar</button>
  <button type="reset" class="cancelar">Cancelar</button>

<?php
echo('<p>'.$mensagem.'</p>');
?>
</div>
</form> 
<div class="relatorio">
  <h1>Relatório</h1>
  <table>
    <tr>
  <th>Ação</th>
  <th>Id</th>
  <th>Solicitação</th>
  <th>Data de Previsão</th>
  <th>Data de Entrega</th>
  <th>Data de Pagamento</th>
</tr>

          <tr>
          <td><button>Excluir</button></td> 
          <td>1</td> 
          <td>30 comprimidos</td> 
          <th>01/05/2024</th>
          <td>05/05/2024</td> 
          <td>10/05/2024</td> 
     
        </tr>
        <?php
        //Utilizar a função foreach
        //para interar entre os itens do array
        //que é o nosso $relatorio
        
        