<?php  

$errors=array();
include ('server.php');

$mysqli = new mysqli("localhost","root","","registration");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if (isset($_POST['Book'])) {
	$usersprofile = $_SESSION['UserID'];
	$Date 	=	 $mysqli -> real_escape_string($_POST['Date']);
	$Time 	= 	$mysqli -> real_escape_string($_POST['Time']);
	
if (empty($Date)) {
	array_push($errors,"Date is required");
	
}

if (empty($Time)) {
	array_push($errors,"Time is required");
	
}

if(count($errors)==0){
    $docID = $_REQUEST['docID'];
	$sql = "INSERT INTO  bookapp ( Date, Time, patientID,docID) VALUES ('$Date','$Time','$usersprofile','$docID') ";
	$result99=$mysqli ->query($sql);

	if ($result99) {
       printf("%d Booked .\n", $mysqli->affected_rows);
	   echo '<script>alert("Appointment is Booked.")</script>';

}

	else if (!$mysqli -> query($sql)) {
        printf("%d Can't Book At The Moment.\n", $mysqli->affected_rows);
} 
	 
  $_SESSION['success']="you are now logged in";
  header('location:view.php');


}

}


if (isset($_POST['cancel'])) {
	$appointmentIdToDelete = $_POST['appointmentIdToDelete'];

	
 if (count($errors)==0) {
	$query5="DELETE FROM bookapp WHERE AppoID=$appointmentIdToDelete ";
	echo '<script>alert("Appointment is cancelled.")</script>';
	if ($mysqli -> query($query5)) {

		if ($mysqli->affected_rows==0) {
			 array_push($errors,"Wrong Appointment ID");		
		}	
	}
	
}
}

if (isset($_POST['confirm'])) {

	$AppointmentIdToConfirm = $_POST['AppointmentIdToConfirm'];

 if (count($errors)==0) {
	
	echo '<script>alert("Appointment is confirmed.")</script>';	  
}
}

if (isset($_POST['Cancel'])) {

	$AppointmentIdToDelete = $_POST['AppointmentIdToDelete'];

 if (count($errors)==0) {
	$query5="DELETE FROM bookapp WHERE AppoID=$AppointmentIdToDelete  ";
	echo '<script>alert("Appointment is deleted.")</script>';
	if ($mysqli -> query($query5)) {

		if ($mysqli->affected_rows==0) {
			 array_push($errors,"Wrong Appointment ID");		
		}	
	}
	
}
}

if (isset($_POST['Add'])) {

	$addID 				= $mysqli -> real_escape_string($_POST['addID']);
	$addname 			= $mysqli -> real_escape_string($_POST['addname']);
	$addAddress 		= $mysqli -> real_escape_string($_POST['addAddress']);
	$addContactNumber	= $mysqli -> real_escape_string($_POST['addContactNumber']);
	$addEmail 			= $mysqli -> real_escape_string($_POST['addEmail']);
	$addPassword 		= $mysqli -> real_escape_string($_POST['addpassword']);


	if (empty($addID)) {
	array_push($errors,"Doctor ID is required");
	
}

if (empty($addname)) {
	array_push($errors,"Doctor Name is required");
	
}


if (empty($addAddress)) {
	array_push($errors,"Address is required");
	
}

if (empty($addContactNumber)) {
	array_push($errors,"Contact Number is required");
	
}


if (empty($addEmail)) {
	array_push($errors,"Email is required");
	
}

if (empty($addPassword)) {
	array_push($errors,"Password is required");
	
}


if(count($errors)==0){

	$addcategory 	= $_REQUEST['addcategory'];

	$sqladd = "INSERT INTO  doctor (DoctorID, Doctorname, email, Address, ContactNumber, password,categorey) VALUES ('$addID','$addname','$addEmail','$addAddress','$addContactNumber','$addPassword','$addcategory') ";


	if ($mysqli -> query($sqladd)) {
  printf("%d Row inserted.\n", $mysqli->affected_rows);

}

  $_SESSION['addID']=$addID;
  $_SESSION['success']="you are now logged in";
  header('location:index3.php');

}
	
	
}

if (isset($_POST['Delete'])) {
	$doctorIdToDelete = $_POST['doctorIdToDelete'];
	

 if (count($errors)==0) {
	$querydelete="DELETE FROM doctor WHERE DoctorID=$doctorIdToDelete ";
    if ($mysqli -> query($querydelete)) {

      if ($mysqli->affected_rows==0) {
	    array_push($errors,"Wrong Doctor ID");
	
      }

     }
	
	}
}

if (isset($_POST['u'])) {
	
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

if (isset($_POST['delete'])) {
	$patientIdToDelete = $_POST['patientIdToDelete'];

 if (count($errors)==0) {
	$querydelete="DELETE FROM patients WHERE UserID='$patientIdToDelete' ";
    if ($mysqli -> query($querydelete)) {

      if ($mysqli->affected_rows==0) {
	    array_push($errors,"Wrong Patient ID");
	
      }

     }
	
	}
}

if (isset($_POST['Updat'])) {
	
	$names =$mysqli -> real_escape_string($_POST['names']);
	$addresses =$mysqli -> real_escape_string($_POST['addresses']);
	$contacts =$mysqli -> real_escape_string($_POST['contacts']);
	$emails =$mysqli -> real_escape_string($_POST['emails']);

if (count($errors)==0) {
	$queryupdate = "UPDATE patients SET Name='$names',  Address='$addresses', ContactNumber='$contacts', email='$emails' WHERE UserID=('$userprofile') ";
    if ($mysqli -> query($queryupdate)) {

      if ($mysqli->affected_rows==0) {
	    array_push($errors,"Wrong Doctor ID");
	
      }

     }
	
	}
}




?>
<!--if (isset($_POST['Delete'])) {

$deleteID =$mysqli -> real_escape_string($_POST['deleteID']);

if (empty($deleteID)) {
array_push($errors,"Doctor ID is required");
}
if (count($errors)==0) {


$querydelete="DELETE FROM doctor WHERE DoctorID='$deleteID' ";
if ($mysqli -> query($querydelete)) {

if ($mysqli->affected_rows==0) {
	 array_push($errors,"Wrong Doctor ID");
	
	# code...
}

}
else {

echo 'Book is Canceled';

}

}
}-->

<!-- $query1="SELECT categorey FROM doctor";
   $result1= mysqli_query($mysqli, $query1);
   $opt="<select name='Categorey'>";
   while ($row= mysqli_fetch_assoc($result1)) {
   	$opt.="<option value ='{$row['categorey']}'>{$row['categorey']}</option>";
   }
   	$opt.="</select>";
   

 

  
   }

}
-->


