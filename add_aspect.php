<?php include('dbconfig.php');

if(isset($_POST['A']))
{
	$aspect = $_POST['A'];
	
	$sql = "INSERT INTO ASPECT (aspect) VALUES ('".$aspect."');";

	if ($conn->query($sql) === TRUE) {
	    echo $aspect;
	}
	else{
		echo $conn->error."\n\n[received: ".$aspect."]";
	}
}
else{
	echo $conn->error;
}

$conn->close();

?>