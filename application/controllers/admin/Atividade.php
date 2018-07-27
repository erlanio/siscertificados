<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Atividade extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Model_Atividade', 'atividade');

        $this->load->helper('uteis_helper');

        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        } else {
            if ($this->session->userdata('usuario')->nivel_usuario == 0 || $this->session->userdata('usuario')->nivel_usuario == 1) {
                redirect(base_url('admin/Inscricoes'));
            }
        }
    }

    public function index() {
        $data['atividade'] = $this->atividade->retornaAtividades();
        $data['tipo_atividade'] = $this->atividade->retornaTiposAtividades();

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/lista-atividade', $data);
        $this->load->view('footer');
    }

    public function gerenciar() {
        $id_atividade = $this->input->post('id_atividade');

        $data['atividade'] = $this->atividade->retornaAtividadeID($id_atividade);
        $data['tipo_atividade'] = $this->atividade->retornaTiposAtividades();
        foreach ($data['atividade'] as $dados) {
            
        }

        echo "<div class='col-md-12'>
                <div class='form-group col-md-12'>
                    <label for='message-text' class='control-label'>Nome Atividade:</label>
                    <input type='text' value='$dados->nome_atividade' class='form-control' id='atividade' name='nome-atividade'>                    
                </div>
                
                <input type='hidden' id='id_atividade' value='$dados->id_atividade'>   

                <div class='form-group col-md-6'>
                    <label for='message-text' class='control-label'>Data início:</label>
                    <input type='date' value='$dados->dt_inicio_atividade' class='form-control' id='data-inicio' name='data-inicio'>                    
                </div>

                <div class='form-group col-md-6'>
                    <label for='message-text' class='control-label'>Data Fim</label>
                    <input type='date' value='$dados->dt_fim_atividade' class='form-control' id='data-fim' name='data-fim'>                     
                </div>
                
                <div class='form-group col-md-12'>
                    <label for='message-text' class='control-label'>Responsável</label>
                    <input type='text' value='$dados->responsavel' class='form-control' id='responsavel' name='responsavel'>                     
                </div>
                
                <div class='form-group col-md-12'>
                    <label for='message-text' class='control-label'>Tipo de Atividade</label>                                

                    <select class='form-control' id='tipo_atividade'>

           ";
        foreach ($data['tipo_atividade'] as $valores) {
            $id_tipo = $valores->id_tipo_atividade;
            $nome_tipo = $valores->tipo_atividade;
            if ($id_tipo == $dados->id_tipo_atividade) {
                echo "<option value='$id_tipo' selected='selected'>$nome_tipo</option>";
            } else {
                echo "<option value='$id_tipo'>$nome_tipo</option>";
            }
        }

        echo " </select> </div></div>";
    }

    public function editar() {
        $data['nome_atividade'] = $this->input->post('atividade');
        $data['id_tipo_atividade'] = $this->input->post('id_tipo_atividade');
        $data['dt_inicio_atividade'] = $this->input->post('dataInicio');
        $data['dt_fim_atividade'] = $this->input->post('dataFim');
        $data['responsavel'] = $this->input->post('responsavel');
        $id_atividade = $this->input->post('id_atividade');

        $this->atividade->update($data, $id_atividade);
    }

    public function salvar() {
        $data['nome_atividade'] = $this->input->post('atividade');
        $data['id_tipo_atividade'] = $this->input->post('id_tipo_atividade');
        $data['dt_inicio_atividade'] = $this->input->post('dataInicio');
        $data['dt_fim_atividade'] = $this->input->post('dataFim');
        $data['responsavel'] = $this->input->post('responsavel');


        $this->atividade->salvar($data);
    }

    public function deletar() {
        $id = $this->input->post('id');

        $this->atividade->deletar($id);
    }

    public function listaInscritos() {

        $id = $this->input->post('id');


        $data['listaInscritos'] = $this->atividade->retornaListaInscritos($id);
        echo "<input type='hidden' id='id_atividade' value='$id'>";
        echo "<table class='table table-hover thead col-md-8' id='table-lista-inscritos'>
                        <thead>
                            <tr>  
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th class='centro'>Excluir<Br> Participante</th>
                                <th>Certificado</th>
                            </tr>
                        </thead>";

        foreach ($data['listaInscritos'] as $dados) {
            $nome_pessoa = $dados->nome_pessoa;
            $id_inscricao = $dados->id_inscricao;
            $email = $dados->email_pessoa;
            $celular = $dados->celular_pessoa;
            $cpf = $dados->cpf_pessoa;
            $certificado = $dados->certificado_liberado;
            echo "
                            <tbody>
                            <td>$id_inscricao</td>
                            <td>$nome_pessoa</td>                            
                            <td>$email</td>
                            <td>$celular</td>
                            <td>$cpf</td>
                            <td class='centro'><buttom class='btn-xs btn btn-danger' onclick=\"deletarUsuarioAtividade('$id_inscricao');\" ><i class='glyphicon glyphicon-remove'></i> Excluir</buttom></td>

                            <td>";

            if ($certificado == "n") {
                echo "<buttom class='btn-xs btn btn-danger' onclick=\"liberarCert('$id_inscricao', 's');\" ><i class='glyphicon glyphicon-ok'></i> Não Liberado</buttom>";
            } else {
                echo "<buttom class='btn-xs btn btn-success'  onclick=\"liberarCert('$id_inscricao', 'n');\" ><i class='glyphicon glyphicon-ok'></i> Liberado</buttom>";
            }

            echo "               
                            </td>
                           
                            </tbody>

                        <?php } ?>
                   ";
        }

        echo "</table>";
    }

    public function buscarNome() {
        $nome = $this->input->post('nome');
        $id = $this->input->post('id_atividade');
        $data['listaInscritos'] = $this->atividade->retornaPessoa($nome, $id);

        echo "<input type='hidden' id='id_atividade' value='$id'>";
        echo "<table class='table table-hover thead col-md-8' id='table-lista-inscritos'>
                        <thead>
                            <tr>  
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th class='centro'>Excluir<Br> Participante</th>
                                <th>Certificado</th> 
                                
                            </tr>
                        </thead>";

        foreach ($data['listaInscritos'] as $dados) {
            $nome_pessoa = $dados->nome_pessoa;
            $id_inscricao = $dados->id_inscricao;
            $email = $dados->email_pessoa;
            $celular = $dados->celular_pessoa;
            $cpf = $dados->cpf_pessoa;
            $certificado = $dados->certificado_liberado;


            echo "
                            <tbody id='ins-atividade$id_inscricao'>
                            <td>$id_inscricao</td>
                            <td>$nome_pessoa</td>                            
                            <td>$email</td>
                            <td>$celular</td>
                            <td>$cpf</td>
                            <td class='centro'><buttom class='btn-xs btn btn-danger' onclick=\"deletarUsuarioAtividade('$id_inscricao');\" ><i class='glyphicon glyphicon-remove'></i> Excluir</buttom></td>
                            <td>";


            if ($certificado == "n") {
                echo "<buttom class='btn-xs btn btn-danger' onclick=\"liberarCert('$id_inscricao', 's');\" ><i class='glyphicon glyphicon-ok'></i> Não Liberado</buttom>";
            } else {
                echo "<buttom class='btn-xs btn btn-success'  onclick=\"liberarCert('$id_inscricao', 'n');\" ><i class='glyphicon glyphicon-ok'></i> Liberado</buttom>";
            }

            echo "
                            </td>
                           
                            </tbody>

                        <?php } ?>
                   ";
        }

        echo "</table>";
    }

    public function liberarCertificado() {
        $id = $this->input->post('id');
        $liberado = $this->input->post('liberado');
        $data['certificado_liberado'] = $liberado;
        $this->atividade->liberarCert($data, $id);
    }

    public function buscarTipoAtividade() {
        $id = $this->input->post('id');
        $data['tipoAtividade'] = $this->atividade->buscarTipoAtividade($id);

        foreach ($data['tipoAtividade'] as $dados) {
            $nome = $dados->tipo_atividade;
            $id_tipo_atividade = $dados->id_tipo_atividade;

            echo "
                <div class='form-group col-md-12'>
                    <label for='message-text' class='control-label'>Nome Tipo Atividade:</label>
                    <input type='text' value='$nome'  class='form-control' id='nome-tipo-atividade-editar' name='nome-atividade-salvar'>
                    <input type='hidden' id='id_tipo_atividade' value='$id_tipo_atividade'>
                </div>";
        }
    }

    public function salvarTipoAtividade() {
        $data['tipo_atividade'] = $this->input->post('nome');
        $this->atividade->salvarTipoAtividade($data);
    }

    public function salvarEdicaoTipoAtividade() {
        $id = $this->input->post('id');
        $nome = $this->input->post('nome');
        $data['tipo_atividade'] = $nome;
        $this->atividade->atividadesalvarEdicaoTipoAtividade($data, $id);
    }

    public function deletarTipoAtividade() {
        $id = $this->input->post('id');

        $this->atividade->deletarTipoAtividade($id);
    }

    public function deletarPapel() {
        $id = $this->input->post('id');

        $this->atividade->deletarPapel($id);
    }

    public function buscarPapel() {
        $id = $this->input->post('id');
        $data['papel'] = $this->atividade->buscarPapel($id);

        foreach ($data['papel'] as $dados) {
            $nome = $dados->descricao;
            $id_papel = $dados->id_papel;

            echo "
                <div class='form-group col-md-12'>
                    <label for='message-text' class='control-label'>Nome Papel</label>
                    <input type='text' value='$nome'  class='form-control' id='nome-papel-editar' name='nome-atividade-salvar'>
                    <input type='hidden' id='id_papel' value='$id_papel'>
                </div>";
        }
    }

    public function salvarEdicaoPapel() {
        $id = $this->input->post('id');
        $nome = $this->input->post('nome');
        $data['descricao'] = $nome;
        $this->atividade->salvarEdicaoPapel($data, $id);
    }

    public function salvarFuncao() {
        $data['descricao'] = $this->input->post('nome');
        $this->atividade->salvarFuncao($data);
    }

    public function deletarParticipanteAtividade() {
        $id = $this->input->post('id');
        $this->atividade->deletarParticipanteAtividade($id);
    }

}
