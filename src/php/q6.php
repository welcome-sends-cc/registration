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
            <p>6.你是否已经具有Photoshop的基本操作能力？</p>
        </div>
        <form action="q6.php" method="post" onsubmit="return saveReport();">
            <input type="radio" name="q6" id="a" value="q7.php" onclick="save()"><label for="a">是</label><br />
            <input type="radio" name="q6" id="b" value="q11.php" onclick="save()"><label for="b">否</label><br />
            <input type="reset" value="back" name="back" onclick="window.location.href='<?php session_start();
                                                                                        if ($_SESSION['q2'] == 'q6.php' and $_SESSION['q5'] != 'q6.php') {
                                                                                            echo 'q2.php';
                                                                                        } elseif ($_SESSION['q2'] != 'q6.php' and $_SESSION['q5'] == 'q6.php') {
                                                                                            echo 'q5.php';
                                                                                        } ?>'" class="button button1">
            <input type="submit" value="next" name="next" class="button button2">
        </form>
        <?php
        session_start();
        $_SESSION['q6'] = $_POST['q6'];
        if (strpos($_POST['q6'], 'result.php') !== false) {
            $url = substr_replace($_POST['q6'], "", -1);
        } else {
            $url = $_POST['q6'];
        }
        Header("Location:$url");
        ?>
        <script language="javascript" type="text/javascript">
            function save() {
                var radios = document.getElementsByName("q6");
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        document.cookie = 'q6index=' + i;
                    }
                }
            }

            window.onload = function() {
                var cookies = document.cookie;
                if (cookies != "") {
                    cookies = "{\"" + cookies + "\"}";
                    cookies = cookies.replace(/\s*/g, "").replace(/=/g, '":"').replace(/;/g, '","');
                    var json = eval("(" + cookies + ")"); //将coolies转成json对象
                    document.getElementsByName("q6")[json.q6index].checked = true;
                } else {
                    save();
                }

            }
        </script>
    </div>
</body>

</html>