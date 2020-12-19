<?php
    $Qno = $_POST['Qno'];
    $Qbeizhu=$_POST['Qbeizhu'];
    $Qarea=$_POST['Qarea'];


    //连接数据库
    $link = new mysqli("localhost","root","root","web");
    if($link->connect_errno)
    {
        echo "数据库连接失败<br>";
        echo "错误编号：".mysqli_errno()."<br>";
        echo "错误信息：".mysqli_error()."<br>";
        die();
    }

    //添加好友信息
    $sql ="insert into qq values('$Qno','$Qbeizhu','$Qarea')";
    $result = $link->query($sql);
    if($result)
    {?>
        <script type="text/javascript">
                alert("添加成功");
                window.location.href="qq.html";
        </script>   
    <?php 
    }else{
        ?>
        <script type="text/javascript">
                alert("添加失败");
                window.location.href="qq.html";
        </script>   
    <?php 
    }

    //关闭连接
        $link->close();
?>