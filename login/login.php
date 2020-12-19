<?php
    
    if((($_POST['uno'])!=null)&&(($_POST['passwd']!=null)))
    {
        //获取登录页面表单信息
        $uno = $_POST['uno'];
        $passwd = $_POST['passwd'];
        
        //连接数据库
        $link = new mysqli("localhost","root","root","web");
        if (!$link)
        {
            echo "数据库连接失败<br>";
            echo "错误编号：".mysqli_errno()."<br>";
            echo "错误信息：".mysqli_error()."<br>";
            die(); //终止连接
        }

        //
        $sql = "select * from user where uno = '$uno' and passwd ='$passwd'";
        $result = $link->query($sql);
        $row = mysqli_num_rows($result);

        if($row == 1) //若表中不存在该登录信息，跳转到注册页面
        {
            echo "登陆成功" ;
            header('Location:../admin/admin.html'); //跳转到个人账户页面

        }else{
            echo "<script> alert('^_^该用户还没有注册哦，请先注册^_^');location.href='../register/zhuce.html';</script>";
            //跳转到注册页面
            //header('Location:zhuce.html'); 
        }

    }else{
        echo "<script> alert('账号或密码为空');location.href='../login/denglu.html';</script>" ;
    }

    //关闭连接
    $link->close();
?>