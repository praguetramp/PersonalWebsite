<?php
    //获取表单数据
    $furl =$_POST['furl'];
    $fbeizhu=$_POST['fbeizhu'];
    $ffenlei=$_POST['ffenlei'];

    //连接数据库
    $link=new mysqli("localhost","root","root","web");
    if($link->connect_errno)
    {
        echo "数据库连接失败<br>";
        echo "错误编号：".mysqli_errno()."<br>";
        echo "错误信息：".mysqli_error()."<br>";
        die();
    }

    //添加网址
    $sql ="insert into favor values('$furl','$fbeizhu','$ffenlei')";
    $result=$link->query($sql);
    if($result){
        ?>
        <script type="text/javascript">
                alert("收藏成功");
                window.location.href="favor.html";
        </script>   
    <?php 
    }else{
        ?>
        <script type="text/javascript">
                alert("收藏成功");
                window.location.href="favor.html";
        </script>   
    <?php 
    }

        //关闭连接
        $link->close();
?>