<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimentacao_control extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('movimentacao_model');
    }

    public function criar_movimentacao(){
        $dados = "dados";
        $this->movimentacao_model->salvar($dados);
    }

	public function listar_movimentacoes(){
        $movimentacoes = $this->movimentacao_model->listar();
        $array["movimentacoes"] = $movimentacoes;
        $this->load->view("movimentacoes", $array);
    }
}
