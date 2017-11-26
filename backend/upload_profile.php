<?php
    require_once "common.php";
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName']; 
    $jobTitle = $_POST['jobTitle'];
    $email = $_POST['email'];   
    $bio = $_POST['bio'];
    $imgPath = $_FILES["uploadFile"]["name"];
    add_profile($firstName, $lastName, $jobTitle, $email, $bio, $imgPath);
    mkdir("../profile_pictures/".$email); 
    $target_dir = "../profile_pictures/".$email."/";
    $target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["uploadFile"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "jpeg" ) {
        echo "Sorry, only JPG and JPEG files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    header("Location: profile_page.php?email=".$email);
?>
