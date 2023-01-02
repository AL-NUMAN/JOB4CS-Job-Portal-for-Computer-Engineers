<?php
// connect to the database for cv upload downlaod view cv_form.php
session_start();
$user_email= $_SESSION['email'];
$conn = mysqli_connect('localhost', 'root', '', 'csejobs');
$sql = "SELECT cv FROM users_cv where email='$user_email'";
$sqll = "SELECT cv_two FROM users_cv where email='$user_email'";
$sqlll = "SELECT cv_three FROM users_cv where email='$user_email'";
$result = mysqli_query($conn, $sql);
$resultt = mysqli_query($conn, $sqll);
$resulttt= mysqli_query($conn, $sqlll);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
$filess = mysqli_fetch_all($resultt, MYSQLI_ASSOC);
$filesss = mysqli_fetch_all($resulttt, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte
        echo "File too large!";
	}
	elseif ($_FILES['myfile']['size'] <0){echo "No cv uploaded!";}
		
     else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "UPDATE users_cv set cv ='$filename' where email='$user_email'";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('CV Updated Sucessfully'); window.location='cv_form.php'</script>";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM users_cv WHERE email='$user_email'";
    $result = mysqli_query($conn, $sql);

    
	
	
		$file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['cv'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['cv']));
        readfile('uploads/' . $file['cv']);

        
        exit;
    }
	
	


}


//cv2 start

if (isset($_POST['save2'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename2 = $_FILES['myfile2']['name'];

    // destination of the file on the server
    $destination2 = 'uploads/' . $filename2;

    // get the file extension
    $extension = pathinfo($filename2, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file2 = $_FILES['myfile2']['tmp_name'];
    $size = $_FILES['myfile2']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile2']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte
        echo "File too large!";
	}
	elseif ($_FILES['myfile2']['size'] <0){echo "No cv uploaded!";}
		
     else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file2, $destination2)) {
            $sqll = "UPDATE users_cv set cv_two ='$filename2' where email='$user_email'";
            if (mysqli_query($conn, $sqll)) {
                echo "<script>alert('CV 2 Updated Sucessfully'); window.location='cv_form.php'</script>";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
if (isset($_GET['file_id2'])) {
    $id2 = $_GET['file_id2'];

    // fetch file to download from database
    $sqll = "SELECT * FROM users_cv WHERE email='$user_email'";
    $resultt = mysqli_query($conn, $sqll);

    
	
	
		$file2 = mysqli_fetch_assoc($resultt);
    $filepath = 'uploads/' . $file2['cv_two'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file2['cv_two']));
        readfile('uploads/' . $file2['cv_two']);

        
        exit;
    }
	
	


}//cv2end


//cv3start
if (isset($_POST['save3'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename3 = $_FILES['myfile3']['name'];

    // destination of the file on the server
    $destination3 = 'uploads/' . $filename3;

    // get the file extension
    $extension = pathinfo($filename3, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file3 = $_FILES['myfile3']['tmp_name'];
    $size = $_FILES['myfile3']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile3']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte
        echo "File too large!";
	}
	elseif ($_FILES['myfile3']['size'] <0){echo "No cv uploaded!";}
		
     else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file3, $destination3)) {
            $sqlll= "UPDATE users_cv set cv_three ='$filename3' where email='$user_email'";
            if (mysqli_query($conn, $sqlll)) {
                echo "<script>alert('CV 3 Updated Sucessfully'); window.location='cv_form.php'</script>";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
if (isset($_GET['file_id3'])) {
    $id3 = $_GET['file_id3'];

    // fetch file to download from database
    $sqlll = "SELECT * FROM users_cv WHERE email='$user_email'";
    $resulttt = mysqli_query($conn, $sqlll);

    
	
	
		$file3 = mysqli_fetch_assoc($resulttt);
    $filepath = 'uploads/' . $file3['cv_three'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file3['cv_three']));
        readfile('uploads/' . $file3['cv_three']);

        
        exit;
    }
}
	