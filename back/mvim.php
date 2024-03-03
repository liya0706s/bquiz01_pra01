<!-- 從back.php複製來的 -->
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動畫圖片管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tr class="yel">
                <td width="60%">動畫圖片</td>
                <td width="10%">顯示</td>
                <td width="10%">刪除</td>
                <td width="20%"></td>
            </tr>
            <?php
            $rows = $Mvim->all();
            foreach ($rows as $row) {
            ?>
                <tr style="text-align: center;">
                    <td><img src="./img/<?= $row['img']; ?>" style="width:400px;height:40px"></td>
                    <!-- 判斷顯示狀態並讓checkbox狀態改變 -->
                    <td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>></td>
                    <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                    <td>
                        <!-- 傳送表單和資料id的參數到api的upload.php, 才知道是哪個資料表哪筆資料要更新 -->
                        <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')" value="更新圖片">
                        <!-- 每筆資料都有一個對應的id, 後端才知道要編輯哪一筆 -->
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                    </td>
                </tr>
            <?php } ?>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tr>
                <td width="200px">
                    <!-- 彈出視窗是由這個op()的js函式觸發的，使用網址參數來代替輸入的modal/檔名，並加上table參數 -->
                    <input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增網站標題圖片">
                </td>

                <td class="cent">
                    <!-- 為了後端方便操作不同的功能，隱藏一個資料表的變數在這 -->
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <input type="submit" value="修改確定">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>
</div>