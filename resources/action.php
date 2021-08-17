<?php

require('utils/bdd.php');

extract($_POST);

// Verifica se existem os dados, caso positvo, faz o insert no bd 
if(isset($_POST['data_inserir']) && isset($_POST['descricao']) && isset($_POST['usuario'])){
    $query_inserir = "INSERT INTO `tarefas` (`data`, `descricao`, `usuario`) VALUES ('$data_inserir', '$descricao', '$usuario')"; 
    mysqli_query($con, $query_inserir);
}

// Apagar registro
if(isset($_POST['deleteid'])){
    $id = $_POST['deleteid'];
    $query_delete = mysqli_query($con, "delete from tarefas where id_tarefas='$id'");
}

// Captura os dados, o modal de editar pega esses dados
if(isset($_POST['id']) && isset($_POST['id']) != ''){
    $id = $_POST['id'];
    $captura_dados = "SELECT * FROM tarefas WHERE id_tarefas = '$id'";
    if(!$result = mysqli_query($con, $captura_dados)){
        exit(mysqli_error());
    }
    $response = array();
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
    }else{
        $response['response'] = 200;
        $response['message'] = "Não encontrado";
    }

    echo json_encode($response);

}else{
    $response['response'] = 200;
    $response['message'] = "Request invalid";
}

// faz o update no BD
if(isset($_POST['id_tarefas_upd'])){
    $id_tarefas_upd = $_POST['id_tarefas_upd'];
    $data_inserir_upd = $_POST['data_inserir_upd'];
    $descricao_upd = $_POST['descricao_upd'];
    $usuario_upd = $_POST['usuario_upd'];

    echo $query_update = "UPDATE `tarefas` set `data` = '$data_inserir_upd', `descricao` = '$descricao_upd',
    `usuario` = '$usuario_upd' WHERE `id_tarefas` = '$id_tarefas_upd'";
    mysqli_query($con, $query_update);
}

?>