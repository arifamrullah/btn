<?php 
global $wpdb;
$reg_sql = "SELECT * FROM btn_cif_relation
					WHERE id_data_pribadi=0
					AND id_data_lembaga=0
					AND id_form_simpanan=0";
$items = $wpdb->get_results($reg_sql,OBJECT);

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

									<th scope="col" id="author" class="manage-column" >Reg ID</th>
									<th scope="col" id="author" class="manage-column" >Nama</th>
									<th scope="col" id="author" class="manage-column">Action</th>
								</tr>
							</thead>

							<tbody id="the-list">
								<?php foreach($items as $item): ?>
									<?php
										$items_clone = $item;

										$reg_sql2 = "SELECT * FROM btn_form_atm_sms WHERE id=".$items_clone->id_form_atm_sms;
										$items_2 = $wpdb->get_results($reg_sql2,OBJECT);

									?>
									<tr>
										<?php foreach($items_2 as $item_2): ?>
											<td><?php echo @$items_clone->reg_id?></td>
											<td><?php echo @$item_2->nama_lengkap?></td>
										<?php endforeach ?>
										<td>
											<a href="?page=atmSms&typeo=form_atm_sms&edit=<?php echo $items_clone->id_form_atm_sms ?>">Edit</a> |								
											<a href="?page=atmSms&typeo=view&edit=<?php echo $items_clone->id ?>">Lihat </a> | 
											<a href="#" class="deleteDataCif" data="<?php echo $items_clone->id ?>">Hapus </a>
										</td>
										
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
