<?php 
global $wpdb;
$reg_sql = "SELECT * FROM btn_product ";
$items = $wpdb->get_results($reg_sql,OBJECT);

?>
<style media="screen">
tr.odd {
	background-color: #EAF2FF;
}
</style>

<section id="form-pendaftaran">
    <div class="container">
        <a href="?page=product&typeo=add_new" class="button">Tambah Data Baru</a></br></br>
        <div class="row">
    <?php if(!empty($items)): ?>
    				<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_2">
							<thead>
								<tr>
									<th scope="col" id="author" class="manage-column" >ID</th>
									<th scope="col" id="author" class="manage-column" >NAMA</th>
									<th scope="col" id="author" class="manage-column" >CIF</th>
									<th scope="col" id="author" class="manage-column">ATM SMS</th>
									<th scope="col" id="author" class="manage-column">TYPE</th>
									<th scope="col" id="author" class="manage-column">USIA MIN</th>
									<th scope="col" id="author" class="manage-column">USIA MAX</th>
									<th scope="col" id="author" class="manage-column">SLUG</th>
									<th scope="col" id="author" class="manage-column">CATEGORY</th>
									<!-- <th scope="col" id="author" class="manage-column">STATUS</th> -->
									<th scope="col" id="author" class="manage-column">ACTION</th>
								</tr>
							</thead>
							<tbody id="the-list">
								<?php foreach($items as $item): ?>
									<tr>
											<td><?php echo @$item->ID_PRODUCT?></td>
											<td><?php echo @$item->NAME?></td>
											<td><?php echo (@$item->CIF ==1)?'YES':'NO'?></td>
											<td><?php echo (@$item->ATM_SMS ==1)?'YES':'NO'?></td>
											<td><?php echo (@$item->TYPE ==1)?'Perorangan':'Perorangan/Lembaga'?></td>
											<td><?php echo @$item->USIA_MINIMAL?></td>
											<td><?php echo @$item->USIA_MAXIMAL?></td>
											<td><?php echo @$item->SLUG?></td>
											<!-- <td><?php echo @$item->STATUS?></td> -->
											<td><?php echo @$item->CATEGORY?></td>
											<td>
												<a href="?page=product&typeo=edit_product&id=<?php echo $item->ID_PRODUCT ?>">Edit</a> |	 
												<a href="#" class="deleteDataProduct" data="<?php echo $item->ID_PRODUCT ?>">Hapus </a>
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
