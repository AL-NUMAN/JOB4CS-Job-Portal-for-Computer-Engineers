<!DOCTYPE html>
<html>
<head>
	<title>POST AND COMMENT SYSTEM</title>
	<?php include('dbconn.php'); ?>
	<?php include('session.php'); ?>
	
	  <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>

 <a href="home.php"  style="background-color:black; color:white; width:60px; height:30px; position:relative; right;-500px; top:0px;margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">home</i>HOME</a>
 <a href="yourprofile.php"  style="background-color:black; color:white; position:relative; right;550px; top:0px; margin-left:5px;font-size:18px;"><i class="material-icons" style="font-size:18px;">face</i>Your Profile</a>
	
	<div id="container">

		<br>
		WELCOME!
			<a href="logout.php"><button><?php 
				echo $member_row['firstname']." ".$member_row['lastname'];
			?> - Log Out</button></a>
			
		<br>
		<br>
		
					<form method="post"> 
					<textarea name="post_content" rows="7" cols="64" 
					style="" required placeholder="...Write your query here........" ></textarea>
					<br>
					<button name="post">&nbsp;POST</button>
					<br>
					<hr>
					</form>
						<?php	
							$query = mysqli_query($conn,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN signup on signup.email = post.user_email order by post_id DESC")or die(mysqli_error());
							while($post_row=mysqli_fetch_array($query)){
							$id = $post_row['post_id'];	
							$upid = $post_row['user_email'];	
							$posted_by = $post_row['firstname']." ".$post_row['lastname'];
						?>
					<a style="text-decoration:none; float:right;" href="deletepost.php<?php echo '?id='.$id; ?>"><button><font color="red">x</button></font></a>
					<h3>Posted by: <a href="#"> <?php echo $posted_by; ?></a>
					-
						<?php				
								$days = floor($post_row['TimeSpent'] / (60 * 60 * 24));
								$remainder = $post_row['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
								if($days > 0)
								echo date('F d, Y - H:i:sa', $post_row['date_created']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "A few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes ago';
						?>
					<br>
					<br><?php echo $post_row['content']; ?></h3>
					<form method="post">
					<hr>
					Comment:<br>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<textarea name="comment_content" rows="2" cols="44" style="" placeholder=".........Type your comment here........" required></textarea><br>
					<input type="submit" name="comment">
					</form>
						
					</br>
				
							<?php 
								$comment_query = mysqli_query($conn,"SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN signup on signup.email = comment.user_email where post_id = '$id'") or die (mysqli_error());
								while ($comment_row=mysqli_fetch_array($comment_query)){
								$comment_id = $comment_row['comment_id'];
								$comment_by = $comment_row['firstname']." ".  $comment_row['lastname'];
							?>
					<br><a href="#"><?php echo $comment_by; ?></a> - <?php echo $comment_row['content']; ?>
					<br>
							<?php				
								$days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
								$remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
								if($days > 0)
								echo date('F d, Y - H:i:sa', $comment_row['date_posted']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "A few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes ago';
							?>
					<br>
							<?php
							}
							?>
					<hr>
					&nbsp;
					<?php 
					if ($u_id = $id){
					?>
					
				
					
					<?php }else{ ?>
						
					<?php
					} } ?>
					
				
							<?php
								if (isset($_POST['post'])){
								$post_content  = $_POST['post_content'];
								
								mysqli_query($conn,"insert into post (content,date_created,user_email) values ('$post_content','".strtotime(date("Y-m-d h:i:sa"))."','$user_email') ")or die(mysqli_error());
								header('location:forum.php');
								}
							?>

							<?php
							
								if (isset($_POST['comment'])){
								$comment_content = $_POST['comment_content'];
								$post_id=$_POST['id'];
								
								mysqli_query($conn,"insert into comment (content,date_posted,user_email,post_id) values ('$comment_content','".strtotime(date("Y-m-d h:i:sa"))."','$user_email','$post_id')") or die (mysqli_error());
								header('location:forum.php');
								}
								?>

</body>

  <?php include('footer.php');?>

</html>