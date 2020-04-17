<!doctype html>
<html>
	<head>
		<title>Admin Page | Tampil Distributor</title>
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
							<th>Nama Distributor</th>
							<th>Alamat</th>
							<th>Telepon</th>
							<th>
								<?=anchor(	'admin/distributor/create',
											'Tambah Buku', 
											['class'=>'btn btn-primary btn-sm'])
								?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($distributors as $distributor) : ?>
						<tr>
							<td><?=$distributor->id_distributor?></td>
							<td><?=$distributor->nama_distributor?></td>
							<td><?=$distributor->alamat?></td>
							<td><?=$distributor->telepon?></td>
							<td>
								<?=anchor(	'admin/distributor/update/' . $distributor->id_distributor, 
											'Edit',
											['class'=>'btn btn-default btn-sm'])
								?> 
								<?=anchor(	'admin/distributor/delete/' . $distributor->id_distributor, 
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