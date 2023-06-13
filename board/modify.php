<?php
    session_start();
    if (!isset($_SESSION['user'])){
        echo "<script>
            alert('Please login first.');
            window.location.href='/login/login.php';
        </script>";
    }

    require $_SERVER['DOCUMENT_ROOT']."/db.php";

    $post_id = $_GET["id"];
    if(isset($_SESSION['secret_post_id']) && ($_SESSION['secret_post_id'] != $post_id)){
        echo "<script>
            window.location.href='/board/board.php';
        </script>";
    } else if(isset($_SESSION['secret_post_id']) && ($_SESSION['secret_post_id'] == $post_id && $_SESSION['secret_valid'] == true)){
        // pass and enter to secret post...
    } else {
        $query = "SELECT title, content, password FROM post WHERE id = '". $post_id."';";
        $result = $db->query($query);
        if(mysqli_num_rows($result)){
            $row = $result->fetch_array();
            $_SESSION['title'] = $row['title'];
            $_SESSION['content'] = $row['content'];

            if ($row['password'] != ''){
                $_SESSION['secret_post_id'] = $post_id;
                $_SESSION['secret_valid'] = false;
                $_SESSION['secret_pw'] = $row['password'];-
                header("location: /board/post_process.php?id=".$post_id);
            }
        } else {
            echo "<script>
                window.location.href='/board/board.php';
            </script>";
        }
    }

    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post</title>
    <style>
        html, body {
            font: 100%/1.5 Verdana, sans-serif;
        }
        h3 {
            text-align: center;
        }
        a:link, a:visited, a:hover, a:active {
            color: #000;
        }
        .container {
            width: 70%;
        }
        .menu span {
            display: inline-block;
            text-align: right;
            margin: 0 10px 20px 10px;
        }
        .content div {
            border: 1px solid gray;
            padding: 10px;
            margin: 10px 0 25px 0;
        }
        .comment {
            box-sizing: content-box;
            height: 20px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Modify</h3>
        <div class="menu">
            <span><a href="/board/modify.php">modify</a></span>
            <span><a href="/board/delete_process.php">delete</a></span>
        </div>
        <div class="content">
            <div>
                <span id="content"><?=$_SESSION['content'] ?></span><br>
            </div>
        </div>
    </div>


    <div class="container">
        <h1 style="text-align: center;">write post</h1>
        <form method="POST" action="modify_process.php">
            <div>
                <div>
                    <label for="title"><strong>title</strong></label><br>
                    <input type="text" id="title" name="title" size="52" value="<?=$row[''] ?>" required><br>
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