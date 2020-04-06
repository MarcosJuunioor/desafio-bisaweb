
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
    <h1 class="titulo"><span class="badge badge-secondary">Relatório</span></h1>
    <?php 
        if(!empty($movimentacoes)){
            $id_conta = $movimentacoes[0]->id_conta_bancaria;
            echo "<a href='http://localhost/ci/desafio-bisa/index.php/movimentacao_control/listar_movimentacoes/$id_conta'><input type='button' value='VOLTAR' class='btn btn-link'/></a>";
            echo "<table class='table table-bordered table-dark'>
                    <thead>
                        <tr>
                            <th scope='col'>Descrição</th>
                            <th scope='col'>Tipo da Movimentação</th>
                            <th scope='col'>Valor</th>
                            <th scope='col'>Data</th>
                        </td>
                    </thead>
                    <tbody>";
            foreach($movimentacoes as $movimentacao){
                $id_movimentacao = $movimentacao->id_movimentacao_financeira;
                $descricao = $movimentacao->descricao;
                $tipo_movimentacao = $movimentacao->tipo_movimentacao;
                $valor=$movimentacao->valor;
                $data=$movimentacao->data_da_movimentacao;
                $id_conta=$movimentacao->id_conta_bancaria;

                echo "
                    <tr>
                        <td>$descricao</td>
                        <td>$tipo_movimentacao</td>
                        <td>$valor</td>
                        <td>$data</td>                            
                    </tr> 
                ";      
                
            }
            echo "  <tbody>
                    </table>";
        }else{
            echo "<h4 class='titulo'>Não foram feitas movimentações nesta conta!</h4>";
        }
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="http://localhost/ci/desafio-bisa/assets/javascript/movimentacoes.js"></script>
</body>
</html>