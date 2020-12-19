<?php
    $name = $_POST['q10'];
    $sex=$_POST['q1'];
    $wenhua=$_POST['q2'];
    $age=$_POST['q3'];
    $tech=$_POST['q4'];
    $focus=$_POST['q5'];
    $content=$_POST['q6'];
    $help=$_POST['q7'];
    $suggest=$_POST['q8'];
    $tel=$_POST['q9'];

    //连接数据库
    $link = new mysqli("localhost","root","root","web");
    if($link->connect_errno)
    {
        echo "数据库连接失败<br>";
        echo "错误编号：".mysqli_errno()."<br>";
        echo "错误信息：".mysqli_error()."<br>";
        die();
    }

    //提交问卷信息
    $sql ="insert into wenjuan values('$name','$sex','$wenhua',
    '$age','$tech','$focus','$content',
    '$help','$suggest','$tel')";

    $result = $link->query($sql);

    if($result)
    {?>
        <script type="text/javascript">
                alert("提交成功---感谢你的填写！！");
                window.location.href="index.html";
        </script>   
    <?php 
    }else{
        ?>
        <script type="text/javascript">
                alert("提交失败");
                window.location.href="wenjuan.html";
        </script>   
    <?php 
    }

    //关闭连接
        $link->close();
?>