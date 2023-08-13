<?php
    include("connection.php");
	if($_SERVER['REQUEST_METHOD']=='GET'){
	if(!isset($_GET['id'])){
		header("location:/project6/display.php");
		exit;
	}
	$id=$_GET["id"];

    $sql="SELECT *FROM crud WHERE id='$id'";
	$result=$connection->query($sql);
	$row=$result->fetch_assoc();
	if(!$row){
		header("location:/project6/display.php");
		exit;
	}
	$name=$row["name"];
	$email=$row["email"];
	$mobile=$row["mobile"];
	$password=$row["password"];
	
}
else{
	    $id=$_POST["id"];
	    $name=$_POST["name"];
	    $email=$_POST["email"];
	    $mobile=$_POST["mobile"];
	    $password=$_POST["password"];
	
	do{
		if( empty($name)||empty($email)||empty($mobile)||empty($password)){
			$errorMessage="All the fields are required";
			break;
		}
		$sql="UPDATE crud SET name='$name',email='$email',mobile='$mobile',password='$password' WHERE id='$id'";
		$result=$connection->query($sql);
		if(!$result){
			$errorMessage="Invalid query:".$connection->error;
			break;
		}
		
		$successMessage="updated successfully";
		header("location:/project6/display.php");
		exit;
		
	}
	while(false);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>crud operation</title>
  </head>
  <body>
    <div class="container">
	    <form method="post">
		<input type="hidden" name="id" value="<?php echo $id;?>"/>
            <div class="form-group">
                <label >Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>"/>
            </div>
			<div class="form-group">
                <label >Email</label>
                <input type="email" class="form-control"   name="email" value="<?php echo $email;?>"/>
            </div>
			<div class="form-group">
                <label >Mobile</label>
                <input type="text" class="form-control"  name="mobile" value="<?php echo $mobile;?>"/>
            </div>
			<div class="form-group">
                <label >password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password;?>"/>
            </div>
			<button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
	</div>
  </body>
</html>