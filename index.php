<!DOCTYPE html>
<html>
<head>
	<title>Pencarian Minuman</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		h1 {
			text-align: center;
			margin-top: 50px;
			color: #2c3e50;
		}

		form {
			display: flex;
			justify-content: center;
			margin-top: 20px;
		}

		label {
			font-size: 20px;
			color: #2c3e50;
			margin-right: 10px;
			align-self: center;
		}

		input[type=text] {
			padding: 10px;
			font-size: 16px;
			border-radius: 5px;
			border: none;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
		}

		input[type=submit] {
			padding: 10px;
			font-size: 16px;
			border-radius: 5px;
			border: none;
			background-color: #3498db;
			color: white;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		input[type=submit]:hover {
			background-color: #2980b9;
		}

		h2 {
			margin-top: 20px;
			color: #2c3e50;
		}

		ul {
			list-style: none;
			padding: 0;
			margin: 0;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		li {
			margin: 10px;
			padding: 10px;
			border-radius: 5px;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
			background-color: #f5f5f5;
			color: #2c3e50;
			transition: box-shadow 0.3s ease;
			cursor: pointer;
		}

		li:hover {
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
		}

		a {
			color: #2c3e50;
			text-decoration: none;
		}

		a:hover {
			color: #2980b9;
		}
	</style>
</head>
<body>
	<form method="GET">
		<label>Cari Minuman:</label>
		<input type="text" name="search_query">
		<input type="submit" value="Cari">
	</form>

	<?php
	if (isset($_GET['search_query'])) {
		$search_query = urlencode($_GET['search_query']);
		$url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=$search_query";
		$json = file_get_contents($url);
		$data = json_decode($json, true);
		if ($data['drinks'] != null) {
			echo "<ul>";
			foreach ($data['drinks'] as $drink) {
				echo "<li><a href='https://www.thecocktaildb.com/drink.php?c={$drink['idDrink']}' target='_blank'>{$drink['strDrink']}</a></li>";
			}
			echo "</ul>";
		} else {
			echo "<h2>Tidak ditemukan hasil untuk \"$search_query\"</h2>";
		}
	}
	?>

</body>
</html>
