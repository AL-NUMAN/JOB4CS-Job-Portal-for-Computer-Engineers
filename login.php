<?php 

session_start();
if(isset($_POST['loginsubmit']))
{	

$con = mysqli_connect('localhost','root','','csejobs') or die("dataserver connection error");

$email = mysqli_real_escape_string($con,$_POST['email']);
    $psw= mysqli_real_escape_string($con,$_POST['psw']);
if ($email != "" && $psw != ""){

        $sql_query = "select count(*) as cntUser from `signup` where email='".$email."' and password='".$psw."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0)
		{
			
              $_SESSION['email'] = $email; //header('Location: home.html');
		      echo "<script> window.location ='home.php';
 alert('login successful');

</script> ";  
		    
		}
		else{
           
		   echo "<script>
 alert('Wrong Username/Password');
 window.location ='index.php';
</script> ";
			
        }


}

}


else{
	
	echo "something is wrong";
}


?>


