<?php

// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa				        |
// | 														                                   			  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto CEF SIGCB: Davi Nunes Camargo				  |
// +----------------------------------------------------------------------+


if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('boleto_cef_sigcb')) {

    /**
     * Boleto CEF SIGCB
     * @param  Array $dados_cliente  Dados do cliente
     * @param  Array $dados_empresa  Dados da Empresa
     * @param  Array $dados_boleto   Dados do Boleto
     * @param  Array $valores_boleto Valores do Boleto
     */
    function boleto_cef_sigcb($dados_cliente = null, $dados_empresa = null, $dados_boleto = null, $valores_boleto = null) {
        // DADOS DO BOLETO PARA O SEU CLIENTE
        $dias_de_prazo_para_pagamento = 5;
        $taxa_boleto = 0;
        $data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006";
        //$valor_cobrado = $valores_boleto['valor_boleto']; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal

        $valor_cobrado = $valores_boleto['valor_boleto'];
        $valor_cobrado = str_replace(",", ".", $valor_cobrado);
        $valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');

        // Composi��o Nosso Numero - CEF SIGCB
        $dadosboleto["nosso_numero1"] = ""; // tamanho 3
        $dadosboleto["nosso_numero_const1"] = "2"; //constanto 1 , 1=registrada , 2=sem registro
        $dadosboleto["nosso_numero2"] = ""; // tamanho 3
        $dadosboleto["nosso_numero_const2"] = "4"; //constanto 2 , 4=emitido pelo proprio cliente
        $dadosboleto["nosso_numero3"] = $dados_empresa['nosso_numero1'] . $dados_empresa['nosso_numero4']; // tamanho 9
               

        $dadosboleto["numero_documento"] = $dados_empresa['num_documento']; // Num do pedido ou do documento
        $dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
        $dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
        $dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
        $dadosboleto["valor_boleto"] = $valor_boleto;  // Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula
        // DADOS DO SEU CLIENTE
        $dadosboleto["sacado"] = $dados_cliente['sacado'];
        $dadosboleto["endereco1"] = $dados_cliente['endereco1'];
        $dadosboleto["endereco2"] = $dados_cliente['endereco2'];

        // INFORMACOES PARA O CLIENTE
        // INFORMACOES PARA O CLIENTE
        $dadosboleto["demonstrativo1"] = "Demonstrativo";
        //$dadosboleto["demonstrativo2"] = "Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
        $dadosboleto['demonstrativo2'] = "Sistema de eventos - URCA";
        $dadosboleto["demonstrativo3"] = "";

        // INSTRU��ES PARA O CAIXA
        $dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
        $dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
        $dadosboleto["instrucoes3"] = "- Emitido pelo sistema de Evento URCA";
        $dadosboleto["instrucoes4"] = "";

        // DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
        $dadosboleto["quantidade"] = "1";
        $dadosboleto["valor_unitario"] = $valor_boleto;
        $dadosboleto["aceite"] = "N";
        $dadosboleto["especie"] = "R$";
        $dadosboleto["especie_doc"] = "DS";



        // DADOS DA SUA CONTA - CEF
        $dadosboleto["agencia"] = "0684"; // Num da agencia, sem digito
        $dadosboleto["conta"] = "2806";  // Num da conta, sem digito
        $dadosboleto["conta_dv"] = "6";  // Digito do Num da conta
        // DADOS PERSONALIZADOS - CEF
        $dadosboleto["conta_cedente"] = "375843"; // ContaCedente do Cliente, sem digito (Somente Números)
        $dadosboleto["conta_cedente_dv"] = "5"; // Digito da ContaCedente do Cliente
        $dadosboleto["carteira"] = "SR";  // Código da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)
        // SEUS DADOS
        $dadosboleto["identificacao"] = "Sistema de eventos URCA";
        $dadosboleto["cpf_cnpj"] = "02.108.061/0001-00";
        $dadosboleto["endereco"] = "Sistema de Eventos - URCA";
        $dadosboleto["cidade_uf"] = "Crato / CE";
        $dadosboleto["cedente"] = "Sistema de eventos - URCA";

        // N�O ALTERAR!
        require "include/funcoes_cef_sigcb.php";
        require "include/layout_cef.php";
    }

}
?>
