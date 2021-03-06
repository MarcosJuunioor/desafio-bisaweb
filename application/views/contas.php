<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Contas Bancárias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/desafio-bisaweb/assets/css/contas.css">
</head>
<body>
    <div id="id_div_container">
    <h1 class="titulo"><span class="badge badge-primary">Lista de Contas Bancárias</span> </h1>
        <?php 
            if(!empty($contas)){
                foreach($contas as $conta){
                    $id_conta = $conta->id_conta_bancaria;
                    $descricao = $conta->descricao;
                    $saldo = $conta->saldo;
                    echo "
                    <div class='forms'>
                        <form method='post' action='http://localhost/desafio-bisaweb/index.php/conta_control/atualizar_conta/$id_conta'>
                            <div class='form-row'>
                                <div class='col'>
                                    <label for='id_descricao'>Descrição</label>
                                    <input type='text' id='id_descricao' name='descricao' value=$descricao required/>    

                                    <label for='id_saldo'>Saldo</label>
                                    <input type='number' id='id_saldo' name='saldo' value=$saldo min='0' required/>

                                    <input type='submit' value='atualizar' class='btn btn-light'/>
                                    <a href='http://localhost/desafio-bisaweb/index.php/conta_control/excluir_conta/$id_conta'> <input type='button' value='deletar' id='id_deletar' class='btn btn-danger'/></a>          
                                    <a href='http://localhost/desafio-bisaweb/index.php/movimentacao_control/listar_movimentacoes/$id_conta'> <input type='button' value='movimentações' id='id_movimentacoes' class='btn btn-info'/></a><br>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    ";      
                    
                }
            }else{
                echo "<h2 class='titulo'><span class='badge badge-light'>Não há contas cadastradas!</span></h2>";
            }
        ?>
        
        <div class="forms"> 
            <form method="post" action="http://localhost/desafio-bisaweb/index.php/conta_control/criar_conta">
                <div class="form-row">
                    <div class="card">
                        <div class="card-body">
                            <div class='col'>
                                <h3><span class="badge badge-success">NEW</span></h3>
                                <label for="id_descricao">Descrição</label>
                                <input type="text" id="id_descricao" name="descricao" required/>
                        
                                <label for="id_saldo">Saldo</label>
                                <input type="number" id="id_saldo" name="saldo" min="0" required/>
                        
                                <input type="submit" value="cadastrar" class="btn btn-success"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="http://localhost/desafio-bisaweb/assets/javascript/contas.js"></script>
</body>
</html>

