<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Contas Bancárias</title>
</head>
<body>
    <h1>Lista de contas: </h1>
    <div>
        <?php 
            if(!empty($contas)){
                foreach($contas as $conta){
                    $id_conta = $conta->id_conta_bancaria;
                    $descricao = $conta->descricao;
                    $saldo = $conta->saldo;
                    echo "
                    <form method='post' action='http://localhost/ci/desafio-bisa/index.php/conta_control/atualizar_conta/$id_conta'>
                        <label for='id_descricao'>Descrição</label>
                        <input type='text' id='id_descricao' name='descricao' value=$descricao>
                        <label for='id_saldo'>Saldo</label>
                        <input type='number' id='id_saldo' name='saldo' value=$saldo>
                        <input type='submit' value='atualizar'/>
                        <a href='http://localhost/ci/desafio-bisa/index.php/conta_control/excluir_conta/$id_conta'> <input type='button' value='deletar' id='id_deletar'/></a>
                        <a href='http://localhost/ci/desafio-bisa/index.php/movimentacao_control/listar_movimentacoes/$id_conta'> <input type='button' value='movimentações' id='id_movimentacoes'/></a><br>
                    </form>
                    ";      
                    
                }
            }else{
                echo "<h2>Não há contas cadastradas!</h2>";
            }
        ?>
        

        <form method="post" action="http://localhost/ci/desafio-bisa/index.php/conta_control/criar_conta">
            <label for="id_descricao">Descrição</label><br>
            <input type="text" id="id_descricao" name="descricao"><br>
            <label for="id_saldo">Saldo</label><br>
            <input type="number" id="id_saldo" name="saldo"><br>
            <input type="submit" value="cadastrar"/>
        </form>
    </div>

    <script src="http://localhost/ci/desafio-bisa/assets/javascript/contas.js"></script>
</body>


</html>

