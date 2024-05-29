<?php 
/* Script de conexão ao servidor de banco de dados
Necessário para que o Microblog possa usar o MySQL */

// Parâmetros para conexão
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "microblog_tiago";

// Função para conexão com o servidor de banco de dados
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Definindo o charset da conexão para utf8
mysqli_set_charset($conexao, "utf8");

/* Fazendo um teste de conexão */
/* if( !$conexao ){
    // Deu problema? "Mate/pare" a aplicação!
    die("Deu ruim: " .mysqli_connect_error());
} else {
    echo "Beleza, conectado...";
} */
