<?php
//Requer conexão com o banco de dados 
require_once '../database/conexao.php';

//Coloca todas as informações recebidas via POST
//em uma variavel para ser utilizada posteriormente
$requisicao=$_POST;
$senha = sha1('123Mudar!');
//Utiliza uma estrutura de tentativa para tentar
//no arquivo por meio do require_once),para preparar um instrução
//sql (banco de dados).
try{
$preparacao=$conexao->prepare("
insert into tb_usuario(
nome,sobrenome,endereco,telefone,login,senha,tipo
) values (
 :nome,:sobrenome,:endereco,:telefone,:login,:senha,:tipo
 )
 ");
 //utiliza o método bindParam da classe Preparedstatement dísponivel
 //na variavel preparação acima.
 //A função bindparam troca um dos parametros da instrução sql pelo 
 //valor contido em uma variável.Não esquecer de mudar o tipo no 
 //ultimo argumento.
 $preparacao->bindParam(':nome' ,$requisicao['nome'],PDO::PARAM_STR);
 $preparacao->bindParam( ':sobrenome',$requisicao['sobrenome'],PDO::PARAM_STR);
 $preparacao->bindParam(':endereco',$requisicao['endereco'],PDO::PARAM_STR); 
 $preparacao->bindParam(':telefone',$requisicao['telefone'],PDO::PARAM_STR); 
 $preparacao->bindParam(':login',$requisicao['usuario'],PDO::PARAM_STR); 
 $preparacao->bindParam(':senha',$senha,PDO::PARAM_STR); 
 $preparacao->bindParam(':tipo',$requisicao['tipo'], PDO::PARAM_INT);
 //Ao final da troca dos parametros, estamos prontos para executar
 //a instrução por isso ultilizamos o método execute() da classe
 //PreparedStatement
 $preparacao->execute();
 //ao executar,precisamos verificar se o valor foi de fato
 //inserido no banco de dados,para isso verificamos se o valor do 
 //rowCount() é igual a 1 (quantidade de linhas que forma inseridas)
 if($preparacao->rouwCount()==1){
 //Caso isso seja positivo, retorna para a pagina de cadastro
//Com o status 201 (Created)
Header(
    'location:../../pagina/cad-usuario/usuario.php?status=201');
    //morre a execução para evitar lacunas de segurança.
    die();

   }else{
    //Caso a quantidade nao seja 1, retorna com os status
    //400 (Bad Request),informado que faltou algo
    header(
        'location:../..?pagina/cad-usuario/usuario.php?status=500');
        //Morre a execução para evitar lacunas de segurança 
        die();
    }
   }catch(PDOExpection $erro){
    //Executa caso reeceba algum erro
    //Volta para a página de cadastro e apresenta
    //Um ero do tipo 500(Serve Error)
    //Header('location:../../pagina/cad-usuario/usuario.php?status+500);
    print_r($erro->getMessage());
    //Morre a execução para evitar lacunas de segurança
    die();
   }