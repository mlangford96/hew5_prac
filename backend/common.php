<?php

    function connect_to_database() {
        $path = 'database.db';
        $file = 'sqlite:' . $path;
        $conn = new PDO($file) or die("Database Error");
        return $conn;
    }

    function add_profile($firstName, $lastName, $jobTitle, $email, $bio, $pathToPicture) {
        $conn = connect_to_database();
        $query = $conn->prepare("INSERT INTO PROFILES (FIRSTNAME, LASTNAME, JOBTITLE, EMAIL, BIO, PROFILEPIC) VALUES (?,?,?,?,?,?)");
        $query->execute(array($firstName, $lastName, $jobTitle, $email, $bio, $pathToPicture));
    }
?>
