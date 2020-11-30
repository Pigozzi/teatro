$(document).ready(function(){

    // TRADUZ DATATABLE
    $("#listar").DataTable({
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });

    // HIDE/SHOW PLACEHOLDER
    $('input,textarea').focus(function(){
       $(this).data('placeholder',$(this).attr('placeholder'))
              .attr('placeholder','');
    }).blur(function(){
       $(this).attr('placeholder',$(this).data('placeholder'));
    });

    //MASKS
    $('[name="entry"], [name="departure"]').inputmask(
        'hh:mm',
        {
            placeholder: '__:__ _m',
            alias: 'time24',
            hourFormat: '24'
        }
    );

    $('[name="show_date"]').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });


    $('#form-colleger').submit(function(event){
        event.preventDefault();

        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').text('');
        $('.alert strong').text('');
        $('.alert').addClass('d-none');

        var form = $(this);

        $.ajax({
            url: form.prop('action'),
            data: form.serializeArray(),
            type: form.prop('method'),
            dataType: 'JSON',

            success:function(response)
            {
                if(response.length > 10)
                {
                    $('.alert strong').text(response);
                    $('.alert').removeClass('d-none');
                }
                else
                {
                    $.each(response, function(index, content){

                        $('[name="' + index + '"]').addClass('is-invalid');
                        $('[name="colleger"]').parents('.form-group').children('.invalid-feedback').text('Nome do bolsista inválido, digite somente letras.');
                        $('[name="show"]').parents('.form-group').children('.invalid-feedback').text('Nome do espetáculo inválido, digite somente letras.');
                        $('[name="show_date"]').parents('.form-group').children('.invalid-feedback').text('Data inválida');
                        $('[name="entry"]').parents('.form-group').children('.invalid-feedback').text('Entrada inválida');
                        $('[name="departure"]').parents('.form-group').children('.invalid-feedback').text('Saída inválida');

                    });

                }

            },

            error:function(response)
            {
                console.log(response);
            }

        });


    })

    $('.alert .close').click(function(){
        $('.alert').addClass('d-none');
    });

    $("#colleger").easyAutocomplete({

        url: 'api/bolsistas',

        getValue: function(element) {

            return element.name;
        },

        list: {
            onSelectItemEvent: function() {
                var selectedItemValue = $('[name="colleger"]').getSelectedItemData().hours;

                $('[name="hours"]').val(selectedItemValue).trigger('change');
            },
            // onHideListEvent: function() {
            // 	$('[name="hours"]').val('').trigger('change');
        	// }
        }
    });

    $('[name="show"]').easyAutocomplete({

        url: 'api/espetaculos',

        getValue: function(element) {

            return element.name;
        }

    });

});
