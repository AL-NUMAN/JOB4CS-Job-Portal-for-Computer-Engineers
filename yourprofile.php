<?php 
session_start();
$user_email= $_SESSION['email'];


$con = mysqli_connect('localhost','root','','csejobs') or die("dataserver connection error");


$sql = "SELECT `firstname`, `lastname`, `contact`, `email`, `password` FROM `signup` WHERE `email`='".$user_email."' ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
       
           
        while($row = mysqli_fetch_array($result)){
			



		
            echo "<div style='position:absolute; top:450px; left:450px; width: 600px; color:#F8F8FF; background-color:DarkOliveGreen;'>";
               
                echo "<h2>" . $row['firstname'] ."  ". $row['lastname'] . "</h2>";
            
                echo "<h2>email :".$row['email']."</h2>";
			
				 echo "<h2>contact:" .$row['contact'] . "</h1>";
				 
				 
            echo "</div>";
			
        }
       
      
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
?>

<?php include_once('process_form.php') ?>
<?php
//image
  $conn = mysqli_connect("localhost", "root", "", "csejobs");
  $results = mysqli_query($conn, "SELECT profile_image FROM users where user_email='$user_email'");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Image Preview and Upload PHP</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
        
        <form action="yourprofile.php" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3"></h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
		    <?php if (!$results): ?>
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h5>Upload/Change Photo</h5>
              </div>
              <img src="avatar.png" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
             <?php endif; ?>
			
			 <?php if ($results): ?>
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h5>Upload/Change Photo</h5>
              </div>
               <?php foreach ($users as $user): ?>
             
               <img id="profileDisplay" src="<?php echo 'images/' . $user['profile_image'] ?>" 
			   width="230" height="230"  style="border-radius: 55%; background-image:url('avatar.png');
			   "alt="No Image Uploaded yet" >
                
              
            <?php endforeach; ?>
			<input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            
            </span>
            
			 <?php endif; ?>
			
			
			
			
			
          </div>
          
          <div class="form-group">
            <button type="submit" id="save_btn"name="save_profile" class="btn btn-primary btn-block" style="position:absolute; top:300px; visibility:hidden;">Save Photo</button>
          </div>
		   
        </form>
		
      </div>
	  <a href="user_edit_info.php"  style='background-color:black; color:white; position:relative;  top:450px; left: 100px;width:72px;height:30px;font-size:20px;'>  <i class="material-icons" style="font-size:18px;">edit</i>EDIT</a>
    </div>
	 <a href="home.php"  style="background-color:black; color:white; position:absolute; left:100px; top:10px;"><i class="material-icons" style="font-size:18px;">home</i>HOME</a>
	 <a href="cv_form.php"  style="background-color:black; color:white; position:absolute; left:170px; top:10px;"><i class="material-icons" style="font-size:18px;">assignment_ind</i> YOUR CV's</a>
  </div>
 
</body>
</html>
<script >
function triggerClick(e) {
	document.getElementById("save_btn").style.visibility="visible";
  document.querySelector('#profileImage').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}



</script>




