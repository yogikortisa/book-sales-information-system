<!doctype html>
<html>
	<head>
		<title>Admin Page | Tampil Pasok</title>
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
							<th>ID Distributor</th>
							<th>ID Buku</th>
							<th>Jumlah</th>
							<th>Tanggal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($pasoks as $pasok) : ?>
						<tr>
							<td><?=$pasok->id_pasok?></td>
							<td><?=$pasok->nama_distributor?></td>
							<td><?=$pasok->judul?></td>
							<td><?=$pasok->jumlah?></td>
							<td><?=$pasok->tanggal?></td>
							<td>
								<?=anchor(	'admin/pasok/create/' . $pasok->id_pasok, 
											'Tambah',
											['class'=>'btn btn-default btn-sm'])
								?> 
								<?=anchor(	'admin/pasok/delete/' . $pasok->id_pasok, 
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