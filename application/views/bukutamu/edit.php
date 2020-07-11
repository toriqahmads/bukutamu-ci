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
                    <h1 class="page-header">Edit data buku tamu : <?php echo ucfirst($this->uri->segment(3));?></h1>
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
                            	<form role="form" action="<?php echo base_url('bukutamu/update/'.$bukutamu->kode); ?>" method="post" enctype="multipart/form-data">
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <?php if($this->session->flashdata('success')) : ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php endif; ?>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="form-group <?php echo form_error('kode') ? 'has-error' : '' ?>">
                                        <label class="control-label">Kode* :</label>
                                        <input type="text" name="kode" class="form-control" id="<?php echo form_error('kode') ? 'inputWarning' : '' ?>" placeholder="Kode" value="<?php echo $bukutamu->kode; ?>" readonly>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('kode') ?>
                                        </div>
                                    </div>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="form-group <?php echo form_error('nama') ? 'has-error' : '' ?>">
                                        <label class="control-label">Nama Lengkap* :</label>
                                        <input type="text" name="nama" class="form-control <?php echo form_error('nama') ? 'inputWarning' : '' ?>" id="nama" placeholder="Nama Lengkap" value="<?php echo $bukutamu->nama; ?>">
                                        <div class="invalid-feedback">
                                            <?php echo form_error('nama') ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo form_error('alamat') ? 'has-error' : '' ?>">
                                        <label class="control-label">Alamat* :</label>
                                        <input type="text" name="alamat" class="form-control <?php echo form_error('alamat') ? 'inputError' : '' ?>" id="alamat" placeholder="Alamat" value="<?php echo $bukutamu->alamat; ?>"> 
                                        <div class="invalid-feedback">
                                            <?php echo form_error('alamat') ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo form_error('asal') ? 'has-error' : '' ?>">
                                        <label class="control-label">Asal* :</label>
                                        <input name="asal" class="form-control <?php echo form_error('asal') ? 'inputError' : '' ?>" id="asal" placeholder="Asal" value="<?php echo $bukutamu->asal; ?>">
                                        <div class="invalid-feedback">
                                            <?php echo form_error('asal') ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo form_error('hp') ? 'has-error' : '' ?>">
                                        <label class="control-label">Nomor HP* :</label>
                                        <input name="hp" class="form-control <?php echo form_error('hp') ? 'inputError' : '' ?>" id="" placeholder="081225..." value="<?php echo $bukutamu->hp; ?>">
                                        <div class="invalid-feedback">
                                            <?php echo form_error('hp') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                	<div class="form-group <?php echo form_error('tujuan') ? 'has-error' : '' ?>">
	                                    <label class="control-label">Tujuan* :</label>
	                                    <input name="tujuan" class="form-control <?php echo form_error('tujuan') ? 'inputError' : '' ?>" id="tujuan" placeholder="Tujuan" value="<?php echo $bukutamu->tujuan; ?>">
	                                    <div class="invalid-feedback">
	                                        <?php echo form_error('tujuan') ?>
	                                    </div>
	                                </div>
	                                <div class="form-group <?php echo form_error('jam_kunjung') ? 'has-error' : '' ?>">
					                  	<label class="control-label">Jam Kunjung* :</label>
					                  	<div class="input-group date">
						                    <input name="jam_kunjung" id="jam_kunjung" class="form-control <?php echo form_error('jam_kunjung') ? 'inputError' : '' ?>" placeholder="Jam Kunjung" autocomplete="off" value="<?php echo $bukutamu->jam_kunjung ?>">
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
	                                    <textarea name="keperluan" class="form-control <?php echo form_error('keperluan') ? 'inputError' : '' ?>" id="keperluan" placeholder="Keperluan"><?php echo $bukutamu->keperluan; ?></textarea> 
	                                    <div class="invalid-feedback">
	                                        <?php echo form_error('keperluan') ?>
	                                    </div>
	                                </div>
	                                <div class="form-group <?php echo form_error('status') ? 'has-error' : '' ?>">
	                                    <label>Status* :</label>
	                                    <select name="status" class="form-control">
	                                        <option>Pilih</option>
	                                        <option value="baru" <?php if ($bukutamu->status == 'baru') echo 'selected' ?>>Baru</option>
	                                        <option value="terpenuhi" <?php if ($bukutamu->status == 'terpenuhi') echo 'selected' ?>>Terpenuhi</option>
	                                        <option value="belum terpenuhi" <?php if ($bukutamu->status == 'belum terpenuhi') echo 'selected' ?>>Belum Terpenuhi</option>
	                                    </select>
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
                                	<button type="submit" name="action" value="pass" class="btn btn-primary">Ubah data</button>
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
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- js -->
    <?php $this->load->view('_includes/js'); ?>
    <link type="text/css" href="<?php echo base_url('assets/datetimepicker/jquery.datetimepicker.min.css') ?>" rel="stylesheet" / >
    <script src="<?php echo base_url('assets/datetimepicker/jquery.datetimepicker.full.min.js')?>"></script>
    <script type="text/javascript">
      jQuery('#jam_kunjung').datetimepicker({
		  format: 'd-m-Y H:i:s',
		  lang: 'id',
		  mask: true,
		  step: 1
		});
    </script>
</body>

</html>
