/** *******************************************************************************************************************
 * Function for to use on app and Plugins from thirdparty
 */

/**
 * Nova lamina de impresso
 */
function MakeNovaLamina(sessionId) {
    $.getScript('/plugins/bootbox/bootbox.min.js', function(){
        $.getScript('/plugins/select2/select2.min.js')
    }).done(function(script){
        var fieldData = '';

        bootbox.setDefaults({
            locale  : 'br',
            size    : 'large',
        });

        var modal = bootbox.dialog({
            buttons : {
                default : {
                    label: 'Cancela'
                },
                success : {
                    label: 'Ok',
                    callback : function() {
                        var confirma = confirm('Confirma nova lâmina?');
                        if(confirma) {
                            var formData = $('#form-nova-lamina').serialize();
                            var lamina = salvaLamina(formData);
                            return false;
                        } else {
                            return false;
                        }

                    }
                }
            },
            title : 'Lamina: ' + sessionId,
            message : modal_body

        }).init(function(){
            getSelectOptions('/tintas/dropdown-data', 'lamina-tinta-frente');
            getSelectOptions('/tintas/dropdown-data', 'lamina-tinta-verso');
            getSelectOptions('/papeis/dropdown-data', 'lamina-papel');
            getSelectOptions('/acabamentos/dropdown-data', 'lamina-acabamentos');

            $('.select2').select2();
        });

        function salvaLamina(formData)
        {
            $.ajax('/laminas/salva-lamina-temp/' + sessionId, {
                headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'put',
                data: formData
            })
                .done(function(result){

                    if(result.success) {
                        var lamina = result.lamina;
                        var tr = '<tr><td>' + lamina['lamina-nome'] +'</td></tr>'

                        $(tr).appendTo('#table-laminas tbody');
                    }

                }).fail(function(jqXHR, textStatus){
                    $('#form-nova-lamina').find('.error-field').html('');
                    var erros = jqXHR.responseJSON;
                    $.each(erros, function(key, value){
                        value = value[0].replace('-', ' ').replace('lamina', '');
                        $('input[name="' +key+'"').parent().find('.error-field').html(value);
                        $('select[name="' +key+'[]"').parent().find('.error-field').html(value);
                    })
                });
        }

        /**
         * Popula campos dropdown select
         * @param url URL do controller
         * @param field Nome do campos
         */
        function getSelectOptions(url, field)
        {
            $.get(url).done(function(result){
                if(result.success) {
                    $.each(result.data, function(id, value){
                        var option = '<option value="' + id + '">'+ value +'</option>'
                        $(option).appendTo($('select[name="' + field +'[]"]'));
                    })
                }
            });
        }

        function modal_body (){
            return '<div class="row">' +
            '<div class="col-md-12 clearfix"> ' +
                //    Inicio form
            '<form class="form-horizontal" id="form-nova-lamina">'+
            '<div class="form-group">'+
            '<label class=" col-md-2 control-label">Nome:</label>' +
            '<div class="col-md-6"> ' +
            '<input class="form-control" name="lamina-nome"> <span class="text-danger small error-field"></span>' +
            '</div>' +
            '<label class=" col-md-2 control-label">Nº pgs.:</label>' +
            '<div class="col-md-2">'+
            '<input class="form-control" name="lamina-paginas"><span class="text-danger small error-field"></span> ' +
            '</div>'+
            '</div>'+

            '<div class="form-group">'+
            '<label class=" col-md-2 control-label">Form. aberto:</label>' +
            '<div class="col-md-4">' +
            '<input class="form-control" name="lamina-formato-aberto"> <span class="text-danger small error-field"></span>' +
            '</div>' +
            '<label class=" col-md-2 control-label">Form. fechado:</label>' +
            '<div class="col-md-4">' +
            '<input class="form-control" name="lamina-formato-fechado"> <span class="text-danger small error-field"></span>' +
            '</div>'+
            '</div>'+

            '<div class="form-group">' +
            '<label class=" col-md-2 control-label">Papel:</label>' +
            '<div class="col-md-6">'+
            '<select name="lamina-papel[]" id="lamina-papel" multiple class="select2 form-control"></select> <span class="text-danger small error-field"></span>'+
            '</div>'+
            '</div>'+

            '<div class="form-group">' +
            '<label class=" col-md-2 control-label">Cor frente:</label>' +
            '<div class="col-md-4">'+
            '<select name="lamina-tinta-frente[]" id="lamina-tinta-frente" multiple class="select2 form-control"></select> <span class="text-danger small error-field"></span>'+
            '</div>' +
            '<label class=" col-md-2 control-label">Cor verso:</label>' +
            '<div class="col-md-4">'+
            '<select name="lamina-tinta-verso[]" id="lamina-tinta-verso" multiple class="form-control select2"></select> <span class="text-danger small error-field"></span>'+
            '</div>'+
            '</div>'+

            '<div class="form-group">' +
            '<label class=" col-md-2 control-label">Acabamentos:</label>' +
            '<div class="col-md-10">'+
            '<select name="lamina-acabamentos[]" id="lamina-acabamentos" multiple class="select2 form-control"></select> <span class="text-danger small error-field"></span>'+
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label class="col-md-2 control-label">Observações:</label>' +
            '<div class="col-md-10">'+
            '<textarea class="form-control" rows="2" name="lamina-obs"></textarea>' +
            '</div>'+
            '</div>'+
            '</form>'+

                //    Fim form
            '</div> ' +
            '</div> '
        }

    });
}


/** *******************************************************************************************************************
 * Troca senha de usuário
 */
function MakeTrocaSenhaModal(userId, token_id)
{
    $.getScript('/plugins/bootbox/bootbox.min.js').done(function(script){
        var fieldData = '';
        bootbox.setDefaults({
            locale  : 'br',
            size : 'small',
            buttons: {
                success : {
                    label : 'Cancela',
                    className : 'btn-default'
                },
                primary : {
                    label : 'OK',
                    className: 'btn-primary',
                    callback : function() {
                        var senha_atual = $('input[name="senha-atual"]').val();
                        var nova_senha = $('input[name="nova-senha"]').val();
                        var confirma_senha = $('input[name="confirma-nova-senha"]').val();

                        if(senha_atual === '' || nova_senha === '' || confirma_senha === '') {
                            alert('Todos os campos devem ser preenchidos!');
                            return false;
                        }

                        if(senha_atual === nova_senha) {
                            alert('A senha atual e nova senha não podem ser mesma!');
                            return false;
                        }

                        if(nova_senha != confirma_senha) {
                            alert('Nova senha e confirma nova senha devem ser identicas!');
                            return false;
                        }

                        var formData = {
                            'senha_atual' : senha_atual,
                            'nova_senha' : nova_senha
                        }

                        $.ajaxSetup({
                            headers : {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax('/usuarios/altera-senha/' + userId, {
                            method : 'put',
                            data : formData
                        }).done(function(result) {
                            if(result.success) {
                                alert(result.mensagem);
                                window.location.assign('/auth/logout');
                            }
                            if(result.fail) {
                                alert(result.mensagem);
                            }
                        })

                    }
                }
            }
        });

        var modal = bootbox.dialog({
            title : 'Troca senha',
            message :
            '<div class="row">  ' +
                '<div class="col-md-12"> ' +
                    '<form class="form-horizontal" id="form-troca-senha"> ' +
                        '<div class="form-group"> ' +
                            '<div class="col-md-12"> ' +
                                '<input name="senha-atual" type="text" placeholder="Senha atual" class="form-control" required> ' +
                            '</div> ' +
                        '</div> ' +
                        '<div class="form-group"> ' +
                            '<div class="col-md-12"> ' +
                                '<input name="nova-senha" type="text" placeholder="Nova senha" class="form-control" required> ' +
                            '</div> ' +
                        '</div> ' +
                        '<div class="form-group"> ' +
                            '<div class="col-md-12"> ' +
                                '<input name="confirma-nova-senha" type="text" placeholder="Confirma nova senha" class="form-control" required> ' +
                            '</div> ' +
                        '</div> ' +
                    '</form> ' +
                '</div>' +
            '</div> '
        });
    });
}


/** *******************************************************************************************************************
 * Busca endereco
 */
function MakeSearchClienteModal() {

    $.getScript('/plugins/bootbox/bootbox.min.js').done(function(script){
        var fieldData = '';
        bootbox.setDefaults({
            locale  : 'br',
            size    : 'large'
        });

        var modal = bootbox.dialog({
            title : 'Busca cliente',
            message : '<div class="row">  ' +
            '<div class="col-md-12"> ' +
            '<form class="form-horizontal"> ' +
            '<div class="form-group"> ' +
            '<div class="col-md-12"> ' +
            '<div class="input-group"> ' +
            '<input id="cliente-pesquisa" name="cliente-pesquisa" type="text" placeholder="Digite nome ou cnpj" class="form-control"> ' +
            '<div class="input-group-btn"> ' +
            '<button type="button" id="btn-pesquisar" class="btn btn-default btn-pesquisar" ><i class="fa fa-search-plus"></i> Pesquisar</button> ' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '</form> ' +
            '</div>  </div> ' +
            '<div class="row">' +
            '<div class="col-md-12" id="resultados">' +
            '<table class="table table-striped hover" id="tabela-pesquisa-cliente"> ' +
            '<thead><tr><th>ID</th><th>Razão social</th><th>Nome Fantasia</th><th>CNPJ</th></tr></thead> ' +
            '</table> ' +
            ' </div> ' +
            '</div> '
        });

        var oTable = MakeDataTable('#tabela-pesquisa-cliente', {
            aoColumns : [
                {'mData' : 'id'},
                {'mData' : 'razao_social'},
                {'mData' : 'nome_fantasia'},
                {'mData' : 'cnpj_cpf'},
            ]
        });

        $('input[name="cliente-pesquisa"]').focus();

        $('.btn-pesquisar').click(function(e){
            var pesquisa =  $('#cliente-pesquisa').val();
            if(pesquisa === '' || pesquisa === null) {
                bootbox.alert({
                    size    : 'small',
                    message : 'O campo de pesquisa não pode estar em branco',
                    callback : function(){
                        $('input[name="cliente-pesquisa"]').focus();
                    }
                });
                return;
            }
            var pesquisando = $.get('/clientes/pesquisa-cliente/'+pesquisa);
            pesquisando.done(function(result){
                if(result.fail) {
                    bootbox.alert({
                        size    : 'small',
                        message : result.message
                    });
                } else if(result.success) {
                    $('#tabela-pesquisa-cliente').dataTable().fnDestroy();
                    var oTable = MakeDataTable('#tabela-pesquisa-cliente', {
                        data      : result.data,
                        aoColumns : [
                            {'mData' : 'id'},
                            {'mData' : 'razao_social'},
                            {'mData' : 'nome_fantasia'},
                            {'mData' : 'cnpj_cpf'},
                        ],
                        fnInitComplete : function() {
                            $(this).delegate('tbody tr', 'click', function(){
                                var table = $('#tabela-pesquisa-cliente').dataTable();
                                fieldData = table.fnGetData(this);

                                bootbox.dialog({
                                    size    : 'small',
                                    title   : 'Confirma escolha',
                                    message : 'Deseja selecionar este cliente?',
                                    buttons : {
                                        default : {
                                            label : 'Cancela'
                                        },
                                        primary : {
                                            label : 'Ok',
                                            callback : function() {

                                                var cliente = fieldData.id + ' - ' + fieldData.nome_fantasia + ' - ' + fieldData.cnpj_cpf;

                                                $('input[name="cliente"]').val(cliente);
                                                $('input[name="cliente_id"]').val(fieldData.id);

                                                modal.modal('hide');
                                            }
                                        }
                                    }
                                })
                            })
                        }
                    });
                    $('#cliente-pesquisa').val('');
                }
            });

        });
    });
}

/**
 * Busca Select2
 */
function MakeSelect2Field(field) {
    $.getScript('/plugins/select2/select2.min.js').done(function(script){
        $(field).select2();
    })
}


/**
 * Busca endereco
 */
function MakeSearchAddressModal() {

    $.getScript('/plugins/bootbox/bootbox.min.js').done(function(script){
        var fieldData = '';
        bootbox.setDefaults({
            locale  : 'br',
            size    : 'large'
        });

        var modal = bootbox.dialog({
            title : 'Busca endereço',
            message : '<div class="row">  ' +
            '<div class="col-md-12"> ' +
                '<form class="form-horizontal"> ' +
                    '<div class="form-group"> ' +
                        '<div class="col-md-12"> ' +
                            '<div class="input-group"> ' +
                                '<input id="endereco-pesquisa" name="endereco" type="text" placeholder="Digite o logradouro ou o cep" class="form-control"> ' +
                                '<div class="input-group-btn"> ' +
                                    '<button type="button" id="btn-pesquisar" class="btn btn-default btn-pesquisar" ><i class="fa fa-search-plus"></i> Pesquisar</button> ' +
                                '</div> ' +
                            '</div> ' +
                        '</div> ' +
                    '</div> ' +
                '</form> ' +
            '</div>  </div> ' +
            '<div class="row">' +
                '<div class="col-md-12" id="resultados">' +
                    '<table class="table table-striped hover" id="tabela-pesquisa-endereco"> ' +
                    '<thead><tr><th>Logradouro</th><th>Bairro</th><th>Cep</th><th>Cidade</th></tr></thead> ' +
                    '</table> ' +
                ' </div> ' +
            '</div> '
        });

        var oTable = MakeDataTable('#tabela-pesquisa-endereco', {
            aoColumns : [
                {'mData' : 'logradouro'},
                {'mData' : 'bairro'},
                {'mData' : 'cep'},
                {'mData' : 'cidade'},
            ]
        });

        $('input[name="endereco"]').focus();

        $('.btn-pesquisar').click(function(e){
            var pesquisa =  $('#endereco-pesquisa').val();
            if(pesquisa === '' || pesquisa === null) {
                bootbox.alert({
                    size    : 'small',
                    message : 'O campo de pesquisa não pode estar em branco',
                    callback : function(){
                        $('input[name="endereco"]').focus();
                    }
                });
                return;
            }
            var pesquisando = $.get('/enderecos/pesquisa/'+pesquisa);
            pesquisando.done(function(result){
                if(result.fail) {
                    bootbox.alert({
                        size    : 'small',
                        message : result.message
                    });
                } else if(result.success) {
                    $('#tabela-pesquisa-endereco').dataTable().fnDestroy();
                    var oTable = MakeDataTable('#tabela-pesquisa-endereco', {
                        data      : result.data,
                        aoColumns : [
                            {'mData' : 'logradouro'},
                            {'mData' : 'bairro'},
                            {'mData' : 'cep'},
                            {'mData' : 'cidade'},
                        ],
                        fnInitComplete : function() {
                            $(this).delegate('tbody tr', 'click', function(){
                                var table = $('#tabela-pesquisa-endereco').dataTable();
                                fieldData = table.fnGetData(this);

                                bootbox.dialog({
                                    size    : 'small',
                                    title   : 'Confirma escolha',
                                    message : 'Deseja selecionar este endereço?',
                                    buttons : {
                                        default : {
                                            label : 'Cancela'
                                        },
                                        primary : {
                                            label : 'Ok',
                                            callback : function() {
                                                $('input[name="logradouro"]').val(fieldData.logradouro);
                                                $('input[name="bairro"]').val(fieldData.bairro);
                                                $('input[name="cidade"]').val(fieldData.cidade);
                                                $('input[name="uf"]').val(fieldData.uf);
                                                $('input[name="cep"]').val(fieldData.cep);

                                                modal.modal('hide');
                                                $('input[name="numero"]').focus();
                                            }
                                        }
                                    }
                                })
                            })
                        }
                    });
                    $('#endereco-pesquisa').val('');
                }
            });

        });
    });

}

/**
 * Novo contato
 */
function MakeNovoContatoModal(ownerClass, ownerId)
{
    $.getScript('/plugins/bootbox/bootbox.min.js').done(function(script){
        var fieldData = '';
        bootbox.setDefaults({
            locale  : 'br',
            buttons: {
                success : {
                    label : 'Cancela',
                    className : 'btn-default'
                },
                primary : {
                    label : 'OK',
                    className: 'btn-primary',
                    callback : function() {

                        if(!$('#form-novo-contato')[0].checkValidity()) {
                            alert('Alguns campos obrigatórios não foram preenchidos');
                            return false;
                        }

                        var formData = $('#form-novo-contato').serialize();

                        $.ajaxSetup({
                            headers : {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax('/contatos/novo-contato/' + ownerClass + '/' + ownerId, {
                            method : 'put',
                            data : formData
                        }).done(function(result) {
                            if(result.success) {
                                alert(result.mensagem);
                            }
                            if(result.fail) {
                                alert(result.mensagem);
                            }
                        })

                    }
                }
            }
        });

        var modal = bootbox.dialog({
            title : 'Novo contato',
            message :
            '<div class="row">  ' +
            '<div class="col-md-12"> ' +
            '<form class="form-horizontal" id="form-novo-contato"> ' +
            '<div class="form-group"> ' +
                '<label class="col-md-2">*Nome:</label>' +
                '<div class="col-md-10">' +
                '<input type="text" class="form-control" name="nome" required>' +
                '</div>' +
            '</div>' +
            '<div class="form-group"> ' +
                '<label class="col-md-2">Sobrenome:</label>' +
                '<div class="col-md-10">' +
                '<input type="text" class="form-control" name="sobrenome" >' +
                '</div>' +
            '</div>' +
            '<div class="form-group"> ' +
                '<label class="col-md-2">Cargo:</label>' +
                '<div class="col-md-10">' +
                '<input type="text" class="form-control" name="cargo" >' +
                '</div>' +
            '</div>' +
            '<div class="form-group"> ' +
                '<label class="col-md-2">Setor:</label>' +
                '<div class="col-md-10">' +
                '<input type="text" class="form-control" name="setor" >' +
                '</div>' +
            '</div>' +
            '<div class="form-group"> ' +
                '<label class="col-md-2">*Telefone:</label>' +
                '<div class="col-md-10">' +
                '<input type="text" class="form-control" name="telefone" required>' +
                '</div>' +
            '</div>' +
            '<div class="form-group"> ' +
                '<label class="col-md-2">Celular:</label>' +
                '<div class="col-md-10">' +
                '<input type="text" class="form-control" name="celular" >' +
                '</div>' +
            '</div>' +
            '<div class="form-group"> ' +
                '<label class="col-md-2">Email:</label>' +
                '<div class="col-md-10">' +
                '<input type="text" class="form-control" name="email" >' +
                '</div>' +
            '</div>' +
            '<div class="form-group"> ' +
                '<label class="col-md-2">Skype:</label>' +
                '<div class="col-md-10">' +
                '<input type="text" class="form-control" name="skype" >' +
                '</div>' +
            '</div>' +
            '</form> ' +
            '</div>' +
            '</div> '
        });
    });
}


/**
 * Load Datatables
 */
function MakeDataTable(tableId, options)
{
    if(!$.fn.dataTable) {
        LoadDatatablePlugin();
    } else {
        createDataTable();
    }

    //Load dynamic datatable plugin
    function LoadDatatablePlugin() {
        $.getScript('/plugins/datatables/jquery.dataTables.min.js', function(){
            $.getScript('/plugins/datatables/dataTables.bootstrap.min.js', function(){
                $.getScript('/plugins/datatables/dataTables.tableTools.min.js', createDataTable())
            })
        })
    }

    //create datatable
    function createDataTable() {
        //default options
        $.extend($.fn.dataTable.defaults, {
            language : {
                url : '/plugins/datatables/pt-br.json'
            },
            dom :   "<'dom-content'<'col-sm-6'l><'col-sm-6'f><'clearfix'>>rt<'dom-content'<'col-sm-6 small'i><'col-sm-6 small'p>>"
        })

        //load datatable
        var oTable = $(tableId).dataTable(options);

        return oTable;
    }
}

/**
 * Make breadcumbs for the page
 */
function MakeBreadCrumbs(){
    var local = window.location.pathname.split('/');
    $(local).each(function(key, value){
        if(value)
            $('#breadcrumb ol').append('<li><a href="#">' + value +'</a></li>')
    })
}

/**
 * Insere badges com qtde de erros nos panels do form
 * @constructor
 */
function MakeErrorBadgeOnPanel()
{
    var panels = $('.panel-group').find('.panel-body');
    $(panels).each(function(){
        var errors = $(this).find('.text-danger');
        if(errors.length > 0) {
            $(errors).closest('.panel-body').parent().siblings().append('<span class="badge">' + errors.length + '</div>');
        }
    });
}

/**
 * Mascara campo com CNPJ ou CPF
 * @param field
 * @constructor
 */
function MakeMaskedCnpjCpf(field)
{
    var text = $(field).val().replace(/[^0-9]/gi, '');

    switch (text.length) {
        case 11 :
            var value = text.substring(0,3) + '.' + text.substring(3,6) + '.' + text.substring(6,9) + '.' + text.substring(9);
            $(field).val(value);
            break;
        case 14 :
            var value = text.substring(0,2)
                + '.' + text.substring(2,5)
                + '.' + text.substring(5,8)
                + '/' + text.substring(8,12)
                + '-' + text.substring(12);
            $(field).val(value);
            break;
    }

}

function MakeDateTimePicker(field, type)
{
    $.getScript('/plugins/moment/moment-with-locales.min.js', function(){
        $.getScript('/plugins/bsdatetimepicker/bootstrap-datetimepicker.min.js', function(){
            if(type === 'date') {
                type = 'DD/MM/YYYY';
            } else {
                type = 'DD/MM/YYYY HH:MM'
            }

            $(field).datetimepicker({
                locale : 'pt-BR',
                format : type,
                useCurrent : false
            });
        })
    })
}

/** *******************************************************************************************************************
 * Document ready load
 */
$(document).ready(function(){
    //breadcrumb ----------------------------------------
    $.getScript('/plugins/select2/select2.min.js').done( function(){
        $('.select2').select2()
    });


    //breadcrumb ----------------------------------------
    MakeBreadCrumbs();

    //error badges ----------------------------------------
    MakeErrorBadgeOnPanel();

    //valores ----------------------------------------
    $('.taxa-juros').mask('9?9.9');

    //busca endereco ----------------------------------------
    $('#btn-busca-endereco').click(function(){
        MakeSearchAddressModal();
    });

    //busca cliente ----------------------------------------
    $('#btn-busca-cliente').click(function(){
        MakeSearchClienteModal();
    });

    //novo contato ----------------------------------------
    $('#btn-novo-contato').click(function(){
        var ownerClass = $(this).data('owner-class'),
            ownerId = $(this).data('owner-id');
        MakeNovoContatoModal(ownerClass, ownerId);
    });

    //tooltip ----------------------------------------
    $('[data-toggle="tooltip"]').tooltip();

    //confirm submit -----------------------------------
    $('.submit-confirm').click(function(e){
        e.preventDefault();
        var form = $(this).closest('form');

        $.getScript('/plugins/bootbox/bootbox.min.js').done(function(script){
            bootbox.setDefaults({
                locale : 'br',
                size : 'small'
            });

            bootbox.dialog({
                title   : 'Confirma envio?',
                message : 'Confirma envio de formulário',
                buttons : {
                    default : {
                        label : 'Cancela'
                    },
                    primary : {
                        label : 'Ok',
                        callback : function() {
                            form.submit();
                        }
                    }
                }
            });
        });
    })


})