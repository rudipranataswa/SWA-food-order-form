<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food Order</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/main.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Viga&display=swap" rel="stylesheet">


</head>

<body>
	<div class="container page-header">
		<h1>Pre Order Purchase Meals From
			<?php foreach ($dates as $item) : ?>
				<?php echo $item['begin_date']; ?>
			<?php endforeach; ?>
			-
			<?php foreach ($dates as $item) : ?>
				<?php echo $item['end_date']; ?>
			<?php endforeach; ?>
		</h1>
	</div>

	<div class="container remark pt-5 pb-5">
		<h5><?php foreach ($dates as $item) : ?>
				<?php echo $item['remark']; ?>
			<?php endforeach; ?>
		</h5>
	</div>

	<div class="d-flex align-items-center">
		<div class="container">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-xl-4">
					<div class="card" style="border-radius: 15px;">
						<div class="card-body">
							<h2 class="text-uppercase text-center text-dark mb-3">Fill The Data Below</h2>

							<form method="post" action="<?php echo site_url('Welcome/submit_order'); ?>">
								<div class="form-outline mb-4">
									<label class="form-label text-dark">Email</label>
									<input placeholder="johndoe@gmail.com" type="email" name="Email" class="form-control form-control-lg" />
								</div>

								<div class="form-outline mb-4">
									<label class="form-label text-dark">Student's Complete Name</label>
									<input placeholder="John Doe" type="text" name="Name" class="form-control form-control-lg" />

								</div>

								<div class="form-outline mb-4">
									<label class="form-label text-dark">Grade Level</label>
									<input placeholder="Grade 1" type="text" name="Grade" class="form-control form-control-lg" />
								</div>

								<div class="form-outline mb-4">
									<label class="form-label text-dark">Parent's Phone Number</label>
									<input placeholder="086384678976" type="tel" name="Phone_Number" class="form-control form-control-lg" />
								</div>


							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br>

	<div class="table-responsive mb-5" style="overflow-x:auto;">
		<table class="table table-striped w-auto dailyset-table ">
			<h4><strong>Daily Set</strong></h4>
			<tr>
				<th>All <br><input type="checkbox" id="checkboxall"></th>
				<th>Monday</th>
				<th>Tuesday</th>
				<th>Wednesday</th>
				<th>Thursday</th>
				<th>Friday</th>
			</tr>

			<tr>
				<td rowspan=" 2">Week 1<span style="display:inline-block; width: 7px;"></span><input id="checkboxw1" type="checkbox" onclick="addValue(this)"></td>
				<?php foreach ($dates as $item) : ?>
				<?php
					$date = new DateTime($item['begin_date']);
					$days_added = 0;

					for ($i = 0; $days_added < 5; $i++) :
						echo '<td>' . $date->format('j M Y') . '</td>';
						$date->modify('+1 day');
						$days_added++;
					endfor;
				endforeach; ?>
			</tr>


			<tr>
				<?php
				foreach ($dates as $item) :
					$begin_date = new DateTime($item['begin_date']);
					$end_date = clone $begin_date;
					$end_date->modify('+5 day');

					for ($i = 0; $i < 5; $i++) :
						$date_to_check = clone $begin_date;
						$date_to_check->modify("+$i day");
						$menu_id = '';
						$menu_name = '';
						$menu_price = '';
						$menu1_name = '';
						$menu1_price = '';
						$menu2_name = '';
						$menu2_price = '';
						$menu3_name = '';
						$menu3_price = '';
						$menu4_name = '';
						$menu4_price = '';

						foreach ($menu_daily_set as $menu) {
							$menu_date = new DateTime($menu['date']);

							if ($menu_date == $date_to_check) {
								$menu_id = $menu['id'];
								$menu_name = $menu['name'];
								$menu_price = $menu['price'];
								break;
							}
						}

						foreach ($menu_soup as $menu1) {
							$menu1_date = new DateTime($menu1['date']);

							if ($menu1_date == $date_to_check) {
								$menu1_id = $menu1['id'];
								$menu1_name = $menu1['name'];
								$menu1_price = $menu1['price'];
								break;
							}
						}

						foreach ($menu_protein as $menu2) {
							$menu2_date = new DateTime($menu2['date']);

							if ($menu2_date == $date_to_check) {
								$menu2_id = $menu2['id'];
								$menu2_name = $menu2['name'];
								$menu2_price = $menu2['price'];
								break;
							}
						}

						foreach ($menu_rice as $menu3) {
							$menu3_date = new DateTime($menu3['date']);

							if ($menu3_date == $date_to_check) {
								$menu3_id = $menu3['id'];
								$menu3_name = $menu3['name'];
								$menu3_price = $menu3['price'];
								break;
							}
						}

						foreach ($menu_fruit as $menu4) {
							$menu4_date = new DateTime($menu4['date']);

							if ($menu4_date == $date_to_check) {
								$menu4_id = $menu4['id'];
								$menu4_name = $menu4['name'];
								$menu4_price = $menu4['price'];
								break;
							}
						}
						$checkbox_name = $date_to_check->format('Y-m-d');
				?>
						<td>
							<?php echo $menu_name . ' - ' . $menu_price . '-' . $menu_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 1; ?>" name="<?php echo $checkbox_name . '_ds'; ?>" value="<?php echo $menu_id . ',' . $menu_price; ?>" type="checkbox" onclick="addValue(this,'p')"><br>
							<hr>
							<?php echo $menu1_name . ' - ' . $menu1_price . '-' . $menu1_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 6; ?>" name="<?php echo $checkbox_name . '_ds'; ?>" value="<?php echo $menu1_id . ',' . $menu1_price; ?>" type="checkbox" onclick="addValue(this, 'c')"><br>
							<?php echo $menu2_name . ' - ' . $menu2_price . '-' . $menu2_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 11; ?>" name="<?php echo $checkbox_name . '_ds'; ?>" value="<?php echo $menu2_id . ',' . $menu2_price; ?>" type="checkbox" onclick="addValue(this,'c')"><br>
							<?php echo $menu3_name . ' - ' . $menu3_price . '-' . $menu3_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 16; ?>" name="<?php echo $checkbox_name . '_ds'; ?>" value="<?php echo $menu3_id . ',' . $menu3_price; ?>" type="checkbox" onclick="addValue(this,'c')"><br>
							<?php echo $menu4_name . ' - ' . $menu4_price . '-' . $menu4_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 21; ?>" name="<?php echo $checkbox_name . '_ds'; ?>" value="<?php echo $menu4_id . ',' . $menu4_price; ?>" type="checkbox" onclick="addValue(this,'c')"><br>
						</td>

				<?php
					endfor;
				endforeach;
				?>
			</tr>


			<tr>
				<td rowspan="2">Week 2<span style="display:inline-block; width: 7px;"></span><input id="checkboxw2" type="checkbox" onclick="addValue(this)"></td>
				<?php foreach ($dates as $item) : ?>
				<?php
					$date = new DateTime($item['begin_date']);
					$date->modify('+7 day');
					$days_added = 0;

					for ($i = 0; $days_added < 5; $i++) :
						echo '<td>' . $date->format('j M Y') . '</td>';
						$date->modify('+1 day');
						$days_added++;
					endfor;
				endforeach; ?>
			</tr>

			<tr>
				<?php
				foreach ($dates as $item) :
					$begin_date = new DateTime($item['begin_date']);
					$end_date = clone $begin_date;
					$end_date->modify('+5 day');

					for ($i = 7; $i < 12; $i++) :
						$date_to_check = clone $begin_date;
						$date_to_check->modify("+$i day");
						$menu_id = '';
						$menu_name = '';
						$menu_price = '';
						$menu1_name = '';
						$menu1_price = '';
						$menu2_name = '';
						$menu2_price = '';
						$menu3_name = '';
						$menu3_price = '';
						$menu4_name = '';
						$menu4_price = '';

						foreach ($menu_daily_set as $menu) {
							$menu_date = new DateTime($menu['date']);

							if ($menu_date == $date_to_check) {
								$menu_id = $menu['id'];
								$menu_name = $menu['name'];
								$menu_price = $menu['price'];
								break;
							}
						}

						foreach ($menu_soup as $menu1) {
							$menu1_date = new DateTime($menu1['date']);

							if ($menu1_date == $date_to_check) {
								$menu1_id = $menu1['id'];
								$menu1_name = $menu1['name'];
								$menu1_price = $menu1['price'];
								break;
							}
						}

						foreach ($menu_protein as $menu2) {
							$menu2_date = new DateTime($menu2['date']);

							if ($menu2_date == $date_to_check) {
								$menu2_id = $menu2['id'];
								$menu2_name = $menu2['name'];
								$menu2_price = $menu2['price'];
								break;
							}
						}

						foreach ($menu_rice as $menu3) {
							$menu3_date = new DateTime($menu3['date']);

							if ($menu3_date == $date_to_check) {
								$menu3_id = $menu3['id'];
								$menu3_name = $menu3['name'];
								$menu3_price = $menu3['price'];
								break;
							}
						}

						foreach ($menu_fruit as $menu4) {
							$menu4_date = new DateTime($menu4['date']);

							if ($menu4_date == $date_to_check) {
								$menu4_id = $menu4['id'];
								$menu4_name = $menu4['name'];
								$menu4_price = $menu4['price'];
								break;
							}
						}
				?>
						<td>
							<?php echo $menu_name . ' - ' . $menu_price . '-' . $menu_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 19; ?>" name="<?php echo $checkbox_name . '_ds'; ?>" value="<?php echo $menu_id . ',' . $menu_price; ?>" type="checkbox" onclick="addValue(this, 'p')"><br>
							<hr>
							<?php echo $menu1_name . ' - ' . $menu1_price . '-' . $menu1_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 24; ?>" name="<?php echo $checkbox_name . '_ds'; ?>" value="<?php echo $menu1_id . ',' . $menu1_price; ?>" type="checkbox" onclick="addValue(this, 'c')"><br>
							<?php echo $menu2_name . ' - ' . $menu2_price . '-' . $menu2_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 29; ?>" name="<?php echo $checkbox_name . '_ds'; ?>" value="<?php echo $menu2_id . ',' . $menu2_price; ?>" type="checkbox" onclick="addValue(this, 'c')"><br>
							<?php echo $menu3_name . ' - ' . $menu3_price . '-' . $menu3_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 34; ?>" name="<?php echo $checkbox_name . '_ds'; ?>" value="<?php echo $menu3_id . ',' . $menu3_price; ?>" type="checkbox" onclick="addValue(this, 'c')"><br>
							<?php echo $menu4_name . ' - ' . $menu4_price . '-' . $menu4_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 39; ?>" name="<?php echo $checkbox_name . '_ds'; ?>" value="<?php echo $menu4_id . ',' . $menu4_price; ?>" type="checkbox" onclick="addValue(this, 'c')"><br>
						</td>

				<?php
					endfor;
				endforeach;
				?>
			</tr>

		</table>
	</div>


	<div class="table-responsive mb-5" style="overflow-x:auto;">
		<table class="table table-striped w-auto pasta-table">
			<h4><strong>Pasta</strong></h4>
			<tr>
				<th>All <br><input type="checkbox" id="checkboxall_pasta" onclick="addValue(this)"></th>
				<th>Monday</th>
				<th>Tuesday</th>
				<th>Wednesday</th>
				<th>Thursday</th>
				<th>Friday</th>
			</tr>

			<tr>
				<td rowspan="2">Week 1<span style="display:inline-block; width: 7px;"></span><input id="checkboxw1_pasta" type="checkbox"></td>
				<?php foreach ($dates as $item) : ?>
				<?php
					$date = new DateTime($item['begin_date']);
					$days_added = 0;

					for ($i = 0; $days_added < 5; $i++) :
						echo '<td>' . $date->format('j M Y') . '</td>';
						$date->modify('+1 day');
						$days_added++;
					endfor;
				endforeach; ?>
			</tr>

			<tr>
				<?php
				foreach ($dates as $item) :
					$begin_date = new DateTime($item['begin_date']);
					$end_date = clone $begin_date;
					$end_date->modify('+5 day');

					for ($i = 0; $i < 5; $i++) :
						$date_to_check = clone $begin_date;
						$date_to_check->modify("+$i day");
						$menu_id = '';
						$menu_name = '';
						$menu_price = '';
						$menu1_name = '';
						$menu1_price = '';
						$menu2_name = '';
						$menu2_price = '';
						$menu3_name = '';
						$menu3_price = '';
						$menu4_name = '';
						$menu4_price = '';


						foreach ($menu_pasta as $menu) {
							$menu_date = new DateTime($menu['date']);

							if ($menu_date == $date_to_check) {
								$menu_id = $menu['id'];
								$menu_name = $menu['name'];
								$menu_price = $menu['price'];
								break;
							}
						}
				?>
						<td>
							<?php echo $menu_name . ' - ' . $menu_price . '-' . $menu_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 51; ?>" value="<?php echo $menu_id . ',' . $menu_price; ?>" type="checkbox" onclick="addValue(this)"><br>
						</td>
				<?php
					endfor;
				endforeach;
				?>
			</tr>


			<tr>
				<td rowspan="2">Week 2<span style="display:inline-block; width: 7px;"></span><input id="checkboxw2_pasta" type="checkbox"></td>
				<?php foreach ($dates as $item) : ?>
				<?php
					$date = new DateTime($item['begin_date']);
					$date->modify('+7 day');
					$days_added = 0;

					for ($i = 0; $days_added < 5; $i++) :
						echo '<td>' . $date->format('j M Y') . '</td>';
						$date->modify('+1 day');
						$days_added++;
					endfor;
				endforeach; ?>
			</tr>

			<tr>
				<?php
				foreach ($dates as $item) :
					$begin_date = new DateTime($item['begin_date']);
					$end_date = clone $begin_date;
					$end_date->modify('+5 day');

					for ($i = 7; $i < 12; $i++) :
						$date_to_check = clone $begin_date;
						$date_to_check->modify("+$i day");
						$menu_id = '';
						$menu_name = '';
						$menu_price = '';
						$menu1_name = '';
						$menu1_price = '';
						$menu2_name = '';
						$menu2_price = '';
						$menu3_name = '';
						$menu3_price = '';
						$menu4_name = '';
						$menu4_price = '';


						foreach ($menu_pasta as $menu) {
							$menu_date = new DateTime($menu['date']);

							if ($menu_date == $date_to_check) {
								$menu_id = $menu['id'];
								$menu_name = $menu['name'];
								$menu_price = $menu['price'];
								break;
							}
						}
				?>
						<td>
							<?php echo $menu_name . ' - ' . $menu_price . '-' . $menu_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 49; ?>" value="<?php echo $menu_id . ',' . $menu_price; ?>" type="checkbox" onclick="addValue(this)"><br>
						</td>
				<?php
					endfor;
				endforeach;
				?>
			</tr>

		</table>
	</div>


	<div class="table-responsive mb-5" style="overflow-x:auto;">
		<table class="table table-striped w-auto breakfast-table">
			<h4><strong>Breakfast & Stall</strong></h4>
			<tr>
				<th>All <br><input type="checkbox" id="checkboxall_breakfast" onclick="addValue(this)"></th>
				<th>Monday</th>
				<th>Tuesday</th>
				<th>Wednesday</th>
				<th>Thursday</th>
				<th>Friday</th>
			</tr>
			<tr>
				<td rowspan="2">Week 1<span style="display:inline-block; width: 7px;"></span><input id="checkboxw1_breakfast" type="checkbox"></td>
				<?php foreach ($dates as $item) : ?>
				<?php
					$date = new DateTime($item['begin_date']);
					$days_added = 0;

					for ($i = 0; $days_added < 5; $i++) :
						echo '<td>' . $date->format('j M Y') . '</td>';
						$date->modify('+1 day');
						$days_added++;
					endfor;
				endforeach; ?>
			</tr>

			<tr>
				<?php
				foreach ($dates as $item) :
					$begin_date = new DateTime($item['begin_date']);
					$end_date = clone $begin_date;
					$end_date->modify('+5 day');

					for ($i = 0; $i < 5; $i++) :
						$date_to_check = clone $begin_date;
						$date_to_check->modify("+$i day");
						$menu_id = '';
						$menu_name = '';
						$menu_price = '';
						$menu1_name = '';
						$menu1_price = '';
						$menu2_name = '';
						$menu2_price = '';
						$menu3_name = '';
						$menu3_price = '';
						$menu4_name = '';
						$menu4_price = '';


						foreach ($menu_breakfast as $menu) {
							$menu_date = new DateTime($menu['date']);

							if ($menu_date == $date_to_check) {
								$menu_id = $menu['id'];
								$menu_name = $menu['name'];
								$menu_price = $menu['price'];
								break;
							}
						}
				?>
						<td>
							<?php echo $menu_name . ' - ' . $menu_price . '-' . $menu_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 61; ?>" value="<?php echo $menu_id . ',' . $menu_price; ?>" type="checkbox" onclick="addValue(this)"><br>
						</td>
				<?php
					endfor;
				endforeach;
				?>
			</tr>

			<tr>
				<td rowspan="2">Week 2<span style="display:inline-block; width: 7px;"></span><input id="checkboxw2_breakfast" type="checkbox"></td>
				<?php foreach ($dates as $item) : ?>
				<?php
					$date = new DateTime($item['begin_date']);
					$date->modify('+7 day');
					$days_added = 0;

					for ($i = 0; $days_added < 5; $i++) :
						echo '<td>' . $date->format('j M Y') . '</td>';
						$date->modify('+1 day');
						$days_added++;
					endfor;
				endforeach; ?>
			</tr>

			<tr>
				<?php
				foreach ($dates as $item) :
					$begin_date = new DateTime($item['begin_date']);
					$end_date = clone $begin_date;
					$end_date->modify('+5 day');

					for ($i = 7; $i < 12; $i++) :
						$date_to_check = clone $begin_date;
						$date_to_check->modify("+$i day");
						$menu_id = '';
						$menu_name = '';
						$menu_price = '';
						$menu1_name = '';
						$menu1_price = '';
						$menu2_name = '';
						$menu2_price = '';
						$menu3_name = '';
						$menu3_price = '';
						$menu4_name = '';
						$menu4_price = '';


						foreach ($menu_breakfast as $menu) {
							$menu_date = new DateTime($menu['date']);

							if ($menu_date == $date_to_check) {
								$menu_id = $menu['id'];
								$menu_name = $menu['name'];
								$menu_price = $menu['price'];
								break;
							}
						}
				?>
						<td>
							<?php echo $menu_name . ' - ' . $menu_price . '-' . $menu_id; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $i + 59; ?>" value="<?php echo $menu_id . ',' . $menu_price; ?>" type="checkbox" onclick="addValue(this)"><br>
						</td>
				<?php
					endfor;
				endforeach;
				?>
			</tr>

		</table>
	</div>


	<div class="total-container">
		<h3 style="color: white !important;">Total:<span style="display:inline-block; width: 10px;"></span></h3>
		<h3 style="color: white !important;" id="total">0</h3>
	</div>


	<div class="d-flex justify-content-center">
		<button type="Submit" value="Submit" class="default-btn">Submit</button>
	</div>








	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>