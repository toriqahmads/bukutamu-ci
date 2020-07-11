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
					<h1 class="page-header">Lihat data buku tamu : <?php echo ucfirst($this->uri->segment(3));?></h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="<?php echo site_url('bukutamu/') ?>"><i class="fa fa-arrow-left"></i>Kembali</a>
						</div>
						<div class="panel-body">
							<div class="row">
								<!-- /.col-lg-6 (nested) -->
								<div class="col-lg-6">
									<?php if($this->session->flashdata('success')) : ?>
									<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('success'); ?>
									</div>
									<?php endif; ?>
										<div class="form-group <?php echo form_error('kode') ? 'has-error' : '' ?>">
											<label class="control-label">Kode* :</label>
											<input type="text" name="kode" class="form-control" id="<?php echo form_error('kode') ? 'inputWarning' : '' ?>" placeholder="Kode" value="<?php echo $bukutamu->kode; ?>" readonly>
											<div class="invalid-feedback">
												<?php echo form_error('kode') ?>
											</div>
										</div>
										<div class="form-group <?php echo form_error('nama') ? 'has-error' : '' ?>">
											<label class="control-label">Nama Lengkap* :</label>
											<input type="text" name="nama" class="form-control <?php echo form_error('nama') ? 'inputWarning' : '' ?>" id="nama" placeholder="Nama Lengkap" value="<?php echo $bukutamu->nama; ?>" readonly>
											<div class="invalid-feedback">
												<?php echo form_error('nama') ?>
											</div>
										</div>
										<div class="form-group <?php echo form_error('alamat') ? 'has-error' : '' ?>">
											<label class="control-label">Alamat* :</label>
											<input type="text" name="alamat" class="form-control <?php echo form_error('alamat') ? 'inputError' : '' ?>" id="alamat" placeholder="Alamat" value="<?php echo $bukutamu->alamat; ?>" readonly> 
											<div class="invalid-feedback">
												<?php echo form_error('alamat') ?>
											</div>
										</div>
										<div class="form-group <?php echo form_error('asal') ? 'has-error' : '' ?>">
											<label class="control-label">Asal* :</label>
											<input name="asal" class="form-control <?php echo form_error('asal') ? 'inputError' : '' ?>" id="asal" placeholder="Asal" value="<?php echo $bukutamu->asal; ?>" readonly>
											<div class="invalid-feedback">
												<?php echo form_error('asal') ?>
											</div>
										</div>
										<div class="form-group <?php echo form_error('hp') ? 'has-error' : '' ?>">
											<label class="control-label">Nomor HP* :</label>
											<input name="hp" class="form-control <?php echo form_error('hp') ? 'inputError' : '' ?>" id="" placeholder="081225..." value="<?php echo $bukutamu->hp; ?>" readonly>
											<div class="invalid-feedback">
												<?php echo form_error('hp') ?>
											</div>
										</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group <?php echo form_error('tujuan') ? 'has-error' : '' ?>">
											<label class="control-label">Tujuan* :</label>
											<input name="tujuan" class="form-control <?php echo form_error('tujuan') ? 'inputError' : '' ?>" id="tujuan" placeholder="Tujuan" value="<?php echo $bukutamu->tujuan; ?>" readonly>
											<div class="invalid-feedback">
												<?php echo form_error('tujuan') ?>
											</div>
										</div>
										<div class="form-group <?php echo form_error('jam_kunjung') ? 'has-error' : '' ?>">
											<label class="control-label">Jam Kunjung* :</label>
											<input name="jam_kunjung" class="form-control <?php echo form_error('jam_kunjung') ? 'inputError' : '' ?>" id="jam_kunjung" placeholder="Jam Kunjung" value="<?php echo $bukutamu->jam_kunjung; ?>" readonly> 
											<div class="invalid-feedback">
												<?php echo form_error('jam_kunjung') ?>
											</div>
										</div>
										<div class="form-group <?php echo form_error('keperluan') ? 'has-error' : '' ?>">
											<label class="control-label">Keperluan* :</label>
											<textarea name="keperluan" class="form-control <?php echo form_error('keperluan') ? 'inputError' : '' ?>" id="keperluan" placeholder="Keperluan" readonly><?php echo $bukutamu->keperluan; ?></textarea> 
											<div class="invalid-feedback">
												<?php echo form_error('keperluan') ?>
											</div>
										</div>
										<div class="form-group <?php echo form_error('status') ? 'has-error' : '' ?>">
											<label class="control-label">Status* :</label>
											<input type="text" name="status" class="form-control <?php echo form_error('status') ? 'inputError' : '' ?>" id="status" placeholder="Status" value="<?php echo $bukutamu->status; ?>" readonly>
											<div class="invalid-feedback">
												<?php echo form_error('status') ?>
											</div>
										</div>
										<div class="form-group <?php echo form_error('ttd') ? 'has-error' : '' ?>">
											<label class="control-label">TTD* :</label>
											<img src="<?php echo $bukutamu->ttd; ?>" alt="<?php echo $bukutamu->kode; ?>" width="400px" height="200px"/>
										</div>
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
	<!-- js -->
	<?php $this->load->view('_includes/js'); ?>
</body>

</html>
