<?php
	// define a function to display the result of a query as a table
	// use the foreach loop with each item as index => array[index]
	function make_table($query) {
		echo "<table><tr>";
		$row = mysqli_fetch_assoc($query);
		foreach ($row as $attr => $value) {
			echo "<th>$attr</th>";
		}
		echo "</tr>";
		while ($row = mysqli_fetch_assoc($query)) { 
			echo "<tr>";
			foreach($row as $value) {
				echo "<td>$value</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
?>



<!DOCTYPE html>
<html>
<head>
<style>
table {
     border: 1px solid gray;
}
</style>
<title>This is a php mysql test</title></head>
<body> <h2>Working with MySQL and PHP</h2>
<?php
   

	# copy and edit config.php to use your database login credentials
	include 'config.php';

	header("Content-type: text/html");
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		echo "Failure";
		die("Connection failed: " . mysqli_connect_error());
	}
	// echo "Connected successfully<br>";


	$sql = "SELECT DISTINCT name,year FROM roles JOIN actors JOIN movies WHERE actor_id = actors.id AND movies.id = movie_id AND actors.id =376249";
	$result = mysqli_query($conn, $sql);
	
	//make_table($result);
	?>
	
	<table><tr><th>#</th><th>Title</th><th>Year</th></tr>
	<?php
	// display the result as a table
	while ($row = mysqli_fetch_assoc($result)) { 
        $number += 1
        ?>
		<tr><td> <?= $number ?> </td><td><?= $row["name"] ?></td><td><?= $row["year"] ?></td></tr>
	<?php
	}
	?>
	</table>

	
	
	
	




</body>
</html>