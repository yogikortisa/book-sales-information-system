<!doctype html>
<html>
	<head>
		<title>Admin Page | View All buku</title>
		<!-- Load JQuery dari CDN -->
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/js/jquery-1.10.2.min.js"></script>
		
		<!-- Load DataTables dan Bootstrap dari CDN -->
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.min.css">
	</head>
	<body>
		<?php $this->load->view('backend/admin_menu')?>
		<!-- dalam div row harus ada col yang maksimum nilainya 12 -->
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
			
				<table id="myTable" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>No. ISBN</th>
							<th>Penulis</th>
							<th>Penerbit</th>
							<th>Tahun</th>
							<th>Stok</th>
							<th>Harga Pokok</th>
							<th>Harga Jual</th>
							<th>PPN(%)</th>
							<th>Diskon(%)</th>
							<th>Gambar</th>
							<th>
								<?=anchor(	'admin/buku/create',
											'Tambah Buku', 
											['class'=>'btn btn-primary btn-sm'])
								?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($bukus as $buku) : ?>
						<tr>
							<td><?=$buku->id_buku?></td>
							<td><?=$buku->judul?></td>
							<td><?=$buku->noisbn?></td>
							<td><?=$buku->penulis?></td>
							<td><?=$buku->penerbit?></td>
							<td><?=$buku->tahun?></td>
							<td><?=$buku->stok?></td>
							<td><?=$buku->harga_pokok?></td>
							<td><?=$buku->harga_jual?></td>
							<td><?=$buku->ppn?></td>
							<td><?=$buku->diskon?></td>
							<td><?php
								$buku_image = [	'src'	=> 'uploads/' . $buku->image,
													'height'	=> '50'
													];
								echo img($buku_image)
							?></td>
							<td>
								<?=anchor(	'admin/buku/update/' . $buku->id_buku, 
											'Edit',
											['class'=>'btn btn-default btn-sm'])
								?> 
								<?=anchor(	'admin/buku/delete/' . $buku->id_buku, 
											'Delete',
											['class'=>'btn btn-danger btn-sm',
											 'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'
											])
								?> 
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-1"></div>
		</div>
		
		
		<script>
			$(document).ready(function(){
				$('#myTable').DataTable();
			});
		</script>
	</body>
</html>