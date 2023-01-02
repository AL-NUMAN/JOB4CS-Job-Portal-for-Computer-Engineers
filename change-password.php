	<?php 
	session_start();
$user_email= $_SESSION['email'];
		$con = mysqli_connect('localhost','root','','csejobs') or die("error");
		if(isset($_POST['re_password']))
		{
		$old_pass=$_POST['old_pass'];
		$new_pass=$_POST['new_pass'];
		$re_pass=$_POST['re_pass'];
		$chg_pwd=mysqli_query($con,"select password from signup where email='".$user_email."'");
		$chg_pwd1=mysqli_fetch_array($chg_pwd);
		$data_pwd=$chg_pwd1['password'];
		if($data_pwd==$old_pass){
		if($new_pass==$re_pass){
			$update_pwd=mysqli_query($con,"update signup set password='$new_pass' where email='".$user_email."'");
			echo "<script>alert('Password Updated Sucessfully Login again'); window.location='index.php'</script>";
		}
		else{
			echo "<script>alert('Your new and Retype Password does not match'); window.location='user_edit_info.php'</script>";
		}
		}
		else
		{
		echo "<script>alert('Your old password is wrong'); window.location='user_edit_info.php'</script>";
		}}
	?>