<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta_control extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('conta_model', 'conta');
    }

    public function criar_conta(){
        $dados = "dados";
        $this->conta->salvar($dados);
    }
    
	public function listar_contas(){
        $contas = $this->conta->listar();
        $array["contas"] = $contas;
        $this->load->view("contas", $array);
    }
}
