<style>
	.table-data2 {
		margin-left: 16px;
	}

	.card {
		margin-bottom: 5px;
	}
</style>

<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<!-- Title -->
			<div class="row form-group">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<strong>PO Meal Detail</strong>
						</div>

						<?php foreach ($all_id_menu as $id_menu) : ?>
							<li><?= $id_menu; ?></li>
						<?php endforeach; ?>

						<div class="card-body card-block">
							<div class="row form-group">
								<div class="col col-sm-8">
									<label for="input-normal" class="form-control-label">Title</label>
								</div>
								<label name="Title"><?= $purchase_meal['remark'] ?></label>

							</div>
							<div class="row form-group">
								<div class="col col-sm-4">
									<label for="input-normal" class=" form-control-label">Begin Date</label>
								</div>
								<input name="Begin"><?= $purchase_meal['begin_date'] ?></label>

							</div>
							<div class="row form-group">
								<div class="col col-sm-4">
									<label for="input-normal" class=" form-control-label">End Date</label>
								</div>
								<input name="End"><?= $purchase_meal['end_date'] ?></label>
							</div>

							<div class="row form-group">
								<div class="col col-sm-4">
									<label for="input-normal" class=" form-control-label">Status</label>
								</div>
								<input name="Status"><?= $purchase_meal['status'] ?></label>
							</div>
						</div>


					</div>


				</div>
			</div>
		</div>


		<div class="row form-group">
			<div class="col-md-12">
				<!-- DATA TABLE -->
				<div class="table-responsive">
					<table id="dataTable" class="table table-data2">
						<thead>
							<tr>
								<th style="text-align: center; font-size: 16px;" id="date1"></th>
								<th style="text-align: center; font-size: 16px;" id="date2"></th>
								<th style="text-align: center; font-size: 16px;" id="date3"></th>
								<th style="text-align: center; font-size: 16px;" id="date4"></th>
								<th style="text-align: center; font-size: 16px;" id="date5"></th>
								<th style="text-align: center; font-size: 16px;" id="date6"></th>
								<th style="text-align: center; font-size: 16px;" id="date7"></th>
								<th style="text-align: center; font-size: 16px;" id="date8"></th>
								<th style="text-align: center; font-size: 16px;" id="date9"></th>
								<th style="text-align: center; font-size: 16px;" id="date10"></th>
							</tr>
						</thead>


					</table>
				</div>


			</div>
		</div>