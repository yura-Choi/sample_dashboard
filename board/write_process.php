<?php
    session_start();
    if (!isset($_SESSION['user'])){
        echo "<script>
            alert('Please login first.');
            window.location.href='/login/login.php';
        </script>";
    }
    
    require $_SERVER['DOCUMENT_ROOT']."/db.php";

    $title = $_POST['title'];
    $content = $_POST['content'];
    $pw = $_POST['pw']!='' ? md5($_POST['pw']) : '';

    echo "<script>
        alert(pw: '".$pw."');
    </script>";

    $nickname = $_SESSION['user'];
    $query = "INSERT INTO post (title, content, author, password) values('".$title."', '".$content."', '".$nickname."', '".$pw."');";
    $result = $db->query($query);
    if($result){
        echo "<script>
            window.location.href='/board/board.php';
        </script>";
    } else {
        echo "<script>
            alert('Failed to write a post. Please try again.');
        </script>";
    }
?>