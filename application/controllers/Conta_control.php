<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta_control extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('conta_model', 'conta');
    }

    public function criar_conta(){
        $dados = $this->input->post();
        $this->conta->salvar($dados);
        header('Location: http://localhost/desafio-bisaweb/index.php/conta_control/listar_contas');
    }
    
	public function listar_contas(){
        $contas = $this->conta->listar();
        $array["contas"] = $contas;
        $this->load->view("contas", $array);
    }

    public function excluir_conta(){
        $id_conta = $this->uri->segment(3);
        $this->conta->deletar($id_conta);
        header('Location: http://localhost/desafio-bisaweb/index.php/conta_control/listar_contas');
    }

    public function atualizar_conta(){
        $id_conta = $this->uri->segment(3);
        $dados = $this->input->post();
        $this->conta->atualizar($id_conta, $dados);
        header('Location: http://localhost/desafio-bisaweb/index.php/conta_control/listar_contas');
    }
}
