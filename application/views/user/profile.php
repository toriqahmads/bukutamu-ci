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
            <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Profil Anda</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://picsum.photos/seed/picsum/200/200" class="img-circle img-responsive"> </div>
            <div class=" col-md-9 col-lg-9 "> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Nama:</td>
                    <td><?php echo ucfirst($user->nama); ?></td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td><a href="<?php echo $user->email ?>"><?php echo $user->email ?></a></td>
                  </tr>
                  <tr>
                    <td>Username :</td>
                    <td><?php echo $user->username ?></td>
                  </tr>                     
                </tbody>
              </table>
            </div>
          </div>
        </div>
          <div class="panel-footer">
            <a href="<?php echo site_url('user/editProfile') ?>" data-original-title="Ubah data Anda?" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah Data Profile</a>
            <a href="<?php echo site_url('user/editPassword') ?>" data-original-title="Ubah password Anda?" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-cog"></i> Ubah Password</a>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
    <!-- /#wrapper -->
    <!-- js -->
    <?php $this->load->view('_includes/js'); ?>
</body>

</html>
