<?php require(get_template_directory()."/inc/defined.php"); ?>


<?php 
if(!empty($_GET['typeo'])){
	switch($_GET['typeo']){
		case 'edit_product':
			require(get_template_directory().'/inc/admin_product/edit.php');
		break;

		case 'add_new':
			require(get_template_directory().'/inc/admin_product/add.php');
		break;
		
		case 'view_product':
			?>
	<div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
						<div class="wrap">
							<h2 style="margin-bottom: 10px;">Data Permohonan Pembuatan Kartu ATM & SMS</h2>
						</div>
        </div>
	<?php
			require(get_template_directory()."/inc/admin_product/view.php");		
		break;
		
	}
}else{
	?>
	<div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
						<div class="wrap">
							<h2 style="margin-bottom: 10px;">Data Product</h2>
						</div>
        </div>
	<?php
	require(get_template_directory()."/inc/admin_product/index.php");
}
