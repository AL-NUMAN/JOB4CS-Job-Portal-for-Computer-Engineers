<?php 
//session_start();


?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>JOB4CS</title>
	<link href="style.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>


	<a href="home.php">
		<h1 class="csejobs_heading">JOB4CS</h1>
	</a>

	<div class="heading_buttons">

		<a href="home.php" class="home_button"><button style="background-color:rgb(205, 125, 50); width:80px;"><i class="material-icons" style="font-size:18px;">home</i><b>HOME</b></button></a>

<a href="https://jobs.bdjobs.com/jobsearch.asp?fcatId=8&icatId=" class="bdjobs_button"><button style="background-color:rgb(205, 125, 50)"><i class="material-icons" style="font-size:18px;">business_center</i><b>BD JOBS</b></button></a>
<?php 
session_start();
$user_email= $_SESSION['email'];
$con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");
$results = mysqli_query($con, "SELECT profile_image FROM users where user_email='$user_email'");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);


$nsql = "SELECT `firstname`, `lastname` FROM `signup` WHERE `email`='".$user_email."' ";
if($nresult = mysqli_query($con, $nsql)){
    if(mysqli_num_rows($nresult) > 0){
       
           
        while($row = mysqli_fetch_array($nresult)){
			



		
          
               
  echo "<h2 style='position:absolute; top:-25px; left:500px; color:white;'>" . $row['firstname'] ."  ". $row['lastname'] . "</h2>";



		}

	}
}

?>

<?php foreach ($users as $user): ?>
<img src="<?php echo 'images/' . $user['profile_image']  ?>"   width="35px" height="35px" 
style=" border-style:solid; border-color: white; position:relative;left:750px; top: -10px; border-radius: 55%; background-image:url('avatar.png');">

<?php endforeach; ?>


<a href="yourprofile.php"><button  class="profile_btn" ><i class="material-icons" style="font-size:22px;">account_circle</i>Your Profile</button></a>

<a href="logout.php"><button  class="LogOut_btn" ><i class="material-icons" style="font-size:22px;">logout</i>LogOut</button></a>






  </div><!-- heading_buttons--->

<div class="fb_btn">
   <a href="https://www.facebook.com/"><button > <i class="fa fa-facebook"></i></button></a>
    
    
</div>
<div class="search-container" >
    <form action="search.php" method="post">
      <input type="text" style="height:10px; width:180px; position:relative; top:4px;"placeholder="Search.." name="search" required>


      <button type="submit"  style="height:25px; width:25px; position:absolute; top:12px; left:190px;"value="Search" name="ssubmit"><i class="fa fa-search"></i></button>
    </form>
  </div>



<div class="tab_switching_buttons" >
<button class="tab_switcher" onclick="openTab(event, 'suggested')">SUGGESTED JOB POSTS</button>

  <button class="tab_switcher" onclick="openTab(event, 'jobPosts')">ALL JOB POSTS</button>


  <button class="tab_switcher" onclick="openTab(event, 'bdjobsDiv')">BD JOBS</button>


  <button class="tab_switcher" onclick="openTab(event, 'careerjet')">CAREERJET</button>


</div>


<!---JOP POSTS STRAT-->




<div style="overflow: scroll;" class="portal" id="jobPosts" >

<h2>ALL JOB POSTS (

<?php
$sqll = "SELECT  MAX(post_id) from `post_job` ";

$res=mysqli_query($con,$sqll);
if(mysqli_num_rows($res) > 0){
	
	while($roww = mysqli_fetch_array($res)){
	echo "'".$roww['MAX(post_id)']."'";
	}
}
?>

 )</h2>

<?php 
//session_start();
$user_email= $_SESSION['email'];
$con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");
$sql = "SELECT * FROM `post_job` order by `post_id` DESC";
if($result = mysqli_query($con, $sql)){
    
	if(mysqli_num_rows($result) > 0){
       
           
        while($row = mysqli_fetch_array($result)){
			
		
			
	
            echo "<div class='posts_div'>";
               echo "<h4>Posted by  : ". $row['email'] . "</h4>";
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
				  echo "<a href='applyjob.php?postId=".$row['post_id']." ' class='applyjoblink'> Click here to apply</a>";
            echo "</div>";
			
			
			$post_number= $row ['post_id'];
			
        }
      
      
        mysqli_free_result($result);
    } else{
        echo "Not found anything. ";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}



?>
</div>
<!---JOP POSTS END-->





<div class="portal" style="overflow: scroll;"id="suggested">
<form action="home.php" method="post">
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
  
  
  <input type="submit" value="submit" name=" submit" style="font-size:20px;">
</form>




<?php 
if(isset($_POST['submit'])){
$user_email= $_SESSION['email'];
$con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");
$checkbox1=$_POST['choice'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  

$i=0;


$sql = "SELECT * FROM `post_job` where `prgm_skills` LIKE '%%$chk%%' or `prgm_skills` LIKE '%$chk%%' or`prgm_skills` LIKE '%%$chk%' or `prgm_skills` LIKE '%%_$chk%%' ";
if($result = mysqli_query($con, $sql)){
    
	if(mysqli_num_rows($result) > 0){
       
           
        while($row = mysqli_fetch_array($result)){
			
		$i=$i+1;
            echo "<div class='posts_div'>";
               echo "<h4>Posted by  : ". $row['email'] . "</h4>";
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
				  echo "<a href='applyjob.php?postId=".$row['post_id']." ' class='applyjoblink'> Click here to apply</a>";
            echo "</div>";
			
			
			
        }
       
      
        mysqli_free_result($result);
		
		echo" <h3  style='position:absolute; top:70px;'>'".$i."' Posts found for '".$chk."'      </h3>";
    } else{
        echo "No posts found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
}
else {
	
	echo "<h4> Check box to have suggested job posts</h4>";
}

?>



</div>






<div class="portal"  id="bdjobsDiv">

<h2 style="background-image:url(https://www.bdjobs.com/images/logo.png); background-repeat:no-repeat; background-color:white;position:absolute; top:-60px;">______________</h2>

<iframe src="https://jobs.bdjobs.com/jobsearch.asp?fcatId=8&icatId=" height="523" width="485" style="position:relative; top:-5px; left:5px;border-radius:20px;"  title="Iframe Example"></iframe>

</div>


<div class="portal"  id="careerjet">

<iframe src="https://www.careerjet.com.bd/search/jobs?s=computer+science+&l=Bangladesh&radius=25&sort=relevance" height="523" width="485" style="position:relative; top:0px; left:5px;border-radius:20px;"  title="Iframe Example"></iframe>
</div>




<div class="submitCV">
<a href="cv_form.php"><button class="btn"><i class="material-icons" style="font-size:25px; position:relative; top:6px;">upload_file</i>SUBMIT CV</button></a>
<!--<div class="dropdown">
  <button class="btn" style="border-left:1px solid #0d8bf2; height:48px; width:60px; content-align:center; left-margin:0px">
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content">
    <a href="cv_form.php">NEW CV</a>
    <a href="cv_form.php">CHECK OLDER CV</a>
   
  </div>
</div>-->
</div>




<div id="post_job" class="postJob" onclick="">

<h2 style="background-color:yellow; color:red; width:280px;"> Are you an Employer?</h2>
<a href="post_job.php"> <button class="postJob_btn" href="post_job.html"><i class="material-icons" style="font-size:25px; position:relative; top:6px;">post_add</i> POST A JOB VACANCY</button></a>

</div>
<div id= class="forum" onclick="">

<a href="forum.php"><button  class="forum_btn" >
<i class="material-icons" style="font-size:25px; position:relative; top:6px;">forum</i>
DISCUSSION FORUM </button></a>

</div>
<div class="footer-basic">
        <footer>
            
            <ul class="list-inline">
                <li class="list-inline-item"><a href="home.php">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="about.html">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                
            </ul>
            <p class="copyright">CSE JOBS BD © 2021</p>
        </footer>
    </div>












    <script src="script.js"></script>
  </body>
</html>