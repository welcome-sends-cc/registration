<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/base.css">
</head>

<body>
    <style>
        body {
            background-color: #f5f5f5;
        }

        .page {
            min-width: 320px;
            max-width: 450px;
            height: 667px;
            border: 1px #000 solid;
            margin: 0 auto;
            text-align: center;
        }

        p {
            font-size: 17px;
            margin-top: 60%;
            margin-bottom: 5%;
            color: #6e6e6e;
        }

        a {
            text-decoration: none;
            font-size: 18px;
            color: #000;
            display: block;
        }
    </style>
    <div class="page">
        <?php
        // 连接数据库、设置字符集
        $link = @mysqli_connect('localhost', 'root', 'hqusends', 'information')
            or die("无法连接到服务器");
        mysqli_set_charset($link, 'utf8');
        // 获取查询结果集
        if ($_POST['name'] != '') {
            $name = $_POST['name'];
            $id = $_POST['id'];
            $phone = $_POST['phone'];
            $qq = $_POST['qq'];
            $campus = $_POST['campus'];
            $academy = $_POST['academy'];
            $profession = $_POST['profession'];
            $first = $_POST['firstVolunteer'];
            $second = $_POST['secondVolunteer'];
            $introduce = $_POST['introduce'];
            $sq_add = "INSERT INTO information(s_name,id,phone,qq,campus,academy,profession,firstVolunteer,secondVolunteer,introduce)
        VALUES('$name','$id','$phone','$qq','$campus','$academy','$profession','$first','$second','$introduce')";
            mysqli_query($link, $sq_add);
            $error = mysqli_error($link);
            if (strpos($error, 'Duplicate') !== false) {
                $sq_update = "UPDATE `information` SET `s_name`='$name',`phone`='$phone',`qq`='$qq',`campus`='$campus',`academy`='$academy',`profession`='$profession',`firstVolunteer`='$first',`secondVolunteer`='$second',`introduce`='$introduce' where `id` = '$id'";
                mysqli_query($link, $sq_update);
                echo "<p>更改成功</P><a href=\"lotteryFront.php\">去抽奖</a></a>";
            } else {
                $sq_add_lottery = "INSERT INTO lottery(id,occasion)
        VALUES('$id',1)";
                mysqli_query($link, $sq_add_lottery);
                echo "<p>报名成功</p><a href=\"lotteryFront.php\">去抽奖</a>";
            }
            mysqli_close($link);
        } else {
            echo "<p>您有部分信息未填写，请填写完整后再次提交</p><a href=\"entryForm.php\" onclick=\"fill()\">返回提交</a>";
        }
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['first'] = $first;
        $_SESSION['second'] = $second;
        ?>
    </div>
</body>

</html>