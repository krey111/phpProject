<?php
include('function.php');

$blog_id = $_POST['blog_id'];
$rp_content = $_POST['rp_content'];
$rp_parent_id = $_POST['rp_parent_id'];
$rp_parent_user_id = $_POST['$rp_parent_user_id'];

if($rp_parent_id) {
    setReReply($blog_id, $rp_content, $rp_parent_id);
    setReReMsg($rp_parent_id, $rp_parent_user_id);
}
else setReply($blog_id, $rp_content);
?>