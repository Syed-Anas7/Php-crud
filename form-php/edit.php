<?php 
$server = "localhost";
$username = "root";
$password = "";
$dbname = "form-php";

$form_id = $_GET ['id'];
 $con = mysqli_connect($server, $username, $password, $dbname);
 $data = "SELECT * FROM `trip-form` WHERE id ={$form_id} ";
    $result = mysqli_query($con,$data) or die ("connection unsuccesful");
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        
?>
<style>
    input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>
<div id = "main-content">
    <h2></h2>
    <form class = "post-form" action = "update.php" method = "post">
        <div class = "form-group">
            <label>Name</label>
            <input type = "hidden" name = "id" value = "<?php echo $row['id'];?>"/>
            <input type = "text" name = "name" value = "<?php echo $row['name'];?>"/>
        </div>
        <div class = "form-group">
            <label>Age</label>
            <input type = "text" name="age" value = "<?php echo $row['age'];?>"/>
        </div>
        <div class = "form-group">
            <label>Gender</label>
            <select name="gender" id="gender" value = "<?php echo $row['gender'];?>">  
                    <!-- <option value="" selected disabled>Enter your Gender</option> -->
                <option  value='Male'>Male</option>
                <option  value='Female'>Female</option>
    </select>
          </div>
        </div>
        <div class = "form-group">
            <label>Email</label>
            <input type = "text" name = "email" value = "<?php echo $row['email'];?>"/>
        </div>
        <div class = "form-group">
            <label>Phone</label>
            <input type = "text" name = "phone" value = "<?php echo $row['phone'];?>"/>
        </div>
        </div>
      <input class="submit" type="submit" value="Update"/>
</div>
    </form>

    
    <?php }
    }
     ?>