<!doctype html>
<html>
	<head>
		<title>Admin Page | Tambah Penjualan</title>
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
				<?= form_open_multipart('admin/buku/create', ['class'=>'form-horizontal']) ?>
					
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="judul" placeholder="" value="<?= set_value('judul') ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">No. ISBN</label>
						<div class="col-sm-10">
						  <textarea class="form-control" name="noisbn"><?= set_value('noisbn') ?></textarea>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Penulis</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="penulis" placeholder="" value="<?= set_value('penulis') ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Penerbit</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="penerbit" placeholder="" value="<?= set_value('penerbit') ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Tahun</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="tahun" placeholder="" value="<?= set_value('tahun') ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Stok</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="stok" placeholder="" value="<?= set_value('stok') ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Harga Pokok</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="harga_pokok" placeholder="" value="<?= set_value('harga_pokok') ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Harga Jual</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="harga_jual" placeholder="" value="<?= set_value('harga_jual') ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">PPN (%)</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="ppn" placeholder="" value="<?= set_value('ppn') ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Diskon (%)</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="diskon" placeholder="" value="<?= set_value('diskon') ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Gambar Buku</label>
						<div class="col-sm-10">
						  <input type="file" class="form-control" name="userfile" >
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