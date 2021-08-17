//Listar a tabela
function registros(){
    var registros = 'registros';

    $.ajax({
        url: 'listar.php',
        type: 'post',
        data: {
            registros : registros
        },
        success:function(data, response){
            $('#dados_registrados').html(data);
        }
    });
}

// Adicionar tarefa
function addTarefa(){
    var data_inserir = $('#data_inserir').val();
    var descricao = $('#descricao').val();
    var usuario = $('#usuario').val();

    //Verificar se foi informado uma data, caso não tenha sido, fecha o modal e não adiciona.
    //Se uma data for informada, não entra nessa condição, e o processo continua de inserir.
    if(data_inserir == ''){
        alert('Favor informar uma data');
        return false;
    }

    $.ajax({
        url: 'listar.php',
        type: 'post',
        data: {
            data_inserir : data_inserir,
            descricao : descricao,
            usuario : usuario
        },
        success:function(data, response){
            registros();
        }
    });
}

// Apagar uma tarefa
function deleteTarefas(deleteid){
    var confirmacao = confirm("Excluir registro ?");
    if(confirmacao == true){
        $.ajax({
            url: 'listar.php',
            type: 'post',
            data: {
                deleteid : deleteid
            },
            success:function(data, response){
                registros();
            }
        })
    }
}

// Listar os dados no modal de editar
function getTarefas(id){
    $('#id_tarefas').val(id);

    $.post("listar.php", {
        id : id
    }, function(data, response){
        var tarefa = JSON.parse(data);
        //console.log(tarefa);
        $('#update_data_inserir').val(tarefa.data);
        $('#update_descricao').val(tarefa.descricao);
        $('#update_usuario').val(tarefa.usuario);
    });
    $('#update_tarefas').modal('show');
}

// Atualizar os dados no modal de editar
function updateTarefas(){
    var data_inserir_upd = $('#update_data_inserir').val();
    var descricao_upd = $('#update_descricao').val();
    var usuario_upd = $('#update_usuario').val();
    var id_tarefas_upd = $('#id_tarefas').val();

    //Verificar se foi informado uma data, caso não tenha sido, fecha o modal e não atualiza.
    //Se uma data for informada, não entra nessa condição, e o processo continua de atualizar.
    if(data_inserir_upd == ''){
        alert('Favor informar uma data');
        return false;
    }

    $.post("listar.php", {
        id_tarefas_upd : id_tarefas_upd,
        data_inserir_upd : data_inserir_upd,
        descricao_upd : descricao_upd,
        usuario_upd : usuario_upd
    },
    function(data, response){
        $('#update_tarefas').modal('hide');
        //alert(data);
        registros();
    });
}

