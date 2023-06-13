<?php
    session_start();
    if (!isset($_SESSION['user'])){
        echo "<script>
            alert('Please login first.');
            window.location.href='/login/login.php';
        </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Write</title>
</head>
<style>
    .container {
        float: right;
        position: relative;
        left: -20%;
    }

    div {
        margin-bottom: 20px;
    }
</style>
<body>
    <div class="container">
        <h1 style="text-align: center;">write post</h1>
        <form method="POST" action="write_process.php">
            <div>
                <div>
                    <label for="title"><strong>title</strong></label><br>
                    <input type="text" id="title" name="title" size="52" required><br>
                </div>

                <div>
                    <label for="content"><strong>content</strong></label><br>
                    <textarea id="content" name="content" rows="4" cols="50" required></textarea><br>
                </div>
                <div>
                    <label for="content"><strong>password</strong></label><br>
                    <input type="password" id="pw" name="pw" size="20"><br>
                </div>
                <div>
                    <input type="submit" value="write">
                </div>
            </div>
        </form>
    </div>
</body>
</html>