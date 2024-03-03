<!-- 從./back/news.php的 新增動畫圖片 按鈕input onclick op()來的 -->
<h3>新增最新消息資料</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>最新消息資料</td>
            <td>
                <textarea type="text" name="text" cols="30" rows="10"></textarea>
            </td>
        </tr>
    </table>
    <div>
        <!-- 建立一個隱藏欄位來放資料表名稱，而資料夾名會透過網址參數代入 -->
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>