<?php
include("function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>

</style>
<body>

<div class="main">
    <div>
        <form action="insert.php" method="post">
            <input type="text" name="title" style="width:200px; margin-top:5px;" placeholder="제목"><br/>
            <textarea name="content" style="width:200px; margin-top:5px"></textarea><br/>
            <input type="submit" value="등록">
        </form>
    </div>
</div>

</body>
</html>


