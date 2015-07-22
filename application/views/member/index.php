<div class="col-lg-12">
	<?php echo $this->session->flashdata('notice')?>
	<div class="alert alert-info">
		<b>INFO</b>- Jika ingin melakukan pencarian, silahkan masukan Judul book kemudian klik tombol cari.<br>
	</div>
	<div class="pull-right">
		<?php echo anchor('member/new_form', '<span class="glyphicon glyphicon-plus"></span> Member Baru', 'class="btn btn-primary"') ?>
	</div>
	<form method="post" class="form-inline">
		<div class="form-group">
			<input type="text" name="term" class="form-control" placeholder="Masukan no anggota, nama atau alamat" required="required">
		</div>
		<button type="submit" class="btn">
			<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		</button>
	</form>
	<table class="table table-bordered table table-striped">
		<tr>
			<th>No. Anggota</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>No Telp</th>
			<th></th>
		</tr>
		<?php  foreach ($list_members as $row) : ?>
		<tr>
			<td><?php echo $row->KODE_USER; ?></td>
			<td><?php echo $row->NAMA; ?></td>
			<td><?php echo $row->ALAMAT; ?></td>
			<td><?php echo $row->NO_TELEPON; ?></td>
			<td>
				<?php echo anchor('member/form_edit/'. $row->ID, 'Edit') ?> |
				<?php echo anchor('member/remove'. $row->ID, 'Hapus') ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>


