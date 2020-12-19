<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>正在修改密码…</title>
</head>
<body>


    <?php

    //获取表单数据
    $uno=$_POST['uno'];
    $oldpassword=$_POST['oldpassword'];
    $newpassword=$_POST['newpassword'];


    //连接数据库
    $link=new mysqli("localhost","root","root","web");
    if($link->connect_errno)
    {
        echo "数据库连接失败<br>";
        echo "错误编号：".mysqli_errno()."<br>";
        echo "错误信息：".mysqli_error()."<br>";
        die();
    }

    //修改密码
    $username =null;
    $password =null;
    $sql ="select * from user where uno = '$uno'";

    $result=$link->query($sql);
    while($row=mysqli_fetch_array($result)){
        $username=$row['uno'];
        $password=$row['passwd'];
        }
        //分别对应数据库中的字段
        if(is_null($username)){
            ?>
            <script type="text/javascript">
                alert("用户名不存在");
                window.location.href="safety.html";
            </script>
            <?php
        }
        if($oldpassword != $password){
            ?>
            <script type="text/javascript">
                alert("密码错误");
                window.location.href="safty.html";
            </script>
            <?php
        }
        //更新密码信息
        $update = "update user set passwd ='$newpassword' where uno='$uno'"; 
        
        
        // $res=$link->query($update);
        // if($res){
        //     echo "<script>alert('改密失败');</script>";
        // }


        //关闭连接
        $link->close();
        ?>
        <script type="text/javascript">
            alert("修改密码成功，重新登录吧") ;
            window.location.href="./denglu.html";
        </script>
</body>
<html>