<?php include 'CRUD/conn.php'?>
<?php include 'layout/header.php'?>
<?php include 'layout/title.php'?>
<?php
$existingFname = "";
$existingLname = "";
$existingAddress = "";

if (isset($_GET['editapplicant'])) {
    $edit_id = $_GET['editapplicant'];
    $sql = "SELECT * FROM applicant WHERE id = '$edit_id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $existingFname = $row['fname'];
        $existingLname = $row['lname'];
        $existingAddress = $row['address'];
    }
}
?>
    <div class="container mt-2">
        <a href="index.php" class="btn btn-secondary display-4"> <span class="fa fa-arrow-left"></span> Go back</a>
    </div>

    <div class="container mt-3 d-flex justify-content-center align-item-center ">
        <div class="border w-75">
        <h3 class="text-muted text-center mt-3" > 
			<?php if (isset($_GET['editapplicant'])){
				echo 'Update';
			} else{
					echo'Add';}
					?>
			Applicant Information</h3>

			<form action="CRUD/applicant.php" method="POST">
				<div class="row mt-3 mb-3">
					<div class="col-lg-2">
						<label class="control-label fs-5" style="margin-left: 20px">Firstname:</label>
					</div>
					<div class="col-md-8 d-flex">
						<input type="text" class="form-control" name="fname" value="<?php echo $existingFname; ?>" required>
						<span class='text-danger align-self-center fs-4 mx-2'>*</span>

					</div>
				</div>

				<div class="row mt-3 mb-3">
					<div class="col-lg-2">
						<label class="control-label fs-5" style="margin-left: 20px">Lastname:</label>
					</div>
					<div class="col-md-8 d-flex">
						<input type="text" class="form-control" name="lname" value="<?php echo $existingLname; ?>" required>
						<span class='text-danger align-self-center fs-4 mx-2'>*</span>
					</div>
				</div>

				<div class="row mt-3 mb-3">
					<div class="col-lg-2">
						<label class="control-label fs-5" style="margin-left: 20px;">Address:</label>
					</div>
					<div class="col-md-8 d-flex">
						<input type="text" class="form-control" name="address" value="<?php echo $existingAddress; ?>" required>
						<span class='text-danger align-self-center fs-4 mx-2'>*</span>

					</div>
					
				</div>


				<div class="d-flex justify-content-center align-item-center mb-3">
					<input type="reset" class="btn btn-secondary display-4 text-uppercase mx-2" value="Reset">

					<?php
					if (isset($_GET['editapplicant'])) {
						echo '<input type="hidden" name="edit_id" value="' . $_GET['editapplicant'] . '">';
						echo '<input type="submit" class="btn btn-primary display-4 text-uppercase" name="editapplicant" value="Update">';
					} else {
						echo '<input type="submit" class="btn btn-primary display-4 text-uppercase" name="addapplicant" value="Submit">';
					}
					?>
				</div>
			</form>

		</div>
    </div>


	<?php include 'layout/footer.php'?>
