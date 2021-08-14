<?php
session_start();
if(isset($_SESSION['id'])){
    Header("Location:intoAgain.php");
}else{
    Header("Location:../html/index.html");
}
