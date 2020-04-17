<!doctype html>
<html>
	<head>
		<title>Admin Page | Tambah Buku Baru</title>
		<!-- Load JQuery dari CDN -->
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/js/jquery-1.10.2.min.js"></script>
		
		<!-- Load DataTables dan Bootstrap dari CDN -->
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.min.css">
	</head>
	<body>
		<!-- dalam div row harus ada col yang maksimum nilainya 12 -->
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<h1>Tambah Buku</h1>
				<div><?= validation_errors() ?></div>
				<?= form_open_multipart('admin/kasir/create', ['class'=>'form-horizontal']) ?>
					
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="nama" placeholder="" value="<?= set_value('nama') ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-10">
						  <textarea class="form-control" name="alamat"><?= set_value('alamat') ?></textarea>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Telepon</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="telepon" placeholder="" value="<?= set_value('telepon') ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-10">
						 <select class="form-control" name="status">
		                  <option value="">Pilih Status</option>
		                    <option value="1">Active</option>
		                    <option value="0">Block</option>
		                  </select>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="username" placeholder="" value="<?= set_value('username') ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="password" placeholder="" value="<?= set_value('password') ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Hak Akses</label>
						<div class="col-sm-10">
						 <select class="form-control" name="akses">
		                  <option value="">Pilih Akses</option>
		                    <option value="1">Admin</option>
		                    <option value="2">Kasir</option>
		                    <option value="3">Manager</option>
		                  </select>
						</div>
					  </div>
					  
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-default">Save</button>
						</div>
					  </div>
					
				<?= form_close() ?>
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