<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header bg-info">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url('dashboard'); ?>">Buku Tamu</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">                
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
	            <li><a href="<?php echo site_url('user/me'); ?>"><i class="fa fa-user fa-fw"></i> Profile</a>
	            </li>
	            <li><a href="<?php echo site_url('user/editProfile'); ?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
	            </li>
	            <li class="divider"></li>
	            <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
	            </li>
	        </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    <?php $this->load->view('_includes/sidebar'); ?>
    <!-- /.navbar-static-side -->
</nav>
