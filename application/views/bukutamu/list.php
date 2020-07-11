<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_includes/head'); ?>
</head>

<body id="page-top">

	<div id="wrapper">

		<!-- Navigation -->
		<?php
			$this->load->view('_includes/nav');
		?>
		<div id="page-wrapper">
			<div class="row">
				<?php $this->load->view('_includes/breadcrumb'); ?>
				<div class="col-lg-12">
					<h1 class="page-header">List Buku Tamu</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<?php if($this->session->flashdata('status')) : ?>
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $this->session->flashdata('status'); ?>
						</div>
					<?php endif; ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="card-header">
								<a href="<?php echo site_url('bukutamu/add') ?>"><i class="fa fa-plus"></i> Add New</a>
							</div>
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="datatables">
								<thead>
									<tr>
										<th>Kode</th>
										<th>Nama Tamu</th>
										<th>HP</th>
										<th>Tujuan</th>
										<th>Jam Kunjung</th>
										<th>TTD</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($bukutamu as $bk): ?>
									<tr>
										<td>
											<a href="<?php echo site_url('bukutamu/view/'.$bk->kode) ?>">
												<?php echo $bk->kode ?>
											</a>
										</td>
										<td>
											<?php echo $bk->nama ?>
										</td>
										<td>
											<?php echo $bk->hp ?>
										</td>
										<td>
											<?php echo $bk->tujuan ?>
										</td>
										<td>
											<?php echo $bk->jam_kunjung ?>
										</td>
										<td width="100">
											<img src="<?php echo $bk->ttd; ?>" alt="<?php echo $bk->kode; ?>" width="90px" height="65px"/>
										</td>
										<td>
											<?php echo ucfirst($bk->status) ?>
										</td>
										<td width="100">
											<a href="<?php echo site_url('bukutamu/edit/'.$bk->kode) ?>"
											 class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('bukutamu/delete/'.$bk->kode . '/' . $this->security->get_csrf_hash()) ?>')" href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<!-- /.table-responsive -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->
	<?php $this->load->view('_includes/modal'); ?>
	<?php $this->load->view('_includes/scroll-up'); ?>
	<!-- js -->
	<?php $this->load->view('_includes/js'); ?>
	<script>
		$(document).ready(function () {
			$('#datatables').DataTable({
				responsive: true
			});
		});
		
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</body>

</html>
