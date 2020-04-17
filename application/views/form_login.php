<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Toko Buku Online</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<style>
			.register{
			margin-left: 17%;
			}
		</style>
	</head>
	<body>
		<?php $this->load->view('layout/top_menu') ?>
		
		<div><?=validation_errors()?></div>
		<div><?=$this->session->flashdata('error')?></div>
		<?=form_open('login', ['class'=>'form-horizontal'])?>
		<div class="col-md-4">
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10" width="100%">
			  <input type="text" class="form-control" name="username">
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" name="password">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <div class="checkbox">
				<label>
				  <input type="checkbox"> Remember me
				</label>
			  </div>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-primary">Sign in</button>
			</div>
		  </div>
		  </div>
		</form>
	</body>
</html>