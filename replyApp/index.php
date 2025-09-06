<?php

include("function.php");

$blogs = getBlogs();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>
    .blog{ border:1px solid #ddd;}
    .row{display:flex;}
    .row:first-child>*{border-bottom:1px solid #ddd}
    .row>*{flex:1;}
    .row>*:first-child{flex:2}
</style>
<body>

<div class="main">
    <div class="blog">
        <div class="row">
            <div>제목</div>
            <div>작성자</div>
            <div>날짜</div>
        </div>
        <?php
        foreach ($blogs as $blog) {
            $username = getUsername($blog['user_id']);
        ?>
            <div class="row">
                <div><a href="view.php?id=<?=$blog['id']?>"><?=$blog['title']?></a></div>
                <div><?=$username?></div>
                <div><?=$blog['create_at']?></div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

</body>
</html>


