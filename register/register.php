<?php
    //获取表单数据
    $uno =$_POST['uno'];
    $uname =$_POST['uname'];
    $usex =$_POST['usex'];
    $upho =$_POST['upho'];
    $passwd =$_POST['password'];
    
    //连接数据库
    $link = new mysqli("localhost","root","root","web");
    if($link->connect_errno){
        echo "数据库连接失败<br>";
        echo "错误编号：".mysqli_errno()."<br>";
        echo "错误信息：".mysqli_error()."<br>";
        die();
    }

    //插入用户信息
    $sql ="INSERT into user VALUES('$uno','$uname','$usex','$upho','$passwd')";
    // $sql = "select * from user";
    $result =$link->query($sql);
    if($result)
    {
        echo "<script>alert('插入信息成功');</script>";
    }else{
        echo "<script>alert('插入信息失败');</script>";
        echo "错误编号：".mysqli_errno()."<br>";
        echo "错误信息：".mysqli_error()."<br>";
    }
    //关闭连接
    $link->close();
?>