<?php
	$id 			= $pasok->id_pasok;
if($this->input->post('is_submitted')){
	$jumlah			= set_value('jumlah');
} else {
	$jumlah			= $pasok->jumlah;
}
?>
<!doctype html>
<html>
	<head>
		<title>Admin Page | Ubah Pasok</title>
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
				<h1>Edit pasok</h1>
				<div><?= validation_errors() ?></div>
				<?= form_open_multipart('admin/pasok/update/' . $id, ['class'=>'form-horizontal']) ?>
					
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">ID Distributor</label>
						<div class="col-sm-10">
						  <select class="form-control select2" name="id_distributor">
		                  <option value="">Pilih Distributor</option>
		                    <?php 
		                    foreach($distributor as $row)
		                    { 
		                      if($pasok->id_distributor==$row->id_distributor){
		                        echo '<option value="'.$row->id_distributor.'" selected>'.$row->nama_distributor.'</option>';
		                      }else{
		                        echo '<option value="'.$row->id_distributor.'">'.$row->nama_distributor.'</option>';
		                      }
		                    }
		                    ?>
		                  </select>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Judul Buku</label>
						<div class="col-sm-10">
						  <select class="form-control select2" name="id_buku">
		                  <option value="">Pilih Judul</option>
		                    <?php 
		                    foreach($buku as $row)
		                    { 
		                      if($pasok->id_buku==$row->id_buku){
		                        echo '<option value="'.$row->id_buku.'" selected>'.$row->judul.'</option>';
		                      }else{
		                        echo '<option value="'.$row->id_buku.'">'.$row->judul.'</option>';
		                      }
		                    }
		                    ?>
		                  </select>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="jumlah" placeholder="" value="<?= $jumlah ?>">
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