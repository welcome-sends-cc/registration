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
            <p class="ques">你是否对社会与校园有一定的关注力，并且具有较好的执行力与耐心和文字编辑能力？</p>
        </div>
        <form action="q10.php" method="post" onsubmit="return saveReport();">
            <div class="choose">
                <!-- <button type="radio" name="q10" id="a" value="result.phpe" onclick="save()"><label for="a">是。</label><br />
                </button>
                <button type="radio" name="q10" id="b" value="q11.php" onclick="save()"><label for="b">否。</label><br />
                </button> -->
                <div class="answer">
                    <input type="radio" name="q10" id="a" value="result.phpe" onclick="save()"><label for="a"><span>是</span></label><br />
                </div>
                <div class="answer">
                    <input type="radio" name="q10" id="b" value="q11.php" onclick="save()"><label for="b"><span>否</span></label><br />
                </div>
            </div>
            <div class="operBar">
                <input type="reset" value="Back" name="back" onclick="window.location.href='<?php session_start();
                                                                                            if ($_SESSION['q2'] == 'q10.php' and $_SESSION['q8'] != 'q10.php' and $_SESSION['q9'] != 'q10.php') {
                                                                                                echo 'q2.php';
                                                                                            } elseif ($_SESSION['q2'] != 'q10.php' and $_SESSION['q8'] == 'q10.php' and $_SESSION['q9'] != 'q10.php') {
                                                                                                echo 'q8.php';
                                                                                            } elseif ($_SESSION['q2'] != 'q10.php' and $_SESSION['q8'] != 'q10.php' and $_SESSION['q9'] == 'q10.php') {
                                                                                                echo 'q9.php';
                                                                                            } ?>'" class="oper">
                <input type="submit" value="Next" name="next" class="oper">
            </div>
        </form>
        <?php
        session_start();
        $_SESSION['q10'] = $_POST['q10'];
        if (strpos($_POST['q10'], 'result.php') !== false) {
            $url = substr_replace($_POST['q10'], "", -1);
        } else {
            $url = $_POST['q10'];
        }
        Header("Location:$url");
        ?>
        <script language="javascript" type="text/javascript">
            function save() {
                for (var i = 0; i < document.getElementsByClassName('answer').length; i++) {
                    if (document.getElementsByName("q10")[i].checked == true) {
                        document.getElementsByClassName('answer')[i].style.backgroundColor = "rgba(255,0,0,0.8)";
                        document.getElementsByClassName('answer')[i].style.border = "1px solid rgba(255,255,255,0.5)";
                    } else {
                        document.getElementsByClassName('answer')[i].style.backgroundColor = "rgba(255, 242, 242, 0.278)";
                        document.getElementsByClassName('answer')[i].style.border = "rgba(255, 242, 242, 0.278)";
                    }
                }
                var radios = document.getElementsByName("q10");
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        document.cookie = 'q10index=' + i;
                    }
                }
            }

            window.onload = function() {
                var cookies = document.cookie;
                if (cookies != "") {
                    cookies = "{\"" + cookies + "\"}";
                    cookies = cookies.replace(/\s*/g, "").replace(/=/g, '":"').replace(/;/g, '","');
                    var json = eval("(" + cookies + ")"); //将coolies转成json对象
                    document.getElementsByName("q10")[json.q10index].checked = true;
                } else {
                    save();
                }
                for (var i = 0; i < document.getElementsByClassName('answer').length; i++) {
                    if (document.getElementsByName("q10")[i].checked == true) {
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