<?php
require "conecta.php";

function formataData($data){
    return date("d/m/Y H:i", strtotime($data));
}

function upload($arquivo){

    /* Array para validação dos tipos permitidos */
    $tiposValidos = [
        "image/png", "image/jpeg", "image/gif", "image/svg+xml"
    ];

    /* Verificando se o tipo do arquivo NÃO É 
    um dos existentes no array tiposValidos */
    if( !in_array($arquivo['type'], $tiposValidos) ){
        echo "<script> 
                alert('Formato inválido!');
                history.back();
            </script>";
        exit;
    }

    /* Pegando apenas o nome/extensão do arquivo */
    $nome = $arquivo['name'];

    /* Obtendo do servidor o local/nome temporário
    para o processo de upload */
    $temporario = $arquivo['tmp_name'];

    /* Definindo da pasta de destino + nome do arquivo da imagem */
    $destino = "../imagens/".$nome;

    /* Movendo o arquivo/imagem da área temporária
    para a pasta de destino indicada (imagens) */
    move_uploaded_file($temporario, $destino);
}

function inserirNoticia(
    $conexao, $titulo, $texto, $resumo, $nomeImagem, $usuarioId){

    $sql = "INSERT INTO noticias(
        titulo, texto, resumo, imagem, usuario_id
    ) VALUES(
        '$titulo', '$texto', '$resumo', '$nomeImagem', $usuarioId
    )";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function lerNoticias($conexao, $idUsuario, $tipoUsuario){
    
    if($tipoUsuario == 'admin'){
        // Admin pode ver TUDO
        $sql = "SELECT noticias.id, noticias.titulo, 
                noticias.data, usuarios.nome
            FROM noticias JOIN usuarios
            ON noticias.usuario_id = usuarios.id
            ORDER BY data DESC";
    } else {
        // Editor pode ver SOMENTE DELE/DELA
        $sql = "SELECT titulo, data, id FROM noticias
                WHERE usuario_id = $idUsuario 
                ORDER BY data DESC";
    }

    $resultado = mysqli_query($conexao, $sql)
                or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function lerUmaNoticia($conexao){}

function atualizarNoticia($conexao){}

function excluirNoticia($conexao){}