<?php
	$id 			= $distributor->id_distributor;
if($this->input->post('is_submitted')){
	$nama_distributor	= set_value('nama_distributor');
	$alamat				= set_value('alamat');
	$telepon			= set_value('telepon');
} else {
	$nama_distributor	= $distributor->nama_distributor;
	$alamat				= $distributor->alamat;
	$telepon			= $distributor->telepon;
}
?>
<!doctype html>
<html>
	<head>
		<title>Admin Page | Ubah distributor</title>
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
				<h1>Edit distributor</h1>
				<div><?= validation_errors() ?></div>
				<?= form_open_multipart('admin/distributor/update/' . $id, ['class'=>'form-horizontal']) ?>
					
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Nama Distributor</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="nama_distributor" placeholder="" value="<?= $nama_distributor ?>">
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