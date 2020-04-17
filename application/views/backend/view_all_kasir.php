<!doctype html>
<html>
	<head>
		<title>Admin Page | Tampil Kasir</title>
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
							<th>Nama</th>
							<th>Alamat</th>
							<th>Telepon</th>
							<th>Status</th>
							<th>Username</th>
							<th>Password</th>
							<th>Hak Akses</th>
							<th>
								<?=anchor(	'admin/kasir/create',
											'Tambah Buku', 
											['class'=>'btn btn-primary btn-sm'])
								?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($kasirs as $kasir) : ?>
						<tr>
							<td><?=$kasir->id_kasir?></td>
							<td><?=$kasir->nama?></td>
							<td><?=$kasir->alamat?></td>
							<td><?=$kasir->telepon?></td>
							<?php if($kasir->status ==1){ ?>
							<td>Active</td>
							<?php }else{ ?>
							<td>Block</td>
							<?php } ?>
							<td><?=$kasir->username?></td>
							<td><?=$kasir->password?></td>
							<?php if($kasir->akses==1){ ?>
							<td>Admin</td>
							<?php }elseif($kasir->akses==2){ ?>
							<td>Operator</td>
							<?php }else{ ?>
							<td>Manager</td>
							<?php } ?>
							<td>
								<?=anchor(	'admin/kasir/update/' . $kasir->id_kasir, 
											'Edit',
											['class'=>'btn btn-default btn-sm'])
								?> 
								<?=anchor(	'admin/kasir/delete/' . $kasir->id_kasir, 
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