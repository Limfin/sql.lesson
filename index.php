<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP - MySQL</title>
</head>

<body>
	<h1>PHP - MySQL</h1>
	<?php
	//подключение к базе данных
	$mysql = new mysqli('localhost', 'root', '', 'sql_less');
	$mysql->query("SET NAMES 'utf8'");

	if ($mysql->connect_error) {
		echo 'Error Number: ' . $mysql->connect_errno . '<br>';
		echo 'Error: ' . $mysql->connect_error;
	} else {
		//echo 'Host info: ' . $mysql->host_info;
		// $mysql->query("DROP TABLE `example`");

		//создание новой таблицы в базе данных
		/* $mysql->query("CREATE TABLE `users` (
			id INT(11) NOT NULL,
			name VARCHAR(50) NOT NULL,
			bio TEXT NOT NULL,
			PRIMARY KEY(id)
		)"); */


		//добавлений новой записи в таблицу
		// $mysql->query("INSERT INTO `users` (`name`, `bio`) VALUES('John', 'Full text')");

		//добавление нескольких записей в цикле
		// for ($i=1; $i <= 5; $i++) { 
		// 	$name = "Bob #" . $i;
		// 	$mysql->query("INSERT INTO `users` (`name`, `bio`) VALUES('$name', 'Full text')");
		// }

		//обновление существующей записи в таблице
		// $mysql->query("UPDATE `users` SET `bio` = 'New text' WHERE `id` = 2");

		//удаление записи из таблицы
		// $mysql->query("DELETE FROM `users` WHERE `id` = 5 OR `id` = 4");


		//получение всех записей из таблицы users
		$result = $mysql->query("SELECT * FROM `users`");

		//вывод полученных записей
		function printResults($result)
		{
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "ID: " . $row['id'] . "<br>";
					echo "Name: " . $row['name'] . "<br>";
					echo "Bio: " . $row['bio'] . "<br><br>";
				}
			}
			echo "<hr>";
		}

		printResults($result);

		$result = $mysql->query("SELECT `id`, `name` FROM `users`");
		printResults($result);

		$result = $mysql->query("SELECT `id`, `name` FROM `users` WHERE `id` > 2");
		printResults($result);

		//сортировка в обратном порядке
		$result = $mysql->query("SELECT `id`, `name` FROM `users` WHERE `id` > 2 ORDER BY `id` DESC");
		printResults($result);

		//вывод ограниченного количества записей
		$result = $mysql->query("SELECT * FROM `users` LIMIT 2");
		printResults($result);
	}

	$mysql->close();
	?>
</body>

</html>