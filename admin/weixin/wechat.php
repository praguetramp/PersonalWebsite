<?php
    //获取表单数据
    $Wno =$_POST['Wno'];
    $Wbeizhu=$_POST['Wbeizhu'];
    $Wname=$_POST['Wname'];
    $Warea=$_POST['Warea'];

    //连接数据库
    $link=new mysqli("localhost","root","root","web");
    if($link->connect_errno)
    {
        echo "数据库连接失败<br>";
        echo "错误编号：".mysqli_errno()."<br>";
        echo "错误信息：".mysqli_error()."<br>";
        die();
    }

    //添加好友信息
    $sql ="insert into wechat values('$Wno','$Wbeizhu','$Wname','$Warea')";
    $result=$link->query($sql);
    if($result){
        ?>
        <script type="text/javascript">
                alert("添加成功");
                window.location.href="wechat.html";
        </script>   
    <?php 
    }else{
        ?>
        <script type="text/javascript">
                alert("添加失败");
                window.location.href="wechat.html";
        </script>   
    <?php 
    }

        //关闭连接
        $link->close();
?>