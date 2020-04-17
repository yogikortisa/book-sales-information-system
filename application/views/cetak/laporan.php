<!DOCTYPE html>
<html>
<head>
  <title><?=$title?></title>
  <style>
  table{
      border-collapse: collapse;
      width: 100%;
      margin: 0 auto;
  }
  table th{
      border:1px solid #000;
      padding: 3px;
      font-weight: bold;
      text-align: center;
  }
  table td{
      border:1px solid #000;
      padding: 3px;
      vertical-align: top;
  }
  </style>
</head>
<body>
<?php if(!$qbarang){ exit("Maaf, belum ada laporan penjualan untuk tanggal hari ini."); } ?>
<h1 style="text-align: center">Laporan Penjualan</h1><br><br>
<table>
    <tr>
        <th style="width: 2%">No</th>
        <th style="width: 20%">Id Penjualan</th>
        <th>Buku</th>
        <th>Kasir</th>
        <th>Jumlah</th>
        <th>Total</th>
    </tr>
    <?php $no=0; foreach($qbarang as $rbarang){
    $no++;
    ?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $rbarang->id_penjualan;?></td>
        <td><?php echo $rbarang->judul;?></td>
        <td><?php echo $rbarang->nama;?></td>
        <td><?php echo $rbarang->jumlah;?></td>
        <td><?php echo $rbarang->total;?></td>
    </tr>
    <?php 
    @$totalsemua = $totalsemua+$rbarang->total;
    }?>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>Total Keseluruhan</th>
        <th><?php echo $totalsemua;?></th>
    </tr>

</table>
</body>
</html>