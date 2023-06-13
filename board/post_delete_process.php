<?php
    session_start();

    if (!isset($_SESSION['user'])){
        echo "<script>
            alert('Please login first.');
            window.location.href='/login/login.php';
        </script>";
    }
    
    require $_SERVER['DOCUMENT_ROOT']."/db.php";

    $query = "SELECT nickname, user_id, password FROM user WHERE user_id = '". $id."' AND password = '". $password."';";
    $result = $db->query($query);
    if(mysqli_num_rows($result)){
        $row = $result->fetch_array();
        
    }
?>