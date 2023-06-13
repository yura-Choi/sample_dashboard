<?php
    session_start();
    if (!isset($_SESSION['user'])){
        echo "<script>
            alert('Please login first.');
            window.location.href='/login/login.php';
        </script>";
    }

    if(!isset($_SESSION['secret_post_id'])){
        // ($_SERVER['HTTP_REFERER'] != '/board/post.php?id='.$_SESSION['secret_post_id'])){
        header('location: /board/board.php');
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>show post</title>
</head>
<body>
    <div class="container">
        <h2>This post is locked.</h2>
        <form>
            <div>
                <label>Input password...</label><br>
                <input type="password" id="password" required>
            </div>
            <div>
                <button onclick="checkPassword()">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
    <script>

        function checkPassword() {
            var password = document.getElementById("password").value;
            var correctPassword = <?=$_SESSION['secret_pw'] ?>;

            if (CryptoJS.MD5(password) === correctPassword) {
                alert("it works!");
                <?php $_SESSION['secret_valid'] = true; ?>
                // window.location.href='/board/post.php?'+<?=$_SESSION['secret_post_id']?>;
            } else {
                alert("Password is incorrect.");
            }
        }
    </script>
</body>
</html>