<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>桑梓纳新报名页面</title>
    <link rel="stylesheet" href="../css/base.css">
</head>

<body>
    <style>
        .page {
            min-width: 320px;
            max-width: 450px;
            height: 100vh;
            margin: 0 auto;
            background-image: url('../../img/qback.png');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            display: flex;
            flex-direction: column;
            position: relative;
            justify-content: center;
            align-items: center;
            padding: 90px 30px 60px;
        }

        p {
            font-size: 20px;
            color: white;
            line-height: 40px;
        }

        .large{
            font-size: 30px;
            letter-spacing: 5px;
        }

        a {
            text-decoration: none;
            font-size: 20px;
            color: #3b3bf1;
            letter-spacing: 10px;
        }
    </style>
    <div class="page">
        <?php
        // 连接数据库、设置字符集
        $link = @mysqli_connect('localhost', 'root', 'hqusends', 'information')
            or die("<p>无法连接到服务器</p>");
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
                echo "<p>更改成功</P><a href=\"lotteryFront.php\">去抽奖</a>";
            } else {
                $sq_add_lottery = "INSERT INTO lottery(id,occasion)
        VALUES('$id',1)";
                mysqli_query($link, $sq_add_lottery);
                echo "<p>报名成功</p><a href=\"lotteryFront.php\">去抽奖</a>";
            }
            mysqli_close($link);
        } else {
            echo "<p class=\"large\">信息尚不完善</p><p>请补完后再试一次</p><a href=\"entryForm.php\" onclick=\"fill()\">返回</a>";
        }
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['first'] = $first;
        $_SESSION['second'] = $second;
        ?>
    </div>
</body>

</html>