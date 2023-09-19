(function ($) {

    'use strict';

    $('.cep').mask('00000-000');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    
    //OpÃ§Ãµes de validaÃ§Ã£o do telefone
    var op_telefone = {
        onKeyPress: function onKeyPress(telefone, evento, campo) {

            var numeros = $(campo).val().replace(/\D/g, "");
            if (numeros.length == 11) {
                $(campo).mask("(00) 00000-0000", op_telefone);
            }
            if (numeros.length == 10) {
                $(campo).mask("(00) 0000-00009", op_telefone);
            }
        }
    };

    $(".form-telefone").each(function (index) {

        var numeros = $(this).val().replace(/\D/g, "");
        if (numeros.length == 11) {
            $(this).mask("(00) 00000-0000", op_telefone);
        }
        if (numeros.length < 11) {
            $(this).mask("(00) 0000-00009", op_telefone);
        }
    });

    

    
    /*==================================================================
        [ Daterangepicker ]*/
    try {
        $('.js-datepicker').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "autoUpdateInput": false,
            locale: {
                format: 'DD/MM/YYYY'
            },
        });
    
        var myCalendar = $('.js-datepicker');
        var isClick = 0;
    
        $(window).on('click',function(){
            isClick = 0;
        });
    
        $(myCalendar).on('apply.daterangepicker',function(ev, picker){
            isClick = 0;
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
    
        });
    
        $('.js-btn-calendar').on('click',function(e){
            e.stopPropagation();
    
            if(isClick === 1) isClick = 0;
            else if(isClick === 0) isClick = 1;
    
            if (isClick === 1) {
                myCalendar.focus();
            }
        });
    
        $(myCalendar).on('click',function(e){
            e.stopPropagation();
            isClick = 1;
        });
    
        $('.daterangepicker').on('click',function(e){
            e.stopPropagation();
        });
    
    
    } catch(er) {console.log(er);}
    /*[ Select 2 Config ]
        ===========================================================*/
    
    try {
        var selectSimple = $('.js-select-simple');
    
        selectSimple.each(function () {
            var that = $(this);
            var selectBox = that.find('select');
            var selectDropdown = that.find('.select-dropdown');
            selectBox.select2({
                dropdownParent: selectDropdown
            });
        });
    
    } catch (err) {
        console.log(err);
    }
    

})(jQuery);


//BUSCA CEP COM JQUERY
$(function () {
    $('.j_getCep').change(function () {
        var cep = $(this).val().replace('-', '').replace('.', '');
        if (cep.length === 8) {
            $.get("https://viacep.com.br/ws/" + cep + "/json", function (data) {
                if (!data.erro) {
                    $('#cidade').val(data.localidade);
                    //$('#enderecoresponsavel_1').val(data.logradouro + ' ' + data.complemento);

                    $('#estado').val(estadossiglasids[data.uf]);
                    $('#estado').trigger('change');

                    cidadedocep= data.localidade;
                }
            }, 'json');
        }
    });
});

//Validação simples
$("#formCadastro").validate({
   debug:false,
   rules: {
     nome:{
         required:true
     },
     email: {
       required: true,
       email: true
     },
     celular:{
         required:true
     },
     cpf:{
         required:true
     },
     rg:{
         required:true
     },
     password:{
         required:true
     },
     password_confirmation:{
         required:true
     },
     categoria_id:{
         required:true
     },
     cnpj:{
         required:true
     },
     razaosocial:{
         required:true
     },
     nomeempresa:{
         required:true
     },
     telefoneempresa:{
         required:true
     },
     cep:{
         required:true
     },
     estado:{
         required:true
     },
     cidade:{
         required:true
     },
     bairro:{
         required:true
     },
     endereco:{
         required:true
     },
     numero:{
         required:true
     },
     raio_atuacao:{
         required:true
     }
   },
   messages:{
      
      nome: {
       required: "Nome é obrigatório",
      },
      email: {
       required: "E-mail é obrigatório",
       email: 'Digite um e-mail válido'
      },
      celular: {
       required: "Celular é obrigatório",
      },
      cpf: {
       required: "CPF é obrigatório",
      },
      rg: {
       required: "RG é obrigatório",
      },
      password: {
       required: "Senha é obrigatório",
      },
      password_confirmation: {
       required: "Confirmar senha é obrigatório",
      },
      categoria_id: {
       required: "Categoria da empresa é obrigatório",
      },
      cnpj: {
       required: "CNPJ é obrigatório",
      },
      razaosocial: {
       required: "Razão Social é obrigatório",
      },
      nomeempresa: {
       required: "Nome da empresa é obrigatório",
      },
      telefoneempresa: {
       required: "Telefone da empresa é obrigatório",
      },
      cep: {
       required: "CEP é obrigatório",
      },
      estado: {
       required: "Estado é obrigatório",
      },
      cidade: {
       required: "Cidade é obrigatório",
      },
      bairro: {
       required: "Bairro é obrigatório",
      },
      endereco: {
       required: "Endereço é obrigatório",
      },
      numero: {
       required: "Número é obrigatório",
      },
      raio_atuacao: {
       required: "Raio de atuação é obrigatório",
      }
   }
 });


$(document).on("change","#estado",function(){

  let valor = $(this).val();

  $("#cidade").prop("disabled", true);

  $.get(url+"api/estados/cidades/"+valor, function(resultado){
       
       if( resultado.status ){

         $("#cidade").prop("disabled", false);

         $('#cidade').empty().trigger('change');

         $.each(resultado.cidades, function() {

          var newOption = new Option( this.nome , this.id, false, false);
          $('#cidade').append(newOption).trigger('change');

         });

         //$('#cidade').val(cidadedocep);
         //$('#cidade').trigger('change');

       }
  })
 
});