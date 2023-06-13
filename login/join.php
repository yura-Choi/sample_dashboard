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
    <title>Join</title>
</head>
<body>
    <header style="text-align: center; margin-bottom: 30px;">
        <h2>Welcome to join!</h2>
        <p>Back to <a href="/login/login.html">Login</a>.</p>
    </header>
    <div style="text-align: center;">
        <form method="post" action="join_process.php">
            <table style="display: inline-block;">
                <tr>
                    <td><label>Nickname: </label></td>
                    <td><input type="text" id="nickname" name="nickname" size="20"><br></td>
                </tr>
                <tr>
                    <td><label>ID: </label></td>
                    <td><input type="text" id="id" name="id" size="20"><br></td>
                </tr>
                <tr>
                    <td><label>Password: </label></td>
                    <td><input type="password" id="pw" name="pw" size="20"><br></td>
                </tr>
                <tr>
                    <td><label>Email: </label></td>
                    <td><input type="email" id="email" name="email" size="20"><br></td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="2"><input type="submit" id="submit_btn" value="Join"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>