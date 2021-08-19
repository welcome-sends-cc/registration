<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>小测试</title>
    <link rel="stylesheet" href="../css/question.css">
    <script type="text/javascript" src="../js/saveReport.js"></script>
</head>

<body>
    <div class="page">
        <div class="question">
            <p class="q">Q</p>
            <p class="ques">你认为自己最（将）具备哪一项计算机技能？</p>
        </div>
        <form action="q2.php" method="post" onsubmit="return saveReport();">
            <div class="choose">
                <!-- <button type="radio" name="q2" id="a" value="q3.php" onclick="save()"><label for="a">敲代码</label><br />
                </button>
                <button type="radio" name="q2" id="b" value="q6.php" onclick="save()"><label for="b">Ps、Pr</label><br />
                </button>
                <button type="radio" name="q2" id="c" value="q8.php" onclick="save()"><label for="c">功能设计</label><br />
                </button>
                <button type="radio" name="q2" id="d" value="q10.php" onclick="save()"><label for="d">一定的文字功底</label><br />
                </button> -->
                <div class="answer">
                    <input type="radio" name="q2" id="a" value="q3.php" onclick="save()"><label for="a"><span>敲代码</span></label><br />
                </div>
                <div class="answer">
                    <input type="radio" name="q2" id="b" value="q6.php" onclick="save()"><label for="b"><span>Ps、Pr</span></label><br />
                </div>
                <div class="answer">
                    <input type="radio" name="q2" id="c" value="q8.php" onclick="save()"><label for="c"><span>功能设计</span></label><br />
                </div>
                <div class="answer">
                    <input type="radio" name="q2" id="d" value="q10.php" onclick="save()"><label for="d"><span>一定的文字功底</span></label><br />
                </div>

            </div>

            <div class="operBar">
                <input type="reset" value="Back" name="back" onclick="window.location.href='<?php echo 'q1.php'; ?>'" class="oper">
                <input type="submit" value="Next" name="next" class="oper">
            </div>
        </form>
        <?php
        session_start();
        $_SESSION['q2'] = $_POST['q2'];
        if (strpos($_POST['q2'], 'result.php') !== false) {
            $url = substr_replace($_POST['q2'], "", -1);
        } else {
            $url = $_POST['q2'];
            echo $url;
        }
        Header("Location:$url");
        ?>
        <script language="javascript" type="text/javascript">
            function save() {
                for (var i = 0; i < document.getElementsByClassName('answer').length; i++) {
                    if (document.getElementsByName("q2")[i].checked == true) {
                        document.getElementsByClassName('answer')[i].style.backgroundColor = "rgba(255,0,0,0.8)";
                        document.getElementsByClassName('answer')[i].style.border = "1px solid rgba(255,255,255,0.5)";
                    } else {
                        document.getElementsByClassName('answer')[i].style.backgroundColor = "rgba(255, 242, 242, 0.278)";
                        document.getElementsByClassName('answer')[i].style.border = "rgba(255, 242, 242, 0.278)";
                    }
                }
                var radios = document.getElementsByName("q2");
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        document.cookie = 'q2index=' + i;
                    }
                }
            }

            window.onload = function() {
                var cookies = document.cookie;
                if (cookies != "") {
                    cookies = "{\"" + cookies + "\"}";
                    cookies = cookies.replace(/\s*/g, "").replace(/=/g, '":"').replace(/;/g, '","');
                    var json = eval("(" + cookies + ")"); //将coolies转成json对象
                    document.getElementsByName("q2")[json.q2index].checked = true;
                } else {
                    save();
                }
                for (var i = 0; i < document.getElementsByClassName('answer').length; i++) {
                    if (document.getElementsByName("q2")[i].checked == true) {
                        document.getElementsByClassName('answer')[i].style.backgroundColor = "rgba(255,0,0,0.8)";
                        document.getElementsByClassName('answer')[i].style.border = "1px solid rgba(255,255,255,0.5)";
                    } else {
                        document.getElementsByClassName('answer')[i].style.backgroundColor = "rgba(255, 242, 242, 0.278)";
                        document.getElementsByClassName('answer')[i].style.border = "rgba(255, 242, 242, 0.278)";
                    }
                }
            }
        </script>
    </div>
</body>

</html>