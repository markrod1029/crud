<?php include 'CRUD/conn.php'?>
<?php include 'layout/header.php'?>
<?php include 'layout/title.php'?>

<?php
$fullname = "";
$address = "";

if (isset($_GET['viewapplicant'])) {
    $view_id = $_GET['viewapplicant'];
    $sql = "SELECT * FROM applicant WHERE id = '$view_id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fullname = $row['fname'].' '.$row['lname'];
        $address = $row['address'];
    }
}
?>

    <div class="container mt-2">
    <a href="index.php" class="btn btn-secondary display-4"> <span class="fa fa-arrow-left"></span> Go back</a>
		<input type="hidden" id="mode" name="mode" value="add"> 
    </div>

    <div class="container mt-3 d-flex justify-content-center align-item-center ">
        <div class="border w-75">
        <h3 class="text-muted text-center mt-3">Applicant Information</h3>

				<form action="CRUD/add_new.php" method="POST">
				<div class="row mt-3 mb-3">
					<div class="col-lg-2">
						<label class="control-label fs-5 " style="margin-left:20px">Fullname:</label>
					</div>
					<div class="col-md">
						<span class=" fs-5 "><?php echo $fullname ?> </span>

					</div>
				</div>



				<div class="row mt-3 mb-3">
					<div class="col-lg-2">
						<label class="control-label fs-5 " style="margin-left:20px;">Address:</label>
					</div>
					<div class="col-md">
                    <span class=" fs-5 "><?php echo $address ?> </span>

					</div>
				</div>

				
				


				</form>
		</div>
    </div>


	<?php include 'layout/footer.php'?>
