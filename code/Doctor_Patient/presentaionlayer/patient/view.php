<?php include '../../datalayer/bookserver.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient</title>
	<link rel="stylesheet"  href="style2.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<header>
	<h1>Doctor<span>Patient</span></h1>
		<nav>
		<ul> 
			<li><a href=" index.php">My Info</a></li>
			<li><a href="searchdoctor.php">Available Doctors </a></li>
			<li><a href=" book.php">Book Appointment</a></li>
			<li><a href=" view.php">View Appointment</a></li>
			<li><a href="../../applicationlayer/Doctorpatient.php">Logout</a></li>
		</ul>
	</nav>
</header>

<body>
	<h1 class="my">My<span class="mys">Appointment</span></h1>
	<br><br>

	<table class="table2">
		<tr class="a">
		<th class="b">AppointmentID</th>
		<th class="b">DATE</th>
		<th class="b">TIME</th>
		<th class="b">DoctorName</th>
		<th class="b">Address</th>
		<th class="b">ContactNumber</th>
		<th class="b">Specialization</th>
		<th class="b">Options</th>
		

		</tr>
		<?php 
		$userprofiles = $_SESSION['UserID'];
		$sql3="SELECT  * FROM bookapp , doctor   WHERE patientID='$userprofiles' AND  docID=DoctorID "  ;
		$result3=$mysqli->query($sql3);
		if(mysqli_num_rows($result3)>=1){
			while ($row3=$result3->fetch_assoc()) {

				echo "<tr><td>".$row3["AppoID"]."</td><td>".$row3["Date"]."</td><td>".$row3["Time"]."</td><td>".$row3['Doctorname']."</td><td>".$row3['Address']."</td><td>".$row3['ContactNumber']."</td><td>".$row3["categorey"]."</td><td>
				<form method='post'  action='index.php' 
				style='
				margin:0px auto;
				padding: 10px;
				background: white;
				border:none; border-radius: 0px;'>

				<input type='hidden' name='appointmentIdToDelete' value='" . $row3['AppoID'] . "'>
				<button name='cancel' style='margin-right:15px;
				padding: 10px 30px 10px 30px;
				font-size: 12px;
				color: white;
				background: #39ca74;
				border:none;
				border-radius: 5px;'>Cancel</button></form></td></tr>";
				
			}

			echo "</table";

		}

		?>
		
	</table>
	<br><br><br><br>

<!--<h2 id="cancel">Cancel Appointment</h2>
	
<form method="post" action="myinfo.php">

	<?php include ('../../datalayer/errors.php') ;?>

	<div class="input-group">
		<label>Appointment ID</label>
		<input type="text" name="AppoID2" >

	</div>

	<div class="input-group">
		<button type="submit" name="cancel" class="btn">Cancel</button>
	</div>
		
	</form>-->


<!--	<table class="table3">
		<tr>
		<th>Doctor Name</th>
		<th>Address</th>
		<th>Contact Number</th>
		<th>Category</th>
		doctor.Doctorname , doctor.Address,doctor.ContactNumber,doctor.category
,doctor
AND docID= ('$userprofile')
.$row3["Doctorname"]."</td><td>".$row3["Address"]."</td><td>".$row3["ContactNumber"]."</td><td>".$row3["category"]

		</tr>
		<?php $sql4="SELECT doctor.Doctorname,doctor.Address,doctor.ContactNumber,doctor.category FROM doctor " ;
		$result4=$mysqli->query($sql4);
		if(mysqli_num_rows($result4)>1){
			while ($row4=$result4->fetch_assoc()) {

				echo "<tr><td>".$row4["Doctorname"]."</td><td>".$row4["Address"]."</td><td>".$row4["ContactNumber"]."</td><td>".$row4["category"]."</td></tr>";
			}
			echo "</table";

		}

		?>
		
	</table>
-->
</body>
</html>

