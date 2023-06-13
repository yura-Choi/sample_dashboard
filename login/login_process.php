<?php
    session_start();
    if (isset($_SESSION['user'])){
        echo "<script>
            window.location.href='/board/board.php';
        </script>";
    }
    
    require $_SERVER['DOCUMENT_ROOT']."/db.php";

    $id = $_POST['id'];
    $password = md5($_POST['pw']);
    $ip = $_SERVER['REMOTE_ADDR'];

    $query = "SELECT nickname, user_id, password FROM user WHERE user_id = '". $id."' AND password = '". $password."';";
    $result = $db->query($query);
    if(mysqli_num_rows($result)){
        $row = $result->fetch_array();
        $_SESSION['user'] = $row["nickname"];
        echo "<script>
            alert('login success!');
            window.location.href='/board/board.php';
        </script>";
    } else {
        echo "<script>
            alert('Incorrect login info!');
            window.location.href='/login/login.php';
        </script>";
    }
?>