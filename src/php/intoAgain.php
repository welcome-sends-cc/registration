<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/intoAgain.css">
</head>

<body>
    <?php
    session_start();
    $first = $_SESSION['first'];
    $second = $_SESSION['second'];
    switch($first){
        case 1:
            $fv = "策划部";
            break;
        case 2:
            $fv = "美工部";
            break;
        case 3:
            $fv = "软件部";
            break;
        case 4:
            $fv = "运维部";
            break;
        case 5:
            $fv = "运营部";
            break;
    }
    switch($second){
        case 1:
            $sv = "策划部";
            break;
        case 2:
            $sv = "美工部";
            break;
        case 3:
            $sv = "软件部";
            break;
        case 4:
            $sv = "运维部";
            break;
        case 5:
            $sv = "运营部";
            break;
    }
    ?>
    <div class="page">
        <div class="welcome">
            <h3>欢迎您再次进入...</h3>
        </div>
        <div class="info">
            小桑温馨提示您：您之前填报的第一志愿为<?php echo $fv ?>,第二志愿为<?php echo $sv ?>。预计将于9月19/20日进行面试，具体事项请等短信通知哦！
        </div>
        <div class="introduce">
            <?php
            if ($first == 1) {
                echo "<div class=\"section\">
                        策划部
                    </div>
                    <div class=\"information\">
                        策划是优化人与智能交互的重要环节。如果你热爱互联网产品，怀揣着把想法变为实际的勇气，并具备敏捷的思维能力和良好的表达能力，那么我们在策划部等你，让我么一起关心现实，去尝试和创造美好。来实验室发展后，适合你的职业有策划编辑，产品经理等。
                    </div>";
            } elseif ($first == 2) {
                echo "<div class=\"section\">
                        软件部
                    </div>
                    <div class=\"information\">
                        代码是互联网的必要条件，最基础简单的0和1，帮你把设想变成现实，如果你渴望将十八般代码耍的有模有样，想用你手中的代码去创造一个0和1的世界，软件部欢迎你的到来。来实验室发展后，适合你的职业有软件工程师和系统设计师等。
                    </div>";
            } elseif ($first == 3) {
                echo "<div class=\"section\">
                        美工部
                    </div>
                    <div class=\"information\">
                        美工部美工是汇聚和创造世界美的工程师，如果你有绘画、摄影摄像，使用Ps、Pr制作，及其他艺术设计方面的兴趣或特长，美工部当然再适合你不过了。而且在你之前，这里已经有绘画大佬级别、颜值与才华兼备的男孩子和女孩子在等着你了。来实验室发展后，适合你的职业有各类美工~。
                    </div>";
            } elseif ($first == 4) {
                echo "<div class=\"section\">
                        运维部
                    </div>
                    <div class=\"information\">
                        运维部运维是各类产品的幕后维护师，只要你肯吃苦，勤学好问，不需要你有很多的基础，即可加入运维部。你可以在这里学到如何在Linux这个平台上尽情的发挥，学到如何维护桑梓微助手的安全，获得与著名网络公司接触的机会。来实验室发展后，适合你的职业有网络安全工程师、运维工程师以及网络工程师等。
                    </div>";
            } elseif ($first == 5) {
                echo "<div class=\"section\">
                        运营部
                    </div>
                    <div class=\"information\">
                        运营部运营是实验室运作的重要一环，直接与用户群体对接。如果你喜欢写作，喜欢交流，那么就请来运营部吧。我们有高自由度的创作环境，原创文章拥有完全著作权。不干涉在其他公众号平台从事运营工作。近4万关注公众号的运营经历，如果未来你想从事媒体工作，这将是一块不错的敲门砖。
                    </div>";
            }
            if ($second == 1) {
                echo "<div class=\"section\">
                        策划部
                    </div>
                    <div class=\"information\">
                        策划是优化人与智能交互的重要环节。如果你热爱互联网产品，怀揣着把想法变为实际的勇气，并具备敏捷的思维能力和良好的表达能力，那么我们在策划部等你，让我么一起关心现实，去尝试和创造美好。来实验室发展后，适合你的职业有策划编辑，产品经理等。
                    </div>";
            } elseif ($second == 2) {
                echo "<div class=\"section\">
                        软件部
                    </div>
                    <div class=\"information\">
                        代码是互联网的必要条件，最基础简单的0和1，帮你把设想变成现实，如果你渴望将十八般代码耍的有模有样，想用你手中的代码去创造一个0和1的世界，软件部欢迎你的到来。来实验室发展后，适合你的职业有软件工程师和系统设计师等。
                    </div>";
            } elseif ($second == 3) {
                echo "<div class=\"section\">
                        美工部
                    </div>
                    <div class=\"information\">
                        美工部美工是汇聚和创造世界美的工程师，如果你有绘画、摄影摄像，使用Ps、Pr制作，及其他艺术设计方面的兴趣或特长，美工部当然再适合你不过了。而且在你之前，这里已经有绘画大佬级别、颜值与才华兼备的男孩子和女孩子在等着你了。来实验室发展后，适合你的职业有各类美工~。
                    </div>";
            } elseif ($second == 4) {
                echo "<div class=\"section\">
                        运维部
                    </div>
                    <div class=\"information\">
                        运维部运维是各类产品的幕后维护师，只要你肯吃苦，勤学好问，不需要你有很多的基础，即可加入运维部。你可以在这里学到如何在Linux这个平台上尽情的发挥，学到如何维护桑梓微助手的安全，获得与著名网络公司接触的机会。来实验室发展后，适合你的职业有网络安全工程师、运维工程师以及网络工程师等。
                    </div>";
            } elseif ($second == 5) {
                echo "<div class=\"section\">
                        运营部
                    </div>
                    <div class=\"information\">
                        运营部运营是实验室运作的重要一环，直接与用户群体对接。如果你喜欢写作，喜欢交流，那么就请来运营部吧。我们有高自由度的创作环境，原创文章拥有完全著作权。不干涉在其他公众号平台从事运营工作。近4万关注公众号的运营经历，如果未来你想从事媒体工作，这将是一块不错的敲门砖。
                    </div>";
            }
            ?>
        </div>
        <button onclick="window.location.href='q1.php'" class="button button1">体验一下测试</button>
        <button onclick="window.location.href='entryForm.php'" class="button button2">更改志愿...</button>
    </div>
</body>

</html>