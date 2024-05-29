<?php
/* Acessando os dados da conexão ao servidor */
require "conecta.php";

function inserirUsuario($conexao, $nome, $email, $tipo, $senha){
    // Montando o comando SQL em uma variável
    $sql = "INSERT INTO usuarios(nome, email, tipo, senha) 
            VALUES('$nome', '$email', '$tipo', '$senha')";

    // Executando o comando no banco
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}