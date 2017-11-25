<?php

function connect_to_database() {
    $path = $_SERVER['DOCUMENT_ROOT'] . '../backend/data.db';
    $file = 'sqlite:'.path;
    $conn = new PDO($file) or die("Database Error");
    return $conn;
}

?>
