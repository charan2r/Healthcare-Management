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

<h1 style="margin-left:35% ;margin-top:20px; margin-bottom:50px"   class="asd">Available Doctors</h1>
<br><br><br><br>
<form method="post" action="searchdoctor.php" id="b">

	<?php include ('../../datalayer/errors.php') ;?>

	<div class="input-group">
		<label style="font-weight: bold;">Search By:<br>*Doctor Name<br>*Category</label>
		<input type="text" name="dID" >

	</div>

	<div class="input-group">
		<button type="submit" name="Search" class="btn">Search</button>
	</div>
	
</form>
		<?php 

         if (isset($_POST['Search'])) {

         ?>	
<table class="table2">
		<tr class="g">
		<th class="G">Doctor ID</th>
		<th>Doctor Name</th>
		<th>Address</th>
		<th>Contact Number</th>
		<th>Category</th>

		</tr> <?php  
		$dID =$mysqli -> real_escape_string($_POST['dID']);

		$sql6="SELECT  * FROM  doctor   WHERE 	Doctorname=('$dID') OR DoctorID=('$dID') OR categorey=('$dID')" ;
		$result6=$mysqli->query($sql6);
		if(mysqli_num_rows($result6)>=1){
			while ($row6=$result6->fetch_assoc()) {

				echo "<tr><td>".$row6["DoctorID"]."</td><td>".$row6["Doctorname"]."</td><td>".$row6["Address"]."</td><td>".$row6["ContactNumber"]."</td><td>".$row6['categorey']."</td></tr>";
			}

			echo "</table";

		}
	}?>
 </table>

<table class="table4">
		<tr class="a">
		<th class="b">DoctorID</th>
		<th class="b">DoctorName</th>
		<th class="b">Email</th>
		<th class="b">Address</th>
		<th class="b">ContactNumber</th>
		<th class="b">Specialization</th>
		

		</tr>

		<?php
		$sql3="SELECT  * FROM  doctor " ;
		$result3=$mysqli->query($sql3);
		if(mysqli_num_rows($result3)>=1){
			while ($row3=$result3->fetch_assoc()) {

				echo "<tr><td>".$row3["DoctorID"]."</td><td>".$row3["Doctorname"]."</td><td>".$row3["email"]."</td><td>".$row3["Address"]."</td><td>".$row3['ContactNumber']."</td><td>".$row3["categorey"]."</td></tr>";
						
			}
			echo "</table";
		}

		?>
			
</table>
<br><br><br><br>
	
	
<!--<form method="post" action="searchdoctor.php" id="b">

	<?php include ('../../datalayer/errors.php') ;?>

	<div class="input-group">
		<label style="font-weight: bold;">Search By:<br>*Doctor Name<br>*Category</label>
		<input type="text" name="dID" >

	</div>

	<div class="input-group">
		<button type="submit" name="Search" class="btn">Search</button>
	</div>
	
</form>
		<?php 

         if (isset($_POST['Search'])) {

         ?>	
<table class="table2">
		<tr class="g">
		<th class="G">Doctor ID</th>
		<th>Doctor Name</th>
		<th>Address</th>
		<th>Contact Number</th>
		<th>Category</th>

		</tr> <?php  
		$dID =$mysqli -> real_escape_string($_POST['dID']);

		$sql6="SELECT  * FROM  doctor   WHERE 	Doctorname=('$dID') OR DoctorID=('$dID') OR categorey=('$dID')" ;
		$result6=$mysqli->query($sql6);
		if(mysqli_num_rows($result6)>=1){
			while ($row6=$result6->fetch_assoc()) {

				echo "<tr><td>".$row6["DoctorID"]."</td><td>".$row6["Doctorname"]."</td><td>".$row6["Address"]."</td><td>".$row6["ContactNumber"]."</td><td>".$row6['categorey']."</td></tr>";
			}

			echo "</table";

		}
	}?>
 </table>-->
</body>
</html>


