<?php
    session_start();
    if (isset($_SESSION['user'])){
        echo "<script>
            window.location.href='/board/board.php';
        </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        html, body {
            font: 100%/1.5 Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <header style="text-align: center; margin-bottom: 30px;">
        <h2>Welcome!</h2>
        <p>This page is for members. To continue, please login first.</p>
        <div>If you don't have an account, go to <a href="/login/join.php">Join</a> page.</div>
    </header>
    <div style="text-align: center;">
        <form method="post" action="login_process.php">
            <table style="display: inline-block;">
                <tr>
                    <td><label>ID: </label></td>
                    <td><input type="text" id="id" name="id" size="20"><br></td>
                </tr>
                <tr>
                    <td><label>PW: </label></td>
                    <td><input type="password" id="pw" name="pw" size="20"><br></td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="2"><input type="submit" id="submit_btn" value="Login"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>