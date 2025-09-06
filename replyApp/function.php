<?php

include('../connect.php');

    $user_id = 1;

    function setBlog($title, $content){
        global $pdo, $user_id;
        $q = "insert into blog (title,content,user_id) values (:title,:content,:user_id)";
        $stmt = $pdo->prepare($q);
        $stmt->execute([":title" => $title, ":content" => $content, ":user_id" => $user_id]);
    }
    function getBlogs(){
        global $pdo;
        $q = "SELECT * FROM blog";
        $stmt = $pdo->prepare($q);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getBlog($blog_id){
        global $pdo;
        $q = "SELECT * FROM blog where id=:id";
        $stmt = $pdo->prepare($q);
        $stmt->execute([":id" => $blog_id]);

        return $stmt->fetch(); // 첫 번째 컬럼 값만 반환
    }

    function getUsername($id){
        global $pdo;
        $q = "select name from users where id=:user_id";
        $stmt = $pdo->prepare($q);
        $stmt->execute([":user_id" => $id]);

        return $stmt->fetchColumn(); // 첫 번째 컬럼 값만 반환
    }

    function setReply($blog_id, $rp_content){
        global $pdo, $user_id;
        $q = "insert into reply (blog_id,rp_content, user_id) values (:blog_id,:rp_content,:user_id)";
        $stmt = $pdo->prepare($q);
        $stmt->execute([":blog_id" => $blog_id, ":rp_content" => $rp_content, ":user_id" => $user_id]);
    }
    function setReReply($blog_id, $rp_content, $rp_parent_id){
        global $pdo, $user_id;
        $q = "insert into reply (blog_id,rp_content, user_id, rp_parent_id) values (:blog_id,:rp_content,:user_id, :rp_parent_id)";
        $stmt = $pdo->prepare($q);
        $stmt->execute([":blog_id" => $blog_id, ":rp_content" => $rp_content, ":rp_parent_id" => $rp_parent_id, ":user_id" => $user_id]);
    }

    function setReReMsg($reply_id, $author_id){
        global $pdo, $user_id;
        $q = "insert into replyMsg (user_id,reply_id,author_id) values (:user_id,:reply_id,:author_id)";
        $stmt = $pdo->prepare($q);
        $stmt->execute([":user_id"=>$user_id,":reply_id" => $reply_id, ":author_id" => $author_id]);
    }


function getReplys($blog_id){
        global $pdo;
        $q = "SELECT * FROM reply where blog_id=:blog_id and rp_parent_id is NULL";
        $stmt = $pdo->prepare($q);
        $stmt->execute([":blog_id" => $blog_id]);

        return $stmt->fetchAll(); // 첫 번째 컬럼 값만 반환
    }

    function getRere($id){
        global $pdo;
        $q = "SELECT * FROM reply where rp_parent_id=:id";
        $stmt = $pdo->prepare($q);
        $stmt->execute([":id" => $id]);

        return $stmt->fetchAll(); // 첫 번째 컬럼 값만 반환
    }