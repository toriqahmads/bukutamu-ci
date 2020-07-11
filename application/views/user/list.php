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
					<h1 class="page-header">List User</h1>
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
								<a href="<?php echo site_url('user/add') ?>"><i class="fa fa-plus"></i> Add New</a>
							</div>
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="datatables">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Username</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user): ?>
									<tr>
										<td>
											<?php echo $user->id ?>
										</td>
										<td>
											<?php echo ucfirst($user->nama) ?>
										</td>
										<td>
											<?php echo $user->email ?>
										</td>
										<td>
											<?php echo $user->username ?>
										</td>
										<td width="200">
											<a href="<?php echo site_url('user/edit/'.$user->id) ?>"
											 class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('user/delete/'.$user->id . '/' . $this->security->get_csrf_hash()) ?>')" href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i> Hapus</a>
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
	$(document).ready(function() {
		$('#datatables').DataTable({
			responsive: true
		});
	});
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
