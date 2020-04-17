<!doctype html>
<html>
	<head>
		<title>Admin Page | View All buku</title>
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
		<?php $msg = $this->session->flashdata('suksesbuku'); if((isset($msg)) && (!empty($msg))) { ?>
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i> Success! <?php print_r($msg); ?>
        </div>
        <?php } ?>
        <?php $msg = $this->session->flashdata('gagalbuku'); if((isset($msg)) && (!empty($msg))) { ?>
        <div class="alert alert-danger  alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-ban"></i> Failed! <?php print_r($msg); ?>
        </div>
        <?php } ?>
        <?php $this->load->view('layout/top_menu') ?>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
			
				<table id="myTable" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Judul</th>
			                  <th>No ISBN</th>
			                  <th>Penulis</th>
			                  <th>Penerbit</th>
			                  <th>Tahun</th>
			                  <th>Stok</th>
			                  <th>Harga Pokok</th>
			                  <th>Harga Jual</th>
			                  <th>PPN(%)</th>
			                  <th>Diskon(%)</th>
			                  <th>Foto</th>
							<th>Beli</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($bukus as $buku) : ?>
						<tr>
							<td><?=$buku->judul?></td>
							<td><?=$buku->noisbn?></td>
							<td><?=$buku->penulis?></td>
							<td><?=$buku->penerbit?></td>
							<td><?=$buku->tahun?></td>
							<td><?=$buku->stok?></td>
							<td><?=$buku->harga_pokok?></td>
							<td><?=$buku->harga_jual?></td>
							<td><?=$buku->ppn?></td>
							<td><?=$buku->diskon?></td>
							<td><?php
								$buku_image = [	'src'	=> 'uploads/' . $buku->image,
													'height'	=> '50'
													];
								echo img($buku_image)
							?></td>
							<td>
								<?=anchor(	'penjualan/beli/'.$buku->id_buku,
											'Beli', 
											['class'=>'btn btn-primary btn-sm'])
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