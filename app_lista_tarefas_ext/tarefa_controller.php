<?php
	require "../../../app_lista_tarefas/tarefa.model.php";
	require "../../../app_lista_tarefas/tarefa.service.php";
	require "../../../app_lista_tarefas/conexao.php";

	$acao = isset($_GET['acao'])  ? $_GET['acao'] : $acao;

	if($acao == 'inserir') {
		//criando a conexão do banco de dados
		$conexao = new Conexao();

		//criando nova tarefa
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);

		//inserindo nova tarefa 
		$tarefaService =  new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		//redirecionando para a página com parâmetro para feedback visual
		header('location: nova_tarefa.php?inclusao=1');
	}
	else if($acao == 'recuperar') {
		$conexao = new Conexao();
		$tarefa = new Tarefa();
		$tarefaService =  new TarefaService($conexao, $tarefa);
		$listaTarefas = $tarefaService->recuperar();

	} else if($acao == 'atualizar') {
		$conexao = new Conexao();
		
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id']);
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$tarefaService =  new TarefaService($conexao, $tarefa);
		if($tarefaService->atualizar())
			if(isset($_GET['page']) && $_GET['page'] == 0)
				header('location: index.php');
			else
				header('location: todas_tarefas.php');

	} else if($acao == 'remover') {
		$conexao = new Conexao();
		
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$tarefaService =  new TarefaService($conexao, $tarefa);
		if($tarefaService->remover())
			if(isset($_GET['page']) && $_GET['page'] == 0)
				header('location: index.php');
			else
				header('location: todas_tarefas.php');

	} else if($acao == 'marcarRealizada') {
		$conexao = new Conexao();
		
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		$tarefa->__set('id_status', 2);

		$tarefaService =  new TarefaService($conexao, $tarefa);
		$tarefaService->marcarRealizada();
		if(isset($_GET['page']) && $_GET['page'] == 0)
				header('location: index.php');
		else
			header('location: todas_tarefas.php');

	} else if($acao == 'recuperarPendentes') {
		$conexao = new Conexao();
		
		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);
		
		$tarefaService =  new TarefaService($conexao, $tarefa);
		$listaTarefas = $tarefaService->recuperarPendentes();
	}

?>