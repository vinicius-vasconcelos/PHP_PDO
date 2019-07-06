<?php
	class TarefaService {

		private $conexao;
		private $tarefa;

		public function __construct(Conexao $conexao, Tarefa $tarefa) {
			$this->conexao = $conexao->conectar();
			$this->tarefa = $tarefa;
		}

		public function inserir() {
			$stmt = $this->conexao->prepare('insert into tb_tarefas(tarefa) values(:tarefa)');
			$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
			$stmt->execute();
		}

		public function recuperar() {
			$stmt = $this->conexao->prepare('select t.id, s.status, t.tarefa from tb_tarefas as t left join tb_status as s on (t.id_status = s.id)');
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function atualizar() {
			$stmt = $this->conexao->prepare('update tb_tarefas set tarefa = ? where id = ?');
			$stmt->bindValue(1, $this->tarefa->__get('tarefa'));
			$stmt->bindValue(2, $this->tarefa->__get('id'));
			return $stmt->execute();
		}

		public function remover() {
			$stmt = $this->conexao->prepare('delete from tb_tarefas where id = ?');
			$stmt->bindValue(1, $this->tarefa->__get('id'));
			return $stmt->execute();
		}

		public function marcarRealizada() {
			$stmt = $this->conexao->prepare('update tb_tarefas set id_status = ? where id = ?');
			$stmt->bindValue(1, $this->tarefa->__get('id_status'));
			$stmt->bindValue(2, $this->tarefa->__get('id'));
			return $stmt->execute();
		}

		public function recuperarPendentes() {
			$stmt = $this->conexao->prepare('select id, id_status, tarefa from tb_tarefas where id_status = ?');
			$stmt->bindValue(1, $this->tarefa->__get('id_status'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
	}
?>