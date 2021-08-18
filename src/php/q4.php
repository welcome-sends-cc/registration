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
            <p class="ques">是否对充当“安全卫士”这个角色感兴趣？</p>
        </div>
        <form action="q4.php" method="post" onsubmit="return saveReport();">
            <div class="choose">
                <button type="radio" name="q4" id="a" value="result.phpd" onclick="save()"><label for="a">是。</label><br />
                </button>
                <button type="radio" name="q4" id="b" value="q5.php" onclick="save()"><label for="b">否。</label><br />
                </button>
            </div>
            <!-- <input type="radio" name="q4" id="a" value="result.phpd" onclick="save()"><label for="a">是</label><br />
            <input type="radio" name="q4" id="b" value="q5.php" onclick="save()"><label for="b">否</label><br /> -->
            <div class="operBar">
                <input type="reset" value="Back" name="back" onclick="window.location.href='<?php echo 'q3.php'; ?>'" class="oper">
            <input type="submit" value="Next" name="next" class="oper">
            </div>
        </form>
        <?php
        session_start();
        $_SESSION['q4'] = $_POST['q4'];
        if (strpos($_POST['q4'], 'result.php') !== false) {
            $url = substr_replace($_POST['q4'], "", -1);
        } else {
            $url = $_POST['q4'];
        }
        Header("Location:$url");
        ?>
        <script language="javascript" type="text/javascript">
            function save() {
                var radios = document.getElementsByName("q4");
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        document.cookie = 'q4index=' + i;
                    }
                }
            }

            window.onload = function() {
                var cookies = document.cookie;
                if (cookies != "") {
                    cookies = "{\"" + cookies + "\"}";
                    cookies = cookies.replace(/\s*/g, "").replace(/=/g, '":"').replace(/;/g, '","');
                    var json = eval("(" + cookies + ")"); //将coolies转成json对象
                    document.getElementsByName("q4")[json.q4index].checked = true;
                } else {
                    save();
                }
            }
        </script>
    </div>
</body>

</html>