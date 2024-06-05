<?php
require "inc/cabecalho.php"; 
require "inc/funcoes-sessao.php";
require "inc/funcoes-usuarios.php";

/* Mensagens de feedback */
if(isset($_GET['campos_obrigatorios'])){
	$mensagem = "Preencha e-mail e senha";
} elseif(isset($_GET['dados_incorretos'])){
	$mensagem = "Dados incorretos, verifique e tente novamente";
} elseif(isset($_GET['saiu'])){
	$mensagem = "Você saiu do sistema... até breve!";
} elseif(isset($_GET['acesso_negado'])){
	$mensagem = "Você deve logar primeiro!";
}

if(isset($_POST['entrar'])){

	// Validando os campos (se estão vazios)
	if(empty($_POST['email']) || empty($_POST['senha'])){
		header("location:login.php?campos_obrigatorios");
		exit;
	}

	// Capturando os dados digitados
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	/* 1) Buscando no banco de dados, através do e-mail
	digitado, se existe um usuário cadastrado. */
	$usuario = buscarUsuario($conexao, $email);

	/* 2) Verificação de usuário e senha
	Se o usuário/e-mail existe no banco E a senha digitada
	for igual a do banco... */
	if($usuario !== null && password_verify($senha, $usuario['senha'])){
		//... então, inicie o processo de login
		login($usuario['id'], $usuario['nome'], $usuario['tipo']);

		// Redirecione para a index admin
		header("location:admin/index.php");

		exit;
	} else {
		// Senão, senha está errada e não pode entrar no sistema
		header("location:login.php?dados_incorretos");
		exit;
	}
}
?>

<div class="row">
    <div class="bg-white rounded shadow col-12 my-1 py-4">
    <h2 class="text-center fw-light">Acesso à área administrativa</h2>

        <form action="" method="post" id="form-login" name="form-login" class="mx-auto w-50" autocomplete="off">

				<?php if(isset($mensagem)) { ?>
				<p class="my-2 alert alert-warning text-center">
					<?=$mensagem?>
				</p>                
				<?php } ?>

				<div class="mb-3">
					<label for="email" class="form-label">E-mail:</label>
					<input class="form-control" type="email" id="email" name="email">
				</div>
				<div class="mb-3">
					<label for="senha" class="form-label">Senha:</label>
					<input class="form-control" type="password" id="senha" name="senha">
				</div>

				<button class="btn btn-primary btn-lg" name="entrar" type="submit">Entrar</button>

			</form>

    </div>
    
    
</div>        

<?php 
require_once "inc/rodape.php";
?>

