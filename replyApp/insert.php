<?php
include('function.php');

$title = $_POST['title'];
$content = $_POST['content'];

setBlog($title, $content);

header('Location:index.php');
?>