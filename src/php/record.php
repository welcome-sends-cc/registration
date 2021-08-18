<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>桑梓纳新报名页面</title>
    <link rel="stylesheet" href="../css/base.css">
</head>
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
        justify-content: flex-start;
        align-items: center;
        padding: 90px 30px 60px;
    }

    .page p{
        font-size: 40px;
        color: white;
        line-height: 100px;
        font-weight: lighter;
        letter-spacing: 10px;
    }

    /* .back {
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
    } */
</style>

<body>
    <div class="page">
        <p style="font-weight: 500;">"祝贺!"</p>
        <p>你获得了</p>
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
        echo $gift;
        ?>
        <p>奖</p>
        <!-- <div class="btn">
            <button class="back" onclick="window.location.href='lotteryFront.php'">返回</button>
        </div> -->
    </div>
</body>

</html>