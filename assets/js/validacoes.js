$base_url = "http://localhost/siscertificados/";

$(document).ready(function () {

    $("#celularPessoa").inputmask({
        mask: ["(99)99999-9999", ],
        keepStatic: true
    });

    $("#cpfPessoa").inputmask({
        mask: ["999-999-999-99", ],
        keepStatic: true
    });



    $(".modal-wide").on("show.bs.modal", function () {
        var height = $(window).height() - 200;
        $(this).find(".modal-body").css("max-height", height);
    });

    $('#buscaNome').keypress(function () {
        $tamanho = $('#buscaNome').val().length;
        $nome = $('#buscaNome').val();
        $id_atividade = $('#id_atividade').val();

        if ($tamanho >= 2) {

            $.ajax({
                url: $base_url + "admin/Atividade/buscarNome",
                type: 'POST',
                dataType: 'html',
                data: ({
                    'nome': $nome,
                    'id_atividade': $id_atividade,
                })

            }).done(function (data) {

                $('#retorno-lista-inscritos').html(data);
            });
        } else {
            listaInscritos($id_atividade);
        }
    })

//BUSCA PARA CERTIFICADO
    $('#buscaNomeCertificado').keypress(function () {
        $tamanho = $('#buscaNomeCertificado').val().length;
        $nome = $('#buscaNomeCertificado').val();

        if ($tamanho >= 2) {

            $.ajax({
                url: $base_url + "admin/Certificado/buscarNomeCertificado",
                type: 'POST',
                dataType: 'html',
                data: ({
                    'nome': $nome,
                })

            }).done(function (data) {
                console.log(data);
                $('#retorno-busca-pessoa-certificado').html(data);
            });
        }
    })

});


function buscarAtividade($id) {

    $.ajax({
        url: $base_url + "admin/Atividade/gerenciar",
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_atividade': $id,
        })

    }).done(function (data) {
        $('#retorno-editar-atividade').html(data);
    });
}

function salvarEditarAtividade() {
    $atividade = $('#atividade').val();
    $id_atividade = $('#id_atividade').val();
    $tipo_atividade = $('#tipo_atividade').val();
    $dataInicio = $('#data-inicio').val();
    $dataFim = $('#data-fim').val();
    $responsavel = $('#responsavel').val();

    $.ajax({
        url: $base_url + "admin/Atividade/editar",
        type: 'POST',
        dataType: 'html',
        data: ({
            'id_atividade': $id_atividade,
            'atividade': $atividade,
            'id_tipo_atividade': $tipo_atividade,
            'dataInicio': $dataInicio,
            'dataFim': $dataFim,
            'responsavel': $responsavel,
        })

    }).done(function (data) {
        $('#retorno-edicao').show('slow');
        $('#retorno-edicao').html('Informações alteradas com sucesso!')
        $('#retorno-edicao').addClass("alert alert-success col-md-12");
        setTimeout(function () {
            $('#editar-atividade').modal('hide');
            $('#retorno-edicao').hide('slow');
        }, 1000);

    });

}


function salvarAtividade() {
    $atividade = $('#nome-atividade-salvar').val();
    $tipo_atividade = $('#tipo_atividade-salvar').val();
    $dataInicio = $('#data-inicio-salvar').val();
    $dataFim = $('#data-fim-salvar').val();
    $responsavel = $('#responsavel-salvar').val();

    $.ajax({
        url: $base_url + "admin/Atividade/salvar",
        type: 'POST',
        dataType: 'html',
        data: ({
            'atividade': $atividade,
            'id_tipo_atividade': $tipo_atividade,
            'dataInicio': $dataInicio,
            'dataFim': $dataFim,
            'responsavel': $responsavel,
        })

    }).done(function (data) {
        bootbox.alert("Salvo com sucesso!");
        setTimeout(function () {
            $('#add-atividade').modal('hide');
            location.href = $base_url + "admin/Atividade";
        }, 2000);
    });

}



function deletarAtividade($id) {
    bootbox.confirm({
        message: "Tem certeza que deseja deletar esta atividade?",
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
                    url: $base_url + "admin/Atividade/deletar",
                    type: 'POST',
                    dataType: 'html',
                    data: ({
                        'id': $id
                    })

                }).done(function (data) {
                    $('#linha-atividade-' + $id).hide('slow');

                    $.notify({
                        title: "<strong>SisCertificados Informa: </strong>",
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

function listaInscritos($id) {
    $.ajax({
        url: $base_url + "admin/Atividade/listaInscritos",
        type: 'POST',
        dataType: 'html',
        data: ({
            'id': $id,
        })

    }).done(function (data) {
        $('#retorno-lista-inscritos').html(data);
    });
}

function liberarCert($id, $liberado) {
    $id_atividade = $('#id_atividade').val();
    $.ajax({
        url: $base_url + "admin/Atividade/liberarCertificado",
        type: 'POST',
        dataType: 'html',
        data: ({
            'id': $id,
            'liberado': $liberado,
        })

    }).done(function (data) {
        listaInscritos($id_atividade);
    });
}

function buscarTipoAtividade($id) {
    $.ajax({
        url: $base_url + "admin/Atividade/buscarTipoAtividade",
        type: 'POST',
        dataType: 'html',
        data: ({
            'id': $id,
        })

    }).done(function (data) {
        $('#retorno-tipo-atividade').html(data);
    });
}

function salvarTipoAtividade() {
    $nome_tipo_atividade = $('#nome-tipo-atividade-salvar').val();

    $.ajax({
        url: $base_url + "admin/Atividade/salvarTipoAtividade",
        type: 'POST',
        dataType: 'html',
        data: ({
            'nome': $nome_tipo_atividade,
        })

    }).done(function (data) {
        bootbox.alert("Salvo com sucesso!");
        setTimeout(function () {
            $('#add-tipo-atividade').modal('hide');
            location.href = $base_url + "admin/Inicio";
        }, 2000);
    });

}

function salvarTipoAtividadeEditar() {
    $nome_tipo_atividade = $('#nome-tipo-atividade-editar').val();
    $id_tipo_atividade = $('#id_tipo_atividade').val();
    $.ajax({
        url: $base_url + "admin/Atividade/salvarEdicaoTipoAtividade",
        type: 'POST',
        dataType: 'html',
        data: ({
            'nome': $nome_tipo_atividade,
            'id': $id_tipo_atividade,
        })

    }).done(function (data) {
        bootbox.alert("Salvo com sucesso!");
        setTimeout(function () {
            $('#add-tipo-atividade').modal('hide');
            location.href = $base_url + "admin/Inicio";
        }, 2000);
    });
}

function deletarTipoAtividade($id) {

    bootbox.confirm({
        message: "Tem certeza que deseja deletar esta atividade?",
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
                    url: $base_url + "admin/Atividade/deletarTipoAtividade",
                    type: 'POST',
                    dataType: 'html',
                    data: ({
                        'id': $id,
                    })

                }).done(function (data) {
                    $('#tipo-atividade-' + $id).hide('slow');
                });

            }
        }
    });
}


function deletarPapel($id) {

    bootbox.confirm({
        message: "Tem certeza que deseja deletar esta atividade?",
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
                    url: $base_url + "admin/Atividade/deletarPapel",
                    type: 'POST',
                    dataType: 'html',
                    data: ({
                        'id': $id,
                    })

                }).done(function (data) {
                    $('#papel-' + $id).hide('slow');
                });

            }
        }
    });
}

function buscarPapel($id) {
    $.ajax({
        url: $base_url + "admin/Atividade/buscarPapel",
        type: 'POST',
        dataType: 'html',
        data: ({
            'id': $id,
        })

    }).done(function (data) {
        $('#retorno-papel').html(data);
    });
}


function salvarPapelEditar() {
    $papel = $('#nome-papel-editar').val();
    $id_papel = $('#id_papel').val();
    alert($id_papel);
    $.ajax({
        url: $base_url + "admin/Atividade/salvarEdicaoPapel",
        type: 'POST',
        dataType: 'html',
        data: ({
            'nome': $papel,
            'id': $id_papel,
        })

    }).done(function (data) {
        bootbox.alert("Salvo com sucesso!");
        setTimeout(function () {
            $('#add-tipo-atividade').modal('hide');
            location.href = $base_url + "admin/Inicio";
        }, 2000);
    });
}


function salvarFuncao() {
    $funcao = $('#nome-funcao-salvar').val();

    $.ajax({
        url: $base_url + "admin/Atividade/salvarFuncao",
        type: 'POST',
        dataType: 'html',
        data: ({
            'nome': $funcao,
        })

    }).done(function (data) {
        bootbox.alert("Salvo com sucesso!");
        setTimeout(function () {
            $('#add-funcao').modal('hide');
            location.href = $base_url + "admin/Inicio";
        }, 2000);
    });

}


function salvarPessoa() {
    $nome = $('#nomePessoa').val();
    $email = $('#emailPessoa').val();
    $cpf = $('#cpfPessoa').val();
    $celular = $('#celularPessoa').val();


    if ($nome == "" || $email == "" || $cpf == "" || $celular == "") {
        $('#erro-mensagem').html("Preencha todos os dados para continuar!");
        $('#erro-mensagem').addClass("alert alert-danger");
    } else {
        $.ajax({
            url: $base_url + "admin/Pessoa/salvarPessoa",
            type: 'POST',
            dataType: 'html',
            data: ({
                'nome': $nome,
                'email': $email,
                'cpf': $cpf,
                'celular': $celular,
            })

        }).done(function (data) {
            if (data == 2) {
                bootbox.alert("O Usuário já está cadastrado no sistema!");
                $('#modal-cadastrar-pessoa').modal('hide');
                $('#buscaNomeCertificado').val($nome);
                buscarPessoa($nome);
            } else {
                console.log(data);
                bootbox.alert("Salvo com sucesso!");


                $('#modal-cadastrar-pessoa').modal('hide');
                $('#buscaNomeCertificado').val($nome);
                buscarPessoa($nome);
            }


        });

    }
}

function buscarPessoa($nome) {
    $.ajax({
        url: $base_url + "admin/Certificado/buscarNomeCertificado",
        type: 'POST',
        dataType: 'html',
        data: ({
            'nome': $nome,
        })

    }).done(function (data) {
        console.log(data);
        $('#retorno-busca-pessoa-certificado').html(data);
    });
}

function deletarUsuarioAtividade($id) {
    bootbox.confirm({
        message: "Tem certeza que deseja deletar este participanete?",
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
                    url: $base_url + "admin/Atividade/deletarParticipanteAtividade",
                    type: 'POST',
                    dataType: 'html',
                    data: ({
                        'id': $id,
                    })

                }).done(function (data) {
                    $('#ins-atividade' + $id).hide('slow');
                });

            }
        }
    });
}

function atribuirId_atividade($id) {
    $('#id_atividade').val($id);
}

function salvarPessoaAtividade() {
    $id_atividade = $('#id_atividade').val();
    $nome = $('#nomePessoa').val();
    $email = $('#emailPessoa').val();
    $cpf = $('#cpfPessoa').val();
    $celular = $('#celularPessoa').val();


    if ($nome == "" || $email == "" || $cpf == "" || $celular == "") {
        $('#erro-mensagem').html("Preencha todos os dados para continuar!");
        $('#erro-mensagem').addClass("alert alert-danger");
    } else {
        $.ajax({
            url: $base_url + "admin/Pessoa/salvarPessoa",
            type: 'POST',
            dataType: 'html',
            data: ({
                'nome': $nome,
                'email': $email,
                'cpf': $cpf,
                'celular': $celular,
                'id_atividade': $id_atividade,
            })

        }).done(function (data) {
            bootbox.alert("O Usuário já está cadastrado no sistema!");
        });

    }

}