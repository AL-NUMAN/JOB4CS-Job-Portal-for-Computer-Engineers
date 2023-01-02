<?php 

session_start();
if(isset($_POST['forgetPassOK']))
{	

$con = mysqli_connect('localhost','root','','csejobs') or die("dataserver connection error");

$email_addy = mysqli_real_escape_string($con,$_POST['email_addy']);
$newPass_addy = mysqli_real_escape_string($con,$_POST['newPass_addy']);


$sql = "SELECT * FROM signup WHERE email = '$email_addy'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0)
{
    
        $sql = "UPDATE signup SET password='$newPass_addy' WHERE email='$email_addy'";
        mysqli_query($con, $sql);
 
        echo "<h3><b>Password has been changed,<a href='index.php'>click here</a>and login again<b></h3> ";
    }
    else
    {
        echo "Email does not exists";
    }
}
else
{
    echo "Something went wrong , dataserver is not connected";
}

?>