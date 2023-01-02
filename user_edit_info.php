<?php
session_start();
$user_email= $_SESSION['email'];
    $host='localhost';
    $username='root';
    $password='';
    $dbname = "csejobs";
    $conn=mysqli_connect($host,$username,$password,"$dbname");
    if(!$conn)
        {
          die('Could not Connect MySql Server:' .mysql_error());
        }
		
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE signup set  firstname='" . $_POST['firstname'] . "',lastname='" . $_POST['lastname'] . "', contact='" . $_POST['contact'] . "' WHERE id='" . $_POST['id'] . "'");
//mysqli_query($conn,"UPDATE users set  user_email='" . $_POST['email'] . "' WHERE user_email='" . $user_email . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM signup WHERE email='" . $user_email . "'");
$row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Record</title>
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
.wrapper{
width: 500px;
margin: 0 auto;
}
</style>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12"  style="position:absolute; border:solid;top:40px; width:600px; left:10px;">
<div class="page-header">
<a href="home.php"  style="background-color:black; color:white; width:60px; height:30px; position:relative; right;-500px; top:0px;margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">home</i>HOME</a>
 <a href="yourprofile.php"  style="background-color:black; color:white; position:relative; right;550px; top:0px; margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">face</i>Your Profile</a>
<h2>Update Your Info</h2>


</div>
<h3>Please edit the input values and submit to update the record.</h3>
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
<div class="form-group">
<label>First Name</label>
<input type="text" name="firstname" class="form-control" value="<?php echo $row["firstname"]; ?>">
</div>
<div class="form-group">
<label>Last Name</label>
<input type="text" name="lastname" class="form-control" value="<?php echo $row["lastname"]; ?>">
</div>
<div class="form-group">
<label>Contact</label>
<input type="text" name="contact" class="form-control" value="<?php echo $row["contact"]; ?>">
</div>


<input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
<button type="submit" class="btn btn-primary" onclick="myFunction()"value="Submit"> <i class="glyphicon glyphicon-save"></i>Submit</button>
<a href="" class="btn btn-default">Cancel</a>
</form>
</div> 
</div>        
</div>




<!-- password change-->
</div><div class="change_pass" style="width:580px; height:330px; border:solid; position:absolute;top:40px; left:695px;">
<h2> CHANGE PASSWORD</h2>
<div class="form-group">
<form method="post" action="change-password.php">
  <div class="form-group">
    <label for="exampleInputPassword1" style="color:blue;">Old Password</label>
    <input type="password" class="form-control" name="old_pass" required id="exampleInputPassword1" placeholder="Old Password . . . . .">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="color:blue;">New Password</label>
    <input type="password" class="form-control" name="new_pass" required id="exampleInputPassword1" placeholder="New Password . . . . .">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="color:blue;">Re-Type New Password</label>
    <input type="password" class="form-control" name="re_pass" required id="exampleInputPassword1" placeholder="Re-Type New Password . . . . .">
  </div>
  <button type="submit" name="re_password" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Submit</button>
</form>
</div>

 </div>
<script>
function myFunction() {
  alert("YOUR INFO UPDATED SUCCESSFULLY,Please check in your profile");
}
</script>

</body>
</html>