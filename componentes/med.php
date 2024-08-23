<?php
include_once "../../backend/usuario/relatorioUsuario.php";
$mensagem = '';
?>

<html>
    <head>
        <title>Usuario | Medify </title>
        <link rel="stylesheet" href="usuario.css">
        <link rel="stylesheet" href="../../componentes/menu/menu.css">
    </head>
    <body>
        <?php 
        include_once '../../componentes/menu/menu.php';
        ?>
        <section class="pagina">
            <header>
                <h1>Administração | Cadastro de Usuario</h1>
            </header>
            <form action="../../backend/usuario/criar usuario.php" meethod="post">
                <div class="imputs">
                    <input type="text" name="nome"placeholder="nome">
                    <input type="text" name="sobrenome"placeholder="sobrenome">
                    <input type="text" name="endereco"placeholder="endereco">
                <div class="linha">
                    <input type="text" name="usuario"placeholder="usuario">
                    <select name="tipo">
                        <option value="">Tipo de usuário</option>
                        <option value="300">Adiministrador</option>
                        <option value="301">Normal</option>
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
                <th>Telefone</th>
                <th>Login</th>
                <th>Cargo</th>
            </tr>
            <tr>
                <td><button>Excluir</button></td>
                <td>1</td>
                <td>Tio da Pavê</td>
                <td>7070-7070</td>
                <td>pave_pacume</td>
                <td>Piadista</td>
            </tr>
            <tr>
                <td><button>Excluir</button></td>
                <td>3</td>
                <td>Eduardo</td>
                <td>4772-0987</td>
                <td>heinemann_</td>
                <td>desempregado</td>
</tr>
            <?php
          //Utilizar a função foreach
          //para interar entreos itens do array
          //que é o nosso $relatorio
          foreach($relatorio as $usuario){
            echo("          
            <tr>  
                <td><button>Excluir</button></td>
                <td>".$usuario['id']."</td>
                <td>".$usuario['nome']." ".$usuario['sobrenome']."</td>
                <td>".$usuario['telefone']."</td>
                <td>".$usuario['login']."</td>
                <td>".$usuario['descricao']."</td>
                </tr>
            
            ");
          }

?>
        </table>
            </div>
        </section>

    </body>
</html>
