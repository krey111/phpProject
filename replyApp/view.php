<?php
include("function.php");
$blog_id = $_GET['id'];

$blog = getBlog($blog_id);
$replys = getReplys($blog_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Title</title>
</head>
<style>
    .disNone{display:none}
    .replyArea{display:flex}
    .replyArea>*:first-child,.replyFormArea>*:first-child{flex:2; margin-right:5px;}
    .replyFormArea{
        display:flex;
        margin-top:10px;padding-top:10px;
    }
    .reFormTitle{
        font-size:18px;font-weight:bold;
    }
    .rereBtn{
        color:#aaa;font-size:14px;
    }
    .replyGroup{
        padding:10px 0;
        border-bottom:1px solid #ccc;
    }
</style>
<body>

<div class="main">
    <div>
        <div class="title">제목: <?=$blog['title']?></div>
        <div>내용: <?=$blog['content']?></div>
        <div>작성일 : <?=$blog['create_at']?></div>
        <div style="margin-top:20px">
            <div class="reFormTitle">댓글</div>
            <?php foreach ($replys as $reply) {
                $reres = getRere($reply['id']);
                ?>
            <div class="replyGroup">
                <div class="replyArea">
                    <div><?=$reply['rp_content']?></div>
                    <div><?=$reply['create_at']?></div>
                </div>
                <div>
                    <div class="rereForm">
                        <span id="replyId_<?=$reply['id']?>" class="replyId"></span>
                        <span id="replyUserId_<?=$reply['user_id']?>" class="replyUserId"></span>
                    </div>
                    <a href="javascript:void(0)" class="rereBtn">답글달기</a>
                </div>

                <?php
                    foreach ($reres as $rere) {
                    ?>
                    <div class="replyArea" style="margin-left:20px;margin-top:5px;">
                        <div>>>>><?=$rere['rp_content']?></div>
                        <div><?=$rere['create_at']?></div>
                    </div>

            <?php
                    }
            ?>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="replyFormArea">
        <input type="text" class="replyContent">
        <input type="button" value="댓글달기" class="replyAddBtn">
    </div>
    <div class="rereFormClone disNone">
        <input type="text" class="rereContent">
        <input type="button" value="댓글달기" class="rereAddBtn">
    </div>
</div>

<script>
    $(document).on('click','.rereAddBtn', function(){
        var rere_content = $(this).siblings(".rereContent").val();
        var rp_parent_id = $(this).parents('.rereForm').children('.replyId').attr('id').replace("replyId_","");
        var $rp_parent_user_id = $(this).parents('.rereForm').children('.replyUserId').attr('id').replace("replyUserId_","");

        $.ajax({
            url: "replyInsert.php",
            type: "POST",
            data:{
                blog_id: <?=$blog_id?>,
                rp_content: rere_content,
                rp_parent_id: rp_parent_id,
                $rp_parent_user_id: $rp_parent_user_id
            },
            success: function(response){
                location.reload();
            },
            error: function(){
                alert("에러ㅋ");
            }
        })
    })
    $(".rereBtn").click(function(){
        // #source의 내용을 #target에 복사(추가)
        $('.rereFormClone').clone().removeClass("disNone").appendTo($(this).parent().children('.rereForm'));
    })
    $(".replyAddBtn").click(function(){
        $.ajax({
            url: "replyInsert.php",
            type: "POST",
            data:{
                blog_id: <?=$blog_id?>,
                rp_content: $(".replyContent").val()
            },
            success: function(response){
                location.reload();
            },
            error: function(){
                alert("에러ㅋ");
            }
        })
    })
</script>
</body>
</html>


