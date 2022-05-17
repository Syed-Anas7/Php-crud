<?php
// // echo "update page";

 $id = $_POST['id'];
 $name = $_POST['name'];
 $age = $_POST['age'];
 $gender = $_POST['gender'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];

 include 'connection.php';

$sql = "UPDATE `trip-form` SET name = '$name', age = '$age', gender = '$gender', email = '$email',phone = '$phone' WHERE id = {$id}";

 $result = mysqli_query($con,$sql) or die ("Connection failed");

 header("Location:http://form-php.test/index.php");

 mysqli_close($con);

?>
