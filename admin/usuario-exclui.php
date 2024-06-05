<?php // usuario-exclui
require_once "../inc/funcoes-sessao.php";
require_once "../inc/funcoes-usuarios.php";

verificaAcesso();
verificaNivel();

// Obter (DA URL) o id do usuário que será excluído
$id = $_GET['id'];

// Chamar/executar a função que irá fazer o DELETE
excluirUsuario($conexao, $id);

// Redirecionar para a página de usuários
header("location:usuarios.php");