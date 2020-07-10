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
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h1>Edit data</h1>
                                    <?php if($this->session->flashdata('success')) : ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php endif; ?>
                                    <form role="form" action="<?php echo base_url('user/edit/'.$user->id); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <div class="form-group <?php echo form_error('name') ? 'has-error' : '' ?>">
                                            <label class="control-label">Nama lengkap* :</label>
                                            <input type="text" name="name" class="form-control" id="<?php echo form_error('name') ? 'inputWarning' : '' ?>" placeholder="Nama Lengkap" value="<?php echo $user->nama; ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('name') ?>
                                            </div>
                                        </div>
                                        <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
                                            <label class="control-label">Email* :</label>
                                            <input type="email" name="email" class="form-control" id="<?php echo form_error('email') ? 'inputError' : '' ?>" placeholder="youremail@domain.com" value="<?php echo $user->email; ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('email') ?>
                                            </div>
                                        </div>
                                        <div class="form-group <?php echo form_error('username') ? 'has-error' : '' ?>">
                                            <label class="control-label">Username* :</label>
                                            <input type="text" name="username" class="form-control" id="<?php echo form_error('username') ? 'inputError' : '' ?>" value="<?php echo $user->username; ?>" readonly>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('username') ?>
                                            </div>
                                        </div>
                                        <?php if ($this->session->userdata('level') == -1) : ?>
											<div class="form-group <?php echo form_error('level') ? 'has-error' : '' ?>">
												<label>Level* :</label>
												<select name="level" class="form-control">
													<option>Pilih</option>
													<option value="-1" <?php if ($user->level == -1) echo 'selected'; ?>>Admin</option>
													<option value="0" <?php if ($user->level == 0) echo 'selected'; ?>>User</option>
												</select>
												<div class="invalid-feedback">
													<?php echo form_error('level') ?>
												</div>
											</div>
										<?php endif; ?>
                                        <button type="submit" name="action" value="update" class="btn btn-primary">Ubah profil</button>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <h1>Ubah password</h1>
                                    <?php if($this->session->flashdata('success-password')) : ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('success-password'); ?>
                                    </div>
                                    <?php endif; ?>
                                    <form role="form" action="<?php echo base_url('user/editPasswordUser/'.$user->id); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <?php if ($this->session->userdata('level') != -1) : ?>
                                        <div class="form-group <?php echo form_error('old-password') ? 'has-error' : '' ?>">
                                            <label class="control-label">Password lama* :</label>
                                            <input type="password" name="old-password" class="form-control" id="<?php echo form_error('old-password') ? 'inputError' : '' ?>" placeholder="Password lama Anda...">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('old-password') ?>
                                            </div>
                                        </div>
                                    	<?php endif; ?>
                                        <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
                                            <label class="control-label">Password baru* :</label>
                                            <input type="password" name="password" class="form-control" id="<?php echo form_error('password') ? 'inputError' : '' ?>" placeholder="Buat password baru Anda...">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('password') ?>
                                            </div>
                                        </div>
                                        <div class="form-group <?php echo form_error('conf-password') ? 'has-error' : '' ?>">
                                            <label class="control-label">Konfirmasi password baru* :</label>
                                            <input type="password" name="conf-password" class="form-control" id="<?php echo form_error('conf-password') ? 'inputError' : '' ?>" placeholder="Masukkan lagi password baru Anda...">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('conf-password') ?>
                                            </div>
                                        </div>
                                        <button type="submit"  name="action" value="pass" class="btn btn-primary">Ubah password</button>
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
    <!-- js -->
    <?php $this->load->view('_includes/js'); ?>
</body>

</html>
