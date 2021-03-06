<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_includes/head'); ?>
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <style type="text/css">
    	.wrapper {
		  position: relative;
		  width: 400px;
		  height: 200px;
		  -moz-user-select: none;
		  -webkit-user-select: none;
		  -ms-user-select: none;
		  user-select: none;
		}
		.canvas {
		  position: absolute;
		  left: 0;
		  top: 0;
		  width:400px;
		  height:200px;
		  border-width: 1px;
		  border-color: black;
		}
    </style>
</head>

<body>
	<div class="container">
		<div class="row">
      <?php $this->load->view('_includes/breadcrumb'); ?>
      <div class="col-lg-12">
        <h1 class="page-header">Tambah Buku Tamu</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
		<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3>Buku Tamu</h3>
            <?php if($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php endif; ?>
          </div>
          <div class="panel-body">
            <div class="row">
            	<form role="form" id="form" action="<?php echo base_url('guest/addNew') ?>" method="post" enctype="multipart/form-data">
                <!-- /.col-lg-6 (nested) -->
                <div class="col-lg-6">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  <div class="form-group <?php echo form_error('nama') ? 'has-error' : '' ?>">
                    <label class="control-label">Nama Lengkap* :</label>
                    <input type="text" name="nama" class="form-control <?php echo form_error('nama') ? 'inputWarning' : '' ?>" id="nama" placeholder="Nama Lengkap">
                    <div class="invalid-feedback">
                      <?php echo form_error('nama') ?>
                    </div>
                  </div>
                  <div class="form-group <?php echo form_error('alamat') ? 'has-error' : '' ?>">
                    <label class="control-label">Alamat* :</label>
                    <input type="text" name="alamat" class="form-control <?php echo form_error('alamat') ? 'inputError' : '' ?>" id="alamat" placeholder="Alamat"> 
                    <div class="invalid-feedback">
                      <?php echo form_error('alamat') ?>
                    </div>
                  </div>
                  <div class="form-group <?php echo form_error('asal') ? 'has-error' : '' ?>">
                    <label class="control-label">Asal* :</label>
                    <input name="asal" class="form-control <?php echo form_error('asal') ? 'inputError' : '' ?>" id="asal" placeholder="Asal">
                    <div class="invalid-feedback">
                        <?php echo form_error('asal') ?>
                    </div>
                  </div>
                  <div class="form-group <?php echo form_error('hp') ? 'has-error' : '' ?>">
                    <label class="control-label">Nomor HP* :</label>
                    <input name="hp" class="form-control <?php echo form_error('hp') ? 'inputError' : '' ?>" id="" placeholder="081225...">
                    <div class="invalid-feedback">
                      <?php echo form_error('hp') ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                	<div class="form-group <?php echo form_error('tujuan') ? 'has-error' : '' ?>">
                    <label class="control-label">Tujuan* :</label>
                    <input name="tujuan" class="form-control <?php echo form_error('tujuan') ? 'inputError' : '' ?>" id="tujuan" placeholder="Tujuan">
                    <div class="invalid-feedback">
                      <?php echo form_error('tujuan') ?>
                    </div>
                  </div>
                  <div class="form-group <?php echo form_error('jam_kunjung') ? 'has-error' : '' ?>">
                  	<label class="control-label">Jam Kunjung* :</label>
                  	<div class="input-group date">
	                    <input name="jam_kunjung" id="jam_kunjung" class="form-control <?php echo form_error('jam_kunjung') ? 'inputError' : '' ?>" placeholder="Jam Kunjung" autocomplete="off">
		                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    	</span>
	                    <div class="invalid-feedback">
	                        <?php echo form_error('jam_kunjung') ?>
	                    </div>
                  	</div>
                  </div>
                  <div class="form-group <?php echo form_error('keperluan') ? 'has-error' : '' ?>">
                    <label class="control-label">Keperluan* :</label>
                    <textarea name="keperluan" class="form-control <?php echo form_error('keperluan') ? 'inputError' : '' ?>" id="keperluan" placeholder="Keperluan"></textarea> 
                    <div class="invalid-feedback">
                        <?php echo form_error('keperluan') ?>
                    </div>
                  </div>
                  <div class="form-group <?php echo form_error('ttd') ? 'has-error' : '' ?>">
                    <input type="hidden" name="ttd" class="form-control <?php echo form_error('ttd') ? 'inputError' : '' ?>" id="ttd"> 
                    <div class="invalid-feedback">
                        <?php echo form_error('ttd') ?>
                    </div>
                  </div>
                  <div class="form-group">
                  	<label class="control-label">Tanda Tangan* :</label>
                    <div class="wrapper">
									  	<canvas id="canvas" class="canvas" width=400 height=200></canvas>
										</div>
									</div>
									<a type="submit" id="savettd" class="btn btn-primary">Simpan TTD</a>
									<a type="reset" id="resetttd" class="btn btn-warning">Reset TTD</a>
                </div>
                <!-- /.col-lg-6 (nested) -->
             		<button type="submit" id="save" class="btn btn-primary">Simpan</button>
                 <button type="reset" id="cancel" class="btn btn-warning">Cancel</button>
              </form>
            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
	</div>

	<!-- jQuery -->
	 <?php $this->load->view('_includes/scroll-up'); ?>
	<!-- js -->
	<?php $this->load->view('_includes/js'); ?>
	<script type="text/javascript">
    	let signaturePad = new SignaturePad(document.getElementById('canvas'), {
			  backgroundColor: 'rgba(255, 255, 255, 0)',
			  penColor: 'rgb(0, 0, 0)'
			});

	    let saveButton = document.getElementById('savettd');
			let cancelButton = document.getElementById('resetttd');
			saveButton.addEventListener('click', function (event) {
			  let data = signaturePad.toDataURL('image/png');
			  document.getElementById('ttd').value = data;
			});

			cancelButton.addEventListener('click', function (event) {
			  signaturePad.clear();
			  document.getElementById('ttd').value = '';
			});
    </script>
    <link type="text/css" href="<?php echo base_url('assets/datetimepicker/jquery.datetimepicker.min.css') ?>" rel="stylesheet" / >
    <script src="<?php echo base_url('assets/datetimepicker/jquery.datetimepicker.full.min.js')?>"></script>
    <script type="text/javascript">
      jQuery('#jam_kunjung').datetimepicker({
			  format: 'd-m-Y H:i:s',
			  lang: 'id',
			  mask: true,
			  step: 1,
			  defaultTime: true
			});
    </script>
</body>

</html>
