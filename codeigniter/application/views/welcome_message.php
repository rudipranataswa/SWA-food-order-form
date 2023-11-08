<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food Order</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="/codeigniter/application/main.css">


	<style>
		* {
			margin: 0;
			padding: 0;
		}

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

		.form-control::placeholder {
			font-size: 14px;
			opacity: 0.5;
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
		}

		p.thanks_label {
			font-size: 36px;
			text-align: center;
		}

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

		.gradient-custom-3 {
			background: #84fab0;
			background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));
			background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
		}

		.gradient-custom-4 {
			background: #84fab0;
			background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
			background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
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


		<?php foreach ($product_item as $item) : ?>
			<li><?php echo $item['name']; ?></li>
		<?php endforeach; ?>
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



		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>

	<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
		<div class="mask d-flex align-items-center h-100 gradient-custom-3">
			<div class="container h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
					<div class="col-12 col-md-9 col-lg-7 col-xl-6">
						<div class="card" style="border-radius: 15px;">
							<div class="card-body p-5">
								<h2 class="text-uppercase text-center mb-5">Fill The Data Below</h2>

								<form method="post" action="<?php echo site_url('Welcome/submit_order'); ?>">
									<div class="form-outline mb-4">
										<input placeholder="johndoe@gmail.com" type="email" name="Email" class="form-control form-control-lg" />
										<label class="form-label">Email</label>
									</div>

									<div class="form-outline mb-4">
										<input placeholder="John Doe" type="text" name="Name" class="form-control form-control-lg" />
										<label class="form-label">Student's Complete Name</label>
									</div>

									<div class="form-outline mb-4">
										<input placeholder="Grade 1" type="text" name="Grade" class="form-control form-control-lg" />
										<label class="form-label">Grade Level</label>
									</div>

									<div class="form-outline mb-4">
										<input placeholder="086384678976" type="tel" name="Phone_Number" class="form-control form-control-lg" />
										<label class="form-label">Parent's Phone Number</label>
									</div>

									<div class="d-flex justify-content-center pb-3">
										<button type="Submit" value="Submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Submit</button>
									</div>

									<?php if ($this->session->flashdata('thank_you_note')) : ?>
										<p class="thanks_label"><?php echo $this->session->flashdata('thank_you_note'); ?></p>
									<?php endif; ?>

								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br>

	<table class="dailyset-table mb-5">
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
						<?php echo $menu_name . ' - ' . $menu_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox1" value="<?php echo $menu_price; ?>" type="checkbox" onclick="addValue(this)"><br>
						<hr>
						<?php echo $menu1_name . ' - ' . $menu1_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox2" value="<?php echo $menu1_price; ?>" type="checkbox" onclick="addValue(this)"><br>
						<?php echo $menu2_name . ' - ' . $menu2_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox3" value="<?php echo $menu2_price; ?>" type="checkbox" onclick="addValue(this)"><br>
						<?php echo $menu3_name . ' - ' . $menu3_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox4" value="<?php echo $menu3_price; ?>" type="checkbox" onclick="addValue(this)"><br>
						<?php echo $menu4_name . ' - ' . $menu4_price; ?><span style="display:inline-block; width: 7px;"></span><input id="checkbox5" value="<?php echo $menu4_price; ?>" type="checkbox" onclick="addValue(this)"><br>
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
						<?php echo $menu_name . ' - ' . $menu_price; ?><br>
						<hr>
						<?php echo $menu1_name . ' - ' . $menu1_price; ?><br>
						<?php echo $menu2_name . ' - ' . $menu2_price; ?><br>
						<?php echo $menu3_name . ' - ' . $menu3_price; ?><br>
						<?php echo $menu4_name . ' - ' . $menu4_price; ?><br>
					</td>
			<?php
				endfor;
			endforeach;
			?>

	</table>


	<div style="display: flex; margin-left: 990px;">
		<h3>Total:<span style="display:inline-block; width: 10px;"></span></h3>
		<h3 id="total">0</h3>
	</div>



	<table class="pasta-table mb-5">
		<h4><strong>Pasta</strong></h4>
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

				for ($i = 0; $days_added < 5; $i++) :
					echo '<td>' . $date->format('j M Y') . '</td>';
					$date->modify('+1 day');
					$days_added++;
				endfor;
			endforeach; ?>
		</tr>

		<tr>
			<td>Sphagetti Bolognese<input id="checkbox5" value="5" type="checkbox" onclick="addValue(this)"></td>
			<td>Pesto <input id="checkbox6" value="6" type="checkbox" onclick="addValue(this)"></td>
			<td></td>
			<td></td>
		</tr>

		<tr>
			<td rowspan="2">Week 2</td>
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
			<td>Sphagetti Bolognese<input id="checkbox7" value="7" type="checkbox" onclick="addValue(this)"></td>
			<td>Pesto<input id="checkbox8" value="8" type="checkbox" onclick="addValue(this)"></td>
			<td></td>
			<td></td>
		</tr>

	</table>








	<script>
		let total = 0;

		function addValue(checkbox) {
			if (checkbox.checked) {
				total += parseInt(checkbox.value);
			} else {
				total -= parseInt(checkbox.value);
			}
			document.getElementById("total").innerText = total;
		}
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>