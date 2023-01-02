
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
.applyjoblink{
	  
	 position:relative;
	 top:-10px;
	 width:185px;

	 font-size:24px;
	 left:150px;
	background-color:red;
	color:yellow;
	
	
}

.applyjoblink:hover{
	opacity:1;
display:block;
color:white;
	background-color:blue;
}
</style>

<a href="home.php"  style="background-color:black; color:white; width:60px; height:30px; position:relative; right;-500px; top:0px;margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">home</i>HOME</a>
 <a href="yourprofile.php"  style="background-color:black; color:white; position:relative; right:-10px; top:0px; margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">face</i>Your Profile</a>

<?php

session_start();
$user_email= $_SESSION['email'];
if(isset($_POST['ssubmit'])){

$con= mysqli_connect('localhost', 'root', '', 'csejobs') or die("error");


$keyword= $_POST['search'];
$i=0;
$sql = "SELECT * FROM `post_job` where `prgm_skills` LIKE '%%$keyword%%' or `cmp_name` like '%%$keyword%%' 

or `emp_name` LIKE '%%$keyword%%' or `position` LIKE '%%$keyword%%'or `location` LIKE '%%$keyword%%'";
if($result = mysqli_query($con, $sql)){
    
	if(mysqli_num_rows($result) > 0){
       
           
        while($row = mysqli_fetch_array($result)){
			
		$i=$i+1;
            echo "<div class='posts_div'  style='background-color:DarkOliveGreen; color:white; width:600px; position:relative; top:20px;'>";
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
		
		echo" <h2  style='position:absolute; top:11px;'>'".$i."' results found for '".$keyword."'      </h2>";
    } else{
        echo "<h4>No posts found.</h4>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
}
else {
	
	echo "<h4> </h4>";
}

?>