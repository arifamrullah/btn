jQuery(function($){
  /* select validate */
  $('#accountRegistration select').on('change', function(e) {
      $('#accountRegistration').validate().element($(this));
  });

  $('#verificationRegistration select').on('change', function(e) {
      $('#verificationRegistration').validate().element($(this));
  });

  $("select.selectpicker").focus(function(){
    $(this).next(".bootstrap-select").find('.selectpicker').focus();
  });

  jQuery(document.body).on('click', 'form #submitRegistration', function (e) {
    /* placement validate */
    var validator = jQuery("#accountRegistration").validate({
      errorPlacement: function(error, element) {
        element.closest('td.tdgenap').addClass('has-error');
      },
      unhighlight: function(element, errorClass){
        jQuery(element).closest('td.tdgenap').removeClass('has-error');
      },
      ignore: ":hidden:not(.selectpicker)",
    });
    if (jQuery("#accountRegistration").valid()) {
      jQuery('.modal').modal('show');
    } else {
      validator.focusInvalid();
    }
    return false;
  });

  jQuery(document.body).on('click', 'form #processRegistration', function (e) {
    /* placement validate */
    var validator = jQuery("#verificationRegistration").validate({
      ignore: ':not(select:hidden, input:visible, textarea:visible)',
      errorPlacement: function(error,element) {
        element.closest('.form-group').addClass('has-error');
      },
      unhighlight: function(element, errorClass){
        jQuery(element).closest('.form-group').removeClass('has-error');
      }
    });
    if( jQuery("#verificationRegistration").valid() ){
      jQuery('.progress').show();
      jQuery('#processRegistration').attr('disabled','disabled');
      var data = {
          type: "POST",
          action: 'btn_ajax_process_registration',
          data : {
                  head : jQuery('#accountRegistration').serializeArray(),
                  detail : jQuery('#verificationRegistration').serializeArray()
                 }
        };
        jQuery.post(ajax_object.ajax_url, data, function(response){
          jQuery('.progress').hide();
          if (response){
            window.alert("Data anda telah kami terima.");
          }else{
            window.alert("There was a problem with communication, please try again.");
          }
          window.location.href='/';
        }
      );

    }else{
      validator.focusInvalid();
    }
    return false;
  });

  $('.select_v_kota').on('change', function(){
  var selected = $(this).find("option:selected").val();
    if(selected){
       var data = {
           type: "POST",
           action: 'btn_ajax_get_substation_by_id',
           data : {id:selected}
         };
         jQuery.post(ajax_object.ajax_url, data, function(response){
           jQuery(".selectpicker_v_cabang").html(response).selectpicker('refresh');
         }
       );
     }
   });

   /* load */
   $('#loanRegistration select').on('change', function(e) {
       $('#loanRegistration').validate().element($(this));
   });

   jQuery(document.body).on('click', 'form #submitLoanRegistration', function (e) {
     /* placement validate */
     var validator = jQuery("#loanRegistration").validate({
       errorPlacement: function(error, element) {
         element.closest('td.tdgenap').addClass('has-error');
       },
       unhighlight: function(element, errorClass){
         jQuery(element).closest('td.tdgenap').removeClass('has-error');
       },
       ignore: ":hidden:not(.selectpicker)"
     });
     if( jQuery("#loanRegistration").valid() ){
       jQuery('#submitLoanRegistration').attr('disabled','disabled');
       var data = {
           type: "POST",
           action: 'btn_ajax_check_loan_registration',
           data : jQuery('#loanRegistration').serializeArray()
         };
         jQuery.post(ajax_object.ajax_url, data, function(response){
           var results = JSON.parse(response);
           if (results.result === 'false') {
             var log = "";
             $.each(results, function(key, val) {
               if(key==="age"){
                 log += "<p><strong style='min-width: 90px;display: inline-block;float: left;'>Age </strong> <span style='float: left;margin: 0 5px;'>:</span> Maaf, Usia Anda tidak diantara 21-65</p><div class='clearfix'></div>";
               }else if(key==="bank_finance"){
                 log += "<p><strong style='min-width: 90px;display: inline-block;float: left;'>Bank finance</strong> <span style='float: left;margin: 0 5px;'>:</span> Maaf, Anda perlu deposit minimal 30%</p><div class='clearfix'></div>";
               }else if(key==="limit"){
                 log += "<p><strong style='min-width: 90px;display: inline-block;float: left;'>Limit</strong> <span style='float: left;margin: 0 5px;min-height: 70px;'>:</span> Maaf, Penghasilan Anda tidak mencukupi untuk pembayaran angsuran. Silakan coba lagi dengan jangka waktu yang lebih panjang atau dengan jumlah pinjaman yang lebih rendah.</p><div class='clearfix'></div>";
               }else if (key==="income_ratio") {
                 log += "<p><strong style='min-width: 90px;display: inline-block;float: left;'>Income Ratio</strong> <span style='float: left;margin: 0 5px;min-height: 70px;'>:</span> Maaf, Hutang terhadap <strong>rasio modal</strong> terlalu tinggi. Penghasilan Anda tidak mencukupi untuk melakukan pinjaman dari nilai tersebut.</p><div class='clearfix'></div>";
               }
             });

             var content = '<div class="modal fade" id="konfirmasi-error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'
                           + '<div class="modal-dialog" style="max-width:450px">'
                             + '<div class="modal-content">'
                               + '<div class="modal-header">'
                                   + '<h4 class="modal-title" id="myModalLabel">Maaf permintaan anda belum sesuai dengan ketentuan kami</h4>'
                                 + '</div>'
                               + '<div class="modal-body">'
                                 + log
                               + '</div>'
                               + '<div class="modal-footer">'
                                 + '<p class="buttonRow">'
                                 + '<button type="button" class="btn btn-yellow pull-right closeModal">Close</button></p>'
                               + '</div>'
                             + '</div>';
                           + '</div>';
                         + '</div>';
             $(content).modal('show');
           }else if (results.result === 'true') {
              jQuery('#konfirmasi-form').modal('show');
          }

        });
     }else{
       validator.focusInvalid();
     }
     return false;
   });

   jQuery(document.body).on('click', 'form #processLoanRegistration', function (e) {
     /* placement validate */
     var validator = jQuery("#verificationRegistration").validate({
       ignore: ':not(select:hidden, input:visible, textarea:visible)',
       errorPlacement: function(error,element) {
         element.closest('.form-group').addClass('has-error');
       },
       unhighlight: function(element, errorClass){
         jQuery(element).closest('.form-group').removeClass('has-error');
       }
     });
     if( jQuery("#verificationRegistration").valid() ){
       jQuery('.progress').show();
       //jQuery('#processRegistration').attr('disabled','disabled');
       var data = {
           type: "POST",
           action: 'btn_ajax_process_loan_registration',
           data : {
                   head : jQuery('#loanRegistration').serializeArray(),
                   detail : jQuery('#verificationRegistration').serializeArray()
                  }
         };
         jQuery.post(ajax_object.ajax_url, data, function(response){
           jQuery('.progress').hide();
           if (response){
             window.alert("Data anda telah kami terima.");
           }else{
             window.alert("There was a problem with communication, please try again.");
           }
          window.location.href='/';
         }
       );

     }else{
       validator.focusInvalid();
     }
     return false;
   });

  $(document).on('click', '.closeModal', function() {
      $('#konfirmasi-error').modal('hide');
      $('#konfirmasi-error').remove();
      $('body').removeClass('modal-open');
      $('.progress').hide();
      $('#submitLoanRegistration').attr('disabled',false); // removing disabled in this class
  });

  function count_installment(){
    var loan = $('input[name="LOAN_AMOUNT"]').autoNumeric('get') - $('input[name="DEPOSIT"]').autoNumeric('get');
    var bunga = $('input[name="INTEREST"]').val();
    var tenor = $('input[name="LOAN_TENURE"]').val();
    var angsuran = parseFloat( loan / ((1 - Math.pow((1 + (bunga/tenor/100)),(-tenor))) / (bunga/tenor/100)) );
    if(isNaN(angsuran))angsuran=0;
    $('input[name="INSTALLMENT"]').autoNumeric('set', angsuran);
  }

  $('input[name="LOAN_TENURE"]').die('keyup').live('keyup',function() {
    var dInput = this.value;
    var array = ['0','3.99','4.49','4.69','4.99','7']
    if ( Number(dInput) >= 1 && Number(dInput) <= 12 ) {
      var pointer = 1;
    } else if ( Number(dInput) >= 13 && Number(dInput) <= 24 ) {
      var pointer = 2;
    } else if ( Number(dInput) >= 25 && Number(dInput) <= 36 ) {
      var pointer = 3;
    } else if ( Number(dInput) >= 37 && Number(dInput) <= 48 ) {
      var pointer = 4;
    } else if ( Number(dInput) >= 49 ) {
      var pointer = 5;
    } else {
      var pointer = 0;
    }

    $('input[name="INTEREST"]').val(array[pointer]);
    count_installment();
  })

  $('input[name="DEPOSIT"]').die('keyup').live('keyup',function() {
    count_installment();
  })

  $('input[name="LOAN_AMOUNT"]').die('keyup').live('keyup',function() {
    count_installment();
  })

  if($('.autonumeric').length){
    $('.autonumeric').autoNumeric('init', {mDec: '0'});
  }

  if($('.autonumericDec').length){
    $('.autonumericDec').autoNumeric('init', {mDec: '2', aSep: '.', aDec: ',', });
  }

  jQuery(document.body).on('click', 'form #SubmitProsesCifRegistrasiNonAtm', function (e) {
    var validator = jQuery("#formRegistrasiSimpanan").validate({
      rules: {
        captcha: {
          required: true,
          remote : {
            url: ajax_object.ajax_url,
            type: "post",
            data : {
              code : function(response) {
                return response;
              },
              action : 'btn_ajax_captcha'
            }
          }
        }
      },
      tooltip_options: {
        '_all_': { placement: 'top' }
      },
      errorPlacement: function(error, element) {
        element.closest('td.tdgenap').addClass('has-error');
        element.closest('td.tdganjil').addClass('has-error');
      },
      unhighlight: function(element, errorClass){
        jQuery(element).closest('td.tdgenap').removeClass('has-error');
      },
      ignore: ":hidden:not(.selectpicker)"
    });

    if (jQuery("#formRegistrasiSimpanan").valid()) {
      jQuery('.progress').show();
      var data = {
        type: "POST",
        dataType: 'json',
        // iframe: false,
        // processData: false,
        files: jQuery('.fileupload'),
        data : {
          action: 'btn_ajax_process_CifRegistration',
          type: "POST",
          pribadi : jQuery('#cifRegistration').serialize(),
          lembaga : jQuery('#formRegCifLembaga').serialize(),
          rek_simpanan : jQuery('#formRegistrasiSimpanan').serialize(),
        },
      };
      jQuery.ajax(ajax_object.ajax_url, data)
        .success(function(data,response){
          jQuery('.progress').hide();
          if (data.success){
           window.alert(data.msg);
          } else {
           window.alert(data.msg);
          }
          window.location.href='/';
        });
    } else {
      validator.focusInvalid();
    }
  });

  jQuery(document.body).on('click', 'form #SubmitProsesCifRegistrasiWithAtm', function (e) {
    var validator = jQuery("#registrasiAtmSms").validate({
      rules: {
        captcha: {
          required: true,
          remote : {
            url: ajax_object.ajax_url,
            type: "post",
            data : {
              code : function(response) {
                  return response;
              },
              action : 'btn_ajax_captcha'
            }
          }
        }
      },

      tooltip_options: {
        '_all_': { placement: 'top' }
      },
      errorPlacement: function(error, element) {
        element.closest('td.tdgenap').addClass('has-error');
        element.closest('td.tdganjil').addClass('has-error');
      },
      unhighlight: function(element, errorClass){
        jQuery(element).closest('td.tdgenap').removeClass('has-error');
      },
      
      ignore: ":hidden:not(.selectpicker)"
    });

    if (jQuery("#registrasiAtmSms").valid()) {
      jQuery('.progress').show();
      var data = {
        type: "POST",
        // iframe: true,
        // processData: false,
        // files: jQuery('.fileupload'),
        dataType: 'json',
         // filesTTD: jQuery('#filettd'),
        data : {
          action: 'btn_ajax_process_CifRegistration',
          type: "POST",
          pribadi : jQuery('#cifRegistration').serialize(),
          lembaga : jQuery('#formRegCifLembaga').serialize(),
          rek_simpanan : jQuery('#formRegistrasiSimpanan').serialize(),
          atm_sms : jQuery('#registrasiAtmSms').serialize(),
          type : 1,
        },
      };

      jQuery.ajax(ajax_object.ajax_url, data).success(function(data,response) {
          jQuery('.progress').hide();
          if (data.success) {
           window.alert(data.msg);
          } else {
           window.alert(data.msg);
          }
          window.location.href='/';
        });
    } else {
      validator.focusInvalid();
    }
  });

  jQuery('body').on('click', 'form #SubmitProsesAtmSms', function (e) {
    var temp_dir= base_url;
    var cacheInput=$('input[name=captcha]').val();
    var validator = jQuery("#registrasiAtmSms").validate({
      rules: {
        captcha: {
          remote : {
            url: ajax_object.ajax_url,
            type: "post",
            data : {
              code : function(response) {
                return response;
              },
              action : 'btn_ajax_captcha'
            }
          }
        }
      },
      tooltip_options: {
        '_all_': { placement: 'top' }
      },
      errorPlacement: function(error, element) {
        element.closest('td.tdgenap').addClass('has-error');
        element.closest('td.tdganjil').addClass('has-error');
      },
      unhighlight: function(element, errorClass){
        jQuery(element).closest('td.tdgenap').removeClass('has-error');
      },
      ignore: ":hidden:not(.selectpicker)"
    });
    if (jQuery("#registrasiAtmSms").valid()) {
      jQuery('.progress').show();
      var data = {
        type: "POST",
        action: 'btn_ajax_process_atm_sms',
        data : {
          atm_sms : jQuery('#registrasiAtmSms').serialize(),
          type : 1,
        }
      };
      jQuery.post(ajax_object.ajax_url, data, function(response){
         jQuery('.progress').hide();
         if (response) {
           window.alert("Data anda telah kami terima.");
         } else {
           window.alert("There was a problem with communication, please try again.");
         }
        window.location.href='/';
      });
    } else {
      validator.focusInvalid();
    }
  });

  // Validate form data perorangan
  jQuery(document.body).on('click', 'form #validateCifPerorangan', function (e) {
    jQuery('.err-msg').remove();
    var validator = jQuery("#cifRegistration").validate({
      tooltip_options: {
        '_all_': { placement: 'top' }
      },
      errorPlacement: function(error, element) {
        element.parent().find('.err-msg').remove();
        element.closest('td.tdgenap').addClass('has-error');
        element.closest('td.tdganjil').addClass('has-error');
        if(element.is('select')){
          element.parent().find('.bootstrap-select').after('<span class="err-msg">'+error.html()+'</span>');
        }else if(element.data('format')){
          element.parent().find('.add-on').after('<span class="err-msg">'+error.html()+'</span>');
        }else{
          element.after('<span class="err-msg">'+error.html()+'</span>');
        }
      },
      unhighlight: function(element, errorClass){
        jQuery(element).closest('td.tdgenap').removeClass('has-error');
        jQuery(element).parent().find('.err-msg').remove();
      },
      ignore: ":hidden:not(.selectpicker)"
    });

    if(jQuery("#cifRegistration").valid()) {
      jQuery("#site").cycle('next');
    } else {
      validator.focusInvalid();
    }
  });

  // Validate form simpanan
  jQuery(document.body).on('click', 'form #validateFormSimpanan', function (e) {
    jQuery('.err-msg').remove();
    var validator = jQuery("#formRegistrasiSimpanan").validate({
      tooltip_options: {
        '_all_': { placement: 'top' }
      },
      errorPlacement: function(error, element) {
        element.parent().find('.err-msg').remove();
        element.closest('td.tdgenap').addClass('has-error');
        element.closest('td.tdganjil').addClass('has-error');
        if(element.is('select')){
          element.parent().find('.bootstrap-select').after('<span class="err-msg">'+error.html()+'</span>');
        }else if(element.data('format')){
          element.parent().find('.add-on').after('<span class="err-msg">'+error.html()+'</span>');
        }else{
          element.after('<span class="err-msg">'+error.html()+'</span>');
        }
      },
      unhighlight: function(element, errorClass){
      jQuery(element).closest('td.tdgenap').removeClass('has-error');
      jQuery(element).parent().find('.err-msg').remove();
      },
      ignore: ":hidden:not(.selectpicker)"
    });
    if( jQuery("#formRegistrasiSimpanan").valid() ){
      jQuery("#site").cycle('next');
    }else{
      validator.focusInvalid();
    }
  });

  // Validate form lembaga
  jQuery(document.body).on('click', 'form #validateCifLembaga', function (e) {
    jQuery('.err-msg').remove();
    var validator = jQuery("#formRegCifLembaga").validate({
      tooltip_options: {
        '_all_': { placement: 'top' }
      },
      errorPlacement: function(error, element) {
        element.parent().find('.err-msg').remove();
        element.closest('td.tdgenap').addClass('has-error');
        element.closest('td.tdganjil').addClass('has-error');
        if(element.is('select')){
          element.parent().find('.bootstrap-select').after('<span class="err-msg">'+error.html()+'</span>');
        }else if(element.data('format')){
          element.parent().find('.add-on').after('<span class="err-msg">'+error.html()+'</span>');
        }else{
          element.after('<span class="err-msg">'+error.html()+'</span>');
        }
      },
      unhighlight: function(element, errorClass){
      jQuery(element).closest('td.tdgenap').removeClass('has-error');
      jQuery(element).parent().find('.err-msg').remove();
      },
      ignore: ":hidden:not(.selectpicker)"
    });
    if( jQuery("#formRegCifLembaga").valid() ){
      jQuery("#site").cycle('next');
    }else{
      validator.focusInvalid();
    }
  });

  jQuery(document.body).on('click', 'form #submitProsessKredit', function (e) {

    var validator = jQuery("#formLoanRegistration").validate({
      
      rules: {
          captcha: {
            required: true,
            remote :
                {
                  url: ajax_object.ajax_url,
                  type: "post",
                  data :
                  {
                     code : function(response) {
                          return response;
                      },
                      action : 'btn_ajax_captcha'
                  }
                }
          }
      },

      tooltip_options: {
        '_all_': { placement: 'top' }
      },
      errorPlacement: function(error, element) {
        element.closest('td.tdgenap').addClass('has-error');
        element.closest('td.tdganjil').addClass('has-error');
      },
      unhighlight: function(element, errorClass){
      jQuery(element).closest('td.tdgenap').removeClass('has-error');
      },
      ignore: ":hidden:not(.selectpicker)"     
    });
    if( jQuery("#formLoanRegistration").valid() ) {

          jQuery('.progress').show();
          var data = {
          type: "POST",
          dataType: 'json',
          data : {
              action: 'btn_ajax_process_pinjaman_kredit',
              type: "POST",
              data_loan : jQuery('#formLoanRegistration').serialize(),
          },
        };
        jQuery.ajax(ajax_object.ajax_url, data)
          .success(function(data,response){
            jQuery('.progress').hide();

            if (data.success) {
             window.alert(data.msg);
            } else {
             window.alert(data.msg);
            }
            window.location.href='/';
          });

    } else {
      validator.focusInvalid();
    }
     });

  $(document).ready(function(){
    $('.grpUsaha').hide();
    $('.reqGrpUsaha').removeClass('required');

    $('#chkGrpUsaha').change(function(){
      if ($('#chkGrpUsaha').is(':checked')) {
        $('.grpUsaha').show();
        $('.reqGrpUsaha').addClass('required');
      } else {
        $('.grpUsaha').hide();
        $('.reqGrpUsaha').removeClass('required');
      }

    });
  });

});