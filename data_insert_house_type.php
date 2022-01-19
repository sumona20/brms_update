<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'brms';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if(mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if(!isset($_POST['house_type'],$_POST['serial_fk'])) {
	exit('Please input ');
}
//            
if(empty($_POST['house_type'] || $_POST['serial_fk'])) {
	exit('Please input ');
}
if($stmt = $con->prepare('INSERT INTO house_type(house_type,serial_fk) VALUES (?,?)')) {
		$stmt->bind_param('si', $_POST['house_type'],$_POST['serial_fk']);
		$stmt->execute();

		echo 'Successful';
		//
		//header('location : data_insert_house_type.html');
		//header('Location:data_insert_house_type.html');
		//exit();
		//echo 'Data Insert Successful !';
		} else {
		echo 'Could not prepare statement!';
	}
$con->close();
?>