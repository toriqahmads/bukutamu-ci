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
                            <a href="<?php echo site_url('bukutamu/') ?>"><i class="fa fa-arrow-left"></i>Kembali</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h1>Tambah Buku Tamu</h1>
                                    <?php if($this->session->flashdata('success')) : ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php endif; ?>
                                    <form role="form" id="form" action="<?php echo base_url('bukutamu/addNew') ?>" method="post" enctype="multipart/form-data">
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
                                        <div class="form-group <?php echo form_error('tujuan') ? 'has-error' : '' ?>">
                                            <label class="control-label">Tujuan* :</label>
                                            <input name="tujuan" class="form-control <?php echo form_error('tujuan') ? 'inputError' : '' ?>" id="tujuan" placeholder="Tujuan">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('tujuan') ?>
                                            </div>
                                        </div>
                                        <div class="form-group <?php echo form_error('jam_kunjung') ? 'has-error' : '' ?>">
                                            <label class="control-label">Jam Kunjung* :</label>
                                            <input name="jam_kunjung" class="form-control <?php echo form_error('jam_kunjung') ? 'inputError' : '' ?>" id="jam_kunjung" placeholder="Jam Kunjung"> 
                                            <div class="invalid-feedback">
                                                <?php echo form_error('jam_kunjung') ?>
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
											<a type="submit" id="savettd" class="btn btn-primary">Simpan TTD</a>
											<a type="reset" id="resetttd" class="btn btn-warning">Reset TTD</a>
										</div>

                                        <button type="submit" id="save" class="btn btn-primary">Simpan</button>
                                        <button type="reset" id="cancel" class="btn btn-warning">Cancel</button>
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
</body>

</html>
