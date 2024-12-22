jQuery(function($){
	/* config for admin */
	$('#datetimepicker1,#datetimepicker5,#datetimepicker2,#datetimepicker3,#datetimepicker4').datetimepicker({
		autoclose: true
	});

	jQuery('#datetimepicker6').datetimepicker({
		pickDate: false,
		autoclose: true
	});

	$('#accountRegistration select').on('change', function(e) {
      $('#accountRegistration').validate().element($(this));
  });

  $('#verificationRegistration select').on('change', function(e) {
      $('#verificationRegistration').validate().element($(this));
  });

  $("select.selectpicker").focus(function(){
    $(this).next(".bootstrap-select").find('.selectpicker').focus();
  });

  jQuery(document.body).on('click', '#submitRegistration', function (e) {
    /* placement validate */
    var validator = jQuery("#accountRegistration").validate({
      errorPlacement: function(error, element) {
        element.closest('td.tdgenap').addClass('has-error');
      },
      unhighlight: function(element, errorClass){
        $(element).closest('td.tdgenap').removeClass('has-error');
      },
      ignore: ":hidden:not(.selectpicker)"
    });
		$('.modal').modal('show');

    if( $("#accountRegistration").valid() ){
    }else{
      validator.focusInvalid();
    }
    return false;
  });


	  jQuery(document.body).on('click', '#processRegistration', function (e) {
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
	      //btn_ajax_process_registration
	      var data = {
	          type: "POST",
	          action: 'btn_ajax_process_registration',
	          data : {
	                  head : jQuery('#accountRegistration').serializeArray(),
	                  detail : jQuery('#verificationRegistration').serializeArray()
	                 }
	        };
	        jQuery.post(ajax_object.ajax_url, data, function(response){
	          if (response){
	            window.alert("Your data has been received");
	          }else{
	            window.alert("There was a problem with communication, please try again.");
	          }
	         window.location.href='/wp-admin/admin.php?page=registerdata';
	        }
	      );

	    }else{
	      validator.focusInvalid();
	    }
	    return false;
	  });

jQuery(document.body).on('click', 'form #submitProsessUpdateKredit', function (e) {
var validator = jQuery("#formLoanRegistration").validate({
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
if( jQuery("#formLoanRegistration").valid() ){

      jQuery('.progress').show();
      var data = {
      type: "POST",
      dataType: 'json',
      data : {
              action: 'btn_ajax_process_update_pinjaman_kredit',
              type: "POST",
              data_loan : jQuery('#formLoanRegistration').serialize(),
              },
      

    };
    jQuery.ajax(ajax_object.ajax_url, data)
      .success(function(data,response){
        jQuery('.progress').hide();
      
        if (data.success){     
         window.alert(data.msg);
        }else{
         window.alert(data.msg);
        }
        // window.location.href='/';
      });

}else{
  validator.focusInvalid();
}
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

	$('#deleteRegis').live('click',function(){
		if (confirm('Are you sure?')) {
					var data = {
							type: "POST",
							REK_ID : $(this).attr('data'),
							action: 'btn_ajax_delete_register_by_id'
						};
			jQuery.post(ajax_object.ajax_url, data, function(response) {
				setTimeout(function(){
						window.location.reload(true);
				},500);
			});
		}
		return false;
	});

	$('#deleteLoan').live('click',function(){
		if (confirm('Are you sure?')) {
					var data = {
							type: "POST",
							ID : $(this).attr('data'),
							action: 'btn_ajax_delete_loan_by_id'
						};
			jQuery.post(ajax_object.ajax_url, data, function(response) {
				setTimeout(function(){
						window.location.reload(true);
				},500);
			});
		}
		return false;
	});

  //Save Data Product
  jQuery(document.body).on('click', 'form #submitProduct', function (e) {
    jQuery('.err-msg').remove();
    var validator = jQuery("#formProduct").validate({
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
    if( jQuery("#formProduct").valid() ){
          jQuery('.progress').show();
          var data = {
          type: "POST",
          action: 'btn_ajax_process_save_product',
          data : {
                  product : jQuery('#formProduct').serialize(),
                }
        };
        
        jQuery.post(ajax_object.ajax_url, data, function(response){
          jQuery('.progress').hide();
           if (response){
             window.alert("Data telah berhasil di simpan.");
           }else{
             window.alert("There was a problem with communication, please try again.");
           }
          window.location.href='/wp-admin/admin.php?page=product';
         }
       );
        
    }else{
      validator.focusInvalid();
    }
  });

//update data product
  jQuery(document.body).on('click', 'form #submitUpdateProduct', function (e) {
    jQuery('.err-msg').remove();
    var validator = jQuery("#formUpdateProduct").validate({
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
    if( jQuery("#formUpdateProduct").valid() ){
          jQuery('.progress').show();
          var data = {
          type: "POST",
          action: 'btn_ajax_process_update_product',
          data : {
                  product : jQuery('#formUpdateProduct').serialize(),
                }
        };
        
        jQuery.post(ajax_object.ajax_url, data, function(response){
          jQuery('.progress').hide();
           if (response){
             window.alert("Data telah berhasil di update.");
           }else{
             window.alert("There was a problem with communication, please try again.");
           }
          window.location.href='/wp-admin/admin.php?page=product';
         }
       );
        
    }else{
      validator.focusInvalid();
    }
  });

	//update cif perorangan
	jQuery(document.body).on('click', 'form #updateCifPerorangan', function (e) {
		jQuery('.err-msg').remove();
    var validator = jQuery("#FormUpdateCifPerorangan").validate({
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
    if( jQuery("#FormUpdateCifPerorangan").valid() ){
          jQuery('.progress').show();
          var data = {
          type: "POST",
          // iframe: false,
          // processData: false,
          // files: jQuery('.fileupload'),
          action: 'btn_ajax_process_update_perorangan',
          data : {
                  pribadi : jQuery('#FormUpdateCifPerorangan').serializeArray(),
                }
        };
        
        jQuery.post(ajax_object.ajax_url, data, function(response){
          jQuery('.progress').hide();
           if (response){
             window.alert("Data telah berhasil di update.");
           }else{
             window.alert("There was a problem with communication, please try again.");
           }
          window.location.href='/wp-admin/admin.php?page=registerdata';
         }
       );
        
    }else{
      validator.focusInvalid();
    }
  });

	//update Form Simpanan
	jQuery(document.body).on('click', 'form #UpdateFormBukaRekening', function (e) {
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
          jQuery('.progress').show();
          var data = {
          type: "POST",
          action: 'btn_ajax_process_update_form_simpanan',
          data : {
                  simpanan : jQuery('#formRegistrasiSimpanan').serialize(),
                }
        };
        
        jQuery.post(ajax_object.ajax_url, data, function(response){
          jQuery('.progress').hide();
           if (response){
             window.alert("Data telah berhasil di update.");
           }else{
             window.alert("There was a problem with communication, please try again.");
           }
          // window.location.href='/wp-admin/admin.php?page=registerdata';
         }
       );
        
    }else{
      validator.focusInvalid();
    }
  });

	//update Form UpdateAtmSms
	jQuery(document.body).on('click', 'form #UpdateAtmSms', function (e) {
		jQuery('.err-msg').remove();
    var validator = jQuery("#formUpdateAtmSms").validate({
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
    if( jQuery("#formUpdateAtmSms").valid() ){
          jQuery('.progress').show();
          var data = {
          type: "POST",
          action: 'btn_ajax_process_update_atm_sms',
          data : {
                  atm_sms : jQuery('#formUpdateAtmSms').serialize(),
                }
        };
        
        jQuery.post(ajax_object.ajax_url, data, function(response){
          jQuery('.progress').hide();
           if (response){
             window.alert("Data telah berhasil di update.");
           }else{
             window.alert("There was a problem with communication, please try again.");
           }
          window.location.href='/wp-admin/admin.php?page=registerdata';
         }
       );
        
    }else{
      validator.focusInvalid();
    }
  });

//update Form UpdateAtmSms
  jQuery(document.body).on('click', 'form #UpdateAtmSms2', function (e) {
    jQuery('.err-msg').remove();
    var validator = jQuery("#formUpdateAtmSms").validate({
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
    if( jQuery("#formUpdateAtmSms").valid() ){
          jQuery('.progress').show();
          var data = {
          type: "POST",
          action: 'btn_ajax_process_update_atm_sms',
          data : {
                  atm_sms : jQuery('#formUpdateAtmSms').serialize(),
                }
        };
        
        jQuery.post(ajax_object.ajax_url, data, function(response){
          jQuery('.progress').hide();
           if (response){
             window.alert("Data telah berhasil di update.");
           }else{
             window.alert("There was a problem with communication, please try again.");
           }
          window.location.href='/wp-admin/admin.php?page=atmSms';
         }
       );
        
    }else{
      validator.focusInvalid();
    }
  });

	//update Form lembaga
	jQuery(document.body).on('click', 'form #UpdateLembaga', function (e) {
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
          jQuery('.progress').show();
          var data = {
          type: "POST",
          action: 'btn_ajax_process_update_data_lembaga',
          data : {
                  lembaga : jQuery('#formRegCifLembaga').serialize(),
                }
        };
        
        jQuery.post(ajax_object.ajax_url, data, function(response){
          jQuery('.progress').hide();
           if (response){
             window.alert("Data telah berhasil di update.");
           }else{
             window.alert("There was a problem with communication, please try again.");
           }
          window.location.href='/wp-admin/admin.php?page=registerdata';
         }
       );
        
    }else{
      validator.focusInvalid();
    }
  });

jQuery('.deleteDataCif').click(function () {
	if (confirm('Are you sure?')) {
				var data = {
						type: "POST",
						ID : $(this).attr('data'),
						action: 'btn_ajax_delete_data_cif'
					};
		jQuery.post(ajax_object.ajax_url, data, function(response) {
			setTimeout(function(){
					window.location.reload(true);
			},500);
		});
	}
	return false;
});

jQuery('.deleteLoanData').click(function () {
  if (confirm('Are you sure?')) {
        var data = {
            type: "POST",
            ID : jQuery(this).attr('data'),
            action: 'btn_ajax_delete_data_pinjaman'
          };
    jQuery.post(ajax_object.ajax_url, data, function(response) {
      if (response) {
        alert('Data berhasil dihapus');
      };
      setTimeout(function(){
          window.location.reload(true);
      },500);
    });
  }
  return false;
});

jQuery('.deleteDataProduct').click(function () {
  if (confirm('Are you sure?')) {
        var data = {
            type: "POST",
            ID : $(this).attr('data'),
            action: 'btn_ajax_delete_data_product'
          };
    jQuery.post(ajax_object.ajax_url, data, function(response) {
      alert('Data berhasil di hapus');
      setTimeout(function(){
          window.location.reload(true);
      },500);
    });
  }
  return false;
});

 //JS for show hide input field kewarganegaraan
    jQuery(document).ready(function(){
    	jQuery('#select_warganegera').change(function(){
    		if (jQuery(this).val() == "wna"){
    			jQuery("#negara_asal").show();
    		}else{
    			jQuery("#negara_asal").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#select_warganegera').val()=='wna') {
        jQuery("#negara_asal").show();  
      };
      }, 100);
      jQuery("#negara_asal").hide();
    });


    //JS for show hide input field agama
    jQuery(document).ready(function(){
    	jQuery('#select_agama').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#agama_lainnya").show();
    		}else{
    			jQuery("#agama_lainnya").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#select_agama').val()=='lainnya') {
        jQuery("#agama_lainnya").show();  
      };
      }, 100);
    	jQuery("#agama_lainnya").hide();
    });

    //JS for show hide input field pekerjaan
    jQuery(document).ready(function(){
    	jQuery('#jenis_pekerjaan').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#jenis_pekerjaan_lainnya").show();
    		}else{
    			jQuery("#jenis_pekerjaan_lainnya").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#jenis_pekerjaan').val()=='lainnya') {
        jQuery("#jenis_pekerjaan_lainnya").show();  
      };
      }, 100);
    	jQuery("#jenis_pekerjaan_lainnya").hide();
    });

    //JS for show hide input field bidang usaha lainnya
    jQuery(document).ready(function(){
      jQuery('#bidang_usaha').change(function(){
        if (jQuery(this).val() == "lainnya"){
          jQuery("#bidang_usaha_lainnya").show();
        }else{
          jQuery("#bidang_usaha_lainnya").hide();
        }
      });
      setTimeout(function() {
      if (jQuery('#bidang_usaha').val()=='lainnya') {
        jQuery("#bidang_usaha_lainnya").show();  
      };
      }, 100);
      jQuery("#bidang_usaha_lainnya").hide();
    });

     //JS for show hide input field penghasilan laiinya
     jQuery(document).ready(function(){
    	jQuery('#select_penghasilan').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#penghasilan_lainnya").show();
    		}else{
    			jQuery("#penghasilan_lainnya").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#select_penghasilan').val()=='lainnya') {
        jQuery("#penghasilan_lainnya").show();  
      };
      }, 100);
    	jQuery("#penghasilan_lainnya").hide();
    });

     //JS for show hide input field hasil tambahan lainnya
     jQuery(document).ready(function(){
    	jQuery('#select_hasil_tambahan').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#hasil_tambahan_lainnya").show();
    		}else{
    			jQuery("#hasil_tambahan_lainnya").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#select_hasil_tambahan').val()=='lainnya') {
        jQuery("#hasil_tambahan_lainnya").show();  
      };
      }, 100);
    	jQuery("#hasil_tambahan_lainnya").hide();
    });

    //JS for show hide input field sumber dana
    jQuery(document).ready(function(){
    	jQuery('#sumber_dana').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#sumber_dana_lainnya").show();
    		}else{
    			jQuery("#sumber_dana_lainnya").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#sumber_dana').val()=='lainnya') {
        jQuery("#sumber_dana_lainnya").show();  
      };
      }, 100);
    	jQuery("#sumber_dana_lainnya").hide();
    });

    //JS for show hide input field sumber dana tambahan
    jQuery(document).ready(function(){
    	jQuery('#sumber_dana_tambahan').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#sumber_dana_tambahan_lainnya").show();
    		}else{
    			jQuery("#sumber_dana_tambahan_lainnya").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#sumber_dana_tambahan').val()=='lainnya') {
        jQuery("#sumber_dana_tambahan_lainnya").show();  
      };
      }, 100);
    	jQuery("#sumber_dana_tambahan_lainnya").hide();
    });

     //JS for show hide input field jenis setoran
    jQuery(document).ready(function(){
    	jQuery('#jenis_setoran').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#jenis_setoran_lainnya").show();
    		}else{
    			jQuery("#jenis_setoran_lainnya").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#jenis_setoran').val()=='lainnya') {
        jQuery("#jenis_setoran_lainnya").show();  
      };
      }, 100);
    	jQuery("#jenis_setoran_lainnya").hide();
    });

     //JS for show hide input field tujuan buka rekening
    jQuery(document).ready(function(){
    	jQuery('#tujuan_buka_rek').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#tujuan_buka_rek_lainnya").show();
    		}else{
    			jQuery("#tujuan_buka_rek_lainnya").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#tujuan_buka_rek').val()=='lainnya') {
        jQuery("#tujuan_buka_rek_lainnya").show();  
      };
      }, 100);
    	jQuery("#tujuan_buka_rek_lainnya").hide();
    });

    //JS for show hide input field cara bayar
    jQuery(document).ready(function(){
    	jQuery('#cara_bayar').change(function(){
    		if (jQuery(this).val() == "pemindahbukuan"){
    			jQuery("#rek_pindah").show();
    		}else{
    			jQuery("#rek_pindah").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#cara_bayar').val()=='pemindahbukuan') {
        jQuery("#rek_pindah").show();  
      };
      }, 100);
    	jQuery("#rek_pindah").hide();
    });

    //JS for show hide input field cara bayar
    jQuery(document).ready(function(){
    	jQuery('#select_penggantian_kartu').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#penggantian_kartu_lainnya").show();
    		}else{
    			jQuery("#penggantian_kartu_lainnya").hide();
    		}
    	});
       setTimeout(function() {
      if (jQuery('#select_penggantian_kartu').val()=='lainnya') {
        jQuery("#penggantian_kartu_lainnya").show();  
      };
      }, 100);
    	jQuery("#penggantian_kartu_lainnya").hide();
    });

     //JS for show hide input field alasan membuka rekening
    jQuery(document).ready(function(){
    	jQuery('#alasan_membuka_rekening_btn').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#alasan_membuka_rekening_lainnya").show();
    		}else{
    			jQuery("#alasan_membuka_rekening_lainnya").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#alasan_membuka_rekening_btn').val()=='lainnya') {
        jQuery("#alasan_membuka_rekening_lainnya").show();  
      };
      }, 100);
    	jQuery("#alasan_membuka_rekening_lainnya").hide();
    });

     //JS for show hide input field jangka waktu
    jQuery(document).ready(function(){
    	jQuery('#jangka_waktu').change(function(){
    		if (jQuery(this).val() == "hari"){
    			jQuery("#jangka_waktu_hari").show();
    		}else{
    			jQuery("#jangka_waktu_hari").hide();
    		}
    	});
      setTimeout(function() {
      if (jQuery('#jangka_waktu').val()=='hari') {
        jQuery("#jangka_waktu_hari").show();  
      };
      }, 100);
    	jQuery("#jangka_waktu_hari").hide();
    });

    jQuery(document).ready(function(){
      jQuery('#bidang_usaha').change(function(){
        if (jQuery(this).val() == "lainnya"){
          jQuery("#bidang_usaha_lainnya").show();
        }else{
          jQuery("#bidang_usaha_lainnya").hide();
        }
      });
      setTimeout(function() {
      if (jQuery('#bidang_usaha').val()=='lainnya') {
        jQuery("#bidang_usaha_lainnya").show();  
      };
      }, 100);
      jQuery("#bidang_usaha_lainnya").hide();
    });

     //tanda pengenal tambahan add class npwp
    jQuery(document).ready(function(e){
      jQuery('#tanda_pengenal_tambahan').change(function(){
        if (jQuery(this).val() == "NPWP"){
          jQuery('#no_tanda_pengenal_tambahan').addClass('npwp');
          jQuery('.npwp').inputmask({"mask": "99.999.999.9-999.999"});
        }else{
          jQuery('#no_tanda_pengenal_tambahan').removeClass('npwp');
          jQuery('#no_tanda_pengenal_tambahan').inputmask('remove');

        }

      });
    });


//add remove row pengurus lembaga
    jQuery(document).ready(function() {
      var max_fields      = 5; //maximum input boxes allowed
      var wrapper         = jQuery(".add_row_pengurus"); //Fields wrapper
      var add_button      = jQuery(".add_button_pengurus"); //Add button ID
      
      var x = 1; //initlal text box count
      jQuery(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              // var h= jQuery('#site').height()+240;
              // jQuery('#site').css('height', h + 'px');
              x++; //text box increment
              jQuery(wrapper).append('<tr>'
                                      +'<td>'
                                        +'<div class="row">'
                                          +'<label  class="col-md-3">'
                                            +'Nama'
                                          +'</label>'
                                          +'<div class="col-md-6">'
                                            +'<input type="text" name="nama_pengurus_1[]" size="15" maxlength="255"  value="" class="formField required">'
                                          +'</div>'
                                        +'</div></br>'
                                        +'<div class="row">'
                                          +'<label  class="col-md-3">'
                                            +'Alamat'
                                          +'</label>'
                                          +'<div class="col-md-9">'
                                            +'<input type="text" size="15" name="alamat_pengurus_1[]" maxlength="255"  value="" class="formField required">'
                                          +'</div>'
                                        +'</div>'
                                      +'</td>'
                                      +'<td><input type="text" size="15" maxlength="255" name="jabatan_pengurus_1[]" value="" class="formField required"></td>'
                                      +'<td>'
                                        +'<div class="row">'
                                          +'<label  class="col-md-4">'
                                            +'No NPWP Pribadi'
                                          +'</label>'
                                          +'<div class="col-md-8">'
                                            +'<input type="text" maxlength="255" size="15" name="npwp_pribadi_1[]" value="" class="formField required number_only">'
                                          +'</div>'
                                        +'</div>'
                                        +'<div class="row">'
                                          +'<label  class="col-md-4">'
                                            +'No KTP'
                                          +'</label>'
                                          +'<div class="col-md-8">'
                                            +'<input type="text" maxlength="255" size="15" name="ktp_pribadi_1[]" value="" class="formField required number_only">'
                                          +'</div>'
                                        +'</div></br>'
                                        +'<div class="row">'
                                          +'<label  class="col-md-4">'
                                            +'Dikeluarkan Di kota'
                                          +'</label>'
                                          +'<div class="col-md-8">'
                                            +'<input type="text" maxlength="255" name="dikeluarkan_ktp_1[]" size="15" value="" class="formField required">'
                                          +'</div>'
                                        +'</div>'
                                        +'<div class="row">'
                                          +'<label  class="col-md-4">'
                                            +'Tanggal Kadaluwarsa'
                                          +'</label>'
                                          +'<div class="col-md-8">'
                                            +'<div id="datetimepicker2" class="input-append date">'
                                              +'<input name="ktp_kadaluwarsa_1[]" size="10" data-format="dd/MM/yyyy" type="text" class="required"></input>'
                                              +'<span class="add-on"><i class="fa fa-calendar"></i></span>'
                                            +'</div>'
                                          +'</div>'
                                        +'</div>'
                                      +'</td>'
                                      +'<td>'
                                          +'<div class="row">'
                                            +'<label  class="col-md-3">'
                                              +'Rumah'
                                            +'</label>'
                                            +'<div class="col-md-9">'
                                              +'<input type="text" maxlength="255" name="tlp_rumah_1[]" size="15" value="" class="formField required number_only">'
                                            +'</div>'
                                          +'</div><br/>'
                                          +'<div class="row">'
                                            +'<label  class="col-md-3">'
                                              +'HP'
                                            +'</label>'
                                            +'<div class="col-md-9">'
                                              +'<input type="text" maxlength="255" name="no_hp_1[]" size="15" value="" class="formField required number_only">'
                                            +'</div>'
                                          +'</div>'
                                      +'</td>'
                                      +'<td><a href="#" class="remove_field_pengurus btn btn-warning">Remove</a></td>'
                                    +'</tr>'
              );
          }
      });
      
      jQuery(wrapper).on("click",".remove_field_pengurus", function(e){ //user click on remove text
        e.preventDefault();
         jQuery(this).closest("tr").remove();
         x--;
          // var h= jQuery('#site').height()-240;
          // jQuery('#site').css('height', h + 'px');
      })
    });

    //addd more and remove field row group usaha
    jQuery(document).ready(function() {
      var max_fields      = 5; //maximum input boxes allowed
      var wrapper         = jQuery(".add_row_group"); //Fields wrapper
      var add_button      = jQuery(".add_button_group"); //Add button ID
      
      var x = 1; //initlal text box count
      jQuery(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
            // var h= jQuery('#site').height()+30;
            // jQuery('#site').css('height', h + 'px');
              x++; //text box increment
              jQuery(wrapper).append('<tr>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" name="nama_lembaga_group1[]" maxlength="255"  value="" class="formField required">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="20" name="alamat_lembaga_group1[]" maxlength="255"  value="" class="formField required">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" name="bidang_usaha_group1[]" maxlength="255"  value="" class="formField required">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" maxlength="255" name="no_telepon_group1[]" value="" class="formField required number_only">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" name="no_npwp_group1[]" maxlength="255"  value="" class="formField required number_only">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td><small><a href="#" class="remove_field_group btn btn-warning">Remove</a></small></td>'
                +'</tr>'
              ); //add input box
          }
      });
      
      jQuery(wrapper).on("click",".remove_field_group", function(e){ //user click on remove text
        e.preventDefault();
         jQuery(this).closest("tr").remove();
         x--;
         // var h= jQuery('#site').height()-30;
         // jQuery('#site').css('height', h + 'px');
      })
    });

    //addd more and remove field row sertififkat deposito
    jQuery(document).ready(function() {
      var max_fields      = 5; //maximum input boxes allowed
      var wrapper         = jQuery(".input_fields_wrap"); //Fields wrapper
      var add_button      = jQuery(".add_field_button"); //Add button ID
      
      var x = 1; //initlal text box count
      jQuery(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              jQuery(wrapper).append('<tr><td><input type="text" maxlength="255" name="denominal[]"  value="" class="form-control required"></td><td><input type="text" maxlength="255" name="lembar[]" value="" class="form-control required"></td><td><a href="#" class="remove_field btn btn-warning">Remove</a></td></tr>'); //add input box
          }
      });
      
      jQuery(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault();
         jQuery(this).closest("tr").remove();
         x--;
      })
    });

      
      //mask npwp
      jQuery(document).ready(function(){
        jQuery('.npwp').inputmask({"mask": "99.999.999.9-999.999"});
      });

      //mask phone
      jQuery(document).ready(function(){
        jQuery('.phone').inputmask("mask", {"mask": "(999) 999-9999"});
      });



      function textonly(e, value){
        var code;
        if (!e) var e = window.event;
        if (e.keyCode) code = e.keyCode;
        else if (e.which) code = e.which;
        var character = String.fromCharCode(code);
            var AllowRegex  = /^[\ba-zA-Z\s-]$/;
            if (AllowRegex.test(character)) return true;     
            return false;
      }

      //allow titik koma
      function textonly2(e, value){
        var code;
        if (!e) var e = window.event;
        if (e.keyCode) code = e.keyCode;
        else if (e.which) code = e.which;
        var character = String.fromCharCode(code);
            var AllowRegex  = /^[\ba-zA-Z\.,\s-]$/;
            if (AllowRegex.test(character)) return true;     
            return false;
      }

      
      jQuery('input[name="nama_lengkap"]').blur(function() {
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_lengkap"]').val('');
              jQuery('input[name="nama_lengkap"]').focus();
              return false;  
            }  

            // cannot have double space 
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }  

            // chars must alphabet
            var AllowRegex  = /^[a-zA-Z\.,\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_lengkap"]').val(valRes);
              jQuery('input[name="nama_lengkap"]').focus();
              alert('Maaf nama hanya boleh diisi huruf, titik dan koma');
              return false;
            }  

            return true;
      });

      
      // blur text only
      jQuery('input[name="nama_lengkap_tanpa_gelar"]').blur(function() {
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_lengkap_tanpa_gelar"]').val('');
              jQuery('input[name="nama_lengkap_tanpa_gelar"]').focus();
              return false;
            }  

            // cannot have double space 
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }  

            // chars must alphabet
            var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_lengkap_tanpa_gelar"]').val(valRes);
              jQuery('input[name="nama_lengkap_tanpa_gelar"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }  

            return true;
      });

      
      //blur text only ibu gadis
      jQuery('input[name="nama_gadis_ibu_kandung"]').blur(function(){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_gadis_ibu_kandung"]').val('');
              jQuery('input[name="nama_gadis_ibu_kandung"]').focus();
              return false;  
            }  

            // cannot have double space 
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }  

            // chars must alphabet
            var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_gadis_ibu_kandung"]').val(valRes);
              jQuery('input[name="nama_gadis_ibu_kandung"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }  

            return true;
      });
      

      //input validate relasi 
      jQuery('input[name="nama_lengkap_relasi"]').blur(function() {
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_lengkap_relasi"]').val('');
              jQuery('input[name="nama_lengkap_relasi"]').focus();
              return false;
            }

            // cannot have double space 
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_lengkap_relasi"]').val(valRes);
              jQuery('input[name="nama_lengkap_relasi"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }  

            return true;
      });
      
      //validate nama lengkap nasabah
      jQuery('input[name="nama_lengkap_nasabah"]').blur(function() {
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_lengkap_nasabah"]').val('');
              jQuery('input[name="nama_lengkap_nasabah"]').focus();
              return false;
            }  

            // cannot have double space 
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }  

            // chars must alphabet
            var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_lengkap_nasabah"]').val(valRes);
              jQuery('input[name="nama_lengkap_nasabah"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }  

            return true;
      });

      

      //name kartu validate
      jQuery('input[name="nama_pada_kartu"]').blur(function(){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_pada_kartu"]').val('');
              jQuery('input[name="nama_pada_kartu"]').focus();
              return false;
            }

            // cannot have double space 
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_pada_kartu"]').val(valRes);
              jQuery('input[name="nama_pada_kartu"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }

            return true;
      });

      //validate nama lengkap aplikasi
      jQuery('input[name="nama_lengkap_aplikasi"]').blur(function(){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_lengkap_aplikasi"]').val('');
              jQuery('input[name="nama_lengkap_aplikasi"]').focus();
              return false;
            
            }

            // cannot have double space 
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }  

            // chars must alphabet
            var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_lengkap_aplikasi"]').val(valRes);
              jQuery('input[name="nama_lengkap_aplikasi"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }  

            return true;
      });

      //validate name ibu on kartu atm
      jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').blur(function() {
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').val('');
              jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').focus();
              return false;
            
            }  

            // cannot have double space 
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').val(valRes);
              jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }

            return true;
      });      

      jQuery("#jumlah_nominal_deposito").change(function() {
        var nilai = jQuery(this).val();
        value = nilai.split(",");
          
        var val1 = value[0].replace(/\./g,'');
        var res_nilai1 = terbilang(val1);
        var res_terbilang = res_nilai1+' Rupiah';

        //if decimal true  
        if (value.length == 2) {
          var val2 = value[1];  
          var res_dec = terbilang(val2);
          var res_terbilang = res_nilai1+'koma'+res_dec+'Rupiah';
        }

        if (res_nilai1 == 'notvalid') {
          alert('Maaf nominal yang dimasukan diluar batas');
          jQuery('textarea[name="terbilang"]').val('');
          jQuery('input[name="jumlah_nominal_deposito"]').val('');
          jQuery(this).focus();
        } else {
          jQuery('textarea[name="terbilang"]').val(res_terbilang);
        }
      });

      //fugnsi terbilang
    function terbilang(bilangan) {
      
      bilangan    = String(bilangan);
      var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
      var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
      var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');

      var panjang_bilangan = bilangan.length;

      /* pengujian panjang bilangan */
      if (panjang_bilangan > 15) {
        kaLimat = "notvalid";
        return kaLimat;
      }

      /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
      for (i = 1; i <= panjang_bilangan; i++) {
        angka[i] = bilangan.substr(-(i),1);
      }

      i = 1;
      j = 0;
      kaLimat = "";

      /* mulai proses iterasi terhadap array angka */
      while (i <= panjang_bilangan) {

        subkaLimat = "";
        kata1 = "";
        kata2 = "";
        kata3 = "";

        /* untuk Ratusan */
        if (angka[i+2] != "0") {
          if (angka[i+2] == "1") {
            kata1 = "Seratus";
          } else {
            kata1 = kata[angka[i+2]] + " Ratus";
          }
        }

        /* untuk Puluhan atau Belasan */
        if (angka[i+1] != "0") {
          if (angka[i+1] == "1") {
            if (angka[i] == "0") {
              kata2 = "Sepuluh";
            } else if (angka[i] == "1") {
              kata2 = "Sebelas";
            } else {
              kata2 = kata[angka[i]] + " Belas";
            }
          } else {
            kata2 = kata[angka[i+1]] + " Puluh";
          }
        }

        /* untuk Satuan */
        if (angka[i] != "0") {
          if (angka[i+1] != "1") {
            kata3 = kata[angka[i]];
          }
        }

        /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
        if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
          subkaLimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
        }

        /* gabungkan variabe sub kaLimat (untuk Satu blok 3 angka) ke variabel kaLimat */
        kaLimat = subkaLimat + kaLimat;
        i = i + 3;
        j = j + 1;

      }

      /* mengganti Satu Ribu jadi Seribu jika diperlukan */
      if ((angka[5] == "0") && (angka[6] == "0")) {
        kaLimat = kaLimat.replace("Satu Ribu","Seribu");
      }

      return kaLimat;
    }

    //number only
    jQuery(".number_only").die('keydown').live('keydown',function(event) {
          // Allow: backspace, delete, tab, escape, and enter
          if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
              // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) ||
              // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
              // let it happen, don't do anything
              return;
          } else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105  )) {
              event.preventDefault();
            }
          }
        });

        jQuery(".number_npwp").die('keydown').live('keydown',function(event) {
          // Allow: backspace, delete, tab, escape, and enter
          if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || event.keyCode == 189  || event.keyCode == 190 ||
              // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) ||
              // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
              // let it happen, don't do anything
              return;
          } else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105  )) {
              event.preventDefault();
            }
          }
        });

});


function nameValidateAtm(e, value){
        
    var code;
    if (!e) var e = window.event;
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;
    var firstChar = String(value).charAt(0);
    var AllowRegexFirst  = /^[a-zA-Z]$/;
      // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
      if (value.length !=0 && value.length <= 2 && !AllowRegexFirst.test(firstChar)) {
        alert('Maaf digit pertama hanya boleh diisi huruf');
        jQuery('input[name="nama_lengkap_aplikasi"]').val('');
        return false;  
      
      }  

      // cannot have double space 
      if (value[value.length - 1] == ' ' && e.keyCode == 32) {
        return false;
      }  

      // chars must alphabet
      var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
      if (value.length != 0 && !AllowRegex.test(value)) {
        alert('Maaf nama hanya boleh diisi huruf');
        var valRes = value.replace(String(value).charAt(value.length-1),'');
        jQuery('input[name="nama_lengkap_aplikasi"]').val(valRes);
        return false;
      }

      return true;

}

function nameValidateIbuAtm(e, value){
  
    var code;
    if (!e) var e = window.event;
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;
    var firstChar = String(value).charAt(0);
    var AllowRegexFirst  = /^[a-zA-Z]$/;
      // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
      if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
        alert('Maaf digit pertama hanya boleh diisi huruf');
        jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').val('');
        return false;
      }  

      // cannot have double space 
      if (value[value.length - 1] == ' ' && e.keyCode == 32) {
        return false;
      }  

      // chars must alphabet
      var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
      if (value.length != 0 && !AllowRegex.test(value)) {
        alert('Maaf nama hanya boleh diisi huruf');
        var valRes = value.replace(String(value).charAt(value.length-1),'');
        jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').val(valRes);
        return false;
      }

      return true;

}

function nameKartuVlidate(e, value){
  
    var code;
    if (!e) var e = window.event;
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;
    var firstChar = String(value).charAt(0);
    var AllowRegexFirst  = /^[a-zA-Z]$/;
      // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
      if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
        alert('Maaf digit pertama hanya boleh diisi huruf');
        jQuery('input[name="nama_pada_kartu"]').val('');
        return false;
      }

      // cannot have double space 
      if (value[value.length - 1] == ' ' && e.keyCode == 32) {
        return false;
      }

      // chars must alphabet
      var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
      if (value.length != 0 && !AllowRegex.test(value)) {
        alert('Maaf nama hanya boleh diisi huruf');
        var valRes = value.replace(String(value).charAt(value.length-1),'');
        jQuery('input[name="nama_pada_kartu"]').val(valRes);
        return false;
      }

      return true;

}

function nameAppValidate(e, value){
        
    var code;
    if (!e) var e = window.event;
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;
    var firstChar = String(value).charAt(0);
    var AllowRegexFirst  = /^[a-zA-Z]$/;
      // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
      if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
        alert('Maaf digit pertama hanya boleh diisi huruf');
        jQuery('input[name="nama_lengkap_nasabah"]').val('');
        return false;
      }

      // cannot have double space 
      if (value[value.length - 1] == ' ' && e.keyCode == 32) {
        return false;
      }

      // chars must alphabet
      var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
      if (value.length != 0 && !AllowRegex.test(value)) {
        alert('Maaf nama hanya boleh diisi huruf');
        var valRes = value.replace(String(value).charAt(value.length-1),'');
        jQuery('input[name="nama_lengkap_nasabah"]').val(valRes);
        return false;
      }

      return true;

}

//text only
function namaRelasi(e, value) {
  
    var code;
    if (!e) var e = window.event;
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;
    var firstChar = String(value).charAt(0);
    var AllowRegexFirst  = /^[a-zA-Z]$/;
      // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
      if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
        alert('Maaf digit pertama hanya boleh diisi huruf');
        jQuery('input[name="nama_lengkap_relasi"]').val('');
        return false;
      }  

      // cannot have double space 
      if (value[value.length - 1] == ' ' && e.keyCode == 32) {
        return false;
      }

      // chars must alphabet
      var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
      if (value.length != 0 && !AllowRegex.test(value)) {
        alert('Maaf nama hanya boleh diisi huruf');
        var valRes = value.replace(String(value).charAt(value.length-1),'');
        jQuery('input[name="nama_lengkap_relasi"]').val(valRes);
        return false;
      }

      return true;

}

//text only
function nameGadisIbu(e, value) {
  
    var code;
    if (!e) var e = window.event;
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;
    var firstChar = String(value).charAt(0);
    var AllowRegexFirst  = /^[a-zA-Z]$/;
      // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
      if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
        alert('Maaf digit pertama hanya boleh diisi huruf');
        jQuery('input[name="nama_gadis_ibu_kandung"]').val('');
        return false;
      }  

      // cannot have double space 
      if (value[value.length - 1] == ' ' && e.keyCode == 32) {
        return false;
      }  

      // chars must alphabet
      var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
      if (value.length != 0 && !AllowRegex.test(value)) {
        alert('Maaf nama hanya boleh diisi huruf');
        var valRes = value.replace(String(value).charAt(value.length-1),'');
        jQuery('input[name="nama_gadis_ibu_kandung"]').val(valRes);
        return false;
      }  

      return true;

}

function nameValidation(e, value) {
        
    var code;
    if (!e) var e = window.event;
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;
    var firstChar = String(value).charAt(0);
    var AllowRegexFirst  = /^[a-zA-Z]$/;
      // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
      if (value.length !=0 &&  !AllowRegexFirst.test(firstChar)) {
        alert('Maaf digit pertama hanya boleh diisi huruf');
        jQuery('input[name="nama_lengkap_tanpa_gelar"]').val('');
        return false;
      }  

      // cannot have double space 
      if (value[value.length - 1] == ' ' && e.keyCode == 32) {
        return false;
      }  

      // chars must alphabet
      var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
      if (value.length != 0 && !AllowRegex.test(value)) {
        alert('Maaf nama hanya boleh diisi huruf');
        var valRes = value.replace(String(value).charAt(value.length-1),'');
        jQuery('input[name="nama_lengkap_tanpa_gelar"]').val(valRes);
        return false;
      }  

      return true;

}

function nameValidationIdentitas(e, value){
        
    var code;
    if (!e) var e = window.event;
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;
    var firstChar = String(value).charAt(0);
    var AllowRegexFirst  = /^[a-zA-Z]$/;
      // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
      if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
        alert('Maaf digit pertama hanya boleh diisi huruf');
        jQuery('input[name="nama_lengkap"]').val('');
        return false;
      }

      // cannot have double space 
      if (value[value.length - 1] == ' ' && e.keyCode == 32) {
        return false;
      }

      // chars must alphabet
      var AllowRegex  = /^[a-zA-Z\.,\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
      if (value.length != 0 && !AllowRegex.test(value)) {
        var valRes = value.replace(String(value).charAt(value.length-1),'');
        jQuery('input[name="nama_lengkap"]').val(valRes);
        alert('Maaf nama hanya boleh diisi huruf, titik dan koma');
        return false;
      }

      return true;

}

