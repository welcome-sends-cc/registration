<?php
$link = @mysqli_connect('localhost', 'root', 'hqusends', 'information')
    or die("无法连接到服务器");
mysqli_set_charset($link, 'utf8');
session_start();
$id = $_SESSION['id'];
//更新次数
$sq_change_occasion = "UPDATE `lottery` SET `occasion`=0 WHERE `id`='$id'";
mysqli_query($link, $sq_change_occasion);
//取出全部数据存入数组
$sq_gift = "SELECT * FROM `information`.`jackpot`;";
$result = mysqli_query($link, $sq_gift);
$gift_id_list = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($gift_id_list, $row['gift_id']);
}
if (count($gift_id_list) != 0) {
    $index = rand(0, count($gift_id_list) - 1);
    $gift_id = $gift_id_list[$index];
    //获取奖品信息
    $query_gift_name = "SELECT `gift_name` FROM `information`.`jackpot` where `gift_id`=$gift_id;";
    $result_gift_name = mysqli_query($link, $query_gift_name);
    $row = mysqli_fetch_assoc($result_gift_name);
    $gift_name = $row['gift_name'];
    //删除奖池中对应数据
    $sq_delete = "DELETE FROM jackpot WHERE gift_id=$gift_id;";
    mysqli_query($link, $sq_delete);
    //更新奖品信息
    $sq_change_gift = "UPDATE `lottery` SET `gift`='$gift_name' WHERE `id`='$id'";
    mysqli_query($link, $sq_change_gift);
    echo $gift_id;
    mysqli_free_result($result);
    mysqli_free_result($result_gift_name);
} else {
    $x = rand(1, 4);
    switch ($x) {
        case 1:
            echo 2;
            break;
        case 2:
            echo 4;
            break;
        case 3:
            echo 6;
            break;
        case 4:
            echo 8;
            break;
    }
    //更新奖品信息
    $sq_change_gift = "UPDATE `lottery` SET `gift`='谢谢参与' WHERE `id`='$id'";
    mysqli_query($link, $sq_change_gift);
}
mysqli_close($link);
