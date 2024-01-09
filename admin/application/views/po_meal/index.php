<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<!-- DATA TABLE -->
							<h3 class="title-5 m-b-35">PO Meal List</h3>
							<div class="table-data__tool">
								<div class="table-data__tool-left">
									<a class="au-btn au-btn-icon au-btn--green au-btn--small" href="<?= base_url(); ?>po_meal/add_po_meal">
										<i class="zmdi zmdi-plus"></i>create new
									</a>
								</div>
							</div>
							<div class="table-responsive table-responsive-data2">
								<table class="table table-data2">
									<thead>
										<tr>
											<th>no</th>
											<th></th>
											<th>title</th>
											<th>begin date</th>
											<th>end date</th>
											<th>status</th>
											<th>edit</th>
											<th>delete</th>
										</tr>
									</thead>

									<tbody>
										<?php foreach ($po_meal as $po) : ?>
											<tr class="tr-shadow">
												<td style="vertical-align: middle;"><?= $po['id']; ?></td>
												<td><a href="<?= base_url(); ?>po_meal/history_po_meal?remark=<?= $po['remark']; ?>&begin_date=<?= $po['begin_date']; ?>&end_date=<?= $po['end_date']; ?>&status=<?= $po['status']; ?>">check</a></td>
												<td><?= $po['remark']; ?></td>
												<td><?= $po['begin_date']; ?></td>
												<td><?= $po['end_date']; ?></td>
												<td>
													<?php if ($po['status'] == 'ACTIVE') : ?>
														<span class="status--process"><?= $po['status']; ?></span>
													<?php else : ?>
														<span class="status--denied"><?= $po['status']; ?></span>
													<?php endif; ?>
												</td>
												<td>
													<div class="table-data-feature">
														<a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="<?= base_url(); ?>po_meal/edit_po_meal">
															<i class="zmdi zmdi-edit"></i>
														</a>
													</div>
												</td>
												<td>
													<div class="table-data-feature">
														<button type="button" class="btn item" data-toggle="modal" data-target="#exampleModalCenter" title="Delete">
															<i class="zmdi zmdi-delete"></i>
														</button>
													</div>
												</td>
											</tr>
											<tr class="spacer"></tr>
										<?php endforeach; ?>
									</tbody>


								</table>
							</div>
							<!-- END DATA TABLE -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Pop-up -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">Are you sure to delete it?</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					No
				</button>
				<button type="button" class="btn btn-primary">Yes</button>
			</div>
		</div>
	</div>
</div>
