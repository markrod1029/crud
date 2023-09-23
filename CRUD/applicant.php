<?php
	include('conn.php');


	$delapplicant = $_GET['delapplicant'];

// Start ADD applicant
	if(isset($_POST['addapplicant'])){

	$fname =  htmlspecialchars($_POST['fname'], ENT_QUOTES, 'UTF-8'); 
	$lname =  htmlspecialchars($_POST['lname'], ENT_QUOTES, 'UTF-8'); 
	$address =  htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8'); 

	$sql = "INSERT INTO applicant (fname, lname, address ) VALUES ('$fname', '$lname', '$address')";
	if($conn->query($sql)){
		$_SESSION['success'] = 'Applicatant Added Successfully';
		
	 }
	  else {
		$_SESSION['error'] = $conn->error;
}
	
}
// END ADD Applicant


// Start Update Applicant

elseif (isset($_POST['editapplicant'])) {
    // Process updating existing applicant
    $edit_id = $_POST['edit_id'];
   	$fname =  htmlspecialchars($_POST['fname'], ENT_QUOTES, 'UTF-8'); 
	$lname =  htmlspecialchars($_POST['lname'], ENT_QUOTES, 'UTF-8'); 
	$address =  htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8'); 

    $sql = "UPDATE applicant SET fname='$fname', lname='$lname', address='$address' WHERE id='$edit_id'";

	if($conn->query($sql)){
		$_SESSION['success'] = 'Applicatant Updated Successfully';
		
	 }
	  else {
		$_SESSION['error'] = $conn->error;
}
	

}
// END Update Applicant


// Start Delete Applicant

else if($delapplicant == true){

    $sql = "DELETE FROM applicant WHERE id = '$delapplicant' ";
    if($conn->query($sql)){
		$_SESSION['success'] = 'Applicatant Deleted Successfully';
	 }
	  else {
		$_SESSION['error'] = $conn->error;
}

}

// END Delete Applicant



else{
	$_SESSION['error'] = 'Fill up edit form first';
  }

  header('Location: ../index.php');
exit;
?>
