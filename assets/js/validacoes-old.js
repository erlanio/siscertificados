$(document).ready(function () {
    $('#cadastro-programacao').hide();
    $('#retorno-data-programacao').hide();
    pegaCidades();
//ENVIO DE IMAGENS SEM REFRESH
    $('#cadastro-evento-imagens').hide();
    $('#cadastro-evento-valores').hide();

    $('#etapa3').click(function () {
        $('#cadastro-evento-imagens').hide('slow');
        $('#cadastro-evento-valores').show('slow');
    })

    //$('#cadastro-evento-imagens').hide();
    $('#etapa3-retorno').hide();
    $('#etapa3').click(function () {
        if ($('#slideID').length && $('#cardID').length) {
            $('#cadastro-evento-imagens').hide('slow');
        } else {
            $('#etapa3-retorno').show('slow');
        }
    });



    $('#imagemSlide').on('change', function () {

        var fr = new FileReader;

        fr.onload = function () {
            var img = new Image;

            img.onload = function () {

                if (img.width != 1900 && this.height != 900) {
                    $('#retorno-envio-img').addClass("alert alert-danger");
                    $('#retorno-envio-img').html("Ops! A imagem deve conter as seguintes dimensões: <br> Largura: 1900px<br>Altura: 900px;");
                } else {
                    /* Efetua o Upload sem dar refresh na pagina */
                    $('#formulario').ajaxForm({
                        target: '#visualizarSlide' // o callback será no elemento com o id #visualizar
                    }).submit();

                }
            };

            img.src = fr.result;
        };

        fr.readAsDataURL(this.files[0]);


        $id_evento = $('#id_evento').val();

    });

    $('#imagemCard').on('change', function () {

        var fr = new FileReader;

        fr.onload = function () {
            var img = new Image;

            img.onload = function () {


                if (img.width != 392 && this.height != 376) {
                    $('#retorno-envio-card').addClass("alert alert-danger");
                    $('#retorno-envio-card').html("Ops! A imagem deve conter as seguintes dimensões: <br> Largura: 392px<br>Altura: 376px;");
                } else {
                    /* Efetua o Upload sem dar refresh na pagina */
                    $('#formulario2').ajaxForm({
                        target: '#visualizarCard' // o callback será no elemento com o id #visualizar
                    }).submit();

                }
            };

            img.src = fr.result;
        };

        fr.readAsDataURL(this.files[0]);


        $id_evento = $('#id_evento').val();

    });

    $('#imagemCertificado').on('change', function () {

        var fr = new FileReader;

        fr.onload = function () {
            var img = new Image;

            img.onload = function () {


                if (img.width != 1126 && this.height != 794) {
                    $('#retorno-envio-certificado').addClass("alert alert-danger");
                    $('#retorno-envio-certificado').html("Ops! A imagem deve conter as seguintes dimensões: <br> Largura: 392px<br>Altura: 376px;");
                } else {
                    /* Efetua o Upload sem dar refresh na pagina */
                    $('#formulario3').ajaxForm({
                        target: '#visualizarCertificado' // o callback será no elemento com o id #visualizar
                    }).submit();

                }
            };

            img.src = fr.result;
        };

        fr.readAsDataURL(this.files[0]);


        $id_evento = $('#id_evento').val();

    });

    //IMAGEM LOGO TOPO

    $('#imagemLogo').on('change', function () {
        $('#logo').ajaxForm({
            target: '#visualizarLogo' // o callback será no elemento com o id #visualizar
        }).submit();
//        var fr = new FileReader;
//
//        fr.onload = function () {
//            var img = new Image;
//
//            img.onload = function () {
//
//
//                if (img.width != 1126 && this.height != 794) {
//                    $('#retorno-envio-certificado').addClass("alert alert-danger");
//                    $('#retorno-envio-certificado').html("Ops! A imagem deve conter as seguintes dimensões: <br> Largura: 392px<br>Altura: 376px;");
//                } else {
//                    /* Efetua o Upload sem dar refresh na pagina */
//                    $('#formulario3').ajaxForm({
//                        target: '#visualizarCertificado' // o callback será no elemento com o id #visualizar
//                    }).submit();
//
//                }
//            };
//
//            img.src = fr.result;
//        };
//
//        fr.readAsDataURL(this.files[0]);
//
//
//        $id_evento = $('#id_evento').val();

    });

//FIM ENVIO DE IMAGEM SEM REFRESH

    $i = 0;
//CONFIGURAÇÕES DE VALORES 
    $('#tabela-categorias').hide();
    $('#categorias-pagamento').change(function () {
        $id_categoria = $('#categorias-pagamento :selected').val();

        $categoria = $('#categorias-pagamento :selected').text();
        $('#tabela-categorias').show('slow');
        $('#tabela-categorias').append("<div class='col-md-6'><label for='texto'>Categoria: *</label><input type='text' value=" + $categoria + " class='form-control' disabled></div>");
        $('#tabela-categorias').append("<div class='col-md-6'><input type='hidden' value=" + $id_categoria + " id='categoria-" + $i + "' class='form-control' disabled></div>");
        $('#tabela-categorias').append("<div class='col-md-2'><label for='texto'>Valor: *</label><input type='text' id='valor-" + $i + "' class='form-control'></div>");
        $i += 1;
        $(".valor-1").inputmask({
            mask: ["999", ],
            keepStatic: true
        });

    });

    $('#btn-salvar-valores').click(function () {
        salvarValores($i);
    });
//

    if ($('#cpfBuscaSol').length) {
        buscaCPFSol();
    }

    $("#ch").inputmask({
        mask: ["999", ],
        keepStatic: true

    });

    $("#hrIni").inputmask({
        mask: ["99", ],
        keepStatic: true

    });

    $("#hrFim").inputmask({
        mask: ["99", ],
        keepStatic: true

    });

    $("#max").inputmask({
        mask: ["9999", ],
        keepStatic: true

    });


    $("input[id=temSub]").change(function () {
        if ($(this).is(':checked')) {

        }

    });


    if ($("#cpfBuscaAval").length) {
        buscarAvaliadorCPF();
    }

    $('#alert-sub').hide();
    $('#alert-sub-edit').hide();
    $('#cpf-invalido').hide();
    $('#aguarde').hide();
    $('#aguarde-sub').hide();
    $('#alert-file').hide();
    $('#coautor1').hide();
    $('#retorno').hide();



    $('#envia-area').click(function () {

        if ($('#area-cad').val() == "" || $('#area-sigla').val() == "") {
            $('#erro-area').addClass('alert alert-danger');
            $('#erro-area').html("Ops! Preencha todos os campos");
        } else {

            $.ajax({
                url: 'http://cev.urca.br/siseventos/admin/SubTrabalho/inserirGT',
                type: 'POST',
                dataType: 'html',
                data: ({
                    'id_evento': $('#id_evento').val(),
                    'descricao': $('#area-cad').val(),
                    'sigla': $('#area-sigla').val()
                })

            }).done(function (data) {
                $('#area-cad').val("");
                $('#area-sigla').val("");
                $('#tabela-areas').append(data);
            });

        }

    })


    $('#modalidade').change(function () {
        if ($('#modalidade').val() == 2) {
            $('#sub-trabalho-file').removeAttr('required');
        }

    })


    $('[data-toggle="tooltip"]').tooltip()
    $('[data-toggleArea="tooltipArea"]').tooltip()

    $('.btn-avaliar').on('click', function () {
        var dialog = bootbox.dialog({
            title: 'Enviando avaliação',
            message: "<p><img src='http://cev.urca.br/siseventos/assets/img/aguarde.gif' class='img-responsive'></p>"
        });
        dialog.init(function () {
            setTimeout(function () {
                dialog.find('.bootbox-body').html('Avaliado com sucesso!');
            }, 5000);
        });

    })


    $("input[id=categorias-pagamento]").change(function () {
        if ($(this).is(':checked')) {
            alert('okok');
        }

    });

    $('#enviar-sub-aguarde').click(function () {
        var fileUpload = document.getElementById("sub-trabalho-file");
        var tamanho = $("#resumo").val().length;
        var min = $("#min_char").val();
        if (tamanho < min) {
            $('#alert-sub').show('slow');
        } else if (fileUpload.files.length == 0 && $('#modalidade').val() == 1) {
            $('#alert-file').show('slow');
        } else {
            $('#sub_trab').removeAttr('onsubmit');
            $('#aguarde-sub').show('slow');
            $('#sub-hide').hide('slow');
            $('#enviar-sub-aguarde').hide('slow');
        }
    });

    $('#alterar-sub').click(function () {
        var tamanho = $("#resumo-edit").val().length;
        var min = $("#min_char").val();
        if (tamanho < min) {
            $('#alert-sub-edit').show('slow');
            $('#edit_sub').attr("onsubmit", 'false');
        } else {
            $('#edit_sub').removeAttr('onsubmit');
            $('#aguarde-sub').show('slow');
            $('#sub-hide').hide('slow');
            $('#enviar-sub-aguarde').hide('slow');
        }
    });

    $('#ch').inputmask({
        mask: ["99", ],
        keepStatic: true
    })

    $("#celular").inputmask({
        mask: ["(99) 99999 - 9999", ],
        keepStatic: true
    });
    $("#cpf").inputmask({
        mask: ["99999999999", ],
        keepStatic: true
    });
    $(".modal-wide").on("show.bs.modal", function () {
        var height = $(window).height() - 200;
        $(this).find(".modal-body").css("max-height", height);
    });



    var countries = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: {
            url: 'data/countries.json',
            filter: function (list) {
                return $.map(list, function (name) {
                    return {name: name};
                });
            }
        }
    });
    countries.initialize();
    $('#tags-input').tagsinput({
        typeaheadjs: {
            name: 'countries',
            displayKey: 'name',
            valueKey: 'name',
            source: countries.ttAdapter()
        }
    });
    $('#tags-aval').tagsinput({
        typeaheadjs: {
            name: 'countries',
            displayKey: 'name',
            valueKey: 'name',
            source: countries.ttAdapter()
        }
    });
    $('#tags-edit').tagsinput({
        typeaheadjs: {
            name: 'countries',
            displayKey: 'name',
            valueKey: 'name',
            source: countries.ttAdapter()
        }
    });
    $('#enviar-pessoa').click(function () {
        validarPessoa();
    });
    $('#error-repete-senha').hide();
    $('#alterar-senha').click(function () {
        alterarSenha();
    })

    $("#bloco-sub-trabalho").hide();
    $("#submissao-trabalho").hide();
    $(".minicursos").hide();
    countNumDigitados();
    $('#fechar-informacoes-sub').click(function () {
        $('#bloco-sub-trabalho').hide('slow');
    });
    $('#envia-instituicao').click(function () {
        $nome_ies = $('#cad-instituicao').val();
        inserirIes($nome_ies);
    })

});
//valida form alterar-senha
function alterarSenha() {
    var senha = $('#senha').val();
    var repeteSenha = $('#repete_senha').val();
    if (senha != repeteSenha) {
        $('#error-repete-senha').show('slow');
        $('#error-repete-senha').html("<strong>Ops! Senhas não conferem!</strong>");
        $('#repete_senha').css({border: "1px solid red"});
        $('#repete_senha').focus();
    } else if (senha.length < 6) {
        $('#error-repete-senha').show('slow');
        $('#error-repete-senha').html("<strong>Ops! Infome pelo menos 6 caractéres!</strong>");
    } else {
        $('#form-alterar-senha').removeAttr('onsubmit');
    }
}


//validação do formulário Pessoa
function validarPessoa() {
    var nome = $('#nome').val();
    var instituicao = $('#instituicao').val();
    var email = $('#email').val();
    var telefone = $('#telefone').val();
    var tel_fixo = $('#tel_fixo').val();
    var senha = $('#senha').val();
    var repeteSenha = $('#repete_senha').val();
    var cpf = $('#cpf').val();
    var repete_email = $('#repete_email').val();
    var repete_senha = $('#repete_senha').val();
    if (email != repete_email) {
        $('#error-email-repete').html("Email não confere!");
        $('#repete_email').css({border: "1px solid red"});
        $('#repete_email').focus();
    } else if (senha != repeteSenha) {
        $('#error-repete-senha').html("Senha não confere!");
        $('#repete_senha').css({border: "1px solid red"});
        $('#repete_senha').focus();
    } else if (TestaCPF(cpf) == false) {
        $('#error-cpf').html(' *CPF Inválido!');
        $('#cpf').focus();
    } else {
        $("#cadastrar-pessoa").removeAttr('onsubmit');
    }
    /*
     if (email == "") {
     $('#nome').focus();
     $('#error-email').html(' *Preencha corretamente!');
     } else if (instituicao == "") {
     $('#error-instituicao').html(' *Preencha corretamente!');
     } else if (email == "") {
     $('#error-email').html(' *Preencha corretamente!');
     } else if (telefone == "") {
     $('#error-telefone').html(' *Preencha corretamente!');
     } else if (senha == "") {
     $('#error-senha').html(' *Preencha corretamente!');
     } else if (repeteSenha == "") {
     $('#error-repete-senha').html(' *Preencha corretamente!');
     } else if (cpf == "") {
     $('#error-cpf').html(' *Preencha corretamente!');
     } else if (TestaCPF(cpf) == false) {
     $('#error-cpf').html(' *Preencha corretamente!');
     alert('CPF inválido!');
     $('#cpf').focus();
     } else if (senha != repeteSenha) {
     $('#error-senha').html(' *Preencha corretamente!');
     alert('Senhas não conferem, tente novamente!')
     $('#senha').focus();
     } else {
     $("#cadastrar-pessoa").submit();
     }
     */
}

//validação de CPF
function validarCPF() {
    $cpf = $('#cpf').val();
    if (TestaCPF($cpf) == false) {
        $('#cpf-invalido').show('slow');
    } else {
        $('#cpf-invalido').hide('slow');
    }
}



function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    if (strCPF == "00000000000")
        return false;
    for (i = 1; i <= 9; i++)
        Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11))
        Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)))
        return false;
    Soma = 0;
    for (i = 1; i <= 10; i++)
        Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11))
        Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11)))
        return false;
    return true;
}

function confirmarInscricao($nome_evento, $id_evento, $id_usuario) {
    bootbox.confirm({
        message: "Tem certeza que deseja inscrever-se nesse evento?<br><strong>" + $nome_evento + "</strong>",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-success'
            },
            cancel: {
                label: 'Não',
                className: 'btn-danger enviar'
            }
        },
        callback: function (result) {
            if (result == true) {

                $.ajax({
                    type: 'post',
                    url: 'Inscricoes/inserirInscricao',
                    data: {'id_evento': $id_evento, 'id_usuario': $id_usuario, },
                    success: function (data) {
                        location.href = " ";
                    }
                });
            }

        }
    });
}

function mostraMiniCursos($id_mini) {
    $("#conteudo-mini" + $id_mini).show("slow");
}

function fecharModal($id_mini) {
    $("#conteudo-mini" + $id_mini).hide("slow");
}

function cadastrarPessoaAtividade($id_atividade, $id_evento, $id_usuario) {
    bootbox.confirm({
        message: "Tem certeza que deseja inscrever-se nesse evento?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-success'
            },
            cancel: {
                label: 'Não',
                className: 'btn-danger enviar'
            }
        },
        callback: function (result) {
            if (result == true) {
                $('#aguarde' + $id_evento).removeClass("hidden").fadeIn();
                $('#aguarde-oficina' + $id_evento).removeClass("hidden").fadeIn();
                $.ajax({
                    type: 'post',
                    url: 'Inscricoes/inserirInscricaoAtividade',
                    data: {'id_evento': $id_evento, 'id_usuario': $id_usuario, 'id_atividade': $id_atividade, },
                    success: function (data) {
                        alert('Cadastrado com sucesso!');
                        location.href = " ";
                    }
                });
            }
        }
    });
}

function countNumDigitados() {
    $("#resumo").keyup(function () {
        var tamanho = $("#resumo").val().length;
        var min = $("#min_char").val();
        $("#num-digitados").html(tamanho);
    });
    $("#resumo-edit").keyup(function () {
        var tamanho = $("#resumo-edit").val().length;
        $("#num-digitados-edit").html(tamanho);
    });
}

function abrirSubTrabalho() {
    $('#sessao-nova-sub').hide('slow');
    $('#submissao-trabalho').show('slow');
    $('#bloco-sub-trabalho').hide();
    $("#bloco-sub-trabalho").hide('slow');
}

function abrirInformacoesSub() {
    $("#bloco-sub-trabalho").show('slow');
}

function enviaPagseguro($codigo, $nome, $valor, $cpf) {
    $.post('Inscricoes/pagseguro', {codigo: $codigo, nome: $nome, valor: $valor, cpf: $cpf}, function (data) {
        $('#code').val(data);
        $('#comprar').submit();
    })
}

function enviaPagseguro2($codigo) {
    alert($codigo);
    $.post('Inscricoes/verificaPag', '', function ($codigo) {

        $.post('Inscricoes/pagseguro', {codigo: $codigo}, function (data) {
            $('#code').val(data);
            $('#comprar').submit();
            $('#loading').css("visibility", "hidden");
        })
    })
}

function gerarBoleto($id_evento) {
    $.ajax({
        type: 'post',
        url: 'Inscricoes/gerarBoleto',
        data: {'id_evento': $id_evento},
        success: function (data) {
            location.href = "Inscricoes/gerarBoleto/" + $id_evento
        }
    });
}

function apagarSubTrabalho($id_submissao, $id_evento, $base_url) {
    bootbox.confirm({
        message: "Tem certeza que deseja apagar esta submissão?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-success'
            },
            cancel: {
                label: 'Não',
                className: 'btn-danger enviar'
            }
        },
        callback: function (result) {
            if (result == true) {
                $.post($base_url + "admin/SubTrabalho/apagarSubTrabalho/", {id_submissao: $id_submissao, id_evento: $id_evento},
                        function (data) {

                            location.href = " ";
                        });
            }
        }
    });
}

function pegaCidades() {
    $('#estado').change(function () {
        var id_estado = $('#estado').val();
        $.post('http://cev.urca.br/siseventos/Pessoa/getCidades', {id_estado: id_estado},
                function (data) {
                    $('#cidades').html(data);
                    $('#cidades').removeAttr('disabled');
                }
        )
    })
}

function pegaCidadesAlterar() {
    $('#estado').change(function () {
        var id_estado = $('#estado').val();
        $.post('http://cev.urca.br/siseventos/Pessoa/getCidades', {id_estado: id_estado},
                function (data) {
                    $('#cidades').html(data);
                    $('#cidades').removeAttr('disabled');
                }
        )
    })
}

function localMinicurso($local) {
    bootbox.alert($local);
}

// FUNÇÃO PARA BUSCA BUSCAR UNIVERSIDADES
function buscar(valor) {

// Verificando Browser
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
    var url = "http://cev.urca.br/siseventos/Pessoa/retornaIes?valor=" + valor;
// Chamada do método open para processar a requisição
    req.open("Get", url, true);
// Quando o objeto recebe o retorno, chamamos a seguinte função;
    req.onreadystatechange = function () {
        $('#resultado').show();
        // Exibe a mensagem "Buscando Ies.." enquanto carrega
        if (req.readyState == 1) {
            document.getElementById('resultado').innerHTML = 'Buscando Ies...';
        }

        // Verifica se o Ajax realizou todas as operações corretamente
        if (req.readyState == 4 && req.status == 200) {

            // Resposta retornada pelo busca.php
            var resposta = req.responseText;
            // Abaixo colocamos a(s) resposta(s) na div resultado
            document.getElementById('resultado').innerHTML = resposta;
        }
    }
    req.send(null);
}

//funcao que passa o nome da ies para o input
function exibirIES(id, nome) {
    $('#instituicaoMask').val(nome);
    $('#instituicao').val(id);
    $('#resultado').hide('slow');
}



function inserirIes($nome_ies) {
    $up = $nome_ies.toUpperCase();
    $.ajax({
        type: 'post',
        url: 'admin/Ies/inserirIes',
        data: {'nome_ies': $up},
        success: function (data) {
            alert('Cadastrado com sucesso!');
            $('#nova-instituicao').modal('hide');
        }
    });
}

function filtraSubmissoes($id_evento, $base_url) {
    $id_gt = $('#gt_filter').val();
    location.href = $base_url + "admin/relatorios/listaSubmissoes/" + $id_evento + "/" + $id_gt;
}

function enviarAvaliacao() {
    $('#avaliar-alert').show();
}

function alterarAvaliando($id_sub) {

    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Avaliacao/verificaAval',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_sub': $id_sub,
        })
    }).done(function (data) {

    });
}

function cancelAvaliando($id_sub) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Avaliacao/verificaAval',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_sub': $id_sub,
        })
    }).done(function (data) {

    });
}


function buscaCPFCertificado($id_evento, $base_url) {

    $cpf = $('#pesquisa-cpf').val();

    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Relatorios/listaInscritos/' + $id_evento,
        type: 'POST',
        dataType: 'html',
        data: ({
            'cpf': $cpf,
        })
    }).done(function (data) {

        $('body').html(data);

    });

}

function enviarLoginApi() {

    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/ApiSisEventos/monitores',
        type: 'POST',
        dataType: 'html',
        data: ({
            'cpf': $('#apiCpf').val(),
            'senha': $('#apiSenha').val(),
            'idEvento': $('#apiEvento').val()
        })
    }).done(function (data) {
        console.log(data);
    });
}

function enviarIns($id_evento) {
    $('#aguarde-evento' + $id_evento).removeClass("hidden").fadeIn();
    $('#valores-ins' + $id_evento).hide('slow');
}

function enviarComprovante($id_evento) {
    $('#aguarde-comprovante' + $id_evento).removeClass("hidden");
    $('#format-comprovante' + $id_evento).hide('slow');

}

function confirmarPresenca($id_inscricao, $presenca) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Inscricoes/confirmarPresenca',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_inscricao': $id_inscricao,
            'presenca': $presenca,
        })
    }).done(function (data) {
        console.log(data);
        $('#btn-confirmar-presenca' + $id_inscricao).html(data);
    });
}

function verificarCertificado($id_evento, $id_inscricao) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Certificado/montaCertificado',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_inscricao': $id_inscricao,
            'id_evento': $id_evento,
        })
    }).done(function (data) {
        if (data == 1) {
            $.notify({
                title: "<strong>SisEventos Informa: </strong>",
                icon: 'glyphicon glyphicon-warning-sign',
                message: "Ops! Certificado ainda não disponível"
            }, {
                type: 'danger',
                animate: {
                    enter: 'animated rollIn',
                    exit: 'animated rollOut'
                },
                placement: {
                    from: "bottom",
                    align: "right"
                },
                offset: 50,
                spacing: 10,
                z_index: 1031,
            });
        } else {
            var notify = $.notify('<strong>Gerando Certificado</strong> Não feche está página...', {
                allow_dismiss: true,
                showProgressbar: true
            });

            setTimeout(function () {
                notify.update({'type': 'success', 'message': '<strong>Sucesso</strong> Geração de certificado concluido!', 'progress': 50});
            }, 1000);
            window.location.href = "http://cev.urca.br/siseventos/admin/Certificado/certificadoParticipacao/" + $id_inscricao + "/" + $id_evento;

        }

    });

}

function liberarCertPart($id_ins_atividade, $certificado) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Certificado/liberarCertPart',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_inscricao': $id_ins_atividade,
            'certificado': $certificado,
        })

    }).done(function (data) {
        if (data == 2) {
            $.notify({
                title: "<strong>SisEventos Informa: </strong>",
                icon: 'glyphicon glyphicon-warning-sign',
                message: "Ops! Só é possivel realizar a liberação do certificado, se a presença estiver confirmada!"
            }, {
                type: 'danger',
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "bottom",
                    align: "right"
                },
                offset: 50,
                spacing: 10,
                z_index: 1031,
            });
        } else {
            $('#btn-liberar-cert' + $id_ins_atividade).html(data);
        }
    });
}


function confirmPresencaAtiv($id_insc, $presenca) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Certificado/ConfirPresencaAtiv',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_insc': $id_insc,
            'presenca': $presenca,
        })

    }).done(function (data) {
        $('#' + $id_insc).html(data);

    });
}


function liberarCertAtiv($id_insc, $certificado, $presenca) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Certificado/liberarCertAtiv',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_insc': $id_insc,
            'certificado': $certificado,
            'presenca': $presenca
        })

    }).done(function (data) {

        if (data == 2) {
            $.notify({
                title: "<strong>SisEventos Informa: </strong>",
                icon: 'glyphicon glyphicon-warning-sign',
                message: "Ops! Para liberar o certificado é nesessário confirmar a presença! "
            }, {
                type: 'danger',
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "bottom",
                    align: "right"
                },
                offset: 50,
                spacing: 10,
                z_index: 1031,
            });
        } else {
            $('#cert-ativ' + $id_insc).html(data);
        }


    });
}


function getCertificadoAtividade($id_evento, $id_tipo_atividade) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Certificado/montaCertAtiv',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_evento': $id_evento,
            'id_tipo_atividade': $id_tipo_atividade,
        })

    }).done(function (data) {

        if (data == 1) {
            $.notify({
                title: "<strong>SisEventos Informa: </strong>",
                icon: 'glyphicon glyphicon-warning-sign',
                message: "Ops! Você não participou desta atividade neste evento! "
            }, {
                type: 'danger',
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "bottom",
                    align: "right"
                },
                offset: 50,
                spacing: 10,
                z_index: 1031,
            });
        } else if (data == 2) {
            $.notify({
                title: "<strong>SisEventos Informa: </strong>",
                icon: 'glyphicon glyphicon-warning-sign',
                message: "Ops! Certificado não liberado! "
            }, {
                type: 'danger',
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "bottom",
                    align: "right"
                },
                offset: 50,
                spacing: 10,
                z_index: 1031,
            });
        } else if (data == 3) {

            var notify = $.notify('<strong>Gerando Certificado</strong> Não feche está página...', {
                allow_dismiss: true,
                showProgressbar: true
            });

            setTimeout(function () {
                notify.update({'type': 'success', 'message': '<strong>Sucesso</strong> Geração de certificado concluido!', 'progress': 50});
            }, 1000);
            window.location.href = "http://cev.urca.br/siseventos/admin/Certificado/certificadoAtividade/" + $id_evento + "/" + $id_tipo_atividade;
        } else {
            console.log(data);
            $('#atividades-inscrito' + $id_evento).html(data);
        }
    });
}

function certificadoAtivDown($id_insc, $id_tipo) {
    var notify = $.notify('<strong>Gerando Certificado</strong> Não feche está página...', {
        allow_dismiss: true,
        showProgressbar: true
    });

    setTimeout(function () {
        notify.update({'type': 'success', 'message': '<strong>Sucesso</strong> Geração de certificado concluido!', 'progress': 50});
    }, 1000);
    window.location.href = "http://cev.urca.br/siseventos/admin/Certificado/certificadoAtividade/" + $id_insc + "/" + $id_tipo;
}


function sincronizarDadosApp($id_evento) {
    var notify = $.notify('<strong>Sincronizando</strong> Não feche está página...', {
        allow_dismiss: true,
        showProgressbar: true
    });

    setTimeout(function () {
        notify.update({'type': 'success', 'message': '<strong>Sucesso</strong> Sincronização Concluida!', 'progress': 10});
        $('#btn-sincronizar').html("Já Sincronizado");
        $('#btn-sincronizar').removeClass('btn btn-success col-md-12 impress');
        $('#btn-sincronizar').addClass('btn btn-warning col-md-12 disabled');
        $('#insc-pendentes').hide('slow');
    }, 3000);


    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Certificado/inserirInsFreq',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_evento': $id_evento,
        })

    }).done(function (data) {

    });
}

function verificarCertificadoSub($id_ins, $id_evento) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Certificado/verificaCertSub',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_ins': $id_ins,
        })

    }).done(function (data) {
        $('#submissoes-evento' + $id_evento).html(data);
    });
}

function downCertSub($id_sub) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Certificado/downCertSub',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_sub': $id_sub,
        })

    }).done(function (data) {
        console.log(data);
        if (data == 1) {
            var notify = $.notify('<strong>Gerando Certificado</strong> Não feche está página...', {
                allow_dismiss: true,
                showProgressbar: true
            });

            setTimeout(function () {
                notify.update({'type': 'success', 'message': '<strong>Sucesso</strong> Geração de certificado concluido!', 'progress': 50});
            }, 1000);
            window.location.href = "http://cev.urca.br/siseventos/admin/Certificado/certificadoSub/" + $id_sub;
        } else if (data == 2) {
            $.notify({
                title: "<strong>SisEventos Informa: </strong>",
                icon: 'glyphicon glyphicon-warning-sign',
                message: "Ops! Sua submissão ainda não foi avaliada ! "
            }, {
                type: 'danger',
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "bottom",
                    align: "right"
                },
                offset: 50,
                spacing: 10,
                z_index: 1031,
            });
        } else if (data == 4) {
            $.notify({
                title: "<strong>SisEventos Informa: </strong>",
                icon: 'glyphicon glyphicon-warning-sign',
                message: "Ops! Sua submissão não foi aceita neste evento! "
            }, {
                type: 'danger',
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "bottom",
                    align: "right"
                },
                offset: 50,
                spacing: 10,
                z_index: 1031,
            });
        }

    });
}

function downCertSubNLiberado() {
    $.notify({
        title: "<strong>SisEventos Informa: </strong>",
        icon: 'glyphicon glyphicon-warning-sign',
        message: "Ops! Certificado não liberado! "
    }, {
        type: 'danger',
        animate: {
            enter: 'animated bounceIn',
            exit: 'animated bounceOut'
        },
        placement: {
            from: "bottom",
            align: "right"
        },
        offset: 50,
        spacing: 10,
        z_index: 1031,
    });
}

function liberarCertificadoSub($id, $liberado) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Certificado/liberarCertificadoSub',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id': $id,
            'liberado': $liberado,
        })

    }).done(function (data) {
        console.log(data);
        $('#sub' + $id).html(data);
    });
}

function buscarSolicitacao($id) {

    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Solicitacoes/buscar',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id': $id,
        })

    }).done(function (data) {
        $('#modal-solicitacoes').html(data);
    });

}

function deferirSolicitacao($id, $deferido) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Solicitacoes/deferir',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id': $id,
            'deferido': $deferido,
        })

    }).done(function (data) {
        if ($deferido == 's') {
            $('#btn-aval-sol-' + $id).html("<a href='#' data-toggle='modal'><button disabled class='btn btn-success'><i class='glyphicon glyphicon-ok'></i> Deferido</button></a>");
        } else if ($deferido == 'n') {
            $('#btn-aval-sol-' + $id).html("<a href='#' data-toggle='modal'><button disabled class='btn btn-danger'><i class='glyphicon glyphicon-ok'></i> Indeferido</button></a>");
        }

    });
}


function buscaCPFSol() {
    $tamanho = $('#cpfBuscaSol').val().length;
    $('#retorno').show('slow');
    if ($tamanho == 11) {

        $cpf = $('#cpfBuscaSol').val();
        $.ajax({
            url: 'http://cev.urca.br/siseventos/home/buscaCPF',
            type: 'POST',
            dataType: 'html',
            data: ({
                'cpf': $cpf,
            })

        }).done(function (data) {
            $('#retorno').show('slow');
        });


    } else {
        $('#cpfBuscaSol').keyup(function () {
            $tamanho = $('#cpfBuscaSol').val().length;
            if ($tamanho == 11) {
                $cpf = $('#cpfBuscaSol').val();

                $.ajax({
                    url: 'http://cev.urca.br/siseventos/home/buscaCPF',
                    type: 'POST',
                    dataType: 'html',
                    data: ({
                        'cpf': $cpf,
                    })

                }).done(function (data) {
                    if (data == 1) {
                        $('#retorno-erro').hide('slow');
                        $('#retorno').show('slow');
                    } else {
                        $('#retorno-erro').html(data);
                    }
                });
            }
        })

    }
}


function validarFromSolicitacao() {

    $nome = $('#nomeEventoSol').val();
    $local = $('#localEventoSol').val();
    $descricao = $('#descricaoEventoSol').val();
    $dtIni = $('#dtInicioSol').val();
    $dtFim = $('#dtFimSol').val();
    $email = $('#emailSol').val();
    $ch = $('#chSol').val();
    $periodo = $('#periodoSol').val();
    $site = $('#siteSol').val();
    $temSub = $('#temSubSol').val();
    $freqAPP = $('#preqAppSol').val();
    alert($dtIni);

    if ($nome == "" || $local == "" || $descricao == "" || $dtIni == "" || $dtFim == "" || $email == "" || $ch == "" || $periodo == "" || $site == "" || $temSub == "" || $freqAPP == "") {
        $('#retorno-form').addClass("alert alert-danger col-md-12");
        $('#retorno-form').html("Ops! Preencha todos os campos para continuar!");
        $('#retorno-form').show('slow');
        setTimeout(function () {
            $('#retorno-form').hide('slow');
        }, 3000);

    } else {
        $.ajax({
            url: 'http://cev.urca.br/siseventos/home/inserirEvento',
            type: 'POST',
            dataType: 'html',
            data: ({
                'evento': $nome,
                'local': $local,
                'descricao': $descricao,
                'dtIni': $dtIni,
                'dtFim': $dtFim,
                'email': $email,
                'ch': $ch,
                'periodo': $periodo,
                'site': $site,
                'temSub': $temSub,
                'freqAPP': $freqAPP,
            })

        }).done(function (data) {
            if (data != "") {
                $('#cadastro-evento').hide('slow');
                $('#cadastro-evento-imagens').show('slow');
                $('#id_evento').val(data);
            }
        });
    }
}

function buscarAvaliadores($id_evento, $id_gt) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Avaliacao/buscaAvaliadores',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_evento': $id_evento,
            'id_gt': $id_gt,
        })

    }).done(function (data) {
        $('#tabela-avaliadores').html(data);
    });
}

function removerAvaliador($id) {


    bootbox.confirm({
        message: "Tem certeza que deseja inscrever-se nesse evento?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-success'
            },
            cancel: {
                label: 'Não',
                className: 'btn-danger enviar'
            }
        },
        callback: function (result) {
            if (result == true) {

                $.ajax({
                    url: 'http://cev.urca.br/siseventos/admin/Avaliacao/removeAvaliador',
                    type: 'POST',
                    dataType: 'html',
                    data: ({
                        'id': $id
                    })

                }).done(function (data) {
                    $('#linha-' + $id).hide('slow');

                    $.notify({
                        title: "<strong>SisEventos Informa: </strong>",
                        icon: 'glyphicon glyphicon-warning-sign',
                        message: "Excluido com sucesso! "
                    }, {
                        type: 'success',
                        animate: {
                            enter: 'animated bounceIn',
                            exit: 'animated bounceOut'
                        },
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                        offset: 50,
                        spacing: 10,
                        z_index: 1031,
                    });

                });
            }
        }
    });

}

function buscarAvaliadorCPF() {
    $tamanho = $('#cpfBuscaAval').val().length;
    if ($tamanho == 11) {

        $cpf = $('#cpfBuscaAval').val();
        $.ajax({
            url: 'http://cev.urca.br/siseventos/Home/buscaCPF',
            type: 'POST',
            dataType: 'html',
            data: ({
                'cpf': $cpf,
            })

        }).done(function (data) {
            $('#retorno').show('slow');
        });


    } else {
        $('#cpfBuscaAval').keyup(function () {
            $tamanho = $('#cpfBuscaAval').val().length;
            if ($tamanho == 11) {
                $cpf = $('#cpfBuscaAval').val();
                $gt = $('#gt').val();
                $id_evento = $('#id_evento').val();
                $.ajax({
                    url: 'http://cev.urca.br/siseventos/admin/avaliacao/buscaCPF',
                    type: 'POST',
                    dataType: 'html',
                    data: ({
                        'cpf': $cpf,
                        'gt': $gt,
                        'id_evento': $id_evento,
                    })

                }).done(function (data) {
                    $('#resultado-busca-avaliador').html(data);
                });
            }
        })

    }
}

function addAvaliador($gt, $id_pessoa, $id_evento) {
    $('#resultado-busca-avaliador').html("Salvando, aguarde...");

    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Avaliacao/addAvaliador',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_pessoa': $id_pessoa,
            'id_gt_evento': $gt,
            'id_evento': $id_evento,
        })

    }).done(function (data) {

        buscarAvaliadores($id_evento, $gt);
        $('#cpfBuscaAval').val("");
        $('#resultado-busca-avaliador').html("");
        $.notify({
            title: "<strong>SisEventos Informa: </strong>",
            icon: 'glyphicon glyphicon-warning-sign',
            message: "Cadastrado com sucesso! "
        }, {
            type: 'success',
            animate: {
                enter: 'animated bounceIn',
                exit: 'animated bounceOut'
            },
            placement: {
                from: "bottom",
                align: "right"
            },
            offset: 50,
            spacing: 10,
            z_index: 1031,
        });

    });
}

function deletarArea($id) {

    bootbox.confirm({
        message: "Tem certeza que deseja remover está área temática?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-success'
            },
            cancel: {
                label: 'Não',
                className: 'btn-danger enviar'
            }
        },
        callback: function (result) {
            if (result == true) {

                $.ajax({
                    url: 'http://cev.urca.br/siseventos/admin/SubTrabalho/deletarArea',
                    type: 'POST',
                    dataType: 'html',
                    data: ({
                        'id': $id
                    })

                }).done(function (data) {
                    $('#area-' + $id).hide('slow');

                    $.notify({
                        title: "<strong>SisEventos Informa: </strong>",
                        icon: 'glyphicon glyphicon-warning-sign',
                        message: "Excluido com sucesso! "
                    }, {
                        type: 'success',
                        animate: {
                            enter: 'animated bounceIn',
                            exit: 'animated bounceOut'
                        },
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                        offset: 50,
                        spacing: 10,
                        z_index: 1031,
                    });

                });
            }
        }
    });


}

function buscarAtividade($id) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Atividade/buscarAtividade',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id': $id
        })

    }).done(function (data) {
        $('#editar-atividade-modal').html(data);



    });
}

function validarAtividade($id) {
    nome = $('#nome').val();
    local = $('#local').val();
    ch = $('#ch').val();
    dtIni = $('#dtIni').val();
    dtFim = $('#dtFim').val();
    hrIni = $('#hrIni').val();
    hrFim = $('#hrFim').val();
    max = $('#max').val().replace(/[^\d]+/g, '');
    email = $('#email').val();
    freqApp = $('#freqApp').val();
    ins = $('#ins').val();
    turno = $('#turno').val();
    dias = $('#dias').val();


    $('#nomeAtiv').html(nome);
    $('#dis').html(max - ins);
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Atividade/editarAtividade',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id': $id,
            'nome': nome,
            'local': local,
            'ch': ch,
            'dtIni': dtIni,
            'dtFim': dtFim,
            'hrIni': hrIni,
            'hrFim': hrFim,
            'max': max,
            'email': email,
            'dias': dias,
            'turno': turno,
            'freqApp': freqApp,
        })

    }).done(function (data) {
        if (data == 1) {
            $('#editar-atividade').modal('toggle');

            $.notify({
                title: "<strong>SisEventos Informa: </strong>",
                icon: 'glyphicon glyphicon-warning-sign',
                message: "Alterado com sucesso! "
            }, {
                type: 'success',
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "bottom",
                    align: "right"
                },
                offset: 50,
                spacing: 10,
                z_index: 1031,
            });
        }
    });
}



function salvarAtividade() {
    nome = $('#nome').val();
    local = $('#local').val();
    ch = $('#ch').val();
    dtIni = $('#dtIni').val();
    dtFim = $('#dtFim').val();
    hrIni = $('#hrIni').val();
    hrFim = $('#hrFim').val();
    max = $('#max').val();
    email = $('#email').val();
    freqApp = $('#freqApp').val();
    ins = $('#ins').val();
    turno = $('#turno').val();
    dias = $('#diasAtividade').val();
    tipo = $('#tipo').val();
    id_evento = $('#id_evento').val();

    if (nome == "" || local == "" || ch == "" || dtIni == "" || dtFim == "" || max == "" || email == "" || freqApp == "" || ins == "" || turno == "" || dias == "" || tipo == "" || id_evento == "") {
        $('#retorno-cad-atividade').addClass("alert alert-danger");
        $('#retorno-cad-atividade').html("Preencha todos os dados para continuar");
    } else {
        $.ajax({
            url: 'http://cev.urca.br/siseventos/admin/Atividade/salvarAtividade',
            type: 'POST',
            dataType: 'html',
            data: ({
                'id_evento': id_evento,
                'tipo': tipo,
                'nome': nome,
                'local': local,
                'ch': ch,
                'dtIni': dtIni,
                'dtFim': dtFim,
                'hrIni': hrIni,
                'hrFim': hrFim,
                'max': max,
                'email': email,
                'dias': dias,
                'turno': turno,
                'freqApp': freqApp,
            })

        }).done(function (data) {

            nome = $('#nome').val("");
            local = $('#local').val("");
            ch = $('#ch').val("");
            dtIni = $('#dtIni').val("");
            dtFim = $('#dtFim').val("");
            hrIni = $('#hrIni').val("");
            hrFim = $('#hrFim').val("");
            max = $('#max').val("");
            email = $('#email').val("");
            freqApp = $('#freqApp').val("");
            ins = $('#ins').val("");
            turno = $('#turno').val("");
            dias = $('#diasAtividade').val("");
            tipo = $('#tipo').val("");
            id_evento = $('#id_evento').val("");


            $.notify({
                title: "<strong>SisEventos Informa: </strong>",
                icon: 'glyphicon glyphicon-warning-sign',
                message: "Salvo com sucesso! "
            }, {
                type: 'success',
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "bottom",
                    align: "right"
                },
                offset: 50,
                spacing: 10,
                z_index: 1031,
            });

        });
    }


}

function deletarAtividade($id) {
    bootbox.confirm({
        message: "Tem certeza que deseja remover está área temática?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-success'
            },
            cancel: {
                label: 'Não',
                className: 'btn-danger enviar'
            }
        },
        callback: function (result) {
            if (result == true) {

                $.ajax({
                    url: 'http://cev.urca.br/siseventos/admin/Atividade/deletarAtividade',
                    type: 'POST',
                    dataType: 'html',
                    data: ({
                        'id': $id
                    })

                }).done(function (data) {
                    $('#linha-atividade-' + $id).hide('slow');

                    $.notify({
                        title: "<strong>SisEventos Informa: </strong>",
                        icon: 'glyphicon glyphicon-warning-sign',
                        message: "Excluido com sucesso! "
                    }, {
                        type: 'success',
                        animate: {
                            enter: 'animated bounceIn',
                            exit: 'animated bounceOut'
                        },
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                        offset: 50,
                        spacing: 10,
                        z_index: 1031,
                    });

                });
            }
        }
    });

}

function salvarValores($total) {

    for (var v = 0; v < $total; v++) {
        $valor = $('#valor-' + v).val();
        $id_categoria = $('#categoria-' + v).val();
        $id_evento = $('#id_evento').val();


        $.ajax({
            url: 'http://cev.urca.br/siseventos/admin/Evento/cadValores',
            type: 'POST',
            dataType: 'html',
            data: ({
                'total': $total,
                'valor': $valor,
                'id_categoria': $id_categoria,
                'id_evento': $id_evento,

            })

        }).done(function (data) {
            if (data == 1) {
                $('#retorno-envio-valores').html("Preencha todos os valores para continuar");
                $('#retorno-envio-valores').addClass("alert alert-danger");
                $('#retorno-envio-valores').show();

            } else {
                $('#retorno-envio-valores').html("Salvo com sucesso");
                $('#retorno-envio-valores').removeClass("alert alert-danger");
                $('#retorno-envio-valores').addClass("alert alert-success");
                $('#retorno-envio-valores').show();
                $('#btn-continuar-valores').removeClass("disabled");
                setTimeout(function () {
                    location.href = "http://cev.urca.br/siseventos/admin/relatorios/exibirRelatorio/" + $id_evento
                }, 2000);

            }
        });


    }
}

function confirmarPagamento(id, confirm, id_evento, $pagina) {

    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Inscricoes/confirmarPagamento',
        type: 'POST',
        dataType: 'html',
        data: ({

            'id': id,
            'confirm': confirm,
        })

    }).done(function (data) {
        if($pagina == ""){
            location.href = "http://cev.urca.br/siseventos/admin/relatorios/listaInscritos/" + id_evento;
        }else{
            location.href = "http://cev.urca.br/siseventos/admin/relatorios/listaInscritos/" + id_evento + "/" + $pagina;
        }
        

    });

}

function salvarApresentacao() {
    $apresentacao = CKEDITOR.instances.apresentacao.getData();
    $id_evento = $('#id_evento').val();

    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Portal/salvarApresentacao',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_evento': $id_evento,
            'apresentacao': $apresentacao,

        })

    }).done(function (data) {
        console.log(data);
        $('#retorno-apresentacao').addClass("alert alert-success");
        $('#retorno-apresentacao').html("Salvo com sucesso!");
    });
}


function salvarComissao() {
    $comissao = CKEDITOR.instances.comissao.getData();
    $id_evento = $('#id_evento').val();

    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Portal/salvarComissao',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_evento': $id_evento,
            'comissao': $comissao,

        })

    }).done(function (data) {
        $('#retorno-comissao').addClass("alert alert-success");
        $('#retorno-comissao').html("Salvo com sucesso!");
    });
}


function salvarContatos() {
    $contatos = CKEDITOR.instances.contatos.getData();
    $id_evento = $('#id_evento').val();

    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Portal/salvarContatos',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_evento': $id_evento,
            'contatos': $contatos,

        })

    }).done(function (data) {
        $('#retorno-contatos').addClass("alert alert-success");
        $('#retorno-contatos').html("Salvo com sucesso!");
    });
}


function adicionarDia() {
    $('#cadastro-programacao').show('slow');
    $('#tabela-programacao').hide('slow');
}

function salvarProgramacao() {
    $data = $('#dataProgramacao').val();

    if ($data != "") {
        $manha = CKEDITOR.instances.manha.getData();
        $tarde = CKEDITOR.instances.tarde.getData();
        $noite = CKEDITOR.instances.noite.getData();
        $id_evento = $('#id_evento').val();
        $.ajax({
            url: 'http://cev.urca.br/siseventos/admin/Portal/salvarProgramacao',
            type: 'POST',
            dataType: 'html',
            data: ({
                'id_evento': $id_evento,
                'manha': $manha,
                'tarde': $tarde,
                'noite': $noite,
                'data': $data,

            })

        }).done(function (data) {
            CKEDITOR.instances.manha.setData("");
            CKEDITOR.instances.tarde.setData("");
            CKEDITOR.instances.noite.setData("");
            $('#tabela-programacao').show('slow');
            $('#cadastro-programacao').hide('slow');
            location.href = "http://cev.urca.br/siseventos/admin/relatorios/exibirRelatorio/" + $id_evento;

        });
    } else {
        $('#retorno-data-programacao').show('slow');
    }

}


function editarProgramacao($id) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Portal/editarProgramacao',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id': $id,

        })

    }).done(function (data) {

        $('#cadastro-programacao').show();
        $('#cadastro-programacao').html(data);

    });
}

function salvarEdicaoProgramacao() {
    $data = $('#dataProgramacao').val();
    $id_programacao = $('#id_programacao').val();
    $manha = CKEDITOR.instances.manha.getData();
    $tarde = CKEDITOR.instances.tarde.getData();
    $noite = CKEDITOR.instances.noite.getData();
    $id_evento = $('#id_evento').val();
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Portal/salvarEdicaoProgramacao',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_evento': $id_evento,
            'manha': $manha,
            'tarde': $tarde,
            'noite': $noite,
            'data': $data,
            'id_programacao': $id_programacao,

        })

    }).done(function (data) {

    });
}

function salvarSigla() {
    $id_evento = $('#id_evento').val();
    $sigla = $('#sigla-cadastro').val();
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Portal/salvarSigla',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_evento': $id_evento,
            'sigla': $sigla,

        })

    }).done(function (data) {
        $('#retorno-sigla').addClass("alert alert-success");
        $('#retorno-sigla').html("Sucesso");

    });
}


function salvarCronograma() {
    $id_evento = $('#id_evento').val();
    $cronograma = CKEDITOR.instances.cronograma.getData();
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Portal/salvarCronograma',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_evento': $id_evento,
            'cronograma': $cronograma,

        })

    }).done(function (data) {
        $('#retorno-cronograma').addClass("alert alert-success");
        $('#retorno-cronograma').html("Sucesso");

    });
}

function ativarEvento($id_evento, $isAtivo) {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/admin/Evento/ativarEvento',
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_evento': $id_evento,
            'isAtivo': $isAtivo,
        })

    }).done(function (data) {
        window.location = "http://cev.urca.br/siseventos/admin/relatorios/exibirRelatorio/" + $id_evento
    });
}