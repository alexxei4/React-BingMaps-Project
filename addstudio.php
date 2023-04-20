<?php
//Block 1
$longitudeinpt = "Longitude"; 
$latitudeinpt = "Latitude"; 
$stu_name = "Name";
$stu_add = "Address";

//Block 2
$longitudeinpt= $_POST['Longitude'];
$latitudeinpt= $_POST['Latitude'];
$stu_name= $_POST['Name'];
$stu_add= $_POST['Address'];

//Block 3


//Block 5

$query = "INSERT INTO studio_location (longitude, latitude, Name, Address,Rating,ID)
VALUES ($longitudeinpt, $latitudeinpt, $stu_name,$stu_add)";
$stmt=$conn->prepare( $query );
$stmt->bind_param( $longitudeinpt, $latitudeinpt, $stu_name,$stu_add );
$stmt->execute();

//Block 6
echo 'You have been added.';

?>