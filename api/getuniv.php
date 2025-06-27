<?php
	include 'db.php.conf';
	$country_id= $_GET['cid'];
	$conn = new mysqli($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME);
	// Check connection
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "select * from univ where country_id='".$country_id."' order by id";
	$result = $conn->query($sql);
	$univs=[];
	if ($result->num_rows > 0) {
  		while($row = $result->fetch_assoc()) {
			$singleUniv=[	
				"id" => $row["id"],
				"name" => $row["name"],
				"selected" => $row["selected"],
			];
			array_push($univs,$singleUniv);
  		}
		echo json_encode($univs);
	} else {
  		echo "0 results";
	}
	$conn->close();
?>
