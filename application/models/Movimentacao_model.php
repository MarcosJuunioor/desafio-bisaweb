<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimentacao_model extends CI_Model {

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
        $this->db->query();
    }

    public function listar(){
        $query = $this->db->query("select * from movimentacao_financeira");
        return $query->result();
    }

    public function atualizar($id_movimentacao, $dados){

    }

    public function deletar($id_movimentacao){

    }


}
