<!--<!DOCTYPE html>-->
<html lang="en">
<head>
	<title>ctbcfx entity-tagger</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
</head>
<body contextmenu="menu">
	<br>
	<div class="container-fluid">
	    <div class="form-group">
		<h4 style="text-align: center;">CTBCFX Entity-tagger</h4>
		<br>
		<input type="file" id="articleFile" name="articleFile" class="form-control-file">
		<br>
		<div class="input-field">
		    <p id="input_article" contextmenu="menu" contenteditable="true"></p>
	    </div>
	</div>
	
	<!-- right-click contextmenu -->
	<div class="menu">
        <!-- <div class="menu-item" onclick="onColor('1');"> AspectC</div> -->
		<table id="innerTable" class="table" cellspacing="0" width="100%">
			<thead style="display:none;">
				<tr>
					<th>ASPECT</th>
				</tr>
			</thead>
			<tbody>
				<?php include('dbconfig.php');
				
				$sql = "SELECT `aspect` FROM `ASPECT` WHERE 1 ;";
				$result = $conn->query($sql);
				
				$view = "";
				
				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()){
						$line = "<tr class=\"menu-item\">
									<th onclick=\"sendAspect(this);\">" . $row['aspect'] . "</th>
								</tr>";
						$view .= $line;
					}
				}
				else{
					echo "<script>alert($conn->error);</script>";
					return;
				}
				
				echo $view;
				$conn->close();
				?>
			</tbody>
		</table>
	</div>
	<div style="display: none;" id="selectedContent"></div>
	<script type="text/javascript" src="js/main.js"></script>
	<style>
		#innerTable_filter input{
			width: 85px;
		}
	</style>
</body>
</html>