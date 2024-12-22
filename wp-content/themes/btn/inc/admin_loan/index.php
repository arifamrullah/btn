<?php 
global $wpdb;
$reg_sql = "SELECT * FROM btn_pinjaman";
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
							<?php foreach ($items as $item) { ?>
									<tr>
										<td><?php echo @$item->id_reg?></td>
										<td><?php echo @$item->nama_lengkap?></td>
										<td>
											<a href="?page=pinjaman&typeo=edit&edit=<?php echo $item->id ?>">Edit</a> |								
											<a href="?page=pinjaman&typeo=view&edit=<?php echo $item->id ?>">Lihat </a> | 
											<a href="#" class="deleteLoanData" data="<?php echo $item->id ?>">Hapus </a>
										</td>
									</tr>
							<?php } ?>
								
							</tbody>
						</table>
			<?php else: ?>
				<h3>Maaf Data Masih Kosong</h3>
			<?php endif ?>
					</div>

		</div>
</section>
