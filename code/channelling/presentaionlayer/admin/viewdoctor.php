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
	<h1 style="margin-left:35% ;margin-top:80px"   class="asd">Doctors Information</h1>
	<br><br>
	
<table class="table4">
		<tr>
		<th>DoctorID</th>
		<th>DoctorName</th>
		<th>Email</th>
		<th>Address</th>
		<th>ContactNumber</th>
		<th>Password</th>
		<th>Specialization</th>
		<th>Options</th>

		</tr>

		<?php
		$sql3="SELECT  * FROM  doctor " ;
		$result3=$mysqli->query($sql3);
		if(mysqli_num_rows($result3)>=1){
			while ($row3=$result3->fetch_assoc()) {

				echo "<tr><td>".$row3["DoctorID"]."</td><td>".$row3["Doctorname"]."</td><td>".$row3["email"]."</td><td>".$row3["Address"]."</td><td>".$row3['ContactNumber']."</td><td>".$row3['password']."</td><td>".$row3["categorey"]."</td><td>
				<form method='post' 
				style='
				margin:0px auto;
				padding: 2px;
				background: white;
				border:none; border-radius: 0px;'>
				<input type='hidden' name='doctorIdToDelete' value='" . $row3['DoctorID'] . "'>
				<input type='hidden' name='doctorIdToUpdate' value='" . $row3['DoctorID'] . "'>
				<button name='update' style='padding: 10px 30px 10px 30px; font-size: 12px; color: white; margin-top:2px; background: #39ca74; border:none; border-radius: 5px;'>Update</button>
				<button name='Delete' style='padding: 10px 30px 10px 30px; font-size: 12px; color: white; margin-top:3px; background: #39ca74; border:none; border-radius: 5px;'>Delete</button>
			    </form>
				</td></tr>";
						
			}
			echo "</table";
		}

		?>
			
</table>
<br><br><br>

<?php
if (isset($_POST['update'])) {
	$doctorIdToUpdate = $_POST['doctorIdToUpdate'];
    $query = "SELECT * FROM doctor WHERE DoctorID = '$doctorIdToUpdate'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<form method="post" action="viewdoctor.php" class="UP">
    <div class="inputs">
        <label>Doctor Name</label>
        <input type="text" name="name" value="<?php echo $row['Doctorname']; ?>">
    </div>

    <div class="inputs">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $row['email']; ?>">
    </div>

    <div class="inputs">
        <label>Address</label>
        <input type="text" name="address" value="<?php echo $row['Address']; ?>">
    </div>

    <div class="inputs">
        <label>Contact Number</label>
        <input type="text" name="contact" value="<?php echo $row['ContactNumber']; ?>">
    </div>

    <div class="inputs">
        <button type="submit" name="up" class="btnUP">Update</button>
    </div>
	</form>

<?php
    } else {
        echo "Error fetching doctor details: " . $mysqli->error;
    }
}
?>



<?php
if (isset($_POST['up'])) {
    $name = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $address = $mysqli->real_escape_string($_POST['address']);
    $contact = $mysqli->real_escape_string($_POST['contact']);

    if (count($errors) == 0) {
        $updateFields = array();

        if (!empty($name)) {
            $updateFields[] = "Doctorname='$name'";
        }

        if (!empty($email)) {
            $updateFields[] = "email='$email'";
        }

        if (!empty($address)) {
            $updateFields[] = "Address='$address'";
        }

        if (!empty($contact)) {
            $updateFields[] = "ContactNumber='$contact'";
        }

        if (count($updateFields) > 0) {
            $queryupdate = "UPDATE doctor SET " . implode(', ', $updateFields) . " WHERE DoctorID='$doctorprofile'";

            if ($mysqli->query($queryupdate)) {
                if ($mysqli->affected_rows == 0) {
                    array_push($errors, "Wrong Doctor ID");
                }
            } else {
                array_push($errors, "Error updating record: " . $mysqli->error);
            }
        }
    }
}
?>

<!--<?php  

if (isset($_POST['update'])) {

?>

<form method="post" action="viewdoctor.php" class="UP">
<div class="inputs">
  <label>Doctor Name</label>
  <input type="text" name="name" >

</div>
<div class="inputs">
  <label>Email</label>
  <input type="text" name="email" >

</div>

<div class="inputs">
  <label>Address</label>
  <input type="text" name="address">
</div>

<div class="inputs-UP">
  <label>Contact Number</label>
  <input style type="text" name="contact">
</div>


<div class="inputs">
	  <button type="submit" name="up" class="btnUP">Update</button>
	  </div>
</div>
</form>

<?php 
}

?>

<?php

if (isset($_POST['up'])) {
	
	$name =$mysqli -> real_escape_string($_POST['name']);
	$email =$mysqli -> real_escape_string($_POST['email']);
	$address =$mysqli -> real_escape_string($_POST['address']);
	$contact =$mysqli -> real_escape_string($_POST['contact']);

if (count($errors)==0) {
	$queryupdate = "UPDATE doctor SET Doctorname='$name', email='$email', Address='$address', ContactNumber='$contact' WHERE DoctorID=('$doctorprofile') ";
    if ($mysqli -> query($queryupdate)) {

      if ($mysqli->affected_rows==0) {
	    array_push($errors,"Wrong Doctor ID");
	
      }

     }
	
	}
}
?>-->


<!--<h2 id="delete">Delete Doctor</h2>


<form method="post" action="index3.php" class="delete" id="new">


	<div class="input-groupAP">
		<label>Doctor ID</label>
		<input type="text" name="deleteID" >
	</div>

	<div class="input-groupAP">
		<button type="submit" name="Delete" class="btnAP">Delete</button>
	</div>

</form>

<br><br>
<h2 id="delete">Update Doctor</h2>


<form method="post" action="index3.php" class="delete" id="new">

	<div class="input-groupAP">
		<label>Doctor Name</label>
		<input type="text" name="name" >
	</div>

	<div class="input-groupAP">
		<label>Email</label>
		<input type="text" name="email" >
	</div>

	<div class="input-groupAP">
		<label>Address</label>
		<input type="text" name="address" >
	</div>

	<div class="input-groupAP">
		<label>Contact Number</label>
		<input type="text" name="contact" >
	</div>

	<div class="input-groupAP">
		<button type="submit" name="update" class="btnAP">Update</button>
	</div>

</form>-->

</body>
</html>