<?php include('dbconfig.php');

if(isset($_POST['A']) && isset($_POST['W']))
{
	$aspect = $_POST['A'];
	$word = $_POST['W'];
	
	$sql = "INSERT INTO WORD (aspect, word) VALUES ('".$aspect."','".$word."');";

	if ($conn->query($sql) === TRUE) {
	    echo $word;
	}
	else{
		echo $conn->error."\n\n[received: ".$aspect.",".$word."]";
	}
}
else{
	echo $conn->error;
}

$conn->close();

?>