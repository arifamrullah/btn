<?php 

 ?>
<?php require(get_template_directory()."/inc/defined.php"); ?>


<?php 
if(!empty($_GET['typeo'])){
	switch($_GET['typeo']){
		case 'data_pribadi':
			require(get_template_directory().'/inc/admin_cif_perorangan_edit.php');		
		break;
		case 'data_lembaga':
			require(get_template_directory().'/inc/admin_cif_lembaga_edit.php');
		break;
		case 'form_simpanan':
			require(get_template_directory().'/inc/admin_form_pembukaan_rekening_edit.php');
		break;
		case 'form_atm_sms':
			require(get_template_directory().'/inc/admin_form_atm_sms_edit.php');
		break;
		case 'print':
			require(get_template_directory().'/inc/admin_user/print.php');		
		break;
		
		case 'view':
			?>
	<div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
						<div class="wrap">
							<h2 style="margin-bottom: 10px;">Data Permohonan Pembukaan Rekening</h2>
						</div>
        </div>
	<?php
			require(get_template_directory()."/inc/admin_user/view.php");		
		break;
		case 'delete':

		break;
	}
}else{
	?>
	<div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
						<div class="wrap">
							<h2 style="margin-bottom: 10px;">Data Permohonan Pembukaan Rekening</h2>
						</div>
        </div>
	<?php
	require(get_template_directory()."/inc/admin_user/index.php");
}
