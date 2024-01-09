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

						<div class="card-body card-block">
							<div class="row form-group">
								<div class="col col-sm-5">
									<label for="input-normal" class="form-control-label">Title</label>
								</div>
								<div class="col col-sm-6">
									<input type="text" id="input-normal" placeholder="" name="Title" class="form-control">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-sm-5">
									<label for="input-normal" class=" form-control-label">Begin Date</label>
								</div>
								<div class="col col-sm-6">
									<input id="input-normal" placeholder="" name="Begin" class="form-control">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-sm-5">
									<label for="input-normal" class=" form-control-label">End Date</label>
								</div>
								<div class="col col-sm-6">
									<input id="input-normal" placeholder="" name="End" class="form-control">
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-sm-5">
									<label for="input-normal" class=" form-control-label">Status</label>
								</div>
								<div class="col col-sm-6">
									<input id="input-normal" placeholder="" name="Status" class="form-control">
								</div>
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
								<th style="text-align: center; font-size: 16px;"></th>
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

						<?php
						$dates = isset($_GET['dates']) ? explode(',', $_GET['dates']) : array();
						?>

						<!-- Daily Set -->
						<tbody>
							<tr>
								<td rowspan="2" class="align-middle">Daily Set</td>
								<?php for ($i = 0; $i < 12; $i++) : ?>
									<td class="dailyset">
										<div style="display: flex; align-items: center;">
											<select name="Dailyset_parent[<?= $i ?>]" id="dailyset<?= $i ?>" class="form-control" onchange="checkCheckbox(<?= $i ?>)">
												<option disabled selected>Select Menu..</option>
												<?php foreach ($dailyset as $daily) : ?>
													<option value="<?= $daily['id'] ?>"> <?= $daily['name'] ?></option>
												<?php endforeach; ?>
											</select>
											<input name="Dailyset_price[<?= $i ?>]" type="number" style="width: 30%; margin-left: 7px;" placeholder="Price..." class="form-control" onclick="document.getElementById('open-checkbox<?= $i ?>').checked = true;">
											<input name="Dates[<?= $i ?>]" id="dailysetParentDate<?= $i ?>" type="checkbox" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
											<input type="checkbox" id="open-checkbox<?= $i ?>" onchange="toggleCheckboxes(<?= $i ?>)" style="display: none;">
										</div>
										<br>
										<?php foreach ($menus as $j => $menu) : ?>
											<div style="display: flex; align-items: center;" class="pb-2">
												<input name="Id_menu[<?= $i ?>][<?= $j ?>]" id="checkbox<?= $i ?><?= $j ?>" value="<?= $menu['id'] ?>-<?= $menu['category_id'] ?>" type="checkbox" style="margin-right: 7px;" onclick="checkMenuCheckbox(<?= $i ?>, <?= $j ?>)" disabled>
												<span class="text-dark"><?= wordwrap($menu['name'], 36, "<br />\n", true) ?></span>
												<input name="Price[<?= $i ?>][<?= $j ?>]" type="number" style="width: 120px; margin-left: 7px;" placeholder="Price..." class="form-control">
												<input name="Dates[<?= $i ?>][<?= $j ?>]" id="dailysetDate<?= $i ?><?= $j ?>" type="checkbox" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none ;" class="form-control">
											</div>
										<?php endforeach; ?>

									</td>
								<?php endfor; ?>
							</tr>
						</tbody>


						<tbody>
							<tr>
								<td rowspan="2" class="align-middle">Pasta</td>
								<?php for ($i = 0; $i < 12; $i++) : ?>
									<td class="pasta">
										<select name="Pasta_parent[<?= $i ?>]" id="pasta<?= $i ?>" class="form-control" onchange="document.getElementById('pastaDate<?= $i ?>').checked = this.value !== '';">
											<option disabled selected>Select Menu..</option>
											<?php foreach ($pastas as $pasta) : ?>
												<option value="<?= $pasta['id'] ?>"><?= $pasta['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Pasta_price[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="pastaDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
									</td>
								<?php endfor; ?>
							</tr>
						</tbody>


						<tbody>
							<tr class="tr">
								<td rowspan="2" class="align-middle">Breakfast and Stall</td>
								<?php for ($i = 0; $i < 12; $i++) : ?>
									<td class="breakfast">
										<select name="Breakfast_parent[<?= $i ?>]" id="breakfast<?= $i ?>" class="form-control" onchange="document.getElementById('breakfastDate<?= $i ?>').checked = this.value !== '';">
											<option disabled selected>Select Menu..</option>
											<?php foreach ($breakfasts as $breakfast) : ?>
												<option value="<?= $breakfast['id'] ?>"><?= $breakfast['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Breakfast_price[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="breakfastDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
										<br><br>

										<select name="Breakfast_parent2[<?= $i ?>]" id="breakfast2<?= $i ?>" class="form-control" onchange="document.getElementById('breakfastDate2<?= $i ?>').checked = this.value !== '';">
											<option disabled selected>Select Menu..</option>
											<?php foreach ($breakfasts as $breakfast) : ?>
												<option value="<?= $breakfast['id'] ?>"><?= $breakfast['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Breakfast_price2[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="breakfastDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
										<br><br>

										<select name="Breakfast_parent3[<?= $i ?>]" id="breakfast3<?= $i ?>" class="form-control" onchange="document.getElementById('breakfastDate3<?= $i ?>').checked = this.value !== '';">
											<option disabled selected>Select Menu..</option>
											<?php foreach ($breakfasts as $breakfast) : ?>
												<option value="<?= $breakfast['id'] ?>"><?= $breakfast['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Breakfast_price3[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="breakfastDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
										<br><br>
									</td>
								<?php endfor; ?>
							</tr>
						</tbody>
					</table>
				</div>


			</div>
		</div>