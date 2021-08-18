<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>桑梓纳新报名页面</title>
    <link rel="stylesheet" href="../css/question.css">
    <script type="text/javascript" src="../js/saveReport.js"></script>
</head>

<body>
    <div class="page">
        <div class="question">
            <p class="q">Q</p>
            <p class="ques">如果有一个线上项目需要团队完成，你愿意做下面的哪一个任务？</p>
        </div>
        <form action="q12.php" method="post" onsubmit="return saveReport();">
            <div class="choose">
                <button type="radio" name="q12" id="a" value="result.phpa" onclick="save()"><label
                        for="a">前期策划</label><br />
                </button>
                <button type="radio" name="q12" id="b" value="result.phpb" onclick="save()"><label
                        for="b">软件开发</label><br />
                </button>
                <button type="radio" name="q12" id="c" value="result.phpc" onclick="save()"><label
                        for="c">界面设计</label><br />
                </button>
                <button type="radio" name="q12" id="d" value="result.phpd" onclick="save()"><label
                        for="d">后台技术</label><br />
                </button>
                <button type="radio" name="q12" id="e" value="result.phpe" onclick="save()"><label
                        for="e">宣传推广</label><br />
                </button>
            </div>
            <!-- <input type="radio" name="q12" id="a" value="result.phpa"onclick="save()"><label for="a">前期策划</label><br />
            <input type="radio" name="q12" id="b" value="result.phpb"onclick="save()"><label for="b">软件开发</label><br />
            <input type="radio" name="q12" id="c" value="result.phpc"onclick="save()"><label for="c">界面设计</label><br />
            <input type="radio" name="q12" id="d" value="result.phpd"onclick="save()"><label for="d">后台技术</label><br />
            <input type="radio" name="q12" id="e" value="result.phpe"onclick="save()"><label for="e">宣传推广</label><br /> -->
            <div class="operBar">
                <input type="reset" value="Back" name="back" onclick="window.location.href='<?php echo 'q11.php' ?>'"
                    class="oper">
                <input type="submit" value="Next" name="next" class="oper">
            </div>
        </form>
        <?php
        session_start();
        $_SESSION['q12'] = $_POST['q12'];
        if (strpos($_POST['q12'], 'result.php') !== false) {
            $url = substr_replace($_POST['q12'], "", -1);
        } else {
            $url = $_POST['q12'];
        }
        Header("Location:$url");
        ?>
        <script language="javascript" type="text/javascript">
            function save() {
                var radios = document.getElementsByName("q12");
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        document.cookie = 'q12index=' + i;
                    }
                }
            }

            window.onload = function () {
                var cookies = document.cookie;
                if (cookies != "") {
                    cookies = "{\"" + cookies + "\"}";
                    cookies = cookies.replace(/\s*/g, "").replace(/=/g, '":"').replace(/;/g, '","');
                    var json = eval("(" + cookies + ")"); //将coolies转成json对象
                    document.getElementsByName("q12")[json.q12index].checked = true;
                } else {
                    save();
                }
            }
        </script>
    </div>
</body>

</html>