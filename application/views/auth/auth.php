<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('_includes/head'); ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <?php if($this->session->flashdata('status')) : ?>
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('status'); ?>
                        </div>
                    <?php endif; ?>
                        <h3 class="panel-title">Silahkan Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo base_url('auth/login'); ?>" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group <?php echo form_error('username') ? 'has-error' : '' ?>">
                                    <label class="control-label">Username* :</label>
                                        <input type="username" name="username" class="form-control" id="<?php echo form_error('username') ? 'inputWarning' : '' ?>" placeholder="Username">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('email') ?>
                                    </div>
                                </div>
                                <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
                                        <label class="control-label">Password* :</label>
                                        <input type="password" name="password" class="form-control" id="<?php echo form_error('password') ? 'inputError' : '' ?>" placeholder="Password">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('password') ?>
                                    </div>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="action" value="update" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
     <?php $this->load->view('_includes/scroll-up'); ?>
    <!-- js -->
    <?php $this->load->view('_includes/js'); ?>

</body>

</html>
