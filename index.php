<?php
$con=mysqli_connect('localhost','root','','textdata');
//-------------insert--------------------//
if(isset($_POST['Add_data']))
{
$name=$_POST['name'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$sql=mysqli_query($con,"INSERT INTO `mydata`(`name`, `phone`, `address`) VALUES ('$name','$phone','$address')");
if($sql)
{
	echo "Data inserted....";
	echo  '<script>window.location.href="add.php";</script>';
}
else{
	echo "Data not inserted....";
	echo  '<script>window.location.href="add.php";</script>';
}
}
//----------delete-data-----------------------------------
if(isset($_GET['del']))
{
$delete=mysqli_query($con,"DELETE FROM `mydata` WHERE id='".$_GET['del']."'");
	if($delete)
{
	echo "Data Delete....";
	echo  '<script>window.location.href="add.php";</script>';
}
else{
	echo "Data not Delete....";
	echo  '<script>window.location.href="add.php";</script>';
}
}
//--------------Edit-update-data---------------------
if(isset($_POST['Add_update']))
{
$name=$_POST['name'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$Row_id=$_POST['Row_id'];
$sql=mysqli_query($con,"UPDATE `mydata` SET `name`='$name',`phone`='$phone',`address`='$address' WHERE id='$Row_id'");
if($sql)
{
	echo "Data Update....";
	echo  '<script>window.location.href="add.php";</script>';
}
else{
	echo "Data not Update....";
	echo  '<script>window.location.href="add.php";</script>';
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<title></title>
</head>
<body>
	<div class="p-5">
     <form method="post" action="#">
     	<?php if(isset($_GET['edit']))
     	{
     		$select=mysqli_query($con,"SELECT * FROM mydata WHERE id='".$_GET['edit']."'");
     		foreach ($select as $data) {
     echo '<div class="form-group">
     		<label>Name</label>
     		<input type="text" name="name" value="'.$data['name'].'" class="form-control" placeholder="Name">
     	</div>
     	<div class="form-group">
     		<label>Phone</label>
     		<input type="text" name="phone" value="'.$data['phone'].'" class="form-control" placeholder="Phone_no">
     	</div>
     	<div class="form-group">
     		<label>Address</label>
     		<input type="text" name="address" value="'.$data['address'].'" class="form-control" placeholder="Address">
     		<input type="hidden" value="'.$data['id'].'" name="Row_id">
     		<input type="submit" class="btn mt-2 btn-info" name="Add_update" value="UPDATE">
     	</div>';
     }
  }
     	else{?>
     	<div class="form-group">
     		<label>Name</label>
     		<input type="text" name="name" class="form-control" placeholder="Name">
     	</div>
     	<div class="form-group">
     		<label>Phone</label>
     		<input type="text" name="phone" class="form-control" placeholder="Phone_no">
     	</div>
     	<div class="form-group">
     		<label>Address</label>
     		<input type="text" name="address" class="form-control" placeholder="Address">
     	</div>
     	<input type="submit" class="btn mt-2 btn-info" name="Add_data" value="Submit">
     <?php } ?>
     </form>
	</div>
<div class="p-2 bg-light">
	<table class="table text-center">
		<tr><th>#</th>
		    <th>Name</th>
		    <th>Phone</th>
		     <th>Address</th>
		     <th colspan="2">Action</th>
		  </tr>
		    <?php 
		    //-------------select--------------------//
          $select=mysqli_query($con,"SELECT * FROM mydata");
          foreach ($select as $key => $row) {
          echo '<tr>
             <td>'.$key.'</td>
		    <td>'.$row['name'].'</td>
		    <td>'.$row['phone'].'</td>
		    <td>'.$row['address'].'</td>
		    <td><a href="?edit='.$row['id'].'" class="btn btn-warning">Edit</td>
		    <td><a href="?del='.$row['id'].'" class="btn btn-danger">Delete</td>
		    </tr>';
		}
		    ?>
	</table>
</div>
</body>
</html>
