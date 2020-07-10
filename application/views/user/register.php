<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_includes/head'); ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- Navigation -->
		<?php $this->load->view('_includes/nav'); ?>
		<div id="page-wrapper">
			<div class="row">
				<?php $this->load->view('_includes/breadcrumb'); ?>
				<div class="col-lg-12">
					<h1 class="page-header"><?php echo ucfirst($this->uri->segment(3));?></h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="<?php echo site_url('user/') ?>"><i class="fa fa-arrow-left"></i>Kembali</a>
						</div>
						<div class="panel-body">
							<div class="row">
								<!-- /.col-lg-6 (nested) -->
								<div class="col-lg-6">
									<h1>Tambah User</h1>
									<?php if($this->session->flashdata('success')) : ?>
									<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('success'); ?>
									</div>
									<?php endif; ?>
									<form role="form" action="<?php echo base_url('user/addNew') ?>" method="post" enctype="multipart/form-data">
										<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
										<div class="form-group <?php echo form_error('name') ? 'has-error' : '' ?>">
											<label class="control-label">Nama lengkap* :</label>
											<input type="text" name="name" class="form-control" id="<?php echo form_error('name') ? 'inputWarning' : '' ?>" placeholder="Nama lengkap">
											<div class="invalid-feedback">
												<?php echo form_error('name') ?>
											</div>
										</div>
										<div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
											<label class="control-label">Email* :</label>
											<input type="email" name="email" class="form-control" id="<?php echo form_error('email') ? 'inputError' : '' ?>" placeholder="Alamat email">
											<div class="invalid-feedback">
												<?php echo form_error('email') ?>
											</div>
										</div>
										<div class="form-group <?php echo form_error('hp') ? 'has-error' : '' ?>">
											<label class="control-label">Username* :</label>
											<input type="text" name="username" class="form-control" id="<?php echo form_error('username') ? 'inputError' : '' ?>" placeholder="Username">
											<div class="invalid-feedback">
												<?php echo form_error('hp') ?>
											</div>
										</div>

										<?php if ($this->session->userdata('level') == -1) : ?>
											<div class="form-group <?php echo form_error('level') ? 'has-error' : '' ?>">
												<label>Level* :</label>
												<select name="level" class="form-control">
													<option>Pilih</option>
													<option value="-1">Admin</option>
													<option value="0">User</option>
												</select>
												<div class="invalid-feedback">
													<?php echo form_error('level') ?>
												</div>
											</div>
										<?php endif; ?>
										<div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
											<label class="control-label">Password* :</label>
											<input type="password" name="password" class="form-control" id="<?php echo form_error('hp') ? 'inputError' : '' ?>" placeholder="Password...">
											<div class="invalid-feedback">
												<?php echo form_error('password') ?>
											</div>
										</div>
										<div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
											<label class="control-label">Konfirmasi Password* :</label>
											<input type="password" name="conf-password" class="form-control" id="<?php echo form_error('conf-password') ? 'inputError' : '' ?>" placeholder="Masukkan password lagi...">
											<div class="invalid-feedback">
												<?php echo form_error('conf-password') ?>
											</div>
										</div>

										<button type="submit" class="btn btn-primary">Daftarkan</button>
										<button type="reset" class="btn btn-warning">Batal</button>
									</form>
								</div>
								<!-- /.col-lg-6 (nested) -->
							</div>
							<!-- /.row (nested) -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	<?php $this->load->view('_includes/scroll-up'); ?>
	<!-- js -->
	<?php $this->load->view('_includes/js'); ?>
</body>

</html>
