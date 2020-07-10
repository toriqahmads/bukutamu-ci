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
                    <h1 class="page-header"><?php echo ucfirst($this->uri->segment(1));?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $bukutamu; ?></div>
                                    <div>Total Buku Tamu</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('bukutamu') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $bk_terpenuhi; ?></div>
                                    <div>Buku Tamu Terpenuhi</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('bukutamu/index/terpenuhi') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $bk_baru; ?></div>
                                    <div>Buku Tamu Baru</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('bukutamu/index/baru') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $bk_belum_terpenuhi; ?></div>
                                    <div>Belum Terpenuhi</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('bukutamu/index/belum') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php $this->load->view('_includes/scroll-up'); ?>
    <!-- js -->
    <?php $this->load->view('_includes/js'); ?>
</body>

</html>
