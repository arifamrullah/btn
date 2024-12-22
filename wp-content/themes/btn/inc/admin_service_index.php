<?php require( get_template_directory() . "/inc/defined.php" ); ?>
<?php
	if ( ! empty ( $_GET['typeo'] ) ) {
		switch( $_GET['typeo'] ) {
			case 'edit':
				require( get_template_directory() . '/inc/admin_service/edit.php' );
			break;
			case 'view': ?>
				<div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
						<div class="wrap">
							<h2 style="margin-bottom: 10px;">Data Web Service</h2>
						</div>
        </div>
			<?php require( get_template_directory() . "/inc/admin_service/view.php" );		
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
					<h2 style="margin-bottom: 10px;">Data Web Service</h2>
				</div>
    </div>
		<?php require( get_template_directory() . "/inc/admin_service/index.php" );
	}