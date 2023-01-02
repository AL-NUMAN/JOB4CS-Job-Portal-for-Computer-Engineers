<?php
session_start();
$user_email=$_SESSION['email'];
if (!isset($_SESSION['email'])){
header('location:forum.php');
}


$member_query = mysqli_query($conn,"select * from signup where email = '$user_email'")or die(mysqli_error());
$member_row = mysqli_fetch_array($member_query);

$fullname = $member_row['firstname']." ".$member_row['lastname'];
?>