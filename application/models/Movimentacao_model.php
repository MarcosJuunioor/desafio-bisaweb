<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimentacao_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $config['hostname'] = '127.0.0.1';
        $config['username'] = 'root';
        $config['password'] = '';
        $config['database'] = 'banco';
        $config['dbdriver'] = 'mysqli';
        $config['dbprefix'] = '';
        $config['pconnect'] = TRUE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';

        $this->load->database($config);
    }

    public function salvar($dados, $id_conta){
        $descricao = $dados["descricao"];
        $tipo_movimentacao = $dados['tipos_movimentacoes'];
        $valor = $dados['valor'];
        $data = $dados['data_da_movimentacao'];
        if(self::atualizar_saldo_conta($tipo_movimentacao, $valor, $id_conta)){
            return $this->db->query("insert into movimentacao_financeira (descricao, tipo_movimentacao, valor, data_da_movimentacao, id_conta_bancaria) values ('$descricao', '$tipo_movimentacao', $valor, '$data', $id_conta)");
        }else{
            return false;
        }
    }

    public function listar($id_conta){
        $query = $this->db->query("select * from movimentacao_financeira where id_conta_bancaria = $id_conta");
        return $query->result();
    }

    public function atualizar($id_movimentacao, $dados, $id_conta){
        $descricao = $dados["descricao"];
        $tipo_movimentacao = $dados['tipos_movimentacoes'];
        $valor = $dados['valor'];   
        $data = $dados['data_da_movimentacao'];

        if(self::atualizar_saldo_conta($tipo_movimentacao, $valor, $id_conta)){
            return $this->db->query("update movimentacao_financeira
                                        set descricao='$descricao',
                                        tipo_movimentacao='$tipo_movimentacao',
                                        valor=$valor,
                                        data_da_movimentacao='$data'
                                        where id_movimentacao_financeira =$id_movimentacao");
        }else{
            return false;
        }

    }

    public function deletar($id_movimentacao){
        $query = $this->db->query("select * from movimentacao_financeira where id_movimentacao_financeira=$id_movimentacao");
        $movimentacao = $query->result();
        $tipo_movimentacao = $movimentacao[0]->tipo_movimentacao;
        $valor = $movimentacao[0]->valor;
        $id_conta = $movimentacao[0]->id_conta_bancaria;
        
        //O if abaixo inverte o tipo, pois, ao deletar, deve-se restituir tirado ou excluir o valor acrescentado.
        if($tipo_movimentacao == "receita"){
            $tipo_movimentacao="despesa";
        }else{
            $tipo_movimentacao="receita";
        }
        
        if(self::atualizar_saldo_conta($tipo_movimentacao, $valor, $id_conta)){
            return $this->db->query("delete from movimentacao_financeira where id_movimentacao_financeira = $id_movimentacao");
        }else{
            false;
        }

        
    }

    public function atualizar_saldo_conta($tipo_movimentacao, $valor, $id_conta){
        if($tipo_movimentacao=="despesa"){
            $query = $this->db->query("select saldo from conta_bancaria where id_conta_bancaria = $id_conta");
            $array = $query->result();
            if($valor > $array[0]->saldo){
                return false;
            }
        }

        return $this->db->query("update conta_bancaria
                            set saldo = case 
                            when '$tipo_movimentacao'='receita' then saldo+$valor
                            when '$tipo_movimentacao'='despesa' then saldo-$valor
                            end
                            where id_conta_bancaria=$id_conta");

    }

    public function listar_ordenado($id_conta){
        $query = $this->db->query("select * from movimentacao_financeira where id_conta_bancaria = $id_conta order by tipo_movimentacao, data_da_movimentacao");
        return $query->result();
    }

}
