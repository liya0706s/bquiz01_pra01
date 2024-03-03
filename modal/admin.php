<!-- 從./back/admin.php的 新增管理者帳號 按鈕input onclick op() GET傳值table 來的 -->
<h3>新增管理者帳號</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>帳號:</td>
            <td><input type="text" name="acc"></td>
        </tr>
        <tr>
            <td>密碼:</td>
            <td><input type="password" name="pw"></td>
        </tr>
        <tr>
            <td>確認密碼:</td>
            <td><input type="password" name="pw2"></td>
        </tr>
    </table>
    <div>
        <!-- 建立一個隱藏欄位來放資料表名稱，而資料夾名會透過網址參數代入 -->
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>