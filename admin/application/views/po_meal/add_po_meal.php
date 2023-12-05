<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<!-- Title -->
			<div class="row form-group">
				<div class="col-lg-6">
					<h3 class="title-5 m-b-35">New PO Meal</h3>
					<div class="card">
						<div class="card-header">
							<strong>PO Meal Detail</strong>
						</div>
						<div class="card-body card-block">
							<div class="row form-group">
								<div class="col col-sm-5">
									<label for="input-normal" class=" form-control-label">Title</label>
								</div>
								<div class="col col-sm-6">
									<input type="text" id="input-normal" name="Title" placeholder="Type here..." class="form-control">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-sm-5">
									<label for="input-normal" class=" form-control-label">Begin Date</label>
								</div>
								<div class="col col-sm-6">
									<input type="date" id="input-normal" name="Begin" placeholder="Type here..." class="form-control">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-sm-5">
									<label for="input-normal" class=" form-control-label">End Date</label>
								</div>
								<div class="col col-sm-6">
									<input type="date" id="input-normal" name="End" placeholder="Type here..." class="form-control">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-sm-5">
									<label for="input-normal" class=" form-control-label">Status</label>
								</div>
								<div class="col col-sm-6">
									<select name="Status" id="input-normal" class="form-control">
										<option value="ACTIVE">Active</option>
										<option value="INACTIVE">Inactive</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- Table -->
			<div class="row form-group">
				<div class="col-md-12">
					<!-- DATA TABLE -->
					<div class="table-responsive">
						<table class="table table-data2">
							<thead>
								<tr>
									<th rowspan="2" class="align-middle">Week 1</th>
									<th>Monday</th>
									<th>Tuesday</th>
									<th>Wednesday</th>
									<th>Thrusday</th>
									<th>Friday</th>
								</tr>
								<tr>
									<th>6/11/2023</th>
									<th>7/11/2023</th>
									<th>8/11/2023</th>
									<th>9/11/2023</th>
									<th>10/11/2023</th>
								</tr>
							</thead>

							<!-- Daily Set -->
							<tbody>
								<tr class="tr">
									<td rowspan="2" class="align-middle">Daily Set</td>
									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($dailyset as $daily) : ?>
												<option value="<?= $daily['id'] ?>"><?= $daily['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<br>
										<?php foreach ($menus as $menu) : ?>
											<li class="text-dark"><?= $menu['name'] ?><span style="display:inline-block; width: 7px;"></span><input id="" name="" value="" type="checkbox"></li>
										<?php endforeach; ?>
									</td>



									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($dailyset as $daily) : ?>
												<option value="<?= $daily['id'] ?>"><?= $daily['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<br>
										<?php foreach ($menus as $menu) : ?>
											<li class="text-dark"><?= $menu['name'] ?><span style="display:inline-block; width: 7px;"></span><input id="" name="" value="" type="checkbox"></li>
										<?php endforeach; ?>
									</td>

									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($dailyset as $daily) : ?>
												<option value="<?= $daily['id'] ?>"><?= $daily['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<br>
										<?php foreach ($menus as $menu) : ?>
											<li class="text-dark"><?= $menu['name'] ?><span style="display:inline-block; width: 7px;"></span><input id="" name="" value="" type="checkbox"></li>
										<?php endforeach; ?>
									</td>

									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($dailyset as $daily) : ?>
												<option value="<?= $daily['id'] ?>"><?= $daily['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<br>
										<?php foreach ($menus as $menu) : ?>
											<li class="text-dark"><?= $menu['name'] ?><span style="display:inline-block; width: 7px;"></span><input id="" name="" value="" type="checkbox"></li>
										<?php endforeach; ?>
									</td>

									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($dailyset as $daily) : ?>
												<option value="<?= $daily['id'] ?>"><?= $daily['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<br>
										<?php foreach ($menus as $menu) : ?>
											<li class="text-dark"><?= $menu['name'] ?><span style="display:inline-block; width: 7px;"></span><input id="" name="" value="" type="checkbox"></li>
										<?php endforeach; ?>
									</td>
								</tr>


								<tr class="tr">
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
								</tr>
								<tr class="spacer"></tr>

								<!-- Pasta -->
								<tr class="tr">
									<td rowspan="2" class="align-middle">Pasta</td>
									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($pastas as $pasta) : ?>
												<option value="<?= $pasta['id'] ?>"><?= $pasta['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</td>

									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($pastas as $pasta) : ?>
												<option value="<?= $pasta['id'] ?>"><?= $pasta['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</td>

									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($pastas as $pasta) : ?>
												<option value="<?= $pasta['id'] ?>"><?= $pasta['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</td>

									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($pastas as $pasta) : ?>
												<option value="<?= $pasta['id'] ?>"><?= $pasta['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</td>

									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($pastas as $pasta) : ?>
												<option value="<?= $pasta['id'] ?>"><?= $pasta['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</td>
								</tr>

								<tr class="tr">
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
								</tr>
								<tr class="spacer"></tr>

								<!-- Breakfast and Stall -->
								<tr class="tr">
									<td rowspan="2" class="align-middle">Breakfast and Stall</td>
									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($breakfasts as $breakfast) : ?>
												<option value="<?= $breakfast['id'] ?>"><?= $breakfast['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</td>

									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($breakfasts as $breakfast) : ?>
												<option value="<?= $breakfast['id'] ?>"><?= $breakfast['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</td>

									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($breakfasts as $breakfast) : ?>
												<option value="<?= $breakfast['id'] ?>"><?= $breakfast['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</td>

									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($breakfasts as $breakfast) : ?>
												<option value="<?= $breakfast['id'] ?>"><?= $breakfast['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</td>

									<td class="desc">
										<select name="select" id="input-normal" class="form-control">
											<option value="0">Select Menu..</option>
											<?php foreach ($breakfasts as $breakfast) : ?>
												<option value="<?= $breakfast['id'] ?>"><?= $breakfast['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</td>
								</tr>

								<tr class="tr">
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
									<td>
										<input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- END DATA TABLE -->
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
						Submit
					</button>
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
			<div class="modal-body">
				Are you sure to submit?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-primary">Yes</button>
			</div>
		</div>
	</div>
</div>