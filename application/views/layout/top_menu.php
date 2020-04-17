<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <?=anchor(base_url(), 'Book Sales Information System', ['class'=>'navbar-brand'])?>
    <?php if($this->session->userdata('akses') == '1'){ ?>
    <?=anchor(base_url('admin/dasbor'), '| Dasbor Admin |', ['class'=>'navbar-brand'])?>
    <?php }elseif($this->session->userdata('akses') == '2'){?>
    <?=anchor(base_url('penjualan'), '| Penjualan |', ['class'=>'navbar-brand'])?>
    <?php }elseif($this->session->userdata('akses') == '3'){?>
    <?=anchor(base_url('laporan'), '| Reports |', ['class'=>'navbar-brand'])?>
    <?php } ?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      	  
      <ul class="nav navbar-nav navbar-right">
		<li><?php echo anchor(base_url(), 'Home');?></li>
       
		<?php if($this->session->userdata('username')) { ?>
			<li><div style="line-height:50px;font-weight: bolder;font-size: 15px;">Login as: <?=ucfirst($this->session->userdata('username'))?></div></li>
			<li><?php echo anchor('logout', 'Logout');?></li>
		<?php } else { ?>
			<li><?php echo anchor('login', 'Login');?></li>
		<?php } ?>
      </ul>
	  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>