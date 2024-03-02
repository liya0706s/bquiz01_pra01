<?php

include_once "db.php";

$table = $_POST['table'];
$DB = ${ucfirst($table)};

// 依照傳來的$_POST['id']陣列, 逐筆處理資料
foreach ($_POST['id'] as $key => $id) {

    // echo "key. $key : id. $id <br>";


    // 先判斷del有沒有被勾選，如果有被勾選，接下來是確認目前這筆資料的
    // id有沒有再$_POST['del']中, 有則刪除, 無則進入編輯
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $DB->del($id);
    } else {

        // 先將要編輯的資料從資料表中取出
        $row = $DB->find($id);

        // 如果原本的資料表中有text欄位，則將$_POST['text']中的資料寫入
        if (isset($row['text'])) {
            $row['text'] = $_POST['text'][$key];
        }

        switch ($table) {
            case "title":
                // 單選-如果$_POST['sh']的值和這筆資料的id一樣, 則將sh設為1, 否則設為0
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;
                break;
            case "admin":
                $row['acc'] = $_POST['acc'][$key];
                $row['pw'] = $_POST['pw'][$key];
                break;
            case "menu":
                $row['href'] = $_POST['href'][$key];
                // 多選-如果$_POST['sh']陣列中有這筆資料的id, 則將sh設為1, 否則設為0
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                break;
            default:
                // 除了以上的資料表，其餘的資料表都會有sh欄位，所以都可以用這個處理
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
        }
        $DB->save($row);
    }
}
to("../back.php?do=$table");
