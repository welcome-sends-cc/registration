<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>桑梓纳新报名页面</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
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
            <i class="el-icon-edit"></i>
            <form action="form.php" method="POST" onsubmit="return checkAll(this)">
                <div class="in">
                    <div class="before">
                        <div class="circle"></div>
                        <span>姓名</span>
                    </div>
                    <input type="text" name="name" id="name">
                </div>
                <div class="in">
                    <div class="before">
                        <div class="circle"></div>
                        <span>学号</span>
                    </div>
                    <input type="text" name="id" id="id">
                </div>
                <div class="in">
                    <div class="before">
                        <div class="circle"></div>
                        <span>电话号码</span>
                    </div>
                    <input type="text" name="phone" id="phone">
                </div>
                <div class="in">
                    <div class="before">
                        <div class="circle"></div>
                        <span>QQ号码</span>
                    </div>
                    <input type="text" name="qq">
                </div>
                <div class="in">
                    <div class="before">
                        <div class="circle circle2"></div>
                        <span>校区</span>
                    </div>
                    <select name="campus" id="campus">
                        <option disabled selected value="0">请选择校区</option>
                        <option value="1">厦门校区</option>
                        <option value="2">泉州校区</option>
                        <option value="3">华文校区</option>
                    </select>
                </div>
                <div class="in">
                    <div class="before">
                        <div class="circle circle2"></div>
                        <span>学院</span>
                    </div>
                    <select name="academy" id="academy">
                        <option disabled selected value="0">请选择学院</option>
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
                    </select>
                </div>
                <div class="in">
                    <div class="before">
                        <div class="circle circle3"></div>
                        <span>专业</span>
                    </div>
                    <input type="text" name="profession" id="profession">
                </div>
                <div class="in">
                    <div class="before">
                        <div class="circle circle3"></div>
                        <span>第一志愿</span>
                    </div>
                    <select name="firstVolunteer" id="firstVolunteer">
                        <option disabled selected value="0">请选择第一志愿</option>
                        <option value="1">策划部</option>
                        <option value="2">美工部</option>
                        <option value="3">软件部</option>
                        <option value="4">运维部</option>
                        <option value="5">运营部</option>
                    </select>
                </div>
                <div class="in">
                    <div class="before">
                        <div class="circle circle3"></div>
                        <span>第二志愿</span>
                    </div>
                    <select name="secondVolunteer" id="secondVolunteer">
                        <option disabled selected value="0">请选择第二志愿</option>
                        <option value="1">策划部</option>
                        <option value="2">美工部</option>
                        <option value="3">软件部</option>
                        <option value="4">运维部</option>
                        <option value="5">运营部</option>
                    </select>
                </div>
                <div class="in">
                    <div class="before">
                        <div class="circle circle3"></div>
                        <span>介绍你自己</span>
                    </div>
                    <textarea name="introduce" id="introduce" class="introduce" rows="1"
                        placeholder="自我介绍(提示：自己的兴趣、优势及想要加入部门的原因)"></textarea>
                </div>
                <div class="operBar">
                    <input type="reset" value="返回" name="back" onclick="window.location.href='enterPageControl.php'"
                        class="oper">
                    <input type="submit" value="<?php echo $text; ?>" name="next" class="oper oper-r">
                </div>
            </form>
        </div>
    </div>
</body>

</html>