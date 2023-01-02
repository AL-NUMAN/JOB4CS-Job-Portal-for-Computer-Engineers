<?php 
session_start();
$user_email= $_SESSION['email'];
$id= $_GET['postId'];?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>JOB4CS</title>
	<link href="applyjob_style.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
  <script type="text/javascript">
 
        bkLib.onDomLoaded(
		function() {  new nicEditor({maxHeight : 400}).panelInstance('cover_letter'); 
		
		}
		
		
		);
  </script>
  
  <style>
  

  </style>
</head>
<body>
<p>Your Gmail:<?php echo $user_email;?></p>
 <a href="home.php"  style="background-color:black; color:white; width:60px; height:30px; position:relative; right;-500px; top:0px;margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">home</i>HOME</a>
 <a href="yourprofile.php"  style="background-color:black; color:white; position:relative; right;550px; top:0px; margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">face</i>Your Profile</a>


<div>
<h3>JOB POST YOU SELECTED TO APPLY:</h3>
<?php
$con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");
$sql = "SELECT * FROM `post_job` where post_id='".$id."' ";
if($result = mysqli_query($con, $sql)){
    
	if(mysqli_num_rows($result) > 0){
       
         
        while($row = mysqli_fetch_array($result)){
			
		$emp_emlid=$row['email'];
            echo "<div class='selected_post'>";
               echo "<h4>Posted by  : ". $row['email'] . "</h4>";
			    echo "<h4 style='color: black; position:absolute; top:18px; 
		  left:960px;'>  Email  : ". $row['email'] . "</h4>";
                echo "<h4>Company/Institution : ". $row['cmp_name'] . "</h4>";
            
                echo "<h5>Employer :".$row['emp_name']."</h5>";
			
				 echo "<h5><b>Job Details :</b>" .$row['description'] . "</h5>";
				 echo "<h5>Hiring Post :" .$row['position'] . "</h5>";
				 echo "<h5>Qualifications :" .$row['qualification'] . "</h5>";
				 echo "<h5>Programming skills needed on :" .$row['prgm_skills'] . "</h5>";
			     echo "<h5>Experience:" .$row['experi'] . " year</h5>";
				 echo "<h5><i></i>Job Location:" .$row['location'] . "</h5>";	 
				  echo "<h5>Responsibilities:" .$row['respon'] . "</h5>";
				  echo "<h5> Salary:On Discuss</h5>";
				 
            echo "</div>";
			
			
			
        }
       
      
        mysqli_free_result($result);
    } else{
        echo "No posts found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}



?>

</div><!--end of selected job post-->
<h2 style="background-color: #8a2c0b;
color: white; position:absolute; top:-5px; left:700px;
  text-shadow: 2px 2px 4px #000000;">Apply TO This Job</h2>

<div class="application_div">

<h3 style="background-color: #8e2c0b;
color: white; position:absolute; top:-40px;
  text-shadow: 2px 2px 4px #000000;">Email your cover letter and  CV to employer </h3>
 
<form  method="post" style="position:absolute; top:10px; left:15px;" enctype="multipath/form-data" >

<textarea id="cover_letter" name="cover_letter"  cols="90" rows="26" placeholder="hello"style="resize:none; position:absolute; top:40px; border-style:solid;"></textarea>
<div style="position:absolute; top:445px; left:190px;"> 
<input type="radio" id="cv1" name="cv" value="CV1">
  <label >CV1</label>
  <input type="radio" id="cv2" name="cv" value="CV2">
  <label >CV2</label>
  <input type="radio" id="cv2" name="cv" value="CV3">
  <label >CV3</label>



<input type="submit" name="cv_select" value="confirm">
</div>





</form>




<p  style="position:absolute;  top:500px;"> SELECTED CV FILE NAME:

<?php
$con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");

$sql = "SELECT cv FROM users_cv where email='$user_email'";
$sqll = "SELECT cv_two FROM users_cv where email='$user_email'";
$sqlll = "SELECT cv_three FROM users_cv where email='$user_email'";
if(isset($_POST['cv_select']))
{
	
	$cv=$_POST['cv'];
if($cv == "CV1"){
	
	$result= mysqli_query($con,$sql);
    $value = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach($value as $filename)
	    if(is_null($filename['cv']))
			  echo "<p style='position:absolute; top:500px; left:210px;color:red; background-color:white;'>NO CV1 UPLOADED YET</p>"; 
	      else
	         echo $filename['cv'];
		 
$cvfile=$filename['cv'];
	$cover_letter=$_POST['cover_letter'];
	 echo "<p style='position:relative; top:30px;'>'".$_POST['cover_letter']."'</p>";
  }
  
 if($cv == "CV2"){
	
	$result=mysqli_query($con, $sqll);	
	$value = mysqli_fetch_all($result, MYSQLI_ASSOC);	
	foreach ($value as $filename)
	 if(is_null($filename['cv_two']))
			  echo "<p style='position:absolute; top:500px; 
		  left:210px;color:red; background-color:white;'>NO CV2 UPLOADED YET</p>"; 
	      else
	         echo $filename['cv_two'];
$cvfile=$filename['cv_two'];
$cover_letter=$_POST['cover_letter'];
 echo "<p style='position:relative; top:30px;'>'".$_POST['cover_letter']."'</p>";
}
if($cv == "CV3"){
	
	$result=mysqli_query($con, $sqlll);	
	$value =mysqli_fetch_all($result, MYSQLI_ASSOC);	
	foreach ($value as $filename)
	     if(is_null($filename['cv_three']))
			  echo "<p style='position:absolute; top:500px; 
		  left:210px;color:red; background-color:white;'>NO CV3 UPLOADED YET</p>"; 
	      else
	         echo $filename['cv_three'];
$cvfile=$filename['cv_three'];
$cover_letter=$_POST['cover_letter'];
 echo "<p style='position:relative; top:30px; left:30px;'>'".$_POST['cover_letter']."'</p>";		       
}	
}

?>
 </p>
<p style="position:absolute; top:440px; color:white; background-color:blue;"> SELECT ONE OF YOUR CV :</p>
<a href="send_email.php?emplid=<?php echo "". $emp_emlid . ""?>&cvfilename= <?php
echo"" .$cvfile. ""?>&letter=<?php echo $cover_letter?> " style="position:absolute; top:450px;left:550px; font-size:25px; background-color:white;" >SEND</a>

</div>
</body>
</html>




