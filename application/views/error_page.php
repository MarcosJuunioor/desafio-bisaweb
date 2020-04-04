<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>error_page</title>
</head>
<body>
    <h1>Saldo insuficiente!</h1><br>
    <?php
        
        echo "<a href='http://localhost/ci/desafio-bisa/index.php/movimentacao_control/listar_movimentacoes/$id_conta'><button>voltar</button></a>";
    ?>
</body>
</html>