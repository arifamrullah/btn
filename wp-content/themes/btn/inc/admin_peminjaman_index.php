
<?php 
if(!empty($_GET['typeo'])){
	switch($_GET['typeo']){
		case "edit":
			require(get_template_directory()."/inc/admin_loan/edit.php");
		break;
		
		case 'view':
			?>
	<div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
						<div class="wrap">
							<h2 style="margin-bottom: 10px;">Data Permohonan Pengajuan Pinjaman & Kredit</h2>
						</div>
        </div>
	<?php
			require(get_template_directory()."/inc/admin_loan/view.php");		
		break;
	}
}else{
	?>
	<div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
						<div class="wrap">
							<h2 style="margin-bottom: 10px;">Data Permohonan Pinjaman dan Kredit</h2>
						</div>
        </div>
	<?php
	require(get_template_directory()."/inc/admin_loan/index.php");
}
