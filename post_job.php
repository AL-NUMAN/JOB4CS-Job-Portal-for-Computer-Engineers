<?php
session_start();
$user_email= $_SESSION['email'];



if(isset($_POST['submit']))

{
$con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");
	$email= $user_email;
$cmp_name=$_POST['company_name'];
$emp_name=$_POST['emp_name'];
$description=$_POST['jobDescription'];
$position=$_POST['post_name'];
$qualification=$_POST['qualification'];
$experi=$_POST['exp'];
$location=$_POST['location'];
$respon=$_POST['respon'];
$checkbox1=$_POST['choice']; //prgm_skills 
$chk="";  //prgm_skills 
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  
   

$in_ch=mysqli_query($con,"insert into `post_job`(`email`,`cmp_name`,`emp_name`,`description`,`position`,`qualification`,`prgm_skills`,`experi`,`location`,`respon`) VALUES ('$email','$cmp_name','$emp_name','$description','$position','$qualification','$chk','$experi','$location','$respon')");  
if($in_ch==1)  
   {  
      echo'<script>alert("Posted Successfully")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
 



}

else{
	//echo'<script>alert("Failed hahahah")</script>'; 
	
}
?>


<?php //show job post
$user_email= $_SESSION['email'];
$con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");
$sql = "SELECT * FROM `post_job` WHERE `email`='".$user_email."' ";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
       
           
        while($row = mysqli_fetch_array($result)){
			



		
            echo "<div style='position:relative; top:100px; left:550px; width: 600px; padding-left:10px;color:#F8F8FF; background-color:DarkOliveGreen;'>";
               
                echo "<h4>Company/Institution : ". $row['cmp_name'] . "</h4>";
            
                echo "<h5>Employer :".$row['emp_name']."</h5>";
			
				 echo "<h5><b>Job Details :</b>" .$row['description'] . "</h5>";
				 echo "<h5>Hiring Post :" .$row['position'] . "</h5>";
				 echo "<h5>Qualifications :" .$row['qualification'] . "</h5>";
				 echo "<h5>Programming skills needed on :" .$row['prgm_skills'] . "</h5>";
			     echo "<h5>Experience:" .$row['experi'] . " year</h5>";
				 echo "<h5>Job Location:" .$row['location'] . "</h5>";	 
				  echo "<h5>Responsibilities:" .$row['respon'] . "</h5>";
				 
            echo "</div>";
			
        }
       
      
        mysqli_free_result($result);
    } else{
        echo "<p style='position:absolute; left:780px; top:180px;'> No posts found.<p>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>JOB4CS</title>
    <link href="post_job.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body >
  <div class="header">
  <a href="home.php"  style="background-color:black; color:white; width:60px; height:30px; position:relative; right;-500px; top:0px;margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">home</i>HOME</a>
 <a href="yourprofile.php"  style="background-color:black; color:white; position:relative; right:-10px; top:0px; margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">face</i>Your Profile</a>
<h3 style="background-color:white;"> FILL UP THE FORM TO POST A JOB VACANCY</h3>


  <p style="background-color:white;">Your Logged in email: <?php echo $user_email;?>
  
  
  </p>
  </div>
<br>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">


<br><label for="company_name">Company name:</label><br>
  <input type="text" id="company_name" name="company_name" value="" required><br>
  <label for="emp_name">Employer name:</label><br>
  <input type="text" id="emp_name" name="emp_name" value=" "required><br><br>

<label for="decription">Job Description:</label><br>
<textarea  style="color:black; 
margin-left:10px;"rows = "5" 
cols = "50" name = "jobDescription" 
placeholder="Write JOb details here within 100 words "></textarea>



<br><br><label for="post_name">Position name:</label><br>
  <input type="text" id="post_name" name="post_name" value=" " required><br><br>
<label for="edu_qua" >Qualifications:</label><br>
 <textarea  style="color:black; 
margin-left:10px;"rows = "5" 
cols = "50" name = "qualification" 
placeholder="Write Qualifications  here within 100 words "></textarea>

<br>

<h2> Select the Programming Languages skills are needed </h2>

  <input type="checkbox" id="choice6" name="choice[]" value="JAVA">
  <label for="choice6">JAVA</label>
  <input type="checkbox" id="choice7" name="choice[]" value="Python">
  <label for="choice7">Python</label>

  <input type="checkbox" id="choice8" name="choice[]" value="C#">
  <label for="choice8">C#</label>

  <input type="checkbox" id="choice9" name="choice[]" value="Laravel">
  <label for="choice9">Laravel</label>


<input type="checkbox" id="choice10" name="choice[]" value="HTML">
  <label for="choice10">HTML</label>
<input type="checkbox" id="choice11" name="choice[]" value="CSS">
  <label for="choice11">CSS</label>
<input type="checkbox" id="choice12" name="choice[]" value="JavaScript">
  <label for="choice12">JavaScript</label>
<input type="checkbox" id="choice13" name="choice[]" value="PHP">
  <label for="choice13"> PHP  </label>
<input type="checkbox" id="choice14" name="choice[]" value="C++">
  <label for="choice14">C++</label><br>








<br><label for="exp">Experience needed:</label><br>
  <input  type="number" id="exp" name="exp" placeholder="Years:" required><br>

<br><label for="location">Job Location :</label><br>
  <input  type="name" id="exp" name="location" placeholder="" required><br><br>


<label for="respon">Responsibilities and othes:</label><br>

         <textarea rows = "6" cols = "50" name = "respon">
           
         </textarea><br>
         
 <br><input type="submit" value="submit" name=" submit" style="font-size:20px;" >    
</form>

<h3 style="position:absolute; top:60px; left:750px;"> Your Previous Posts</h3>



<script>
function makeCopy() {
    console.log('copy');
    var TTclone = TToriginal.cloneNode(true);
    // TTclone.id = "exam";
    TToriginal.parentNode.appendChild(TTclone);
}

</script>






  </body>
  
  
  
  