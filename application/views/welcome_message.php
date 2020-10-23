<?php include('includes/header.php') ?>
<section class="content">
	<!-- Default box -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">

				<div class="card">

					<!-- /.card-header -->
					<div class="card-body table-responsive">
						<table class="table table-bordered" id="tbl_router">
							<thead>
								<tr>
									<th>DISK SPACE</th>
									<th>TOTAL SPACE</th>
									<th>INODE</th>
									<th>FILES</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $diskSpace; ?></td>
									<td><?= $totalSpace; ?></td>
									<td><?= $inode; ?></td>
									<td><?php if ($files) {
											foreach ($files as $file) {
												if ($file !== '.' || $file !== '..') {
													echo $file . '<br>';
												}
											}
										} ?>
									</td>

								</tr>

							</tbody>
						</table>
					</div>
					<!-- /.card-body -->

				</div>
				<div class="card">
					<div class=" card-info">
						<div class="card-header">
							<h3 class="card-title">Search</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

							</div>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="form-horizontal" name="frm-upload" id="frm-upload">
							<div class="card-body">

								<div class="row">
									<div class="col-sm-12">
										<!-- text input -->
										<div class="form-group">
											<label>Enter number files needed to upload</label>
											<input type="number" name="no" id="no" class="form-control" placeholder="Enter ...">
										</div>
									</div>



								</div>

								<!-- /.card-body -->
								<div class="card-footer">
									<button type="submit" class="btn btn-info" id="submit">Search</button>
								</div>
								<!-- /.card-footer -->
						</form>
					</div>
					<div class=" card-info">
						<form id="file_upload" name="file_upload" method="post" enctype="multipart/form-data" action="<?php echo site_url('welcome/createZip'); ?>">
							<div class="card-body" id="files_div">

						</form>

					</div>
				</div>
			</div>
		</div>
</section>

<?php include('includes/footer.php'); ?>
<script>
	$('body').on('click', '#submit', function(e) {
		e.preventDefault();
		var no = $("#no").val();
		var div = "";
		for (i = 1; i <= no; i++) {
			div += '<div class="form-group">';
			div += '<label for="exampleInputFile">File input For ' + i + '</label>';
			div += '<div class="input-group">';
			div += '<div class="custom-file">';
			div += '<input type="file" class="custom-file-input"   id="file[]" name="file[]">';
			div += '<label class="custom-file-label" for="file[]">Choose file</label>';
			div += '</div>';
			div += '<div class="input-group-append">';
			div += '<span class="input-group-text" id="">Upload</span>';
			div += ' </div></div></div>';
		}
		div += '<div class="card-footer"><button type="submit" class="btn btn-info" >Upload</button></div>';
		$('#files_div').append(div);

	});
</script>