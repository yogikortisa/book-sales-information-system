<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Toko Buku Online</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- Load JQuery dari CDN -->
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/js/jquery-1.10.2.min.js"></script>
		
		<!-- Load DataTables dan Bootstrap dari CDN -->
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.min.css">
	</head>
	<body>
		<?php $this->load->view('layout/top_menu') ?>
		
		<!-- Tampilkan semua produk -->
		<div class="row">

<?php
	echo form_open_multipart('penjualan/prosescheckout');
	echo form_hidden('id', $this->uri->segment(3));
?>

		<div class="col-md-10">
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Judul Buku</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="judul" value="<?php echo $buku['judul'] ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Stok</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="stok" value="<?php echo $buku['stok'] ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Harga Jual</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="hargajual" value="<?php echo $buku['harga_jual'] ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">PPN (%)</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="ppn" value="<?php echo $buku['ppn'] ?>">
			</div>
		  </div>  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Diskon (%)</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="diskon" value="<?php echo $buku['diskon'] ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Banyak</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="banyak">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-1 col-sm-1">
			  <button type="submit" name="checkout" id="checkout" class="btn btn-primary">Checkout</button>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-1 col-sm-1">
			  <button name="kembali" id="kembali" href="<?php echo base_url('penjualan') ?>" class="btn btn-primary">Kembali</button>
			</div>
		  </div>
		</div>

<?php
	echo form_close();
?>

</div>
		
	</body>
</html>