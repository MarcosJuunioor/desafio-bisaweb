# Desafio Bisaweb
Este repositório possui o projeto criado para resolução de um desafio proposto pela empresa Bisaweb em sua seleção para estagiário. O desafio consiste em desenvolver um sistema de gestão financeira com o uso do Codeigniter Framework.

## Especificações e Funcionalidades
A empresa definiu algumas especificações e funcionalidades, tais quais:

### ESPECIFICAÇÕES
O sistema deve ser desenvolvido com as seguintes requisitos:
- HTML5;
- CSS3;
- PHP com POO;
- Javascript;
- Framework CodeIgniter (preferencialmente na versão 3.x.x);
- Banco de dados relacional;
- Deverá ser disponibilizado no github.

### FUNCIONALIDADES
O sistema deverá permitir ao usuário as seguintes funcionalidades:
- Incluir, Remover, Alterar e Consultar Contas Bancárias.
- Incluir, Remover, Alterar e Consultar Movimentação Financeira.
- Relatório das movimentações, agrupadas por tipo de movimentação e por data das
movimentações.

## Banco de Dados
### Modelo Relacional
![](https://github.com/MarcosJuunioor/desafio-bisaweb/blob/master/MR-desafio-bisa.png)
### Script

	create database banco;
	use banco;

	create table conta_bancaria(
		id_conta_bancaria int not null auto_increment,
			descricao varchar(100) not null,
			saldo double not null,
			primary key(id_conta_bancaria)
	);

	create table movimentacao_financeira(
		id_movimentacao_financeira int not null auto_increment,
		descricao varchar(100) not null,
			tipo_movimentacao varchar(45) not null,
			valor double not null,
			data_da_movimentacao datetime not null,
			id_conta_bancaria int not null,
			primary key(id_movimentacao_financeira),
			foreign key(id_conta_bancaria) references conta_bancaria(id_conta_bancaria)
		ON DELETE CASCADE
		ON UPDATE CASCADE
	);
## Rodando o projeto
Para executar o sistema, deve-se primeiramente usar um "git clone" para dentro de um servidor local com PHP e MySql instalados. Depois disso, devem ser feitas as alterações no projeto para trabalhar com as configurações do banco de dados da máquina (isso deve ser feito nos arquivos "Conta_model.php" e "Movimentacao_model.php"). Em seguida, basta abrir o browser e colocar o endereço http://localhost/ci/desafio-bisa/index.php/conta_control/listar_contas.
