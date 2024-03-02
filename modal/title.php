<!-- 從./back/title的 新增網站標題圖片 按鈕input onclick op()來的 -->
<h3>新增網站標題圖片</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題區圖片:</td>
            <td><input type="file" name="img"></td>
        </tr>
        <tr>
            <td>標題區替代文字:</td>
            <td><input type="text" name="text"></td>
        </tr>
    </table>
    <div>
        <!-- 建立一個隱藏欄位來放資料表名稱，而資料夾名會透過網址參數代入 -->
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>