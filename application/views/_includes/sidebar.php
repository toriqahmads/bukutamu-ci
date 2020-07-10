<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard fa-fw <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>"></i> Dashboard</a>
            </li>
            <?php if ($this->session->userdata('level') == -1) : ?>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i>Kelola User</a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('user'); ?>" class="<?php echo $this->uri->segment(2) == 'user' && $this->uri->segment(3) == '' ? 'active' : '' ?>"><i class="fa fa-table"></i>List User</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('user/add'); ?>" class="<? echo $this->uri->segment(2) == 'user' && $this->uri->segment(3) == 'add' ? 'active' : '' ?>"><i class="fa fa-plus"></i>Tambah User</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        	<?php endif; ?>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i>Kelola Buku Tamu</a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('bukutamu'); ?>" class="<?php echo $this->uri->segment(2) == 'bukutamu' && $this->uri->segment(3) == '' ? 'active' : '' ?>"><i class="fa fa-table"></i>List Buku Tamu</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('bukutamu/add'); ?>" class="<? echo $this->uri->segment(2) == 'bukutamu' && $this->uri->segment(3) == 'add' ? 'active' : '' ?>"><i class="fa fa-plus"></i>Tambah Buku Tamu</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
