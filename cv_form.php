<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="cv_form_style.css">
	 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Files Upload and Download</title>
	
	<style>
	form {
  width: 30%;
  margin: 100px auto;
  padding: 30px;
 
}
input {
  width: 100%;
 
  display: block;
  padding: 5px 10px;
}
button {
  border: none;
  padding: 10px;
  border-radius: 5px;
}

	</style>
  </head>
  
  
  
  <body><p>Your Gmail:<?php echo $user_email;?>
  <a href="home.php"  style="background-color:black; color:white; width:60px; height:30px; position:relative; right;-500px; top:0px;margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">home</i>HOME</a>
 <a href="yourprofile.php"  style="background-color:black; color:white; position:relative; right;550px; top:0px; margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">face</i>Your Profile</a>
  </p>
  
    <div class="container1"  style="position:absolute;top:100px; left:30px; width:33%; height:50%; border:3px solid;">
	
	
	
      <div class="row">
        <form action="cv_form.php" method="post" enctype="multipart/form-data">
          <a   onclick= "onChoosefile()" style="background-color:black; cursor: pointer;color:white; width:45%;height:10%; position:absolute; left:10px;top:290px;"><i class="material-icons" style="font-size:18px;cursor: pointer;">upload</i> <b>UPLOAD A NEW CV1</b> </a>
		  
         
		 <input type="file" name="myfile" id="filechoose" style="display: none;" multiple required> <br>
         
		 
		<p id="selectedfile" style="position:absolute; background-color:red;top:248px;"></p>
		

		<button type="submit" name="save" id="save" style=" visibility:hidden;position:relative; font-size:15px;left:-130px; top:90px;padding:5px;"><i class="material-icons" style="font-size:25px; padding-top:0em;top: 5px;
  left: 5px; ">save</i><b>SAVE</b></button>
       
	   
	   </form>
	   
	   
	   
	   
	   
	   
      </div>
    </div>
	
	<!--<a href="uploads/' . $file['cv']"> <i class="material-icons" style="font-size:18px;">assignment_ind</i>VIEW x CV</a>-->
	
	
	
	
	
	
 
 <div style="position:absolute;top:100px; left:150px;">

    
   
   <p style="position:relative;top:10px; left:-30px;" > CV1 Filename : 
  
    


  <?php foreach ($files as $file): 
      if(is_null($file['cv']))
			  echo "NO CV UPLOADED YET";   
			 
		 ?>	
      
      <?php echo $file['cv']; ?>
     </p>
	 <i class="material-icons" onclick="getElementById(view)" id="view_icon"
	 >assignment_ind
	 <a class="view" href="uploads/<?php echo $file['cv']?>" 
	 
	 
	 
	 target="_blank"><b style="background-color:blue;">VIEW CV</b></a></i>
      
	  
	  
	  
	  <a href="cv_form.php?file_id=<?php echo $file['cv']?>"  id="download" ><button style="background-color:black; color:white; width:100px;height:40px; position:absolute; left:120px;top:292px;"><i class="material-icons" style="font-size:18px;">download</i>Download</button></a>
  
  
  
  <form action="cv_form.php" method="post" enctype="multipart/form-data">
  <input type="submit" name="delete" value="Delete"style="width:80px; background-color:red; color:white;position:absolute;top:290px; left:240px;"><i class="material-icons" style="font-size:19px; position:absolute;top:295px; left:240px; color:white;">delete</i></input>
  </form>
  <?php endforeach;?>

<?php 
//session_start();
$user_email= $_SESSION['email'];
 if(isset($_POST['delete'])){
	 
 $con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");
$email= $user_email;
	
	$sql= mysqli_query($con,"Update `users_cv` set `cv` = null where email= '".$email."'");
	
	echo "<script>alert('CV one deleted'); window.location='cv_form.php'</script>";
	 
	 
 }


?>




</div>




















<!---CV2start---->
<div style="position:absolute;left:-50px top:150px;">

<h2 style="position:absolute;left:700px">CV2</h2>
<h2 style="position:absolute;left:190px">CV1</h2>


<div class="container2"  style="position:absolute;top:45px; left:500px; width:410px; height:330px; border:3px solid;">
	
	
	
      <div class="row">
        <form action="cv_form.php" method="post" enctype="multipart/form-data">
          <a   onclick= "onChoosefile2()" style="background-color:black; cursor: pointer;color:white; width:50%;height:10%; position:absolute; left:10px;top:290px;"><i class="material-icons" style="font-size:18px;cursor: pointer;">upload</i> <b>UPLOAD A NEW CV2</b> </a>
		  
         
		 <input type="file" name="myfile2" id="filechoose2" style="display: none;" multiple required> <br>
          <p id="selectedfile2" style="position:absolute; background-color:red;top:248px;"></p>
		 <button type="submit" name="save2" id="save2" style=" visibility:hidden;position:relative; font-size:15px;left:-130px; top:90px;padding:5px; background-color:yellow;"><i class="material-icons" style="font-size:25px; padding-top:0em;top: 5px;
  left: 5px; ">save</i><b>SAVE</b></button>
       
	   
	   </form>
	   
	   
	   
	   
	   
	   
      </div>
    </div>



<div style="position:absolute;top:25px; left:600px;">

    
   
   <p style="position:absolute;top:20px; left:-20px; width:300px;" > CV2 Filename : 
  
    


  <?php foreach ($filess as $file2): 
      if(is_null($file2['cv_two']))
			  echo "NO CV UPLOADED HERE YET";   
			 
		 ?>	
      
      <?php echo $file2['cv_two']; ?>
     </p>
	 <i class="material-icons" onclick="getElementById(view)" id="view_icon"
	 
	 style="position:absolute; top:75px;">assignment_ind
	 <a class="view" href="uploads/<?php echo $file2['cv_two']?>" 
	 
	 
	 
	 target="_blank"><b style="background-color:blue;">VIEW CV</b></a></i>
      
	  
	  
	  
	  <a href="cv_form.php?file_id2=<?php echo $file2['cv_two']?>" id="download2"> 
	  <button style="background-color:black; 
	  color:white; width:100px;height:40px; position:absolute; left:125px;top:312px;">
	  <i class="material-icons" style="font-size:18px;">download</i>Download</button></a>
  
  
  
  <form action="cv_form.php" method="post" enctype="multipart/form-data">
  <input type="submit" name="delete2" value="Delete"style="width:80px; background-color:red; color:white;position:absolute;top:312px; left:230px;"><i class="material-icons" style="font-size:19px; color:white; position:absolute;top:317px; left:230px;">delete</i></input>
  </form>
  <?php endforeach;?>






</div>

<?php 
//session_start();
$user_email= $_SESSION['email'];
 if(isset($_POST['delete2'])){
	 
 $con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");
$email= $user_email;
	
	$sql= mysqli_query($con,"Update `users_cv` set `cv_two` = null where email= '".$email."'");
	
	echo "<script>alert('CV two deleted'); window.location='cv_form.php'</script>";
	 
	 
 }


?>










</div><!---CV2end---->





















<div style="position:absolute;left:180px top:50px;"> <!--cv3start--->


<h2 style="position:absolute;left:1110px">CV3</h2>



<div class="container3"  style="position:absolute;top:45px; 
left:930px; width:410px; height:330px; border:3px solid;">
	
	
	
      <div class="row">
        <form action="cv_form.php" method="post" enctype="multipart/form-data">
          <a   onclick= "onChoosefile3()" style="background-color:black; 
		  cursor: pointer;color:white; width:50%;height:10%;
		  position:absolute; left:10px;top:290px;">
		 
		 <i class="material-icons" style="font-size:18px;cursor: pointer;">upload</i> 
		  <b>UPLOAD A NEW CV3</b> </a>
		  
         
		 <input type="file" name="myfile3" id="filechoose3" style="display: none;" multiple required > <br>
         
		 <p id="selectedfile3" style="position:absolute; background-color:red;top:248px;"></p>
		 
		 <button type="submit" name="save3" id="save3" 
		 style=" visibility:hidden;position:relative; 
		 font-size:15px;left:-130px; top:90px;padding:5px; background-color:red; color:white;">
		 <i class="material-icons" style="font-size:25px; padding-top:0em;top: 5px;
  left: 5px; ">save</i><b>SAVE</b></button>
       
	   
	   </form>
	   
	   
	   
	   
	   
	   
      </div>
    </div>



<div style="position:absolute;top:30px; left:1020px;">

    
   
   <p style="position:absolute;top:20px; left:-20px; width:350px;" > CV3 Filename : 
  
    


  <?php foreach ($filesss as $file3): 
      if(is_null($file3['cv_three']))
			  echo "NO CV3 UPLOADED HERE YET";   
			 
		 ?>	
      
      <?php echo $file3['cv_three']; ?>
     </p>
	 <i class="material-icons" onclick="getElementById(view)" id="view_icon"
	 
	 style="position:absolute; top:75px;">assignment_ind
	 <a class="view" href="uploads/<?php echo $file3['cv_three']?>" 
	 
	 
	 
	 target="_blank"><b style="background-color:blue;">VIEW CV</b></a></i>
      
	  
	  
	  
	  <a href="cv_form.php?file_id3=<?php echo $file3['cv_three']?>" id="download3"> 
	  <button style="background-color:black; 
	  color:white; width:100px;height:40px; position:absolute; left:135px;top:305px;">
	  <i class="material-icons" style="font-size:18px;">download</i>Download</button></a>
  
  
  
  <form action="cv_form.php" method="post" enctype="multipart/form-data">
   <input type="submit" name="delete3" value="Delete"style="width:80px; 
   background-color:red; color:white;position:absolute;top:312px; left:240px;">
   <i class="material-icons" style="font-size:19px; color:white; 
   position:absolute;top:317px; left:240px;">delete</i></input>
  </form>
  <?php endforeach;?>






</div>
<?php 
//session_start();
$user_email= $_SESSION['email'];
 if(isset($_POST['delete3'])){
	 
 $con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");
$email= $user_email;
	
	$sql= mysqli_query($con,"Update `users_cv` set `cv_three` = null where email= '".$email."'");
	
	echo "<script>alert('CV three deleted'); window.location='cv_form.php'</script>";
	 
	 
 }


?>
</div>





















<script>
var inputtt = document.getElementById( 'filechoose' );
var infoAreaaa = document.getElementById( 'selectedfile' );

inputtt.addEventListener( 'change', showFileNameee );

function showFileNameee( event ) {
  
  
  var inputtt = event.srcElement;
  
 
  var fileNameee = inputtt.files[0].name;
  
  
  infoAreaaa.textContent = fileNameee;
}
function onChoosefile(){
	
	
	document.getElementById("save").style.visibility="visible";
	
  document.querySelector('#filechoose').click();
}

//cv2
var inputt = document.getElementById( 'filechoose2' );
var infoAreaa = document.getElementById( 'selectedfile2' );

inputt.addEventListener( 'change', showFileNamee );

function showFileNamee( event ) {
  
  
  var inputt = event.srcElement;
  
 
  var fileNamee = inputt.files[0].name;
  
  
  infoAreaa.textContent = fileNamee;
}
function onChoosefile2(){
	
	
	
	document.getElementById("save2").style.visibility="visible";
  document.querySelector('#filechoose2').click();
}

//cv3
var input = document.getElementById( 'filechoose3' );
var infoArea = document.getElementById( 'selectedfile3' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  
  var input = event.srcElement;
  
 
  var fileName = input.files[0].name;
  
  
  infoArea.textContent = fileName;
}

function onChoosefile3(){
	
	
	
	document.getElementById("save3").style.visibility="visible";
  document.querySelector('#filechoose3').click();
}


</script>
</body>
</html>




