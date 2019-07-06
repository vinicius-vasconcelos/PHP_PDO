<?php 
	//criando conexão PDO
	$dsn = 'mysql:host=localhost;dbname=php_com_pdo';
	$usuario = 'root';
	$senha = '';

	try {
		$conexao = new PDO($dsn, $usuario, $senha);

		/*****************************************************************
		//executando exec() do PDO para adicionar nossas query
		$query = '
			create table usuarios(
				usu_id int primary key auto_increment,
				usu_nome varchar(50) not null,
				usu_email varchar(100) not null,
				usu_senha varchar(32) not null
			);';
		$conexao->exec($query);

		$query = 'insert into usuarios(usu_nome, usu_email, usu_senha) values("vinicius", "viniciussouzav@gmail.com", "123")';
		$conexao->exec($query);
		*/


		/*****************************************************************
		//PDOStatement Object Query fetchALL()
		$query = 'selec * from usuarios';
		$stmt = $conexao->query($query); // executando a query (retorna obj)
		$lista = $stmt->fetchAll(); // retorna todos os registros recuperados da consulta (retorna array)

		//manipulando o retorno do fetchAll()
		//$lista = $stmt->fetchAll(PDO::FETCH_ASSOC); //apenas índices associativos
		//$lista = $stmt->fetchAll(DO::FETCH_NUM); //apenas índices numéricos
		//$lista = $stmt->fetchAll(DO::FETCH_OBJ); //retorna array de objs

		//PDOStatement Object Query fetch() = retorna só um
		$query = 'selec * from usuarios where usu_id = 1';
		$stmt = $conexao->query($query); // executando a query (retorna obj)
		$lista = $stmt->fetch(); // retorna todos os registros recuperados da consulta (retorna array)

		//percorrendo todos os registros e exibindo
		foreach ($conexao->query($query) as $key => $value) {
			$value[1];
		}
		*/

	} catch (PDOException $ePDO) {
		echo 'Erro: ' . $ePDO->getCode() . ', Mensagem = ' . $ePDO->getMessage();

		//registrar erro
	}
?>