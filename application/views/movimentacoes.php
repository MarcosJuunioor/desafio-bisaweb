<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Movimentações</title>
</head>
<body>
    <h1>Lista de movimentações: </h1>
    <?php 
        if(!empty($movimentacoes)){
            foreach($movimentacoes as $movimentacao){
                $id_movimentacao = $movimentacao->id_movimentacao_financeira;
                $descricao = $movimentacao->descricao;
                $tipo_movimentacao = $movimentacao->tipo_movimentacao;
                $valor=$movimentacao->valor;
                $data=$movimentacao->data_da_movimentacao;
                $id_conta=$movimentacao->id_conta_bancaria;

                echo "
                <form id='id_atualizacao_movimentacao'method='post' action='http://localhost/ci/desafio-bisa/index.php/movimentacao_control/atualizar_movimentacao/$id_movimentacao/$id_conta'>
                    <label for='id_descricao'>Descrição</label>
                    <input type='text' id='id_descricao' name='descricao' value=$descricao>
                    <select name='tipos_movimentacoes'>
                        <option value=$tipo_movimentacao selected>$tipo_movimentacao</option>
                        <option value='receita'>receita</option>
                        <option value='despesa'>despesa</option>
                    </select>
                    <label for='id_valor'>Valor</label>
                    <input type='number' id='id_valor' name='valor' value=$valor>
                    <label for='id_data_da_movimentacao'>Data</label>
                    <input type='date' id='id_data_da_movimentacao' name='data_da_movimentacao' value=$data>
                    <input type='submit' value='atualizar'/>
                    <a href='http://localhost/ci/desafio-bisa/index.php/movimentacao_control/excluir_movimentacao/$id_movimentacao/$id_conta'> <input type='button' value='deletar' id='id_deletar'/></a><br>                    
                </form>
                ";      
                
            }
        }else{
            echo "<h2>Não foram feitas movimentações nesta conta!</h2>";
        }
    ?>
    <form id="id_cadastro_movimentacao" method="post" action="http://localhost/ci/desafio-bisa/index.php/movimentacao_control/criar_movimentacao/<?php echo $id_conta; ?>">
            <label for="id_descricao">Descrição</label><br>
            <input type="text" id="id_descricao" name="descricao"><br>
            <label for="id_tipo_movimentacao">Tipo da Movimentação</label><br>
            <select id="id_tipo_movimentacao" name="tipos_movimentacoes" form="id_cadastro_movimentacao">
                <option value="receita" >Receita</option>
                <option value="despesa">Despesa</option>
            </select><br>
            <label for="id_valor">Valor</label><br>
            <input type="number" id="id_valor" name="valor"><br>
            <label for="id_data_da_movimentacao">Data</label><br>
            <input type="date" id="id_data_da_movimentacao" name="data_da_movimentacao"><br>
            <input type="submit" value="cadastrar"/>
            <a href="http://localhost/ci/desafio-bisa/index.php/conta_control/listar_contas"><input type="button" value="voltar" /></a>
    </form>
</body>
</html>