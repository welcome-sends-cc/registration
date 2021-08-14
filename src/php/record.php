<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/base.css">
</head>
<style>
    body {
        background-color: #f5f5f5;
    }

    .page {
        min-width: 320px;
        max-width: 450px;
        height: 667px;
        /* text-align: center; */
        margin: 0 auto;
        border: 1px #000 solid;
        font-size: 20px;
        text-align: center;
        font-weight: bold;
    }

    .back {
        width: 80%;
        display: inline-block;
        margin-top: 40%;
        vertical-align: middle;
        color: rgb(255, 255, 255);
        background-color: #9fa8a0;
        text-align: center;
        cursor: pointer;
        white-space: nowrap;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 2px 6px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
        font-family: 微软雅黑;
        border-width: initial;
        border-style: none;
        border-color: initial;
        border-image: initial;
        outline: 0px;
        padding: 8px 18px;
        overflow: hidden;
        text-decoration: none;
        transition: all 0.2s ease-out 0s;
        border-radius: 2px;
    }
</style>

<body>
    <div class="page">
        <?php
        $link = @mysqli_connect('localhost', 'root', 'hqusends', 'information')
            or die("无法连接到服务器");
        mysqli_set_charset($link, 'utf8');
        session_start();
        $id = $_SESSION['id'];
        //查询剩余次数
        $sq_query_occasion = "SELECT gift FROM `lottery` WHERE id = $id;";
        $result_gift = mysqli_query($link, $sq_query_occasion);
        $row = mysqli_fetch_assoc($result_gift);
        $gift = $row['gift'];
        echo "获奖记录：", $gift;
        ?>
        <div class="btn">
            <button class="back" onclick="window.location.href='lotteryFront.php'">返回</button>
        </div>
    </div>
</body>

</html>