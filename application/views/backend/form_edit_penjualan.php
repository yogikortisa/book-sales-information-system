<?php
	$id 			= $buku->id_buku;
if($this->input->post('is_submitted')){
	$judul			= set_value('judul');
	$noisbn			= set_value('noisbn');
	$penulis		= set_value('penulis');
	$penerbit		= set_value('penerbit');
	$tahun			= set_value('tahun');
	$stok			= set_value('stok');
	$harga_pokok	= set_value('harga_pokok');
	$harga_jual		= set_value('harga_jual');
	$ppn			= set_value('ppn');
	$diskon			= set_value('diskon');
} else {
	$judul			= $buku->judul;
	$noisbn			= $buku->noisbn;
	$penulis		= $buku->penulis;
	$penerbit		= $buku->penerbit;
	$tahun			= $buku->tahun;
	$stok			= $buku->stok;
	$harga_pokok	= $buku->harga_pokok;
	$harga_jual		= $buku->harga_jual;
	$ppn			= $buku->ppn;
	$diskon			= $buku->diskon;
}
?>
<!doctype html>
<html>
	<head>
		<title>Admin Page | Ubah Buku</title>
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
				<h1>Edit buku</h1>
				<div><?= validation_errors() ?></div>
				<?= form_open_multipart('admin/buku/update/' . $id, ['class'=>'form-horizontal']) ?>
					
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="judul" placeholder="" value="<?= $judul ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">No. ISBN</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="noisbn" placeholder="" value="<?= $noisbn ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Penulis</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="penulis" placeholder="" value="<?= $penulis ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Penerbit</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="penerbit" placeholder="" value="<?= $penerbit ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Tahun</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="tahun" placeholder="" value="<?= $tahun ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Stok</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="stok" placeholder="" value="<?= $stok ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Harga Pokok</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="harga_pokok" placeholder="" value="<?= $harga_pokok ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Harga Jual</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="harga_jual" placeholder="" value="<?= $harga_jual ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">PPN (%)</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="ppn" placeholder="" value="<?= $ppn ?>">
						</div>
					  </div>

					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Diskon (%)</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="diskon" placeholder="" value="<?= $diskon ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Gambar</label>
						<div class="col-sm-10">
						  <input type="file" class="form-control" name="userfile" >
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