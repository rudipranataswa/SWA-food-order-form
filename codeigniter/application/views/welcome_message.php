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
			-
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
			<!-- <div>
				<input class="submit-btn" type="Submit" value="Submit">
			</div> -->


			<?php if ($this->session->flashdata('thank_you_note')) : ?>
				<p class="thanks_label"><?php echo $this->session->flashdata('thank_you_note'); ?></p>
			<?php endif; ?>


			<h1>Daily Set</h1>
			<table>
				<tr>
					<th>All <br><input type="checkbox"></th>
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
				</tr>
				<tr>
					<td rowspan="2">Week 1</td>
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
					$counter = 1;
					foreach ($dates as $item) :
						$begin_date = new DateTime($item['begin_date']);
						$end_date = clone $begin_date;
						$end_date->modify('+5 day');

						for ($i = 0; $i < 5; $i++) :
							$date_to_check = clone $begin_date;
							$date_to_check->modify("+$i day");
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
									$menu_name = $menu['name'];
									$menu_price = $menu['price'];
									break;
								}
							}

							foreach ($menu_soup as $menu1) {
								$menu1_date = new DateTime($menu1['date']);

								if ($menu1_date == $date_to_check) {
									$menu1_name = $menu1['name'];
									$menu1_price = $menu1['price'];
									break;
								}
							}

							foreach ($menu_protein as $menu2) {
								$menu2_date = new DateTime($menu2['date']);

								if ($menu2_date == $date_to_check) {
									$menu2_name = $menu2['name'];
									$menu2_price = $menu2['price'];
									break;
								}
							}

							foreach ($menu_rice as $menu3) {
								$menu3_date = new DateTime($menu3['date']);

								if ($menu3_date == $date_to_check) {
									$menu3_name = $menu3['name'];
									$menu3_price = $menu3['price'];
									break;
								}
							}

							foreach ($menu_fruit as $menu4) {
								$menu4_date = new DateTime($menu4['date']);

								if ($menu4_date == $date_to_check) {
									$menu4_name = $menu4['name'];
									$menu4_price = $menu4['price'];
									break;
								}
							}
					?>
							<td>
								<?php echo $menu_name . ' - ' . $menu_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $counter++; ?>" value="<?php echo $menu_name; ?>" type="checkbox" onclick="addValue(this)"><br>
								<hr>
								<?php echo $menu1_name . ' - ' . $menu1_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $counter++; ?>" value="<?php echo $menu1_name; ?>" type="checkbox" onclick="addValue(this)"><br>
								<?php echo $menu2_name . ' - ' . $menu2_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $counter++; ?>" value="<?php echo $menu2_name; ?>" type="checkbox" onclick="addValue(this)"><br>
								<?php echo $menu3_name . ' - ' . $menu3_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $counter++; ?>" value="<?php echo $menu3_name; ?>" type="checkbox" onclick="addValue(this)"><br>
								<?php echo $menu4_name . ' - ' . $menu4_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $counter++; ?>" value="<?php echo $menu4_name; ?>" type="checkbox" onclick="addValue(this)"><br>
							</td>
					<?php
						endfor;
					endforeach;
					?>
				</tr>




				<tr>
					<td rowspan="2">Week 2</td>
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
					$counter = 26;
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
							$menu2_name = '';
							$menu2_price = '';
							$menu3_name = '';
							$menu3_price = '';
							$menu4_name = '';
							$menu4_price = '';


							foreach ($menu_daily_set as $menu) {
								$menu_date = new DateTime($menu['date']);

								if ($menu_date == $date_to_check) {
									$menu_name = $menu['name'];
									$menu_price = $menu['price'];
									break;
								}
							}

							foreach ($menu_soup as $menu1) {
								$menu1_date = new DateTime($menu1['date']);

								if ($menu1_date == $date_to_check) {
									$menu1_name = $menu1['name'];
									$menu1_price = $menu1['price'];
									break;
								}
							}

							foreach ($menu_protein as $menu2) {
								$menu2_date = new DateTime($menu2['date']);

								if ($menu2_date == $date_to_check) {
									$menu2_name = $menu2['name'];
									$menu2_price = $menu2['price'];
									break;
								}
							}

							foreach ($menu_rice as $menu3) {
								$menu3_date = new DateTime($menu3['date']);

								if ($menu3_date == $date_to_check) {
									$menu3_name = $menu3['name'];
									$menu3_price = $menu3['price'];
									break;
								}
							}

							foreach ($menu_fruit as $menu4) {
								$menu4_date = new DateTime($menu4['date']);

								if ($menu4_date == $date_to_check) {
									$menu4_name = $menu4['name'];
									$menu4_price = $menu4['price'];
									break;
								}
							}
					?>
							<td>
								<?php echo $menu_name . ' - ' . $menu_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $counter++; ?>" value="<?php echo $menu_name; ?>" type="checkbox" onclick="addValue(this)"><br>
								<hr>
								<?php echo $menu1_name . ' - ' . $menu1_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $counter++; ?>" value="<?php echo $menu1_price; ?>" type="checkbox" onclick="addValue(this)"><br>
								<?php echo $menu2_name . ' - ' . $menu2_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $counter++; ?>" value="<?php echo $menu2_price; ?>" type="checkbox" onclick="addValue(this)"><br>
								<?php echo $menu3_name . ' - ' . $menu3_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $counter++; ?>" value="<?php echo $menu3_price; ?>" type="checkbox" onclick="addValue(this)"><br>
								<?php echo $menu4_name . ' - ' . $menu4_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox<?php echo $counter++; ?>" value="<?php echo $menu4_price; ?>" type="checkbox" onclick="addValue(this)"><br>
							</td>
					<?php
						endfor;
					endforeach;
					?>

					<!-- Add more rows as needed -->
			</table>

			<h1>Pasta</h1>
			<table>
				<tr>
					<th>All <br><input type="checkbox"></th>
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
				</tr>
				<tr>
					<td rowspan="2">Week 1</td>
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

							foreach ($menu_pasta as $menu) {
								$menu_date = new DateTime($menu['date']);

								if ($menu_date == $date_to_check) {
									$menu_name = $menu['name'];
									$menu_price = $menu['price'];
									break;
								}
							}
					?>
							<td>
								<?php echo $menu_name . ' - ' . $menu_price; ?><br>
							</td>
					<?php
						endfor;
					endforeach;
					?>
				</tr>




				<tr>
					<td rowspan="2">Week 2</td>
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


							foreach ($menu_pasta as $menu) {
								$menu_date = new DateTime($menu['date']);

								if ($menu_date == $date_to_check) {
									$menu_name = $menu['name'];
									$menu_price = $menu['price'];
									break;
								}
							}

					?>
							<td>
								<?php echo $menu_name . ' - ' . $menu_price; ?><br>

							</td>
					<?php
						endfor;
					endforeach;
					?>

					<!-- Add more rows as needed -->
			</table>

			<h1>Breakfast and stall</h1>
			<table>
				<tr>
					<th>All <br><input type="checkbox"></th>
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
				</tr>
				<tr>
					<td rowspan="2">Week 1</td>
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

							foreach ($menu_breakfast as $menu) {
								$menu_date = new DateTime($menu['date']);

								if ($menu_date == $date_to_check) {
									$menu_name = $menu['name'];
									$menu_price = $menu['price'];
									break;
								}
							}
					?>
							<td>
								<?php echo $menu_name . ' - ' . $menu_price; ?><br>
							</td>
					<?php
						endfor;
					endforeach;
					?>
				</tr>




				<tr>
					<td rowspan="2">Week 2</td>
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


							foreach ($menu_breakfast as $menu) {
								$menu_date = new DateTime($menu['date']);

								if ($menu_date == $date_to_check) {
									$menu_name = $menu['name'];
									$menu_price = $menu['price'];
									break;
								}
							}

					?>
							<td>
								<?php echo $menu_name . ' - ' . $menu_price; ?><br>

							</td>
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

		</form>


		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>
</body>

</html>