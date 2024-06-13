<?php // noticia-exclui.php
require "../inc/funcoes-noticias.php";
require "../inc/funcoes-sessao.php";

verificaAcesso();

$idNoticia = (int)$_GET['id'];
$idUsuario = $_SESSION['id'];
$tipoUsuario = $_SESSION['tipo'];

excluirNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario);
header("location:noticias.php");