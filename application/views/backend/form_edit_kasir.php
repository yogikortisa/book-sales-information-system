<?php
	$id 			= $kasir->id_kasir;
if($this->input->post('is_submitted')){
	$nama			= set_value('nama');
	$alamat			= set_value('alamat');
	$telepon		= set_value('telepon');
	$status			= set_value('status');
	$username		= set_value('username');
	$password		= set_value('password');
	$akses	= set_value('harga_pokok');
} else {
	$nama			= $kasir->nama;
	$alamat			= $kasir->alamat;
	$telepon		= $kasir->telepon;
	$status			= $kasir->status;
	$username		= $kasir->username;
	$password		= $kasir->password;
	$akses			= $kasir->akses;
}
?>
<!doctype html>
<html>
	<head>
		<title>Admin Page | Ubah kasir</title>
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
				<h1>Edit kasir</h1>
				<div><?= validation_errors() ?></div>
				<?= form_open_multipart('admin/kasir/update/' . $id, ['class'=>'form-horizontal']) ?>
					
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="nama" placeholder="" value="<?= $nama ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="alamat" placeholder="" value="<?= $alamat ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Telepon</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="telepon" placeholder="" value="<?= $telepon ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-10">
						  <select class="form-control" name="status">
						  <?php if ($status == 1){ ?>
		                    <option value="1" selected="selected">Active</option>
		                    <option value="0">Block</option>
		                    <?php }else{ ?>
		                    <option value="1">Active</option>
		                    <option value="0" selected="selected">Block</option>
		                    <?php } ?>
		                  </select>
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="username" placeholder="" value="<?= $username ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="password" placeholder="in plain text" value="">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Hak Akses</label>
						<div class="col-sm-10">
						  <select class="form-control" name="akses">
						  <?php if ($akses == 1){ ?>
		                    <option value="1" selected="selected">Admin</option>
		                    <option value="2">Kasir</option>
		                    <option value="3">Manager</option>
		                    <?php }elseif ($akses == 2){ ?>
		                    <option value="1">Admin</option>
		                    <option value="2" selected="selected">Kasir</option>
		                    <option value="3">Manager</option>
		                    <?php }else{ ?>
		                    <option value="1">Admin</option>
		                    <option value="2">Kasir</option>
		                    <option value="3" selected="selected">Manager</option>
		                    <?php } ?>
		                  </select>
						</div>
					  </div>
					  
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <input type="hidden" name="is_submitted" value="1" />
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