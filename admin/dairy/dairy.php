<?php
    //获取表单数据
    $mno=$_POST['mno'];
    $mtime=$_POST['mtime'];
    $mtopic=$_POST['mtopic'];
    $mcontent=$_POST['mcontent'];

    //连接数据库
    $link =new mysqli("localhost","root","root","web");
    if($link->connect_errno){
        echo "数据库连接失败<br>";
        echo "错误编号：".mysqli_errno()."<br>";
        echo "错误信息：".mysqli_error()."<br>";
        die();
    }

    //增加日记记录
    $sql ="insert into message values('$mno','$mtime','$mtopic','$mcontent')";
    $result=$link->query($sql);
    if($result){
        ?>
        <script type="text/javascript">
                alert("日记保存成功");
                window.location.href="dairy.html";
        </script>   
    <?php 
    }
    else{
        ?>
        <script type="text/javascript">
                alert("日记保存失败");
                window.location.href="dairy.html";
        </script>   
    <?php 
    }
?>