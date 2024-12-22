<?php require(get_template_directory()."/inc/defined.php"); ?>
<?php
	if ( ! empty ( $_GET['typeo'] ) ) {
		switch( $_GET['typeo'] ) {
			case 'form_atm_sms':
				require( get_template_directory().'/inc/admin_atm_sms_only_edit.php' );
			break;
			case 'view': ?>
				<div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
						<div class="wrap">
							<h2 style="margin-bottom: 10px;">Data Permohonan Pembuatan Kartu ATM & SMS</h2>
						</div>
        </div>
		<?php
				require(get_template_directory()."/inc/admin_atm_sms/view.php");		
			break;
			case 'delete':

			break;
		}
	} else { ?>
		<div class="headline">
	            <div class="icon-form">
	                <i class="fa fa-file-text-o"></i>
	            </div>
							<div class="wrap">
								<h2 style="margin-bottom: 10px;">Data Permohonan Pembuatan Kartu ATM & SMS</h2>
							</div>
	        </div>
		<?php
		require(get_template_directory()."/inc/admin_atm_sms/index.php");
	}