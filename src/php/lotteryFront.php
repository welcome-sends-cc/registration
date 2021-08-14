<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>幸运抽奖</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/lottery.css">
    <!-- <script type="text/javascript" src="../js/lottery.js"></script> -->
    <script src="../js/jquery.js"></script>
</head>

<body>
    <div class="page">
        <?php
        $link = @mysqli_connect('localhost', 'root', 'hqusends', 'information')
            or die("无法连接到服务器");
        mysqli_set_charset($link, 'utf8');
        session_start();
        $id = $_SESSION['id'];
        //查询剩余次数
        $sq_query_occasion = "SELECT occasion FROM `lottery` WHERE id = $id;";
        $result_occasion = mysqli_query($link, $sq_query_occasion);
        $row = mysqli_fetch_assoc($result_occasion);
        $occasion = $row['occasion'];
        // $db_gift = $row['gift'];
        //更新次数
        // $post_occasion = $_POST['occasion'];
        // $sq_change_occasion = "UPDATE `lottery` SET `occasion`='$post_occasion' WHERE `id`='$id'";
        // mysqli_query($link, $sq_change_occasion);
        //将奖品传至后台
        // $gift = $_POST['results'];
        // if ($gift != '') {
        //     $sq_change_gift = "UPDATE `lottery` SET `gift`='$gift' WHERE `id`='$id'";
        //     mysqli_query($link, $sq_change_gift);
        // }
        mysqli_free_result($result_occasion);
        mysqli_close($link);
        ?>
        <div class="turntable" style="position: absolute;left: 50%;transform:translateX(-50%)">
            <div class="gift">一等奖</div>
            <div class="gift">谢谢参与</div>
            <div class="gift">二等奖</div>
            <div class="gift">谢谢参与</div>
            <div class="gift" id="occasion">剩余次数：<?php echo $occasion ?> </div>
            <div class="gift">谢谢参与</div>
            <div class="gift">幸运奖</div>
            <div class="gift">谢谢参与</div>
            <div class="gift">三等奖</div>
            <button id="btn" class="start" onclick="time()">点击抽奖</button>
            <button id="back" class="back" onclick="window.location.href='enterPageControl.php'">返回首页</button>
            <div class="record">
                <a href="record.php">查看获奖记录</a>
            </div>
            <!-- <div id="info" style="display: none;"></div>
            <form id='result_form' action="lottery.php" method="POST" target="frameName">
                <input name="results" id="results" type="hidden" value="">
                <input name="occasion" id="occasion" type="hidden" value="0">
            </form>

            <iframe src="" frameborder="0" name="frameName" style="display:none;"></iframe> -->

        </div>
    </div>
</body>
<script>
    var occasion = <?php echo $occasion ?>;
    if (occasion == 0) {
        document.getElementById('btn').style.backgroundColor = "#787878";
        document.getElementById('btn').disabled = true;
    }
    var gift;
    var x = 0;
    // //可修改ArrList以定义每一奖项中奖概率;
    // var ArrList = [20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 34, 35, 36];
    var position = [0, 1, 2, 5, 8, 7, 6, 3];
    var repeat = 2;

    function time() {
        var timer = setInterval(function() {
            if (repeat == 2) {
                repeat--;
                start();
                document.getElementById('back').style.backgroundColor = "#787878";
                document.getElementById('back').disabled = true;
                setTimeout(function() {
                    document.getElementById('back').style.backgroundColor = "#e9686b";
                    document.getElementById('back').disabled = false;
                }, 5000);
                document.getElementById('btn').style.backgroundColor = "#787878";
                document.getElementById('btn').disabled = true;
                setTimeout(function() {
                    document.getElementById('btn').disabled = false;
                }, 5000);
            } else if (repeat == 1) {
                setTimeout("repeat--", "20");
                clearInterval(timer);
            } else {
                clearInterval(timer);
                alert('已没有剩余抽奖机会');
            }
        }, 20);
    }


    function start() {
        var xmlhttp;
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var initial = parseInt(xmlhttp.responseText);
                if (initial < 10) {
                    initial = initial + 24;
                } else if (initial < 20) {
                    initial = initial + 16;
                } else if (initial > 30) {
                    initial = initial % 8 + 24;
                }
                var form = document.getElementById('result_form');
                var info = document.getElementById("occasion");
                info.innerHTML = "剩余次数：0";
                for (var i = 0; i < initial; i++) {
                    setTimeout(() => {
                        $('.gift').removeClass("selected");
                        gift = $('.gift:eq(' + position[(x % 8)] + ')');
                        gift.addClass('selected');
                        x++;
                        if (x == initial) {
                            setTimeout(() => {
                                if (gift.text() == "谢谢参与") {
                                    alert('很遗憾您未能中奖');
                                } else {
                                    alert('恭喜获得：' + gift.text());
                                }
                                x = 0;
                            }, 10)
                        }
                    }, i * 130);
                }
            }
        }
        xmlhttp.open("POST", "lotteryBack.php", true);
        xmlhttp.send();
    }

    // function getArrayItems(arr, num) {
    //     //新建一个数组,将传入的数组复制过来,用于运算,而不要直接操作传入的数组;
    //     var temp_array = new Array();
    //     for (var index in arr) {
    //         temp_array.push(arr[index]);
    //     }
    //     //取出的数值项,保存在此数组
    //     var return_array = new Array();
    //     for (var i = 0; i < num; i++) {
    //         //判断如果数组还有可以取出的元素,以防下标越界
    //         if (temp_array.length > 0) {
    //             //在数组中产生一个随机索引
    //             var x = Math.random();
    //             var arrIndex = Math.floor(x * temp_array.length);
    //             //将此随机索引的对应的数组元素值复制出来
    //             return_array[i] = temp_array[arrIndex];
    //             //然后删掉此索引的数组元素,这时候temp_array变为新的数组
    //             temp_array.splice(arrIndex, 1);
    //         } else {
    //             //数组中数据项取完后,退出循环,比如数组本来只有10项,但要求取出20项.
    //             break;
    //         }
    //     }
    //     return return_array;
    // }

    // //提交
    // function tijiao() {
    //     var obox = document.getElementById("info");
    //     aa = obox.firstElementChild.innerHTML;
    //     var input = document.getElementById("results");
    //     input.value = aa;
    // }
    // //存结果
    // var infoConsole = document.getElementById('info');
    // if (infoConsole) {
    //     if (console) {
    //         var _consolee = {
    //             log: console.log
    //         }
    //         console.log = function(attr) {
    //             _consolee.log(attr);
    //             var str = JSON.stringify(attr, null, 4);
    //             var node = document.createElement("h1");
    //             var textnode = document.createTextNode(str);
    //             node.setAttribute("type", "text");
    //             node.appendChild(textnode);
    //             infoConsole.appendChild(node);
    //         }
    //     }

    //     function show() {
    //         var type = infoConsole.getAttribute("type");
    //         if (type === "0") {
    //             infoConsole.style.cssText = "width:100vw;height:40vh;";
    //             infoConsole.setAttribute("type", "1");
    //         } else {
    //             infoConsole.removeAttribute('style');
    //             infoConsole.setAttribute("type", "0");
    //         }
    //     }
    // }
</script>

</html>