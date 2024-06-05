<?php
/* Sessões no PHP
Funcionalidade usada para o controle de acesso à determinadas
páginas e/ou recursos do site.

Exemplos: área administrativa, painel de controle, área
de cliente/aluno etc.

Nestas áreas o acesso só é possível mediante alguma forma
de autenticação. Exemplos: login/senha, digital, facial etc. */

// Verificando se NÃO há/existe uma sessão em funcionamento
if( !isset($_SESSION) ){
    // Se não tem, então inicie uma sessão
    session_start();
}

function verificaAcesso(){
    /* Se NÃO EXISTIR uma variável de sessão
    chamada "id" (baseada nos ids usuários do banco),
    então significa que o usuário NÃO ESTÁ LOGADO. */
    if(!isset($_SESSION['id'])){
        // Portanto, destruímos a sessão
        session_destroy();

        // Fazemos o usuário voltar para a página login
        header("location:../login.php?acesso_negado");
        
        // Paramos qualquer outra execução/processamento
        exit; // ou die()
    }
}

function login($id, $nome, $tipo){
    // Variáveis de sessão
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] = $tipo;
}

function logout(){
    session_destroy();
    header("location:../login.php?saiu");
    exit; // ou die();
}


function verificaNivel(){
    /* Se o tipo do usuário logado na sessão NÃO FOR admin
    (ou seja, se for diferente de admin) */
    if( $_SESSION['tipo'] != "admin" ){
        // então, redirecione para nao-autorizado
        header("location:nao-autorizado.php");
        exit;
    }
}



