<style media="screen">
tr.odd {
	background-color: #EAF2FF;
}
</style>

<section id="form-pendaftaran">
    <div class="container">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
						<div class="wrap">
							<h2 style="margin-bottom: 10px;">Data Permohonan Pengajuan Pinjaman</h2>
						</div>
        </div>
        <div class="row">

						<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_2">
							<thead>
								<tr>
									<th scope="col" id="author" class="manage-column" >ID</th>
									<th scope="col" id="author" class="manage-column" >Nama</th>
									<th scope="col" id="author" class="manage-column" >Alamat</th>
									<th scope="col" id="author" class="manage-column" >Phone</th>
									<th scope="col" id="author" class="manage-column" >Pendapatan perbulan</th>
									<th scope="col" id="author" class="manage-column" >Pengeluaran perbulan</th>
									<th scope="col" id="author" class="manage-column" >Jumlah pinjaman</th>
									<th scope="col" id="author" class="manage-column" >Uang muka</th>
									<th scope="col" id="author" class="manage-column" >Lama pinjaman</th>
									<th scope="col" id="author" class="manage-column" >Angsuran</th>
									<th scope="col" id="author" class="manage-column" >Action</th>
								</tr>
							</thead>

							<tbody id="the-list">
								<?php
									$variable= btn_get_all_loan_application();
									foreach ($variable as $value) {
								?>
						  		<tr  class="ype-post status-publish format-standard hentry category-trip-options alternate iedit author-self" valign="top">
						  			<td><?php echo $value->LID ?></td>
						  			<td><?php echo $value->NAME ?></td>
						  			<td><?php echo $value->ADDRESS ?></td>
						  			<td><?php echo $value->PHONE ?></td>
						  			<td><?php echo $value->MONTHLY_INCOME;?></td>
						  			<td><?php echo $value->MONTHLY_FIXED_EXPENSES; ?></td>
						  			<td><?php echo $value->LOAN_AMOUNT	; ?></td>
						  			<td><?php echo $value->DEPOSIT	; ?></td>
						  			<td><?php echo $value->LOAN_TENURE	; ?></td>
						  			<td><?php echo $value->INSTALLMENT	; ?></td>
						  			<td class="center">
						          <span class="trash"><a class="button button-primary button-small" id="deleteLoan" title="Delete" data="<?php echo $value->ID ?>" href="javascript:void(0)">Delete</a> </span>
						        </td>
						  		</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
		</div>
</section>
