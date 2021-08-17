<!doctype html>
<html lang="pt-br">

  <head>
    <!-- Tags do html -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="js/action.js"></script>

    <title>Contass</title>
  </head>
  <body>

    <!-- Button do modal de inserção -->
    <div class="container">
        <h5>Lista de tarefas</h5>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdicionar">
                Adicionar
            </button>
        </div>
    </div><br>

    <!-- Div destinada para mostrar a tabela -->
    <div class="container">
        <div id="dados_registrados"></div>
    </div>

    <!-- Modal de adicionar -->
    <div class="modal fade" id="modalAdicionar" tabindex="-1" data-toggle="modal" data-target=".modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Tarefa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
            
                    <div class="form-group">
                        <label>Data:</label>
                        <input type="date" class="form-control" name="" id="data_inserir">
                    </div><br>
                
                    <div class="form-group">
                        <label>Descrição:</label>
                        <input type="text" class="form-control" name="" id="descricao" placeholder="Descrição">
                    </div><br>
         
                    <div class="form-group">
                        <label>Usuário:</label>
                        <input type="text" class="form-control" name="" id="usuario" placeholder="Usuário">
                    </div><br>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id='salvar' onclick="addTarefa()">Salvar</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal de editar -->
    <div class="modal fade" id="update_tarefas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Tarefa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Data:</label>
                        <input type="date" class="form-control" name="" id="update_data_inserir">
                    </div><br>
                    
                    <div class="form-group">
                        <label>Descrição:</label>
                        <input type="text" class="form-control" name="" id="update_descricao" placeholder="Descrição">
                    </div><br>
                    
                    <div class="form-group">
                        <label>Usuário:</label>
                        <input type="text" class="form-control" name="" id="update_usuario" placeholder="Usuário">
                    </div><br>
                </div>
                <input type="hidden" name="" id="id_tarefas">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="updateTarefas()">Salvar</button>
                </div>
            </div>
        </div>

    </div>

    <!-- Pacote Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Pacote AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- Deixa a tabela visivel quando recarrega a página -->
    <script type="text/javascript">
        $(document).ready(function(){
            registros();
        });

        //Limpar todos os inputs após fechar o modal
        $(document).ready(function() {
            $('.modal').on('hidden.bs.modal', function() {
                $(this).find('input').val('');
            });
        });

    </script>

  </body>
</html>