<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimentacao_control extends CI_Controller {
    public static $id_conta;
    function __construct(){
        parent::__construct();
        $this->load->model('movimentacao_model', 'movimentacao');
    }

    public function criar_movimentacao(){
        $dados = $this->input->post();
        $id_conta = $this->uri->segment(3);
        $id_conta_aux["id_conta"] = $id_conta;
        if($this->movimentacao->salvar($dados, $id_conta)){
            header('Location: http://localhost/ci/desafio-bisa/index.php/movimentacao_control/listar_movimentacoes/'.$id_conta);
        }else{
            $this->load->view("error_page", $id_conta_aux);
        }
    }

	public function listar_movimentacoes(){
        $id_conta = $this->uri->segment(3);
        $movimentacoes = $this->movimentacao->listar($id_conta);
        $array["movimentacoes"] = $movimentacoes;
        $array["id_conta"] = $id_conta;
        $this->load->view("movimentacoes", $array);
    }

    public function excluir_movimentacao(){
        $id_movimentacao = $this->uri->segment(3);
        $id_conta = $this->uri->segment(4);
        $id_conta_aux["id_conta"] = $id_conta;
        if($this->movimentacao->deletar($id_movimentacao)){
            header('Location: http://localhost/ci/desafio-bisa/index.php/movimentacao_control/listar_movimentacoes/'.$id_conta);
        }else{
            $this->load->view("error_page", $id_conta_aux);
        }
    }

    public function atualizar_movimentacao(){
        $id_movimentacao = $this->uri->segment(3);
        $id_conta = $this->uri->segment(4);
        $id_conta_aux["id_conta"] = $id_conta;
        $dados = $this->input->post();
        if($this->movimentacao->atualizar($id_movimentacao, $dados, $id_conta)){
            header('Location: http://localhost/ci/desafio-bisa/index.php/movimentacao_control/listar_movimentacoes/'.$id_conta);
        }else{
            $this->load->view("error_page", $id_conta_aux);
        }
    }
}
