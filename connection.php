<?php
$servername="localhost";
$username="root";
$password="";
$database="crudoperation";
    //create connection
	$connection=new mysqli($servername,$username,$password,$database);

$name="";
$email="";
$phone="";
$address="";

$errorMessage="";
$successMessage="";
    if(!$connection){
		die(mysqli_error($connection));
	}
?>