<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Movimentações</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/ci/desafio-bisa/assets/css/movimentacoes.css">
</head>
<body>
    <div id="id_div_container">
    <h1 class='titulo'><span class='badge badge-secondary'>Lista de movimentações</span></h1>   
    <?php  
        if(!empty($movimentacoes)){
            $id_conta = $movimentacoes[0]->id_conta_bancaria;
            echo "<a href='http://localhost/ci/desafio-bisa/index.php/movimentacao_control/fazer_relatorio/$id_conta'><input type='button' value='RELATÓRIO' class='btn btn-link'/></a>";
            foreach($movimentacoes as $movimentacao){
                $id_movimentacao = $movimentacao->id_movimentacao_financeira;
                $descricao = $movimentacao->descricao;
                $tipo_movimentacao = $movimentacao->tipo_movimentacao;
                $valor=$movimentacao->valor;
                $data=$movimentacao->data_da_movimentacao;

                echo "
                <form id='id_atualizacao_movimentacao' class='forms' method='post' action='http://localhost/ci/desafio-bisa/index.php/movimentacao_control/atualizar_movimentacao/$id_movimentacao/$id_conta'>
                    <div class='form-row'>
                        <div class='col'>
                            <label for='id_descricao'>Descrição</label>
                            <select name='descricao' id='id_descricao' required>
                                <option value=$descricao selected>$descricao</option>
                                <option value='deposito'>depósito</option>
                                <option value='saque'>saque</coption>
                                <option value='transferencia'>transferência</coption>
                            </select>
                            <label for='id_tipos_movimentacoes'>Tipo da Movimentação</label>
                            <select name='tipos_movimentacoes' id='id_tipos_movimentacoes' required>
                                <option value=$tipo_movimentacao selected>$tipo_movimentacao</option>
                                <option value='receita'>receita</option>
                                <option value='despesa'>despesa</coption>
                            </select>
                            <label for='id_valor'>Valor</label>
                            <input type='number' id='id_valor' name='valor' value=$valor step='0.01' min='0' required/>
                            <label for='id_data_da_movimentacao_atualizacao'>Data</label>
                            <input type='date' id='id_data_da_movimentacao_atualizacao' name='data_da_movimentacao' value=$data required>
                            <input type='submit' value='atualizar' class='btn btn-light'/>
                            <a href='http://localhost/ci/desafio-bisa/index.php/movimentacao_control/excluir_movimentacao/$id_movimentacao/$id_conta'> <input type='button' value='deletar' id='id_deletar' class='btn btn-danger'/></a><br>                    
                        </div>
                    </div>
                </form>
                ";      
                
            }
        }else{
            echo "<h4 class='titulo'>Não foram feitas movimentações nesta conta!</h4>";
        }
    ?>

    <form id="id_cadastro_movimentacao" class="forms" method="post" action="http://localhost/ci/desafio-bisa/index.php/movimentacao_control/criar_movimentacao/<?php echo $id_conta; ?>">
        <div class="form-row">
            <div class="card">
                <div class="card-body">
                    <div class='col'>
                        <h3><span class="badge badge-success">NEW</span></h3>
                        <label for='id_descricao'>Descrição</label>
                        <select name='descricao' id='id_descricao' required>
                            <option value='deposito'>depósito</option>
                            <option value='saque'>saque</coption>
                            <option value='transferencia'>transferência</coption>
                        </select>
                        <label for="id_tipo_movimentacao">Tipo da Movimentação</label>
                        <select id="id_tipo_movimentacao" name="tipos_movimentacoes" form="id_cadastro_movimentacao" required>
                            <option value="receita" >Receita</option>
                            <option value="despesa">Despesa</option>
                        </select>
                        <label for="id_valor">Valor</label>
                        <input type="number" id="id_valor" name="valor" min="0" step="0.01" required/>
                        <label for="id_data_da_movimentacao">Data</label>
                        <input type="date" id="id_data_da_movimentacao" name="data_da_movimentacao" required/>
                        <input type="submit" value="cadastrar" class="btn btn-success"/>
                        <a href="http://localhost/ci/desafio-bisa/index.php/conta_control/listar_contas"><input type="button" value="voltar" class="btn btn-link"/></a><br>
                    </div>
                </div>
            </div>
        </div>    
    </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="http://localhost/ci/desafio-bisa/assets/javascript/movimentacoes.js"></script>
</body>
</html>