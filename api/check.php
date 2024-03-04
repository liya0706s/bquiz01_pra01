<?php

include_once "db.php";

// 用count的方法計算資料表中是否有符合的資料
if($Admin->count(['acc'=>$_POST['acc'], 'pw'=>$_POST['pw']])>0){
    // 如果資料符合則建立一個session並將頁面導向後台頁面
    $_SESSION['login']=$_POST['acc'];
    to("../back.php");
}else{
    // 如果帳號密碼不符，則導回登入頁面，並帶上錯誤訊息
    to("../index.php?do=login&error=帳號或密碼錯誤");
}





?>