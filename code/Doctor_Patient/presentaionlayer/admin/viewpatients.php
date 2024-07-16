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
	<h1 style="margin-left:35% ;margin-top:80px"   class="asd">Patients Information</h1>
	<br><br>
	<table class="table4">
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

				echo "<tr><td>".$row3["UserID"]."</td><td>".$row3["Name"]."</td><td>".$row3["Address"]."</td><td>".$row3["ContactNumber"]."</td><td>".$row3['Email']."</td><td>
				<form method='post' 
				style='
				margin:0px auto;
				padding: 2px;
				background: white;
				border:none; border-radius: 0px;'>
				<input type='hidden' name='patientIdToDelete' value='" . $row3['UserID'] . "'>
				<input type='hidden' name='patientIdToUpdate' value='" . $row3['UserID'] . "'>
				<button name='Update' style='padding: 10px 30px 10px 30px; font-size: 12px; color: white; margin-top:2px; background: #39ca74; border:none; border-radius: 5px;'>Update</button>
				<button name='delete' style='padding: 10px 30px 10px 30px; font-size: 12px; color: white; margin-top:3px; background: #39ca74; border:none; border-radius: 5px;'>Delete</button>
			    </form>
				</td></tr>";
			}


			echo "</table";

		}

		?>

	
</table>
<br>
<br><br>

<?php
if (isset($_POST['Update'])) {
	$patientIdToUpdate = $_POST['patientIdToUpdate'];
    $query = "SELECT * FROM patients WHERE UserID = '$patientIdToUpdate'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<form method="post" action="viewpatients.php" class="UP">
    <div class="inputs">
        <label>Patient Name</label>
        <input type="text" name="names" value="<?php echo $row['Name']; ?>">
    </div>

    <div class="inputs">
        <label>Address</label>
        <input type="text" name="addresses" value="<?php echo $row['Address']; ?>">
    </div>

    <div class="inputs">
        <label>Contact Number</label>
        <input type="text" name="contacts" value="<?php echo $row['ContactNumber']; ?>">
    </div>

    <div class="inputs">
        <label>Email</label>
        <input type="text" name="emails" value="<?php echo $row['Email']; ?>">
    </div>

    <div class="inputs">
        <button type="submit" name="updates" class="btnUP">Update</button>
    </div>
	</form>

<?php
    } else {
        echo "Error fetching patient details: " . $mysqli->error;
    }
}
?>



<?php
if (isset($_POST['updates'])) {
    $names = $mysqli->real_escape_string($_POST['names']);
    $addresses = $mysqli->real_escape_string($_POST['addresses']);
    $contacts = $mysqli->real_escape_string($_POST['contacts']);
    $emails = $mysqli->real_escape_string($_POST['emails']);

    if (count($errors) == 0) {
        $updateFields = array();

        if (!empty($names)) {
            $updateFields[] = "Name='$names'";
        }

        if (!empty($addresses)) {
            $updateFields[] = "Address='$addresses'";
        }

        if (!empty($contacts)) {
            $updateFields[] = "ContactNumber='$contacts'";
        }

        if (!empty($emails)) {
            $updateFields[] = "Email='$emails'";
        }

        if (count($updateFields) > 0) {
            $queryupdate = "UPDATE patients SET " . implode(', ', $updateFields) . " WHERE UserID='$userprofile'";

            if ($mysqli->query($queryupdate)) {
                if ($mysqli->affected_rows == 0) {
                    array_push($errors, "Wrong Patient ID");
                }
            } else {
                array_push($errors, "Error updating record: " . $mysqli->error);
            }
        }
    }
}
?>


<!--<?php  

if (isset($_POST['Update'])) {

?>

<form method="post" action="viewpatient.php" class="UP">
<div class="inputs">
  <label>Patient Name</label>
  <input type="text" name="names" >

</div>
<div class="inputs">
  <label>Address</label>
  <input type="text" name="addresses" >

</div>

<div class="inputs-UP">
  <label>Contact Number</label>
  <input style type="text" name="contacts">
</div>

<div class="inputs">
  <label>Email</label>
  <input type="text" name="emails">
</div>


<div class="inputs">
	  <button type="submit" name="updates" class="btnUP">Update</button>
	  </div>
</div>
</form>

<?php 
}

?>

<?php

if (isset($_POST['updates'])) {
	
	$names =$mysqli -> real_escape_string($_POST['names']);
	$addresses =$mysqli -> real_escape_string($_POST['addresses']);
	$contacts =$mysqli -> real_escape_string($_POST['contacts']);
	$emails =$mysqli -> real_escape_string($_POST['emails']);

if (count($errors)==0) {
	$queryupdate = "UPDATE patients SET Name='$names',  Address='$addresses', ContactNumber='$contacts', email='$emails' WHERE UserID=('$userprofile') ";
    if ($mysqli -> query($queryupdate)) {

      if ($mysqli->affected_rows==0) {
	    array_push($errors,"Wrong Patient ID");
	
      }

     }
	
	}
}
?>-->


<!--<h2 id="delete">Delete Patient</h2>

<form method="post" action="index3.php" class="delete" id="new">


	<div class="input-groupAP">
		<label>Patient ID</label>
		<input type="text" name="deleteID" >

	</div>

	<div class="input-groupAP">
		<button type="submit" name="delete" class="btnAP">Delete</button>
	</div>

</form>

<br><br>
<h2 id="delete">Update Patient</h2>


<form method="post" action="index3.php" class="delete" id="new">

	<div class="input-groupAP">
		<label>Patient Name</label>
		<input type="text" name="names" >
	</div>

	<div class="input-groupAP">
		<label>Address</label>
		<input type="text" name="addresses" >
	</div>

	<div class="input-groupAP">
		<label>Contact Number</label>
		<input type="text" name="contacts" >
	</div>

	<div class="input-groupAP">
		<label>Email</label>
		<input type="text" name="emails" >
	</div>

	<div class="input-groupAP">
		<button type="submit" name="Update" class="btnAP">Update</button>
	</div>

</form>-->
</body>
</html>