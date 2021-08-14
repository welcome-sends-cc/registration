function checkAll(form) {
    var regName = new RegExp("[a-z]");
    var regId = new RegExp("^\\d{10}$");
    var regPhone = new RegExp("^1\\d{10}$");
    var regQQ = new RegExp("[1-9][0-9]{4,}");
    var regProfession = new RegExp("[a-z]");
    if (form.name.value == '') {
        alert("请输入姓名");
        form.name.focus();
        return false;
    } else if (regName.test(form.name.value)) {
        alert("名字不可包含英文");
        form.name.focus();
        return false
    }
    if (form.id.value == '') {
        alert("请输入学号");
        form.id.focus();
        return false;
    } else if (!regId.test(form.id.value)) {
        alert("请输入正确的学号");
        form.id.focus();
        return false
    }
    if (form.phone.value == '') {
        alert("请输入手机号");
        form.phone.focus();
        return false;
    } else if (!regPhone.test(form.phone.value)) {
        alert("请输入正确的手机号");
        form.phone.focus();
        return false
    }
    if (form.qq.value == '') {
        alert("请输入QQ号");
        form.qq.focus();
        return false;
    } else if (!regQQ.test(form.qq.value) || form.qq.value.length > 11) {
        alert("请输入正确的QQ号");
        form.qq.focus();
        return false
    }
    var campus = document.getElementById("campus").value;
    if (campus == 0) {
        alert("请选择校区");
        form.campus.focus();
        return false;
    }
    var academy = document.getElementById("academy").value;
    if (academy == 0) {
        alert("请选择学院");
        form.academy.focus();
        return false;
    }
    if (form.profession.value == '') {
        alert("请输入专业名");
        form.profession.focus();
        return false;
    } else if (regProfession.test(form.profession.value)) {
        alert("请输入正确的专业名");
        form.profession.focus();
        return false
    }
    var firstVolunteer = document.getElementById("firstVolunteer").value;
    if (firstVolunteer == 0) {
        alert("请选择第一志愿");
        form.firstVolunteer.focus();
        return false;
    }
    var secondVolunteer = document.getElementById("secondVolunteer").value;
    if (secondVolunteer == 0) {
        alert("请选择第二志愿");
        form.secondVolunteer.focus();
        return false;
    } else if (firstVolunteer == secondVolunteer) {
        alert("请选择两个不同的志愿方向");
        return false;
    }
    var introduce = document.getElementById("introduce").value;
    if (introduce == '') {
        alert("自我介绍一下吧！");
        form.introduce.focus();
        return false;
    }
}