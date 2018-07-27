(function ($) {
    "use strict";


    jQuery(document).ready(function ($) {


        $('#btn-enviar-solicitacao').click(function () {
            enviarSolicitacao();
        });

        $("#telefoneSolicitacao").inputmask({
            mask: ["(99) 99999 - 9999", ],
            keepStatic: true
        });
     


        $('#btn-logar').click(function () {

            var email = $('#login_username').val();
            var senha = $('#login_password').val();


            $.ajax({
                url: 'http://cev.urca.br/siseventos/login/logarPopUp',
                type: 'POST',
                dataType: 'html',
                data: ({
                    'email': email,
                    'senha': senha
                })

            }).done(function (data) {
                console.log(data);
                if (data == 1) {
                    $('#div-login-msg').removeClass('hidden');
                    $('#div-login-msg').addClass('error');
                    $('#icon-login-msg').removeClass('glyphicon glyphicon-chevron-right');
                    $('#icon-login-msg').addClass('glyphicon glyphicon-remove');
                    $('#icon-login-msg').addClass('error');
                    $('#text-login-msg').html('Email ou Senha incorretos');

                    setTimeout(function () {
                        $('#div-login-msg').hide('slow');
                        $('#icon-login-msg').removeClass('glyphicon glyphicon-remove');
                        $('#icon-login-msg').removeClass('error');
                        $('#div-login-msg').removeClass('error');


                    }, 2000);

                } else if (data == 2) {
                    location.href = "http://cev.urca.br/siseventos/admin/Inscricoes";
                }

            });
        });


        $('#btn-enviar').click(function () {
            $('#btn-enviar').html('Enviando...');
            var nome = $('#name').val();
            var email = $('#email').val();
            var assunto = $('#subject').val();
            var msg = $('#msg').val();


            $.ajax({
                url: 'http://cev.urca.br/siseventos/home/contato',
                type: 'POST',
                dataType: 'html',
                data: ({
                    'nome': nome,
                    'email': email,
                    'assunto': assunto,
                    'msg': msg
                })

            }).done(function (data) {
                $('#btn-enviar').html('Enviado');
                $('#name').val('');
                $('#email').val('');
                $('#subject').val('');
                $('#msg').val('');
            });

        });


        /*---------------------------------------------*
         * Carousel
         ---------------------------------------------*/
        $('#Carousel').carousel({
            interval: 5000,
            item: 2
        })
        /*------------------------*/
        $('#carousel-example-generic').find('.item').first().addClass('active');

        totalInscritos();
        totalCertificados();
        totalEventos();
        totalSub();
    });

    /*---------------------------------------------*
     * STICKY scroll
     ---------------------------------------------*/

    $.localScroll();

    /**************************/


    jQuery(window).load(function () {


    });



}(jQuery));

function totalInscritos() {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/home/totalCadastrados',
        type: 'POST',
        dataType: 'html',
        data: ({

        })

    }).done(function (data) {

        $('.counter-cadastrados').html(data);
    });
}


function totalCertificados() {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/home/totalCertificados',
        type: 'POST',
        dataType: 'html',
        data: ({

        })

    }).done(function (data) {
        $('.counter-certificados').html(data);
    });
}

function totalEventos() {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/home/totalEventos',
        type: 'POST',
        dataType: 'html',
        data: ({

        })

    }).done(function (data) {
        $('.counter-eventos').html(data);
    });
}

function totalSub() {
    $.ajax({
        url: 'http://cev.urca.br/siseventos/home/totalSub',
        type: 'POST',
        dataType: 'html',
        data: ({

        })

    }).done(function (data) {
        $('.counter-sub').html(data);
    });
}

function enviarSolicitacao() {

    if ($('#nomeSolicitacao').val() == "" || $('#eventoSolicitacao').val() == "" || $('#justificativaSolicitacao').val() == "" || $('#emailSolicitacao').val() == "" || $('#telefoneSolicitacao').val() == "") {
        $('#resposta-envio').addClass('alert alert-danger');
        $('#resposta-envio').html('Preencha todos os campos abaixo!');
    } else {
        $.ajax({
            url: 'http://cev.urca.br/siseventos/admin/Solicitacoes/solicitacaoEvento',
            type: 'POST',
            dataType: 'html',
            data: ({
                'nome': $('#nomeSolicitacao').val(),
                'evento': $('#eventoSolicitacao').val(),
                'justificativa': $('#justificativaSolicitacao').val(),
                'email': $('#emailSolicitacao').val(),
                'telefone': $('#telefoneSolicitacao').val()
            })
        }).done(function (data) {
            $('#resposta-envio').removeClass('alert alert-danger');
            $('#resposta-envio').addClass('alert alert-success');
            $('#resposta-envio').html('Enviado com sucesso, em breve lhe daremos um retorno de sua solicitação!');
        });
    }

}