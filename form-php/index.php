<?php
$sql = false;

 include 'connection.php';

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
if(isset($_POST['name'])){
    // Collect post variables   
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    
    $sql = "INSERT INTO `trip-form` ( `name`, `age`, `gender`, `email`, `phone`, `desc`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc')";
    //      echo $sql;

    // Execute the query
    if (mysqli_query($con, $sql)) {
        //echo "Database created successfully";
      } else {
        echo "Error creating database: " . mysqli_error($con);
      }
}
$data = "SELECT * FROM `trip-form`";
    $result = mysqli_query($con,$data) or die ("connection unsuccesful");
    
    if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Email</th><th>Phone</th><th>Desc</th><th>Action</th></tr>";
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" .$row['id'] ."</td>
          <td>".$row['name']."</td>
          <td>".$row['age']."</td>
          <td>".$row['gender']."</td>
          <td>".$row['email']."</td>
          <td>".$row['phone']."</td>
          <td>".$row['desc']."</td>
          <td><a href = 'edit.php?id=$row[id]'>Update</a>
          <a href='delete.php?id=$row[id]'' onClick=\"javascript:return confirm('are you sure you want to delete this?');\">delete</a></td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 results";
      }
     mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Venture Queue">
    <div class="container">
        <h1>Welcome to Venture Queue US Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($sql == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <!-- <input type='text'  placeholder="Enter your gender" list='dropdown'> -->
                <select name="gender" id="gender">  
                    <option value="" selected disabled>Enter your Gender</option>
                <option  value='Male'>Male</option>
                <option  value='Female'>Female</option>
    </select>
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div> 
    </body>
</html>
