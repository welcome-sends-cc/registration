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
            <p class="ques">如果给你布置了一个做新的App的设想，你会选择做什么？</p>
        </div>
        <form action="q7.php" method="post" onsubmit="return saveReport();">
            <div class="choose">
                <button type="radio" name="q7" id="a" value="result.phpc" onclick="save()"><label for="a">界面优化与布局。</label><br />
                </button>
                <button type="radio" name="q7" id="b" value="q8.php" onclick="save()"><label for="b">需求分析和功能设计。</label><br />
                </button>
            </div>
            <!-- <input type="radio" name="q7" id="a" value="result.phpc" onclick="save()"><label for="a">界面优化与布局</label><br />
            <input type="radio" name="q7" id="b" value="q8.php" onclick="save()"><label for="b">需求分析和功能设计</label><br /> -->
            <div class="operBar">
                <input type="reset" value="Back" name="back" onclick="window.location.href='<?php echo 'q6.php'; ?>'" class="oper">
            <input type="submit" value="Next" name="next" class="oper">
            </div>
        </form>
        <?php
        session_start();
        $_SESSION['q7'] = $_POST['q7'];
        if (strpos($_POST['q7'], 'result.php') !== false) {
            $url = substr_replace($_POST['q7'], "", -1);
        } else {
            $url = $_POST['q7'];
        }
        Header("Location:$url");
        ?>
        <script language="javascript" type="text/javascript">
            function save() {
                var radios = document.getElementsByName("q7");
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        document.cookie = 'q7index=' + i;
                    }
                }
            }

            window.onload = function() {
                var cookies = document.cookie;
                if (cookies != "") {
                    cookies = "{\"" + cookies + "\"}";
                    cookies = cookies.replace(/\s*/g, "").replace(/=/g, '":"').replace(/;/g, '","');
                    var json = eval("(" + cookies + ")"); //将coolies转成json对象
                    document.getElementsByName("q7")[json.q7index].checked = true;
                } else {
                    save();
                }
            }
        </script>
    </div>
</body>

</html>