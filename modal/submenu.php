<?php include_once "../api/db.php"; ?>
<!-- 從./back/menu.php GET傳值table和id -->
<h3>編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
        $subs = $Menu->all(['menu_id' => $_GET['id']]);
        foreach ($subs as $sub) {
        ?>
            <tr>
                <td>
                    <input type="text" name="text[]" value="<?=$sub['text'];?>">
                </td>
                <td>
                    <input type="text" name="href[]" value="<?=$sub['href'];?>">
                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?=$sub['id'];?>">
                </td>
                <input type="hidden" name="id[]" value="<?=$sub['id'];?>">
            </tr>
        <?php } ?>
    </table>
<div>
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <!-- 將主選單的id加入到隱藏欄位中，
    讓後臺的api知道這個表單的次選單資料是屬於哪個主選單的 -->
    <input type="hidden" name="menu_id" value="<?=$_GET['id'];?>">
    <input type="submit" value="修改確定">
    <input type="reset" value="重置">
    <input type="button" value="更多次選單" onclick="more()">
</div>
</form>
