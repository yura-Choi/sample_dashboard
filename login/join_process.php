<?php
    session_start();
    if (isset($_SESSION['user'])){
        echo "<script>
            window.location.href='/board/board.php';
        </script>";
    }

    require $_SERVER['DOCUMENT_ROOT']."/db.php";

    $nickname = $_POST['nickname'];
    $id = $_POST['id'];
    $password = md5($_POST['pw']);
    $email = $_POST['email'];

    $query = "INSERT INTO user (nickname, user_id, password, email) values('".$nickname."', '".$id."', '".$password."', '".$email."');";
    $result = $db->query($query);
    if($result){
        echo "<script>
            alert('Success to join.');
            window.location.href='/login/login.php';
        </script>";
    } else {
        echo "<script>
            alert('Failed to join. Please try again.');
        </script>";
    }
?>