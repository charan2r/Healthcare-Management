<?php include '../../datalayer/bookserver.php'; ?>
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


<h1 style="margin-left:40% ;margin-top:80px"   class="asd">My Patients</h1>
<br><br>

<table class="table2">
    <tr>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Options</th>
    </tr>

    <?php 
    
    $doctorId = $_SESSION['DoctorID'];

    $sql3 = "SELECT p.* FROM patients p
             INNER JOIN bookapp a ON p.UserID = a.patientID
             WHERE a.docID = $doctorId";

    $result3 = $mysqli->query($sql3);

    if (mysqli_num_rows($result3) >= 1) {
        while ($row3 = $result3->fetch_assoc()) {
            echo "<tr>
                    <td>".$row3["UserID"]."</td>
                    <td>".$row3["Name"]."</td>
                    <td>".$row3["Address"]."</td>
                    <td>".$row3["ContactNumber"]."</td>
                    <td>".$row3['Email']."</td>
                    <td>
                        <form method='post'>
                            <button name='SearchP' style='
                                padding: 10px 30px 10px 30px;
                                font-size: 12px;
                                color: white;
                                margin-top:5px;
                                background: #39ca74;
                                border:none;
                                border-radius: 5px;'>Treatment history
                            </button>
                        </form>
                    </td>
                </tr>";
        }

        echo "</table";
    }
    ?>
</table>

<!--<table class="table2">
		<tr>
		<th>Patient ID</th>
		<th>Patient Name</th>
		<th>Address</th>
		<th>Contact Number</th>
		<th>Email</th>
		<th>Options</th>

		</tr>

		<?php 
		$sql3="SELECT  * FROM  patients " ;
		$result3=$mysqli->query($sql3);
		if(mysqli_num_rows($result3)>=1){
			while ($row3=$result3->fetch_assoc()) {

				echo "<tr><td>".$row3["UserID"]."</td><td>".$row3["Name"]."</td><td>".$row3["Address"]."</td><td>".$row3["ContactNumber"]."</td><td>".$row3['Email']."</td><td><form method='post'><button name='SearchP' 
				style='
				padding: 10px 30px 10px 30px;
				font-size: 12px;
				color: white;
				margin-top:5px;
				background: #39ca74;
				border:none;
				border-radius: 5px;'>Treatment history</button></form></td></tr>";
			}


			echo "</table";

		}

		?>

	
</table>-->

<!--<form method="post" action="searchpatient.php" class="patientsearch">
	

	<?php include ('../../datalayer/errors.php') ;?>

	<div class="input-group">
		<label style="font-weight: bold; font-size: 30px">Search By:</label>
		<label style="font-weight: bold">*Patient ID</label>
		<label style="font-weight: bold">*Patient Name</label>
		<input type="text" name="PID" >

	</div>

	<div class="input-group">
		<button type="submit" name="SearchP" class="btn">Search</button>
	</div>
	
	</form>
	<br><br>

		<?php 

         if (isset($_POST['SearchP'])) {

         ?>	<table class="table3" >
         	<caption style="margin-left: 34px;padding: 10px;font-weight: bold;font-size: 30px;" class="asd">Patient Information</caption>

		<tr>
		<th>PatientID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Contact Number</th>
		<th>Email</th>
		</tr> <?php  
		$PID =$mysqli -> real_escape_string($_POST['PID']);

		$sqlP="SELECT  * FROM  patients   WHERE 	UserID=('$PID') OR Name=('$PID') " ;
		$resultP=$mysqli->query($sqlP);
		if(mysqli_num_rows($resultP)==1){
			while ($rowP=$resultP->fetch_assoc()) {

				echo "<tr><td>".$rowP["UserID"]."</td><td>".$rowP["Name"]."</td><td>".$rowP["Address"]."</td><td>".$rowP["ContactNumber"]."</td><td>".$rowP['Email']."</td></tr>";
			}

			echo "</table";
		}
	}
	?>

 </table>-->

<?php 	
		if (isset($_POST['SearchP'])) {
			$doctorIDs = $_SESSION['DoctorID'];

         ?>	
	<table class="table2">
         	<caption style="margin-left: 34px;padding: 10px;font-weight: bold;font-size: 30px;" class="asd">Treatment History</caption>
		<tr>
		<th>PatientID</th>
		<th>PatientName</th>
		<th>Treatment</th>
		<th>Doctor's Note</th>	
		</tr> 

		<?php  
		//$PID =$mysqli -> real_escape_string($_POST['PID']);

		//$sqlP2="SELECT  * FROM  description   WHERE descID=('$PID') OR descName=('$PID') " ;
		$sqlP2="SELECT  * FROM  description ,  
		patients WHERE descID=UserID AND DoctorIDdesc = '$doctorIDs' " ;
		$resultP2=$mysqli->query($sqlP2);
		if(mysqli_num_rows($resultP2)>=1){
			while ($rowP2=$resultP2->fetch_assoc()) {

				echo "<tr><td>".$rowP2["UserID"]."</td><td>".$rowP2["Name"]."</td><td>".$rowP2["treatment"]."</td><td>".$rowP2['Note']."</td></tr>";
			}
			echo "</table";
		}
	}
	?>
 </table>
</body>
</html>


