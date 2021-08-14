<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>报名表</title>
    <link rel="stylesheet" href="../css/entryForm.css">
    <link rel="stylesheet" href="../css/base.css">
    <script type="text/javascript" src="../js/check.js"></script>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['id'])) {
        $text = "更改";
    } else {
        $text = "提交";
    }
    ?>
    <div class="page">
        <div class="sign_in">
            <form action="form.php" method="POST" onsubmit="return checkAll(this)">
                <hr>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;*姓名：&nbsp;&nbsp;&nbsp;</span>
                <input type="text" name="name" id="name">
                <hr>
                <hr><span>&nbsp;&nbsp;&nbsp;&nbsp;*学号：&nbsp;&nbsp;&nbsp;</span>
                <input type="text" name="id" id="id">
                <hr>
                <hr><span>*电话号码：</span>
                <input type="text" name="phone" id="phone">
                <hr>
                <hr><span>&nbsp;*QQ号码：</span>
                <input type="text" name="qq">
                <hr>
                <hr><span>&nbsp;&nbsp;&nbsp;&nbsp;*校区：&nbsp;&nbsp;&nbsp;</span>
                <select name="campus" id="campus">
                    <option value="1">厦门校区</option>
                    <option value="2">泉州校区</option>
                    <option value="3">华文校区</option>
                    <option value="0" selected></option>
                </select>
                <hr>
                <hr><span>&nbsp;&nbsp;&nbsp;&nbsp;*学院：&nbsp;&nbsp;&nbsp;</span>
                <select name="academy" id="academy">
                    <option value="1">机电及自动化学院</option>
                    <option value="2">土木工程学院</option>
                    <option value="3">建筑学院</option>
                    <option value="4">材料科学与工程学院</option>
                    <option value="5">信息科学与工程学院</option>
                    <option value="6">工商管理学院</option>
                    <option value="7">法学院</option>
                    <option value="8">文学院</option>
                    <option value="9">外国语学院</option>
                    <option value="10">美术学院</option>
                    <option value="11">数学科学学院</option>
                    <option value="12">公共管理学院</option>
                    <option value="13">旅游学院</option>
                    <option value="14">经济与金融学院</option>
                    <option value="15">计算机科学与技术学院</option>
                    <option value="16">化工学院</option>
                    <option value="17">哲学与社会发展学院</option>
                    <option value="18">马克思主义学院</option>
                    <option value="19">国际学院</option>
                    <option value="20">体育学院</option>
                    <option value="21">境外生</option>
                    <option value="22">工学院</option>
                    <option value="23">音乐舞蹈学院</option>
                    <option value="24">华文学院</option>
                    <option value="25">医学院</option>
                    <option value="26">厦航学院</option>
                    <option value="27">国际关系学院</option>
                    <option value="28">统计学院</option>
                    <option value="29">新闻与传播学院</option>
                    <option value="30">创新创业学院</option>
                    <option value="0" selected></option>
                </select>
                <hr>
                <hr><span>&nbsp;&nbsp;&nbsp;&nbsp;*专业：&nbsp;&nbsp;&nbsp;</span>
                <input type="text" name="profession" id="profession">
                <hr>
                <hr><span>*第一志愿：</span>
                <select name="firstVolunteer" id="firstVolunteer">
                    <option value="1">策划部</option>
                    <option value="2">美工部</option>
                    <option value="3">软件部</option>
                    <option value="4">运维部</option>
                    <option value="5">运营部</option>
                    <option value="0" selected></option>
                </select>
                <hr>
                <hr><span>*第二志愿：</span>
                <select name="secondVolunteer" id="secondVolunteer">
                    <option value="1">策划部</option>
                    <option value="2">美工部</option>
                    <option value="3">软件部</option>
                    <option value="4">运维部</option>
                    <option value="5">运营部</option>
                    <option value="0" selected></option>
                </select>
                <hr>
                <hr>
                <textarea name="introduce" id="introduce" rows="5" placeholder="自我介绍(提示：自己的兴趣、优势及想要加入部门的原因)"></textarea>
                <hr>
                <input type="reset" value="返回" name="back" onclick="window.location.href='enterPageControl.php'" class="button button1">
                <input type="submit" value="<?php echo $text; ?>" name="next" class="button button2">
            </form>
        </div>
    </div>
</body>

</html>