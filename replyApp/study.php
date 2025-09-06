<?php
 $a = 10;
 while($a){
    $class="";
    if($a%2 ==0){
        $class= "red";
    }
    //하이라키가 살아남
    // cmd + backspace > 줄지움 단축키를 잘 쓰기 위해 php닫는 태그쓸때 쓸때 줄바꿈한다.
    ?>
    <div class="<?=$class?>"><?=$a?></div><br/>

<?php
     $a = $a-1;
 }
 ?>
<!---->
<?php //../connect.php?>
<!--www 권한을 줬다 빼기 > 755-->
<style>
    .red {color:red;}
</style>
