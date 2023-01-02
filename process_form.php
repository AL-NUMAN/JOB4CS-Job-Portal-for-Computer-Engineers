<?php
  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect("localhost", "root", "", "csejobs");
  if (isset($_POST['save_profile'])) {
    // for the database
   
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      //$msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "UPDATE users SET profile_image='$profileImageName' where user_email='$user_email'  ";
        if(mysqli_query($conn, $sql)){
          $msg = "";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an  error in the database";
          $msg_class = "alert-error";
        }
      } else {
        $error = "There was an big erro uploading the file";
        $msg = "alert-this photo or data already saved";
      }
    }
  }
?>