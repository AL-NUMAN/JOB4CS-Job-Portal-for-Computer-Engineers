<?php
include('dbconn.php');
include('session.php');
if (isset($_POST['post'])){
$content  = $_POST['content'];

mysqli_query($conn,"insert into post (content,date_created,user_email) values ('$content','".strtotime(date("Y-m-d h:i:sa"))."','$user_email') ")or die(mysqli_error());

?>
<script>
window.location = 'forum.php';
</script>
<?php
}
?>
