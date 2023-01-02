<?php
	
	if(isset($_POST['Submit']))
{	

$con = mysqli_connect('localhost','root','','csejobs') or die("error");

		
		$fname_su = $_POST['fname_su'];
		$lname_su = $_POST['lname_su'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$psw = $_POST['psw'];
		//$passrep= $_POST['passrep'];

		$sql = "INSERT INTO `signup`(`firstname`, `lastname`, `contact`, `email`, `password`) VALUES ('$fname_su','$lname_su','$contact','$email','$psw')";
$sqll = "INSERT INTO `users`(`user_email`) VALUES ('$email')";
$sqlll = "INSERT INTO `users_cv`(`email`) VALUES ('$email')";
// insert in database 
$rs = mysqli_query($con, $sql);
$rss= mysqli_query($con, $sqll);
$rsss= mysqli_query($con, $sqlll);
if($rs)
{
	

echo "
<h2> Sign up successful,
<a href ='index.php'>clcik here to go back and login</a></h2>";

}
else{
	echo "sign up failed";
}

}
else
{
	echo "Are you a genuine visitor?";
	
}
?>
