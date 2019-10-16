<?php
session_start();
require_once 'usuarios.modelo.php';
$mensagem = '';
if (!empty($_SESSION['usuario']))
{
	// o usuario ja esta logado
	header("Location: index.php");
}
if (!empty($_POST['usuario']))
{
	if (usuarioExiste(
		$_POST['usuario'],
		$_POST['senha']
	)) {
		// logar o usuario
		$_SESSION['usuario'] = $_POST['usuario'];
		// redirecionar para index.php
		header('Location: index.php');
	} else {
		// usuario e senha incorretos
		$mensagem = 'usuario e senha incorretos';
	}
}
?>


<!DOCTYPE html lang="en">
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<header>
		<h1> Área de login</h1>
	</header>
	<main>
		<form action="login.php" method="post">
			<label for="">Usuário</label>
			<input type="text" name="usuario"> 
			<label for="">Senha</label>
			<input type="" name="senha">
			<button>Entar</button>
		</form>
		<p><?= $mensagem ?></p>
	</main>
</body>
</html>