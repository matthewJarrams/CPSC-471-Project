<?php

$sname= "localhost";
$unmae = "root";
$password = "";

$db_name = "coursereviewer";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
$response = array();
if ($conn) {
	$sql = "SELECT * FROM class";
    $result = mysqli_query($conn, $sql);
	if($result)
	{
		$i = 0;
		while($row = mysqli_fetch_assoc($result))
		{
			$response[$i]['Code'] = $row['Code'];
			$response[$i]['Description'] = $row['Description'];
			$i++;
		}
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
   
}
else
{
	 echo "Connection failed!";
}
?>