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

function lerUsuarios($conexao){
    // Comando SQL
    $sql = "SELECT id, nome, tipo, email 
            FROM usuarios ORDER BY nome";

    // Execução do comando e armazenamento do resultado (bruto)
    $resultado = mysqli_query($conexao, $sql) 
                    or die(mysqli_error($conexao));

    // Retornamos o resultado TRANSFORMADO em array associativo
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function lerUmUsuario($conexao, $id){
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    
    $resultado = mysqli_query($conexao, $sql) 
                or die(mysqli_error($conexao));

    /* Retornamos UM ÚNICO array associativo
    com os dados do usuário selecionado */
    return mysqli_fetch_assoc($resultado);
}


function atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo){
    $sql = "UPDATE usuarios SET 
                nome = '$nome',
                email = '$email',
                senha = '$senha',
                tipo = '$tipo'
            WHERE id = $id"; // NÃO ESQUEÇA ESSA BAGAÇA NUNCA! 💀

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}


function excluirUsuario($conexao, $id){
    $sql = "DELETE FROM usuarios WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}






