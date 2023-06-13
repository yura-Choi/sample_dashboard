<?php
    $host = "localhost";
    $user = "";
    $database = "";

    $file_path = $_SERVER['DOCUMENT_ROOT']."/db.txt";
    $file = fopen($file_path, "r");
    $pw = fread($file, filesize($file_path));
    fclose($file);

    $db = mysqli_connect($host, $user, $pw, $database) or die("Failed to connect database.");
?>