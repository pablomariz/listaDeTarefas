<?php

require ('resources/action.php');


$tabela = '';
if(isset($_POST['registros'])){
    $tabela .= '
        <table class="table table-bordered table-striped">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Data</th>
                <th scope="col">Descrição</th>
                <th scope="col">Usuário</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        ';
        
    $query_consulta = mysqli_query($con, "select * from tarefas");
    if(mysqli_num_rows($query_consulta) > 0){
        while($row = mysqli_fetch_array($query_consulta)){
            $data_convertida = implode('-', array_reverse(explode('-', $row['data'])));

            $tabela .= '
                <tr>
                    <td>'.$row['id_tarefas'].'</td>
                    <td>'.$data_convertida.'</td>
                    <td>'.$row['descricao'].'</td>
                    <td>'.$row['usuario'].'</td>
                    <td><button onclick="getTarefas('.$row['id_tarefas'].')" class="btn btn-warning">Editar</button></td>
                    <td><button onclick="deleteTarefas('.$row['id_tarefas'].')" class="btn btn-danger">Excluir</button></td>
                </tr>
            ';
        }
    }

    $tabela .= '</table>';

    echo $tabela;
}

?>