<?php

	if(!empty($_POST['usuario']) && !empty($_POST['senha'])) {

		//criando conexão PDO
		$dsn = 'mysql:host=localhost;dbname=php_com_pdo';
		$usuario = 'root';
		$senha = '';

		try {
			$conexao = new PDO($dsn, $usuario, $senha);

			/*
			//query errada e vuneravel a SQL injecyion 
			$stmt = $conexao->query('select * from usuario where usu_email = "' . $_POST['usuario'] . '" and usu_senha = "' . $_POST['senha'] . '"');
			$usuario = $stmt->fetch();
			*/

			//tratando as query por prepare
			$query = "select * from usuarios where ";
			$query .= " usu_email = :usuario ";
			$query .= " AND usu_senha = :senha ";

			$stmt = $conexao->prepare($query);

			$stmt->bindValue(':usuario', $_POST['usuario']);
			$stmt->bindValue(':senha', $_POST['senha'], PDO::PARAM_INT); //terceiro parâmentro opcional para extrair dados(remove SQL Injection)

			$stmt->execute();

			$result = $stmt->fetch();

			echo '<pre>';
			print_r($result);
			echo '</pre>';

		} catch(PDOException $ePDO) {
			echo 'Erro: ' . $ePDO->getCode() . ', Mensagem = ' . $ePDO->getMessage();
		}
	}

?>

<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form method="POST" action="SQL_injection.php">
			<input name="usuario" type="text" placeholder="Usuário">
			<br>
			<input name="senha" type="password" placeholder="Senha">
			<br>

			<button type="submit">Entrar</button>
		</form>
	</body>
</html>