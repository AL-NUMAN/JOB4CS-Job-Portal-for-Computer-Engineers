<?php
include("dbconn.php");
include("session.php");


if (isset($_POST['comment'])){
$comment = $_POST['content'];

mysqli_query($conn,"insert into comment (content,user_email,post_id) values ('$comment','$user_email','$content')") or die (mysqli_error());

?>
<script>
window.location = 'forum.php';
</script>

<?php
}
?>