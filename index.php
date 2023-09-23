<?php include 'CRUD/conn.php'?>
<?php include 'layout/header.php'?>
<?php include 'layout/title.php'?>



     

    <div class="container mt-2">
        <a href="manage_applicant.php" class="btn btn-primary display-4"> <i class="fa fa-plus"></i> Add New Applicant</a>
    </div>

    <div class="container mt-3">
        <table class="table table-bordered table-striped table-hover">
            <thead >
                <th >#</th>
				<th >First Name</th>
				<th>Last Name</th>
				<th>address</th>
				<th>Action</th>
			</thead>
            <?php
                    $sql = "SELECT * FROM applicant";
                    $query = $conn->query($sql);
                    $count = 1;
                    if($query->num_rows > 0){
                    while($datarow = $query->fetch_assoc()){
                ?>
            <tbody>
             
                <td><?php echo  $count++?></td>
                <td><?php echo $datarow['fname']?></td>
                <td><?php echo $datarow['lname']?></td>
                <td><?php echo $datarow['address']?></td>

                <td class="d-flex justify-content-center align-item-center">
                <a href="view_applicant.php?viewapplicant=<?php echo $datarow['id']?>" class="btn btn-primary mx-1"> <i class="fa fa-eye"></i></a>
                <a href="manage_applicant.php?editapplicant=<?php echo $datarow['id']?>" class="btn btn-success mx-1"> <i class="fa fa-edit "></i></a>
                <a href="CRUD/applicant.php?delapplicant=<?php echo $datarow['id']?>" class="btn btn-danger mx-1 " onclick="return confirm('Are you sure you want to delete this Data')"> <i class="fa fa-trash"></i></a>
                </td>

               
            </tbody>
            <?php  } 
                    } else{?>
                    <td colspan="5" class="text-center fs-5"> No Application for Now</td>

                <?php }
                ?>
        </table>
    </div>


<?php include 'layout/footer.php'?>