<?php include ('../../datalayer/bookserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet"  href="style5.css" type="text/css">

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

<div class="headerA">
	<h2>Add Doctor</h2>
</div>

<form method="post" action="index3.php" id="i">

	<?php include ('../../datalayer/errors.php'); ?>

	<div class="input-groupA">
		<label>Doctor ID</label>
		<input type="text" name="addID" >

	</div>


	<div class="input-groupA">
		<label>Doctor Name</label>
		<input type="text" name="addname" >


	</div>
	<div class="input-groupA">
		<label>Category</label>
		<input type="text" name="addcategory">

	</div>

	<div class="input-groupA">
		<label>Address</label>
		<input type="text" name="addAddress">

	</div>

	<div class="input-groupA">
		<label>Contact Number</label>
		<input type="text" name="addContactNumber">


	</div>


	<div class="input-groupA">
		<label>Email address</label>
		<input type="text" name="addEmail">

	</div>

	<div class="input-groupA">
		<label>Password</label>
		<input type="text" name="addpassword">

	</div>
<div class="input-groupA">
	<label>Category</label>
	   	<select name="addcategory" class="xd">
		   <option value="Cardiologists">Cardiologists</option>
			<option value="Pediatricians" >Pediatricians</option>
	   		<option value="Dentists">Dentists</option>
	   		<option value="Neurologists">Neurologists</option>
			<option value="Rheumatologists">Rheumatologists</option>
			<option value="Dermatologists">Dermatologists</option>
	   	</select>
</div>
<br>

<div class="input-groupA">
		<button type="submit" name="Add" class="btnA">Add Doctor</button>
</div>

</form>

	

</body>
</html>