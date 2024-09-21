<?php include '../../datalayer/bookserver.php '; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet"  href="style3.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<header>
	<h1>Doctor<span>Patient</span></h1>
		<nav>
		<ul> 
			<li><a href="index2.php">My Info</a></li>
			<li><a href="doctorapp.php">My Appointments</a></li>
			<li><a href=" searchpatient.php">My Patients</a></li>
			<li><a href="../../applicationlayer/Doctorpatient.php">Logout</a></li>
		</ul>
	</nav>
</header>

<body>
	<h1 class="my1">My<span class="mys">Appointments</span></h1>
	<br><br><br>

	<table class="table2">
		<tr>
		<th>AppointmentID</th>
		<th>DATE</th>
		<th>TIME</th>
		<th>PatientID</th>
		<th>PatientName</th>
		<th>PatientAddress</th>
		<th>PatientContactNumber</th>
		<th>Options</th>
		

		</tr>
		<?php 
		$doctorprofiles = $_SESSION['DoctorID'];
		$sqldoc="SELECT  * FROM bookapp , patients   WHERE docID='$doctorprofiles' AND  patientID=UserID "  ;
		$resultdoc=$mysqli->query($sqldoc);
		if(mysqli_num_rows($resultdoc)>= 1){
			while ($rowdoc=$resultdoc->fetch_assoc()) {

				echo "<tr><td>".$rowdoc["AppoID"]."</td><td>".$rowdoc["Date"]."</td><td>".$rowdoc["Time"]."</td><td>".$rowdoc["UserID"]."</td><td>".$rowdoc['Name']."</td><td>".$rowdoc['Address']."</td><td>".$rowdoc["ContactNumber"]."</td><td><form method='post'><button name='note' 
				style='
				padding: 10px 30px 10px 30px;
				font-size: 12px;
				color: white;
				margin-top:5px;
				background: #39ca74;
				border:none;
				border-radius: 5px;'>ADD Notes</button></form></td></tr>";
			}
			echo "</table";
		}

		?>	
	</table>
	<br>


<?php  

if (isset($_POST['note'])) {

?>

<form method="post" action="doctorapp.php" class="add">
<div class="input-group">
  <label>Patient ID</label>
  <input type="text" name="descID" >

</div>
<div class="input-group">
  <label>Name</label>
  <input type="text" name="descName" >

</div>

<div class="input-group">
  <label>Treatment</label>
  <input type="text" name="Treatment">
</div>

<div class="input-group-add">
  <label>Note</label>
  <input style type="text" name="Note">
</div>


<div class="input-group">
	  <button type="submit" name="AddD" class="btn">Add</button>
	  </div>
</div>
</form>

<?php 
}

?>

<?php  


if (isset($_POST['AddD'])) {
	include ('../../datalayer/errors.php');
	    	$errors=array();

	$descID 			= $mysqli -> real_escape_string($_POST['descID']);
	$descName 			= $mysqli -> real_escape_string($_POST['descName']);
	$treatment 			= $mysqli -> real_escape_string($_POST['Treatment']);
	$note				= $mysqli -> real_escape_string($_POST['Note']);


if (empty($treatment)) {
	array_push($errors,"Treatment is required");
	
}

if (empty($note)) {
	array_push($errors,"Your note is required");
	
}

if(count($errors)==0){

	$sql7 = "INSERT INTO  description (descID,descName,treatment,note,doctorIDdesc) VALUES ('$descID','$descName','$treatment','$note','$doctorprofiles') ";
	if ($mysqli -> query($sql7)) { ?>

	<h2 class="thanks"> <?php printf("Your Description Is Added",$mysqli->affected_rows);?></h2>
				
		<?php 

	}
}
}


?>

</body>
</html>

