<?php include('includes/header.php') ?>
<section class="content">
	<!-- Default box -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Search</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

						</div>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form class="form-horizontal" name="frm-router" id="frm-router">
						<div class="card-body">
							<form role="form">
								<div class="row">
									<div class="col-sm-2">
										<!-- text input -->
										<div class="form-group">
											<label>Sap Id</label>
											<input type="text" name="sapid" id="sapid" class="form-control" placeholder="Enter ...">
										</div>
									</div>
									<div class="col-sm-2">
										<!-- text input -->
										<div class="form-group">
											<label>Hostname</label>
											<input type="text" name="hostname" id="hostname" class="form-control" placeholder="Enter ...">
										</div>
									</div>
									<div class="col-sm-2">
										<!-- text input -->
										<div class="form-group">
											<label>Loop back</label>
											<input type="text" name="loopback1" id="loopback1" class="form-control" placeholder="Enter ..."><br>
											<input type="text" name="loopback2" id="loopback2" class="form-control" placeholder="Enter ...">
										</div>
									</div>

									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Mac Adress</label>
											<input type="text" name="macaddress" id="macaddress" class="form-control" placeholder="Enter ...">
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Router Type</label>
											<select name="type" id="type" class="form-control">
												<option value="">Select Status</option>
												<option value="AG1" <?php echo ($router_info['type'] == 'AG1') ? "selected='selected'" : ""; ?>>AG1</option>
												<option value="CSS" <?php echo ($router_info['type'] == 'CSS') ? "selected='selected'" : ""; ?>>CSS</option>

											</select>
										</div>
									</div>
								</div>

							</form>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-info" id="submit">Search</button>
						</div>
						<!-- /.card-footer -->
					</form>
				</div>
				<div class="card">

					<!-- /.card-header -->
					<div class="card-body table-responsive">
						<table class="table table-bordered" id="tbl_router">
							<thead>
								<tr>
									<th style="width: 10px">#</th>
									<th>SAP ID</th>
									<th>HOST Name</th>
									<th>LOOP back</th>
									<th>MAC Address</th>
									<th>Assigned</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php

								if (is_array($arrResult) && count($arrResult) > 0) {
									foreach ($arrResult as $key => $router) {

								?>
										<tr>
											<td><?= ++$key; ?></td>
											<td><?= $router['sapid']; ?></td>
											<td><?= $router['hostname']; ?></td>
											<td><?= $router['loopback']; ?></td>
											<td><?= $router['mac_address']; ?></td>
											<td><?= ($router['flg_is_assigned'] == 1) ? 'Assigned' : 'Not Yet'; ?></td>
											<td><?= ($router['flg_status'] == 1) ? 'Active' : 'Inactive'; ?></td>
											<td><?php
												$edit   = '<a class="btn btn-sm btn-primary" title ="edit" href="' . site_url('routers/edit/' . $router['id'] . '/' . $page_no) . '"><i class="fas fa-edit"></i></a> | ';
												$delete = '<a class="btn btn-sm bg-gradient-danger" title ="delete" href="' . site_url('routers/delete/' . $router['id'] . '/' . $page_no) . '"><i class="fas fa-trash"></i></a> | ';

												if ($router['flg_status'] == 1) {
													$activate = '<a class="btn btn-sm bg-gradient-danger" title ="deactivate" href="' . site_url('routers/deactivate/' . $router['id'] . '/' . $page_no) . '"><i class="fas fa-lock"></i></a> ';
												} else {
													$activate = '<a class="btn btn-sm bg-gradient-green" title ="activate" href="' . site_url('routers/activate/' . $router['id'] . '/' . $page_no) . '"><i class="fas fa-unlock"></i></a>';
												}
												echo  $edit . $delete . $activate; ?></td>

										</tr>
								<?php }
								} else {
									echo "<tr><td colspan='8'>No Data Found</td></tr>";
								} ?>
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
					<div class="card-footer clearfix">
						<nav aria-label="Contacts Page Navigation float-right">
							<?= $page['pagermessage']; ?>
							<?= $page['paginglinks']; ?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('includes/footer.php'); ?>
<script>
	$('body').on('click', '#submit', function(e) {
		console.log('a');
		e.preventDefault();
		var url = "<?php echo site_url(); ?>/routers/getAjaxRouters";
		$.ajax({
			type: "get",
			url: url,
			dataType: 'json',
			data: $('#frm-router').serialize(),
			success: function(response) {
				$("#tbl_router tbody").html('');
				var tr = "";
				if (response.total > 0) {
					var result = response.arrResult;
					$.each(result, function(i, val) {
						tr += '<tr>';
						tr += '<td >' + val.id + '</td>';
						tr += '<td >' + val.sapid + ' </td>';
						tr += '<td >' + val.hostname + '</td>';
						tr += '<td >' + val.loopback + ' </td>';
						tr += '<td >' + val.mac_address + '</td>';

						tr += '<td >' + ((val.flg_is_assigned == 1) ? 'Assigned' : 'Not Yet') + '</td> ';

						tr += '<td >' + ((val.flg_status == 1) ? 'active ' : 'Inactive ') + '</td>';

						tr += '<td >' + '<a class="btn btn-sm btn-primary" title ="edit" href="' + "<?php echo site_url('routers/edit/') ?>" + val.id + '"><i class="fas fa-edit"></i></a> | ';

						tr += '<a class="btn btn-sm bg-gradient-danger" title ="edit" href="' + "<?php echo site_url('routers/delete/') ?>" + val.id + '" > <i class = "fas fa-trash" > </i></a> | ';
						if (val.flg_status == 1) {
							tr += '<a class="btn btn-sm bg-gradient-danger" title ="deactivate" href="' + "<?php echo site_url('routers/deactivate/') ?>" + val.id + '" > <i class = "fas fa-lock" > </i></a> | ';
						} else {
							tr += '<a class="btn btn-sm bg-gradient-success" title ="edit" href="' + "<?php echo site_url('routers/activate/') ?>" + val.id + '" > <i class = "fas fa-unlock" > </i></a>';
						}

						tr += '</td></tr>';
					});

				} else {
					tr += '<tr><td colspan="8">No Data Found</td></tr>';
				}
				$("#tbl_router tbody").append(tr);

			},
			error: function(e) {}
		});

	});
</script>