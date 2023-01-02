<?php?>

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



	<a href="index.php">
		<h1 class="csejobs_heading">Job4CS</h1>
	</a>

	<div class="heading_buttons">

		<a href="index.php" class="home_button"><button style="background-color:rgb(205, 125, 50)">HOME</button></a>

<a href="https://jobs.bdjobs.com/jobsearch.asp?fcatId=8&icatId="  class="bdjobs_button"><button style="background-color:rgb(205, 125, 50)">BD JOBS</button></a>

<a href="signup.html"><button id="signup_button"> SIGN UP</button></a>


<button class="login_button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"> LOGIN</button>

<div id="id01" class="modal">

		<form class="modal-content animate" action="login.php" method="POST">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"></span>
				
			</div>

			<div class="container">
        <h2><b>Please login at first</b></h2>
        <p><b>If you Don't have any account <a href="signup.html">Clik here </a>to Sign Up</b></p> 
				<label><b>Email</b></label>
				<input type="text" placeholder="Enter Username" name="email" required>

				<br><label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<br><a><input type="submit" name="loginsubmit" value="LOGIN"style="background-color:rgb(102, 153, 153); color: white;width:70px; height:30px;"><b></b></input></a>
			<br>	<input type="checkbox" checked="checked"> Remember me
			</div>

			<div class="container" style="background-color:#f1f1f1"><br>
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="forgetpass.html">password?</a></span>
			</div>
		</form>
	</div>













  </div><!-- heading_buttons--->

<div class="fb_btn">
   <a href="https://www.facebook.com/"><button > <i class="fa fa-facebook"></i></button></a>
    
    
</div>
<div class="search-container" >
    <form action="only_search.php" method="post">
      <input type="text" style="height:10px; width:180px; position:relative; top:4px;"placeholder="Search.." name="search" required>


      <button type="submit"  style="height:25px; width:25px; position:absolute; top:12px; left:190px;"value="Search" name="ssubmit"><i class="fa fa-search"></i></button>
    </form>
  </div>



<div class="tab_switching_buttons" >


  <button class="tab_switcher" onclick="openTab(event, 'jobPosts')">JOB POSTS</button>


  <button class="tab_switcher" onclick="openTab(event, 'bdjobsDiv')">BD JOBS</button>


  <button class="tab_switcher" onclick="openTab(event, 'careerjet')">CAREERJET</button>

 
</div>

<!---JOP POSTS STRAT-->
<div style="overflow: scroll;" class="portal" id="jobPosts" onclick="document.getElementById('id01').style.display='block' ">
<h2>JOB POSTS</h2>
<p> <b>Login To Apply Job</b></p>
<?php

$con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");
$sql = "SELECT * FROM `post_job`";
if($result = mysqli_query($con, $sql)){
    
	if(mysqli_num_rows($result) > 0){
       
           
        while($row = mysqli_fetch_array($result)){
			
            echo "<div onclick='document.getElementById('id01').style.display='block' '
			style='position:relative;left:5px;top:20px;width:490px; 
			padding-left:10px;color:#F8F8FF; 
			background-color:DarkOliveGreen;'>";
               echo "<h4>Posted by  : ". $row['email'] . "</h4>";
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
        echo "No posts found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}



?>
</div>
<!---JOP POSTS END-->





<div class="portal"  id="bdjobsDiv">

<h2 style="background-image:url(https://www.bdjobs.com/images/logo.png); background-repeat:no-repeat; background-color:white;position:absolute; top:-60px;">______________</h2>

<iframe src="https://jobs.bdjobs.com/jobsearch.asp?fcatId=8&icatId=" height="523" width="485" style="position:relative; top:-5px; left:5px;border-radius:20px;"  title="Iframe Example"></iframe>

</div>


<div class="portal"  id="careerjet">

<iframe src="https://www.careerjet.com.bd/search/jobs?s=computer+science+&l=Bangladesh&radius=25&sort=relevance" height="523" width="485" style="position:relative; top:0px; left:5px;border-radius:20px;"  title="Iframe Example"></iframe>
</div>



<div class="submitCV">
<button class="btn" onclick="document.getElementById('id01').style.display='block'">
<i class="material-icons" style="font-size:25px; position:relative; top:6px;">upload_file</i>
SUBMIT CV</button>
<div class="dropdown">
  <!--<button class="btn" style="border-left:1px solid #0d8bf2; height:48px; width:60px; content-align:center; left-margin:0px">
    <i class="fa fa-caret-down"></i>
  </button>
  <!--<div class="dropdown-content">
    <a href="#" onclick="document.getElementById('id01').style.display='block'">NEW CV</a>
    <a href="#" onclick="document.getElementById('id01').style.display='block'">CHECK UPLOADED CV</a>
   
  </div>-->
</div>
</div>




<div id="post_job" class="postJob" onclick="">
<p style="font-size:18px; background-color:white; color:black; width:200px;"> Are you an Employer? </p>
<a href="#"> <button class="postJob_btn" 
onclick="document.getElementById('id01').style.display='block'">
<i class="material-icons" style="font-size:25px; position:relative; top:6px;">post_add</i>
POST A JOB </button></a>

</div>
<div id= class="forum" onclick="">

<button  class="forum_btn" onclick="document.getElementById('id01').style.display='block'">
<i class="material-icons" style="font-size:25px; position:relative; top:6px;">forum</i>

DISCUSSION FORUM </button>

</div>
<div class="footer-basic">
        <footer>
            
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.php">Home</a></li>
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