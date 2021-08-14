<?php
//可以通过控制奖池控制中奖率
$link = @mysqli_connect('localhost', 'root', 'hqusends', 'information')
    or die("无法连接到服务器");
mysqli_set_charset($link, 'utf8');
$sq_insert1 = "INSERT INTO `information`.`jackpot` (`gift_id`, `gift_name`) VALUES ('1', '一等奖');";
mysqli_query($link, $sq_insert1);
for ($i = 3; $i < 12; $i += 8) {
    $sq_insert2 = "INSERT INTO `information`.`jackpot` (`gift_id`, `gift_name`) VALUES ('$i', '二等奖');";
    mysqli_query($link, $sq_insert2);
}
for ($j = 5; $j < 22; $j += 8) {
    $sq_insert3 = "INSERT INTO `information`.`jackpot` (`gift_id`, `gift_name`) VALUES ('$j', '三等奖');";
    mysqli_query($link, $sq_insert3);
}
for ($k = 7; $k < 80; $k += 8) {
    $sq_insert4 = "INSERT INTO `information`.`jackpot` (`gift_id`, `gift_name`) VALUES ('$k', '幸运奖');";
    mysqli_query($link, $sq_insert4);
}
for ($m = 2; $m < 569; $m += 2) {
    $sq_insert5 = "INSERT INTO `information`.`jackpot` (`gift_id`, `gift_name`) VALUES ('$m', '谢谢参与');";
    mysqli_query($link, $sq_insert5);
}
mysqli_close($link);
