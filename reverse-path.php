<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Reverse Path Checker</title>
	<style>
body {
	background-color: #181818;
	color: #fff;
	font-family: Arial, sans-serif;
	font-size: 16px;
	margin: 0;
	padding: 0;
}

.container {
	max-width: 600px;
	margin: 50px auto;
	padding: 20px;
	background-color: #212121;
	border-radius: 10px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);
}

h1 {
	text-align: center;
	margin-bottom: 30px;
}

form {
	display: flex;
	flex-direction: column;
}

label {
	margin-top: 10px;
	margin-bottom: 5px;
	font-weight: bold;
}

textarea, input[type="text"] {
	padding: 10px;
	margin-bottom: 20px;
	background-color: #e0e0e0;
	border-radius: 5px;
	border: none;
	resize: none;
}

button[type="submit"] {
	padding: 10px;
	background-color: #4caf50;
	color: #fff;
	border: none;
	border-radius: 5px;
	cursor: pointer;
}

button[type="submit"]:hover {
	background-color: #3e8e41;
}

	</style>
</head>
<body>
	<div class="container">
		<h1>Reverse Path Checker</h1>
		<form method="post">
			<label for="domains">Domains:</label>
			<textarea id="domains" name="domains" rows="10" cols="50"></textarea>
			<label for="path">Path:</label>
			<input type="text" id="path" name="path">
			<button type="submit">Check</button>
		</form>
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$domains = $_POST['domains'];
			$path = $_POST['path'];
			$lines = explode("\n", $domains);
			foreach ($lines as $line) {
				$line = trim($line);
				if ($line != '') {
					$url = 'http://' . $line . '/' . $path;
					$status = @get_headers($url)[0];
					echo '<p>' . $line . '/' . $path . ' - ' . $status . '</p>';
				}
			}
		}
		?>
	</div>
</body>
</html>
