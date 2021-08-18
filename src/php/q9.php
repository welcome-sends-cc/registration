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
            <p class="ques">在不看手机的情况下你是否能对最经常使用的一个App的界面和功能做出描述？</p>
        </div>
        <form action="q9.php" method="post" onsubmit="return saveReport();">
            <div class="choose">
                <button type="radio" name="q9" id="a" value="result.phpa" onclick="save()"><label for="a">是。</label><br />
                </button>
                <button type="radio" name="q9" id="b" value="q10.php" onclick="save()"><label for="b">否。</label><br />
                </button>
            </div>
            <div class="operBar">
                <input type="reset" value="Back" name="back" onclick="window.location.href='<?php echo 'q8.php'; ?>'" class="oper">
            <input type="submit" value="Next" name="next" class="oper">
            </div>
            <!-- <input type="radio" name="q9" id="a" value="result.phpa" onclick="save()"><label for="a">是</label><br />
            <input type="radio" name="q9" id="b" value="q10.php" onclick="save()"><label for="b">否</label><br /> -->
        </form>
        <?php
        session_start();
        $_SESSION['q9'] = $_POST['q9'];
        if (strpos($_POST['q9'], 'result.php') !== false) {
            $url = substr_replace($_POST['q9'], "", -1);
        } else {
            $url = $_POST['q9'];
        }
        Header("Location:$url");
        ?>
        <script language="javascript" type="text/javascript">
            function save() {
                var radios = document.getElementsByName("q9");
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        document.cookie = 'q9index=' + i;
                    }
                }
            }

            window.onload = function() {
                var cookies = document.cookie;
                if (cookies != "") {
                    cookies = "{\"" + cookies + "\"}";
                    cookies = cookies.replace(/\s*/g, "").replace(/=/g, '":"').replace(/;/g, '","');
                    var json = eval("(" + cookies + ")"); //将coolies转成json对象
                    document.getElementsByName("q9")[json.q9index].checked = true;
                } else {
                    save();
                }
            }
        </script>
    </div>
</body>

</html>