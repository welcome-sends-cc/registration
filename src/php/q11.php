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
            <p class="ques">你是否具有较强的自学能力并愿意学习互联网相关技能？</p>
        </div>
        <form action="q11.php" method="post" onsubmit="return saveReport();">
            <div class="choose">
                <button type="radio" name="q11" id="a" value="q12.php" onclick="save()"><label for="a">是。</label><br />
                </button>
                <button type="radio" name="q11" id="b" value="result.phpf" onclick="save()"><label for="b">否。</label><br />
                </button>
            </div>
            <!-- <input type="radio" name="q11" id="a" value="q12.php"onclick="save()"><label for="a">敲代码</label><br />
            <input type="radio" name="q11" id="b" value="result.phpf"onclick="save()"><label for="b">Ps、Pr</label><br /> -->
            <div class="operBar">
                <input type="reset" value="Back" name="back" onclick="window.location.href='<?php session_start();
                                                                                        if ($_SESSION['q3'] == 'q11.php' and $_SESSION['q6'] != 'q11.php' and $_SESSION['q10'] != 'q11.php') {
                                                                                            echo 'q3.php';
                                                                                        } elseif ($_SESSION['q3'] != 'q11.php' and $_SESSION['q6'] == 'q11.php' and $_SESSION['q10'] != 'q11.php') {
                                                                                            echo 'q6.php';
                                                                                        } elseif ($_SESSION['q3'] != 'q11.php' and $_SESSION['q6'] != 'q11.php' and $_SESSION['q10'] == 'q11.php') {
                                                                                            echo 'q10.php';
                                                                                        }  ?>'" class="oper">
            <input type="submit" value="Next" name="next" class="oper">
            </div>
        </form>
        <?php
        session_start();
        $_SESSION['q11'] = $_POST['q11'];
        if (strpos($_POST['q11'], 'result.php') !== false) {
            $url = substr_replace($_POST['q11'], "", -1);
        } else {
            $url = $_POST['q11'];
        }
        Header("Location:$url");
        ?>
        <script language="javascript" type="text/javascript">
            function save() {
                var radios = document.getElementsByName("q11");
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        document.cookie = 'q11index=' + i;
                    }
                }
            }

            window.onload = function() {
                var cookies = document.cookie;
                if (cookies != "") {
                    cookies = "{\"" + cookies + "\"}";
                    cookies = cookies.replace(/\s*/g, "").replace(/=/g, '":"').replace(/;/g, '","');
                    var json = eval("(" + cookies + ")"); //将coolies转成json对象
                    document.getElementsByName("q11")[json.q11index].checked = true;
                } else {
                    save();
                }
            }
        </script>
    </div>
</body>

</html>