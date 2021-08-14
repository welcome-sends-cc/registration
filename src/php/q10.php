<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/question.css">
    <script type="text/javascript" src="../js/saveReport.js"></script>
</head>

<body>
    <div class="page">
        <div class="question">
            <p>10.你是否喜欢并具有较强的文字编辑或写作能力？</p>
        </div>
        <form action="q10.php" method="post" onsubmit="return saveReport();">
            <input type="radio" name="q10" id="a" value="result.phpe" onclick="save()"><label for="a">是</label><br />
            <input type="radio" name="q10" id="b" value="q11.php" onclick="save()"><label for="b">否</label><br />
            <input type="reset" value="back" name="back" onclick="window.location.href='<?php session_start();
                                                                                        if ($_SESSION['q2'] == 'q10.php' and $_SESSION['q8'] != 'q10.php' and $_SESSION['q9'] != 'q10.php') {
                                                                                            echo 'q2.php';
                                                                                        } elseif ($_SESSION['q2'] != 'q10.php' and $_SESSION['q8'] == 'q10.php' and $_SESSION['q9'] != 'q10.php') {
                                                                                            echo 'q8.php';
                                                                                        } elseif ($_SESSION['q2'] != 'q10.php' and $_SESSION['q8'] != 'q10.php' and $_SESSION['q9'] == 'q10.php') {
                                                                                            echo 'q9.php';
                                                                                        } ?>'" class="button button1">
            <input type="submit" value="next" name="next" class="button button2">
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

            }
        </script>
    </div>
</body>

</html>