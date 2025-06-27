<?php
	include 'db.php.conf';
	$conn = new mysqli($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME);
	// Check connection
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "select * from countries order by id";
	$result = $conn->query($sql);
	$countries=[];
	if ($result->num_rows > 0) {
  		while($row = $result->fetch_assoc()) {
			$singleCountry=[	
				"id" => $row["id"],
				"name" => $row["name"],
				"selected" => $row["selected"],
			];
			array_push($countries,$singleCountry);
  		}
		echo json_encode($countries);
	} else {
  		echo "0 results";
	}
	$conn->close();
?>
