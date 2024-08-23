<?php
//inclue o relatorio de usuario
include_once "../../backend/medicamento/relatoriomedicamento.php";





//inicializa uma variavel com nome de mensagem com o valor null
$mensagem=null;
//verifica se recebeu alguma informação por meio de GET
if($_GET){
    //verificca se essa informação é um status
    if($_GET['status']){
        //utiliza a estrutura  de decisão switch para verificar qual 
        //status foi recebido e atribuir uma mensagem conforme conforme necessário
        switch($_GET['status']){
            case 201:
            //criado
            $mensagem='Adicionado com sucesso';
            break;
            case 400:
            //Bad Request 
            $mensagem= 'incerção não funcionou';
            break; 
            case 500:
                //Erro no servidor
                $mensagem= 'Erro ao tentar inserir informações';
                break;
        }
    }
}
?>

<html>
    <head>
        <title>Medicamento | Medify </title>
        <link rel="stylesheet" href="medicamento.css">
        <link rel="stylesheet" href="../../componentes/menu/menu.css">
    </head>
    <body>
        <?php 
        include_once '../../componentes/menu/menu.php';
        ?>
        <section class="pagina">
            <header>
                <h1> Administração | Medicamentos </h1>
            </header>
            <form action="../../backend/medicamento/criarmedicamento.php" method="post">
                <div class="inputs">
                    <input type="text" name="nome" placeholder="nome">
                    
                    <input type="text" name="valor"placeholder="valor">
                <div class="linha">
                   
                  <select name="controlado">
                        <option value="">controlado</option>
                        <option value="1">sim</option>
                        <option value="0">nao </option>
</select>
                  <select name="alta_vigilancia">
                        <option value="">Alta Vigilancia</option>
                        <option value="1">sim</option>
                        <option value="0">nao </option>
</select>
                  <select name="ativo">
                        <option value="">ativo</option>
                        <option value="1">sim</option>
                        <option value="0">nao </option>
</select>

</div>
            </div>
            <div class="controles">
               <button type="subimot" class="salvar">Salvar</button>
               <button type="reset" class="cancelar">cancelar</button>
               <?php
               echo('<p>'.$mensagem.'</p>');
               ?>
            </div>
            </form>
            <div>
<div class="relatorio">
    <h1>Relatório
        <table>
            <tr>
                <th>Ação</th>
                <th>Id</>
                <th>Nome</>
                <th>valor</th>
                <th>controlado</th>
                <th>Alta vigilancia</th>
                <th>Ativo<th>
            </tr>
         
            <?php
          //Utilizar a função foreach
          //para interar entreos itens do array
          //que é o nosso $relatorio
          foreach($relatorio as $medicamento){
            echo("          
            <tr>  
                <td><button>Excluir</button></td>
                <td>".$medicamento['id']."</td>
                <td>".$medicamento['nome']."</td>
                <td>".$medicamento['valor']."</td>
                <td>".($medicamento['controlado']==1?"Sim":"Não")."</td>
                <td>".($medicamento['alta_vigilancia']==1?"sim":"não")."</td>
                <td>".($medicamento['ativo']==1?"Sim":"Não")."</td>
                </tr>
            
            ");
          }

?>
        </table>
            </div>
        </section>

    </body>
</html>
