<?php
    session_start();

    if (!isset($_SESSION['user'])){
        echo "<script>
            alert('Please login first.');
            window.location.href='/login/login.php';
        </script>";
    }
    if(isset($_SESSION['title'])){
        unset($_SESSION['title']);
        unset($_SESSION['content']);
    }
    if(isset($_SESSION['secret_post_id'])){
        unset($_SESSION['secret_post_id']);
        unset($_SESSION['secret_valid']);
        unset($_SESSION['secret_pw']);
    }

    require $_SERVER['DOCUMENT_ROOT']."/db.php";
    
    $page = isset($_GET['p']) ? $_GET['p'] : 1;
    if($page < 1){
        $page = 1;
    }
    $limit = 10;
    $start_pos = ($page-1) * $limit;

    $query = "SELECT id, title, author, created_at FROM post ORDER BY created_at DESC LIMIT ".$start_pos.", ".$limit.";";
    $result = $db->query($query);

    $pagenation_query = "SELECT count(*) FROM post;";
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Board</title>
    <style>
        html, body {
            font: 100%/1.5 Verdana, sans-serif
        }

        table {
            text-align: center;
        }
        table td {
            cursor: pointer;
        }

        #wrapper {
            margin: 0 auto;
            display: block;
            width: 960px;
        }
        .page-header {
            text-align: center;
            font-size: 1.5em;
            font-weight: normal;
            border-bottom: 1px solid #ddd;
            margin: 30px 0
        }
        #pagination {
            margin: 0;
            padding: 0;
            text-align: center;
        }
        #pagination li {
            display: inline;
        }
        #pagination li a {
            display: inline-block;
            text-decoration: none;
            padding: 5px 10px;
            color: #000;
        }
    </style>
</head>
<body>
    <header style="width: 70%; margin-top: 30px; margin-bottom: 30px;">
        <h2 style="text-align: center;">Board</h2>
        <div>
            <span style="display: inline-block; text-align: right;"><a href="/login/logout_process.php">logout</a></span>
            <span style="display: inline-block; text-align: right;"><a href="/board/write.php">write</a></span>
        </div>
    </header>
    
    <div id="content">
        <table>
            <th>no.</th>
            <th>title</th>
            <th>author</th>
            <th>created</th>
            
            <?php
                $i = 1;
                while($row = $result->fetch_array()){
                    ?>
                    <tr onclick="location.href='/board/post.php?id='+<?=$row['id']?>">
                        <td><?=$i?></td>
                        <td><?=$row['title']?></td>
                        <td><?=$row['author']?></td>
                        <td><?=$row['created_at']?></td>
                    </tr>
                    <?php
                    $i += 1;
                }
            ?>
        </table>
        
    </div>

    <footer>
        <ul id="pagination">
            <li><a href="#">«</a></li>
            <li><a href="/board/board.php?p=1">1</a></li>
            <li><a href="/board/board.php?p=2">2</a></li>
            <li><a href="/board/board.php?p=3">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </footer>
</body>
</html>
