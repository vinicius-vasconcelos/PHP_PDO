<?php

	class Conexao {
		private $host = 'localhost';
		private $dbname = "php_com_pdo";
		private $user = 'root';
		private $pass = '';

		public function conectar() {
			try {
				return new PDO("mysql:host=$this->host; dbname=$this->dbname", "$this->user", "$this->pass");
			} catch (PDOException $e) {
				echo '<p>Erro ao conectar ao banco !!!</p>';
			}
		}
	} 
?>