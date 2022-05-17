<?php 
$form_id = $_GET ['id'];

 include 'connection.php';

$data = "DELETE  FROM `trip-form` WHERE id ={$form_id} ";
$result = mysqli_query($con,$data) or die ("connection unsuccesful");

header("Location:http://form-php.test/index.php");

mysqli_close($con);
?>