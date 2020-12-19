<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>微信好友查询结果</title>
    <style>

    body{
        background-position: auto;
        background-repeat: no-repeat;
        background-image: url(../../img/chaxun.png);
        background-size: 100%;
    }
    </style>
</head>
<body>

    <?php
        //获取表单查询信息
        $myweixin=$_POST['myweixin'];

        //建立数据库连接
        $link=new mysqli("localhost","root","root","web");
        if($link->connect_errno){
            echo "数据库连接失败<br>";
            echo "错误编号：".mysqli_errno()."<br>";
            echo "错误信息：".mysqli_error()."<br>";
            die();
        }

        //查询表单
        $sql="select * from wechat";
        $result=$link->query($sql);
        $rows=$result->num_rows; //记录行数
        if($rows==0){
            echo "<script>alert('没有满足查询的记录');</script>";
            die();
        }
        $pagesize=5; //每页的记录数为5
        $pagecount=ceil($rows/ $pagesize); // 总页数
        
        //当前的页的页号
        if(!isset($pageno) || $pageno<1)
            $pageno=1;
        if($pageno>$pagecount)
            $pageno=$pagecount;
        $offset=($pageno-1)*$pagesize;
        $result->data_seek($offset);
    ?>
    <div align="center"><strong>微信好友查询结果</strong></div>
    <table width="90%" border="1" align="center">
        <tr>
            <td><div align="center">微信号</div></td>
            <td><div align="center">备注</div></td>
            <td><div align="center">姓名</div></td>
            <td><div align="center">地区</div></td>
            <td><div align="center">操作</div></td>
        </tr>   
        <?php
        $i=0;
        while($row=$result->fetch_object()){  ?>
        <tr>
            <td><div align="center"><?php echo $row->Wno;?></div></td>
            <td><div align="center"><?php echo $row->Wbeizhu;?></div></td>
            <td><div align="center"><?php echo $row->Wname;?></div></td>
            <td><div align="center"><?php echo $row->Warea;?></div></td>
            <td><div align="center">
                <a href="weixin_detail.php ?Wno=<?php echo $row->Wno;?>" target="_blank">详情</a>
                <a href="weixin_update.php ?Wno=<?php echo $row->Wno;?>" target="_blank">修改</a>
                <a href="weixin_delete.php ?Wno=<?php echo $row->Wno;?>" target="_blank">删除</a>
            </div></td>
        </tr>
        <?php 
        $i=$i+1;
        if($i==$pagesize)
            break;
        }
        $result->free();
        $link->close();
        ?>
    </table>
    <div align="center">
        [第<?php echo $pageno;?> 页/共<?php echo $pagecount; ?>页]
        <?php 
        $href=$PHP_SELF."?myweixin".urlencode($myweixin);
        if($pageno<>1){ ?>
            <a herf="<?php echo $href;?> &pageno=1">首页</a>
            <a href="<?php echo $href;?> &pageno=<?php echo $pageno-1;?>">上一页</a>
        <?php
        }
        if($pageno<>$pagecount){?>
            <a href="<?php echo $href;?> &pageno=<?php echo $pageno+1;?>">下一页</a>
            <a href="<?php echo $href;?> &pageno=<?php echo $pagecount;?>">尾页</a>
        <?php
        }
        ?>
        [共找到<?php echo $rows;?>个记录]
    </div>


    <br><br><br>
    <footer class="container">
        <div class="text-reght myfont" style="color: rgb(0,0,0);text-align: center;">
            <dl>
                <dd>Copyright © 2020 Praguetramp/2018211643. All Rights Reserved</dd>

                <div id="datetime">
                    <script>
                        setInterval("document.getElementById('datetime').innerHTML=new Date().toLocaleString();", 1000);
                    </script>
            </dl>
        </div>
    </footer>
</body>
</html>

        
