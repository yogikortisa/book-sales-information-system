<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Book Sales Information System</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php $this->load->view('layout/top_menu') ?>
		
		<!-- Tampilkan semua produk -->
		<div class="row">
		<!-- looping products -->
		  <?php foreach($products as $product) : ?>
		  <div class="col-sm-2 col-md-2" align="center">
			<div class="thumbnail">
			  <?=img([
				'src'		=> 'uploads/' . $product->image,
				'style'		=> 'max-width: 100%; max-height:100%; height:150px'
			  ])?>
			  <div class="caption">
				<h3 style="min-height:60px;"><?=$product->judul?></h3>
				<pre>No.ISBN: <?=$product->noisbn?></pre>
				<p>Stok: <?=$product->stok?></p>
				<p>Harga: Rp. <?=$product->harga_jual?></p>
				<p>
					<?=anchor('penjualan/beli/' . $product->id_buku, 'Buy' , [
						'class'	=> 'btn btn-primary',
						'role'	=> 'button'
					])?>
				</p>
			  </div>
			</div>
		  </div>
		  <?php endforeach; ?>
		<!-- end looping -->
		</div>
		
	</body>
</html>