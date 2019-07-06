function editar(id, txt_tarefa, tela) {
	//criar um form de edição
	let form = document.createElement('form');

	if(tela == 0)
		form.action = 'tarefa_controller.php?acao=atualizar&page=0';
	else
		form.action = 'tarefa_controller.php?acao=atualizar&page=1';

	form.method = 'POST';
	form.className = 'row'

	//criar um input para entrada de texto
	let inputTarefa = document.createElement('input');
	inputTarefa.type = 'text';
	inputTarefa.name = 'tarefa';
	inputTarefa.className = ' col-9 form-control';
	inputTarefa.value = txt_tarefa;

	//input hidden para guardar o id da tarefa
	let inputId = document.createElement('input');
	inputId.type = 'hidden';
	inputId.name = 'id';
	inputId.value = id; 


	//criar um button para o envio do form
	let botao = document.createElement('button');
	botao.type = 'submit';
	botao.className = 'col-3 btn btn-info';
	botao.innerHTML = 'Atualizar';

	form.appendChild(inputTarefa);
	form.appendChild(inputId);
	form.appendChild(botao);


	let tarefa = document.getElementById(`tarefa_${id}`);

	//limpar conteudo interno da div tarefa_id
	tarefa.innerHTML = '';

	//incluindo na página
	tarefa.insertBefore(form, tarefa[0]);

}

function remover(id, tela) {
	if(tela == 0)
		location.href = 'index.php?page=0&acao=remover&id=' + id;
	else
		location.href = 'todas_tarefas.php?page=1&acao=remover&id=' + id;
}

function marcarRealizada(id, tela) {
	if(tela == 0)
		location.href = 'index.php?page=0&acao=marcarRealizada&id=' + id;
	else
		location.href = 'todas_tarefas.php?page=1&acao=marcarRealizada&id=' + id;
}