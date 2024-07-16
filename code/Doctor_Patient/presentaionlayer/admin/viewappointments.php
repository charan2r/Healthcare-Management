<?php include '../../datalayer/bookserver.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet"  href="style5.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<header>
	<h1>Doctor<span>Patient</span></h1>
		<nav>
		<ul> 
			<li><a href="index3.php">Add Doctors</a></li>
			<li><a href="viewdoctor.php">View Doctors</a></li>
			<li><a href=" viewpatients.php">View Patients</a></li>
			<li><a href="viewappointments.php">View Appointments</a></li>
			<li><a href="feedback.php">Patient Feedback</a></li>
			<li><a href="../../applicationlayer/Doctorpatient.php">Logout</a></li>	
		</ul>
	</nav>
</header>

<body>
	<h1 style="margin-left:40% ;margin-top:80px"   class="asd"> Appointments </h1>
	<br><br>
	<table class="table4">
		<tr>
		<th>Appointments ID</th>
		<th>Doctor Name</th>
		<th>Patient Name</th>
		<th>Date</th>
		<th>Time</th>
		<th>Options</th>
		
		</tr>

		<!--<?php 
		$sql3="SELECT  * FROM  bookapp " ;
		$result3=$mysqli->query($sql3);
		if(mysqli_num_rows($result3)>=1){
			while ($row3=$result3->fetch_assoc()) {

				echo "<tr><td>".$row3["AppoID"]."</td><td>".$row3["docID"]."</td><td>".$row3["patientID"]."</td><td>".$row3["Date"]."</td><td>".$row3['Time']."</td><td>
				<form method='post' 
				style='
				margin:0px auto;
				padding: 2px;
				background: white;
				border:none; border-radius: 0px;'>
				<input type='hidden' name='AppointmentIdToDelete' value='" . $row3['AppoID'] . "'>
				<button name='Cancel' style='padding: 10px 30px 10px 30px; font-size: 12px; color: white; margin-top:3px; background: #39ca74; border:none; border-radius: 5px;'>Cancel</button>
			    </form>
				</td></tr>";
			}
			echo "</table";

		}

		?>-->

<?php 
    $sql3 = "SELECT b.*, p.Name, d.Doctorname
             FROM bookapp b
             JOIN patients p ON b.patientID = p.UserID
             JOIN doctor d ON b.docID = d.DoctorID";
    
    $result3 = $mysqli->query($sql3);

    if(mysqli_num_rows($result3) >= 1) {
        

        while ($row3 = $result3->fetch_assoc()) {
            echo "<tr><td>".$row3["AppoID"]."</td><td>".$row3["Doctorname"]."</td><td>".$row3["Name"]."</td><td>".$row3["Date"]."</td><td>".$row3['Time']."</td><td>
			<form method='post' 
			style='
			margin:0px auto;
			padding: 2px;
			background: white;
			border:none; border-radius: 0px;'>

			<input type='hidden' name='AppointmentIdToDelete' value='" . $row3['AppoID'] . "'>
			<button name='Cancel' style='padding: 10px 30px 10px 30px; font-size: 12px; color: white; margin-top:3px; background: #39ca74; border:none; border-radius: 5px;'>Delete</button>
			</form></td></tr>";
        }

        echo "</table>";
    }
?>

		
	</table>
	<br>
	<br><br>

<!--<h2 id="delete">Appointment Confirm</h2>

<form method="post" action="index3.php" class="delete" id="new">


	<div class="input-groupAP">
		<label>Appointment ID</label>
		<input type="text" name="AppoID2" >

	</div>

	<div class="input-groupAP">
		<button type="submit" name="confirm" class="btnAP">Confirm</button>
		<button type="submit" name="remove" class="btnAD">Delete</button>
	</div>

</form>-->
</body>
</html>