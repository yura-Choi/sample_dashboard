<?php
    session_start();
    if ($_SESSION['user']){
        header('Location: /board/board.php');
    } else {
        header('Location: /login/login.php');
    }
?>