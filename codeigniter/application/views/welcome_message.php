<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding: 0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}

		form div {
			margin-bottom: 10px;
		}

		form label {
			font-weight: bold;
		}

		form .submit-btn {
			margin-left: auto;
			margin-top: auto;
			/* align-items: center;
			size: 45%; */
		}

		p.thanks_label {
			font-size: 36px;
			text-align: center;
		}
	</style>

	<!-- Style for table -->
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}

		table,
		th {
			border: 1px solid black;
			padding: 15px;
			text-align: center;
			width: auto;
		}

		td {
			border: 1px solid black;
			padding: 15px;
			text-align: left;
			width: auto;
		}

		table {
			margin-bottom: 3%;
		}
	</style>

</head>

<body>

	<div id="container">
		<h1>Welcome to CodeIgniter! Hello World</h1>

		<!-- <div id="body">
			<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

			<p>If you would like to edit this page you'll find it located at:</p>
			<code>application/views/welcome_message.php</code>

			<p>The corresponding controller for this page is found at:</p>
			<code>application/controllers/Welcome.php</code>

			<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="userguide3/">User Guide</a>.</p> -->


		<!-- <?php foreach ($product_item as $item) : ?>
				<li><?php echo $item['name']; ?></li>
			<?php endforeach; ?> -->
		<!-- </div> -->


		<h1>Pre Order Purchase Meals From
			<?php foreach ($dates as $item) : ?>
				<?php echo $item['begin_date']; ?>
			<?php endforeach; ?>
			to
			<?php foreach ($dates as $item) : ?>
				<?php echo $item['end_date']; ?>
			<?php endforeach; ?>
		</h1>

		<h3><?php foreach ($dates as $item) : ?>
				<?php echo $item['remark']; ?>
			<?php endforeach; ?>
		</h3>

		<form method="post" action="<?php echo site_url('Welcome/submit_order'); ?>">
			<div>
				<label for=" Email">Email:</label>
				<input type="email" name="Email" required>
			</div>
			<div>
				<label for="Student's Complete Name">Student's Complete Name:</label>
				<input type="text" maxlength=100 name="Name" required>
			</div>
			<div>
				<label for="Grade Level">Grade Level:</label>
				<input type="text" maxlength=50 name="Grade" required>
			</div>
			<div>
				<label for="Parent's Phone Number">Parent's Phone Number:</label>
				<input type="text" maxlength=50 name="Phone_Number" required>
			</div>
			<?php if ($this->session->flashdata('thank_you_note')) : ?>
				<p class="thanks_label"><?php echo $this->session->flashdata('thank_you_note'); ?></p>
			<?php endif; ?>

			<div class="total-container">
				<h3>Total: <span style="display:inline-block; width: 10px;"></span></h3>
				<h3 id="totalPrice"></h3>
			</div>

			<h1>Daily Set</h1>
			<table>
				<tr>
					<th>All <br><input type="checkbox" id="checkboxall1"></th>
					<th>Monday<br>
					<th>Tuesday<br>
					<th>Wednesday<br>
					<th>Thursday<br>
					<th>Friday<br>
				</tr>
				<tr>
					<td rowspan="2">Week 1<br><input type="checkbox" id="checkboxweek1daily"></td>
					<?php foreach ($dates as $item) : ?>
					<?php
						$previous_date = null;
						$date = new DateTime($item['begin_date']);
						$days_added = 0;

						for ($i = 0; $days_added < 5; $i++) : // Add a day
							// Print the date and increment the counter
							echo '<td>' . $date->format('j M Y') . '</td>';
							$date->modify('+1 day');
							$days_added++;
						endfor;
					endforeach; ?>
				</tr>
				<tr>
					<?php
					$counter = 1;
					$previous_date = null; // Add this line
					foreach ($dates as $item) :
						$begin_date = new DateTime($item['begin_date']);
						$end_date = clone $begin_date;
						$end_date->modify('+5 day');

						for ($i = 0; $i < 5; $i++) :
							$date_to_check = clone $begin_date;
							$date_to_check->modify("+$i day");
							if ($date_to_check == $previous_date) continue;
							$previous_date = clone $date_to_check;
							$is_holiday = false;
							$holiday_description = '';

							foreach ($holidays as $holiday) {
								$holiday_date = new DateTime($holiday['date']);

								if ($holiday_date == $date_to_check) {
									$is_holiday = true;
									$holiday_description = $holiday['description'];
									break;
								}
							}

							if ($is_holiday) {
								echo '<td>' . $holiday_description . '</td>';
							} else {
								$menu_found = false;
								foreach ($menu_daily_set as $menu) {
									$menu_date = new DateTime($menu['date']);

									if ($menu_date == $date_to_check) {
										echo '<td>';
										echo $menu['name'] . ' - ' . $menu['price'];
										echo '<input type="checkbox" id="checkboxdaily_week1_day' . ($i + 1) . '_1" name="checkboxes[]" value="' . $menu['id'] . '|' . $menu_date->format('Y-m-d') . '"  data-price="' . $menu['price'] . '" data-date="' . $menu_date->format('Y-m-d') . '" onclick="addValue(this)">';
										echo '<hr>';

										if (isset($child_menus[$menu['id']])) {
											$checkboxId = 2;
											foreach ($child_menus[$menu['id']] as $child_menu) {
												$child_menu_date = new DateTime($child_menu['date']);
												if ($child_menu_date == $date_to_check) {
													echo $child_menu['name'] . ' - ' . $child_menu['price'];
													echo '<input type="checkbox" id="checkboxdaily_week1_day' . ($i + 1) . '_' . $checkboxId . '" name="checkboxes[]"  value="' . $child_menu['id'] . '|' . $menu_date->format('Y-m-d') . '" data-price="' . $child_menu['price'] . '" data-date="' . $menu_date->format('Y-m-d') . '"  onclick="addValue(this)"><br> ';
													$checkboxId++;
												}
											}
										}
										$menu_found = true;
										break;
									}
								}

								if (!$menu_found) {
									echo '<td></td>';  // Display a blank cell if no menu found
								}
								echo '<input type="hidden" id="hiddenInput" name="date">';
							}
						endfor;
					endforeach;

					?>
				</tr>





				<tr>
					<td rowspan="2">Week 2<br><input type="checkbox" id="checkboxweek2daily"></td>
					<?php foreach ($dates as $item) : ?>
					<?php
						$date = new DateTime($item['begin_date']);
						$date->modify('+7 day'); // Add 7 days to the start date
						$days_added = 0;

						for ($i = 0; $days_added < 5; $i++) : // Add a day
							// Print the date and increment the counter
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
							$menu_name = '';
							$menu_price = '';
							$menu1_name = '';
							$menu1_price = '';
							$is_holiday = false;
							$holiday_description = '';

							foreach ($holidays as $holiday) {
								$holiday_date = new DateTime($holiday['date']);

								if ($holiday_date == $date_to_check) {
									$is_holiday = true;
									$holiday_description = $holiday['description'];
									break;
								}
							}

							if ($is_holiday) {
								echo '<td>' . $holiday_description . '</td>';
							} else {
								$menu_found = false;
								foreach ($menu_daily_set as $menu) {
									$menu_date = new DateTime($menu['date']);

									if ($menu_date == $date_to_check) {
										echo '<td>';
										echo $menu['name'] . ' - ' . $menu['price'];
										echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxdaily_week2_day' . ($i + 1) . '_1" name="checkboxes[]" value="' . $menu['id'] . '|' . $menu_date->format('Y-m-d') . '" data-price="' . $menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '" onclick="addValue(this)"><br>';
										echo '<hr>';

										if (isset($child_menus[$menu['id']])) {
											$checkboxId = 2;
											foreach ($child_menus[$menu['id']] as $child_menu) {
												echo $child_menu['name'] . ' - ' . $child_menu['price'];
												echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxdaily_week2_day' . ($i + 1) . '_' . $checkboxId . '" name="checkboxes[]" value="' . $child_menu['id'] . '|' . $menu_date->format('Y-m-d') . '"  data-price="' . $child_menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '"  onclick="addValue(this)"><br>';
												$checkboxId++;
											}
										}
										echo '</td>';
										$menu_found = true;
										break;
									}
								}
								if (!$menu_found) {
									echo '<td></td>';  // Display a blank cell if no menu found
								}
							}
					?>
					<?php
						endfor;
					endforeach;
					?>

					<!-- Add more rows as needed -->
			</table>

			<h1>Pasta</h1>
			<table>
				<tr>
					<th>All <br><input type="checkbox" id="checkboxall2"></th>
					<th>Monday<br>
					<th>Tuesday<br>
					<th>Wednesday<br>
					<th>Thursday<br>
					<th>Friday<br>
				</tr>
				<tr>
					<td rowspan="2">Week 1<br><input type="checkbox" id="checkboxweek1pasta"></td>
					<?php foreach ($dates as $item) : ?>
					<?php
						$date = new DateTime($item['begin_date']);
						$days_added = 0;

						for ($i = 0; $days_added < 5; $i++) : // Add a day
							// Print the date and increment the counter
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
							$menu_name = '';
							$menu_price = '';
							$is_holiday = false;
							$holiday_description = '';

							foreach ($holidays as $holiday) {
								$holiday_date = new DateTime($holiday['date']);

								if ($holiday_date == $date_to_check) {
									$is_holiday = true;
									$holiday_description = $holiday['description'];
									break;
								}
							}

							if ($is_holiday) {
								echo '<td>' . $holiday_description . '</td>';
							} else {
								$menu_found = false;
								foreach ($menu_pasta as $menu) {
									$menu_date = new DateTime($menu['date']);

									if ($menu_date == $date_to_check) {
										$menu_name = $menu['name'];
										$menu_price = $menu['price'];
										$menu_found = true;
										$menu_id = $menu['id'];
										break;
									}
								}

								if ($menu_found) {
									$checkboxIdPasta = 1;
									echo '<td>';
									echo $menu_name . ' - ' . $menu_price;
									echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxpasta_week1_day' . ($i + 1) . '_' . $checkboxIdPasta . '" name="checkboxes[]" value="' . $menu_id . '|' . $menu_date->format('Y-m-d') . '"  data-price="' . $menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '"  onclick="addValue(this)"><br>';
									echo '</td>';
									$checkboxIdPasta++;
								} else {
									echo '<td></td>';  // Display a blank cell if no menu found
								}
							}
						endfor;
					endforeach;
					?>
				</tr>





				<tr>
					<td rowspan="2">Week 2<br><input type="checkbox" id="checkboxweek2pasta"></td>
					<?php foreach ($dates as $item) : ?>
					<?php
						$date = new DateTime($item['begin_date']);
						$date->modify('+7 day'); // Add 7 days to the start date
						$days_added = 0;

						for ($i = 0; $days_added < 5; $i++) : // Add a day
							// Print the date and increment the counter
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
							$menu_name = '';
							$menu_price = '';
							$is_holiday = false;
							$holiday_description = '';

							foreach ($holidays as $holiday) {
								$holiday_date = new DateTime($holiday['date']);

								if ($holiday_date == $date_to_check) {
									$is_holiday = true;
									$holiday_description = $holiday['description'];
									break;
								}
							}

							if ($is_holiday) {
								echo '<td>' . $holiday_description . '</td>';
							} else {
								$menu_found = false;
								foreach ($menu_pasta as $menu) {
									$menu_date = new DateTime($menu['date']);

									if ($menu_date == $date_to_check) {
										$menu_name = $menu['name'];
										$menu_price = $menu['price'];
										$menu_found = true;
										$menu_id = $menu['id'];
										break;
									}
								}
								if ($menu_found) {

									$checkboxIdPasta = 1;
									echo '<td>';
									echo $menu_name . ' - ' . $menu_price;
									echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxpasta_week2_day' . ($i + 1) . '_' . $checkboxIdPasta . '" name="checkboxes[]" value="' . $menu_id . '|' . $menu_date->format('Y-m-d') . '"  data-price="' . $menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '"  onclick="addValue(this)"><br>';
									echo '</td>';
									$checkboxIdPasta++;
								} else {
									echo '<td></td>';  // Display a blank cell if no menu found
								}
							}
					?>
					<?php
						endfor;
					endforeach;
					?>

					<!-- Add more rows as needed -->
			</table>

			<h1>Breakfast and stall</h1>
			<table>
				<tr>
					<th>All <br><input type="checkbox" id="checkboxall3"></th>
					<th>Monday<br>
					<th>Tuesday<br>
					<th>Wednesday<br>
					<th>Thursday<br>
					<th>Friday<br>
				<tr>
					<td rowspan="2">Week 1<br><input type="checkbox" id="checkboxweek1breakfast"></td>
					<?php foreach ($dates as $item) : ?>
					<?php
						$date = new DateTime($item['begin_date']);
						$days_added = 0;

						for ($i = 0; $days_added < 5; $i++) : // Add a day
							// Print the date and increment the counter
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
							$menu_name = '';
							$menu_price = '';
							$is_holiday = false;
							$holiday_description = '';

							foreach ($holidays as $holiday) {
								$holiday_date = new DateTime($holiday['date']);

								if ($holiday_date == $date_to_check) {
									$is_holiday = true;
									$holiday_description = $holiday['description'];
									break;
								}
							}

							if ($is_holiday) {
								echo '<td>' . $holiday_description . '</td>';
							} else {
								$menu_found = false;
								foreach ($menu_breakfast as $menu) {
									$menu_date = new DateTime($menu['date']);

									if ($menu_date == $date_to_check) {
										$menu_name = $menu['name'];
										$menu_price = $menu['price'];
										$menu_found = true;
										$menu_id = $menu['id'];
										break;
									}
								}
								if ($menu_found) {
									$checkboxIdBreakfast = 1;
									echo '<td>';
									echo $menu_name . ' - ' . $menu_price;
									echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxbreakfast_week1_day' . ($i + 1) . '_' . $checkboxIdBreakfast . '" name="checkboxes[]" value="' . $menu_id . '|' . $menu_date->format('Y-m-d') . '" data-price="' . $menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '"  onclick="addValue(this)"><br>';
									echo '</td>';
									$checkboxIdBreakfast++;
								} else {
									echo '<td></td>';  // Display a blank cell if no menu found
								}
							}
						endfor;
					endforeach;
					?>
				</tr>





				<tr>
					<td rowspan="2">Week 2<br><input type="checkbox" id="checkboxweek2breakfast"></td>
					<?php foreach ($dates as $item) : ?>
					<?php
						$date = new DateTime($item['begin_date']);
						$date->modify('+7 day'); // Add 7 days to the start date
						$days_added = 0;

						for ($i = 0; $days_added < 5; $i++) : // Add a day
							// Print the date and increment the counter
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
							$menu_name = '';
							$menu_price = '';
							$is_holiday = false;
							$holiday_description = '';

							foreach ($holidays as $holiday) {
								$holiday_date = new DateTime($holiday['date']);

								if ($holiday_date == $date_to_check) {
									$is_holiday = true;
									$holiday_description = $holiday['description'];
									break;
								}
							}

							if ($is_holiday) {
								echo '<td>' . $holiday_description . '</td>';
							} else {
								$menu_found = false;
								foreach ($menu_breakfast as $menu) {
									$menu_date = new DateTime($menu['date']);

									if ($menu_date == $date_to_check) {
										$menu_name = $menu['name'];
										$menu_price = $menu['price'];
										$menu_found = true;
										$menu_id = $menu['id'];
										break;
									}
								}
								if ($menu_found) {
									$checkboxIdBreakfast = 1;
									echo '<td>';
									echo $menu_name . ' - ' . $menu_price;
									echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxbreakfast_week2_day' . ($i + 1) . '_' . $checkboxIdBreakfast . '" name="checkboxes[]" value="' . $menu_id . '|' . $menu_date->format('Y-m-d') . '"  data-price="' . $menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '"  onclick="addValue(this)"><br>';
									echo '</td>';
									$checkboxIdBreakfast++;
								} else {
									echo '<td></td>';  // Display a blank cell if no menu found
								}
							}
					?>
					<?php
						endfor;
					endforeach;
					?>

					<!-- Add more rows as needed -->
			</table>

			<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

			<div>
				<input class="submit-btn" type="Submit" value="Submit">
			</div>
			<!-- <div>
				<input class="submit-btn" type="Submit" value="Submit">
			</div> -->

		</form>


		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>

	script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	<script>
		// Daily Set
		document.getElementById('checkboxall1').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxdaily"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);
		});

		document.getElementById('checkboxweek1daily').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxdaily_week1_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);
		});

		document.getElementById('checkboxweek2daily').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxdaily_week2_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);
		});

		for (let i = 1; i <= 5; i++) {
			let parentCheckbox = document.getElementById('checkboxdaily_week1_day' + i + '_1');
			if (parentCheckbox) {
				parentCheckbox.addEventListener('change', function() {
					let checkboxes = document.querySelectorAll('input[id^="checkboxdaily_week1_day' + i + '_"]');
					checkboxes.forEach(function(checkbox) {
						checkbox.checked = this.checked;
					}, this);
				});

				// Add event listener to child checkboxes
				let childCheckboxes = document.querySelectorAll('input[id^="checkboxdaily_week1_day' + i + '_"]');
				childCheckboxes.forEach(function(childCheckbox) {
					childCheckbox.addEventListener('change', function() {
						if (!this.checked) {
							parentCheckbox.checked = false;
						}
					});
				});
			}
		}


		for (let i = 7; i <= 12; i++) {
			let parentCheckbox = document.getElementById('checkboxdaily_week2_day' + i + '_1');
			if (parentCheckbox) {
				parentCheckbox.addEventListener('change', function() {
					let checkboxes = document.querySelectorAll('input[id^="checkboxdaily_week2_day' + i + '_"]');
					checkboxes.forEach(function(checkbox) {
						checkbox.checked = this.checked;
					}, this);
				});

				let childCheckboxes = document.querySelectorAll('input[id^="checkboxdaily_week2_day' + i + '_"]');
				childCheckboxes.forEach(function(childCheckbox) {
					childCheckbox.addEventListener('change', function() {
						if (!this.checked) {
							parentCheckbox.checked = false;
						}
					});
				});
			}
		}

		//Pasta
		document.getElementById('checkboxall2').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxpasta"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);
		});



		document.getElementById('checkboxweek1pasta').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxpasta_week1_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);
		});

		document.getElementById('checkboxweek2pasta').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxpasta_week2_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);
		});

		//Breakfast
		document.getElementById('checkboxall3').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxbreakfast"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);
		});

		document.getElementById('checkboxweek1breakfast').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxbreakfast_week1_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);
		});

		document.getElementById('checkboxweek2breakfast').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxbreakfast_week2_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);
		});

		// Get all checkboxes
		let checkboxes = document.querySelectorAll('input[type="checkbox"]');

		// Listen for changes on each checkbox
		checkboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				calculateTotal();
			});
		});

		// Function to calculate total
		// Function to calculate total
		// Function to calculate total
		// Function to calculate total
		function calculateTotal() {
			let total = 0;

			// Loop through checkboxes
			checkboxes.forEach(function(checkbox) {
				// If checkbox is checked
				if (checkbox.checked) {
					// If it's a parent checkbox
					if (checkbox.id.endsWith('_1')) {
						// Add its price to the total
						total += parseFloat(checkbox.getAttribute('data-price'));
					} else {
						// If it's a child checkbox, check if the corresponding parent checkbox is not checked
						let parentId = checkbox.id.substring(0, checkbox.id.lastIndexOf('_')) + '_1';
						let parentCheckbox = document.getElementById(parentId);
						if (parentCheckbox && !parentCheckbox.checked) {
							// If the parent checkbox exists and is not checked, add the child checkbox's price to the total
							total += parseFloat(checkbox.getAttribute('data-price'));
						}
					}
				}
			});

			// Display the total
			let totalPriceElement = document.getElementById('totalPrice');
			totalPriceElement.textContent = total.toFixed(0); // Use toFixed(2) to round to 2 decimal places

			$(document).ready(function() {
				$("input[type='checkbox']").click(function() {
					var date = $(this).data('date');
					$('#hiddenInput').val(date);
				});
			});
		}
	</script>



</body>



</html>