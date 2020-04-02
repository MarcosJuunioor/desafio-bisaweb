<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $config['hostname'] = '127.0.0.1';
        $config['username'] = 'marcos';
        $config['password'] = 'marcos123';
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

    public function salvar($dados){
       // $this->db->query("insert into conta_bancaria (descricao, saldo) values ('poupança santander', 100)");
    }

    public function listar(){
       $query = $this->db->query("select * from conta_bancaria");
       return $query->result();

    }

    public function atualizar($id_conta, $dados){

    }

    public function deletar($id_conta){

    }


}
