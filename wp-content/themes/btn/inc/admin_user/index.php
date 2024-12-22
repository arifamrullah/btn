<?php 
	global $wpdb;
	$reg_sql = "SELECT * FROM btn_cif_relation";
	$items = $wpdb->get_results( $reg_sql, OBJECT );
?>

<style media="screen">
	tr.odd {
		background-color: #EAF2FF;
	}
</style>

<section id="form-pendaftaran">
    <div class="container">
        <div class="row">
    			<?php if(!empty($items)): ?>
    				<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_2">
							<thead>
								<tr>
									<?php foreach( $cif['Head'] as $item ): ?>
										<th scope="col" id="author" class="manage-column" ><?php echo ucwords(str_replace('_', ' ', alias($item))) ?></th>
									<?php endforeach ?>
									<th scope="col" id="author" class="manage-column">Action</th>
									<th scope="col" id="author" class="manage-column">Action</th>
								</tr>
							</thead>
							<tbody id="the-list">
								<?php foreach($items as $item): ?>
									<?php
										$items_clone = $item;
										if ( $item->jenis_cif == 'perorangan' ) {
											$reg_sql2 = "SELECT btn_cif_relation.*,btn_data_pribadi.nama_sesuai_identitas as nama FROM btn_cif_relation INNER JOIN btn_data_pribadi ON btn_cif_relation.id_data_pribadi =  btn_data_pribadi.id WHERE btn_cif_relation.id=".$items_clone->id;
											$items_clone = $wpdb->get_row( $reg_sql2 );
										} else if ( $item->jenis_cif == 'perorangan' ) {
											$reg_sql2 = "SELECT * FROM btn_cif_relation INNER JOIN";
											$items_clone = $wpdb->get_row( $reg_sql2 );
										}										
									?>
									<tr>
										<?php foreach( $cif['Head'] as $item2_k => $item2 ): ?>
											<td><?php echo @alias($items_clone->$item2_k) ?></td>
										<?php endforeach ?>
										<td>
											<a href="?page=registerdata&typeo=data_pribadi&edit=<?php echo $items_clone->id_data_pribadi ?>">Edit Data Pribadi</a> | 
											<a href="?page=registerdata&typeo=data_lembaga&edit=<?php echo $items_clone->id_data_lembaga ?>">Edit Data Lembaga</a> | 
											<a href="?page=registerdata&typeo=form_simpanan&edit=<?php echo $items_clone->id_form_simpanan ?>">Edit Form Simpanan </a> | 
											<a href="?page=registerdata&typeo=form_atm_sms&edit=<?php echo $items_clone->id_form_atm_sms ?>">Edit Form ATM </a>				
										</td>
										<td><a href="?page=registerdata&typeo=view&edit=<?php echo $items_clone->id ?>">Lihat </a> | 
										<a href="javascript:void(0)" class="deleteDataCif" data="<?php echo $items_clone->id ?>">Hapus </a></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					<?php else: ?>
						<h3>Maaf Data Masih Kosong</h3>
					<?php endif ?>
				</div>
		</div>
</section>