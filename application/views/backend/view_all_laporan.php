<!doctype html>
<html>
	<head>
		<title>Tampil Laporan</title>
		<!-- Load JQuery dari CDN -->
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/js/jquery-1.10.2.min.js"></script>
		
		<!-- Load DataTables dan Bootstrap dari CDN -->
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/datepicker/bootstrap-datepicker.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datepicker/datepicker3.css">
	</head>
	<body>
		<?php //$this->load->view('backend/admin_menu')?>
		<?php $this->load->view('layout/top_menu') ?>
		<!-- dalam div row harus ada col yang maksimum nilainya 12 -->
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
			
				<table id="myTable" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Buku</th>
							<th>Kasir</th>
							<th>Jumlah</th>
							<th>Total</th>
							<th>Tanggal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($laporans as $laporan) : ?>
						<tr>
							<td><?=$laporan->id_penjualan?></td>
							<td><?=$laporan->judul?></td>
							<td><?=$laporan->nama?></td>
							<td><?=$laporan->jumlah?></td>
							<td><?=$laporan->total?></td>
							<td><?=$laporan->tanggal?></td>
							<td>
								<?=anchor(	'laporan/delete/' . $laporan->id_penjualan, 
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
		
		<div class="row">
        <div class="col-xs-12">
         <div class="box">
          <div class="box-header">
            <h3></h3>
          </div>
          <div class="box-body">
            <form id="formjabatan" class="form-horizontal" method="post" action="<?php echo base_url('Cetak/cetakpdfperiode') ?>">
                <div class="form-group">
                  <label class="col-lg-2 control-label">Cetak Harian</label>
                  <div class="col-lg-5">
                  <a href="<?php echo base_url();?>Cetak/cetakpdfhariini" class="btn btn-primary">Cetak PDF</a>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Tanggal Dari</label>
                  <div class="col-lg-5">
                  <input type="text" class="form-control" name="mulai" placeholder="Dari" id="datepicker">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Tanggal Sampai</label>
                  <div class="col-lg-5">
                  <input type="text" class="form-control" name="selesai" placeholder="Tanggal Sampai" id="datepicker1">
                  </div>
                </div>
              <div class="box-footer">
              	<label class="col-lg-2 control-label">Cetak Mingguan/Bulanan/Lainnya</label>
                <button type="submit" class="btn btn-primary">Cetak PDF</button>
              </div>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
		
		<script>
			$(document).ready(function(){
				$('#myTable').DataTable();
			});
		</script>
		<script>
   $('#datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayHighlight: true,
    });
   $('#datepicker1').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayHighlight: true,
    });
</script>
	</body>
</html>