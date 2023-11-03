<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
		</style>

		<style>
			table {
				width: 100%;
				border-collapse: collapse;
			}

			table,
			th,
			td {
				border: 1px solid black;
				padding: 15px;
				text-align: left;
			}
		</style>

	</head>

<body>

	<!--<div id="container">
		<h1>Welcome to CodeIgniter! Hello World test jeree</h1>

		<div id="body">
			<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

			<p>If you would like to edit this page you'll find it located at:</p>
			<code>application/views/welcome_message.php</code>

			<p>The corresponding controller for this page is found at:</p>
			<code>application/controllers/Welcome.php</code>

			<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="userguide3/">User Guide</a>.</p>

			<?php
			print $data['product_item']['name'];
			?>
		</div>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>-->

	<table>
		<tr>
			<th>All <br><input type="checkbox"></th>
			<th>Monday</th>
			<th>Tuesday</th>
			<th>Wednesday</th>
			<th>Thursday</th>
		</tr>
		<tr>
			<td rowspan="2">Week 1</td>
			<td>6 Oct 2023</td>
			<td>7 Oct 2023</td>
			<td>9 Oct 2023</td>
			<td>10 Oct 2023</td>

		</tr>
		<tr>
			<td>Steamed fish Hong Kong and bean curd fritter (Ikan Penderl)</td>
			<td>Rosemary chicken</td>
			<td></td>
			<td></td>
		</tr>

		<tr>
			<td>Week 2</td>
			<td>Steamed fish Hong Kong and bean curd fritter (Ikan Penderl)</td>
			<td>Rosemary chicken</td>
			<td></td>
			<td></td>
		</tr>
		<!-- Add more rows as needed -->
	</table>




	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>