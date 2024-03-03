<!-- 從back.php複製來的 -->
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tr class="yel">
                <td width="80%">最新消息資料內容</td>
                <td width="10%">顯示</td>
                <td width="10%">刪除</td>
            </tr>
            <?php
            $rows = $Title->all();
            foreach ($rows as $row) {
            ?>
                <tr style="text-align: center;">
                    <td width="23%">
                        <textarea cols="90" rows="4" type="text" name="text[]" value="<?= $row['text']; ?>"></textarea>
                    </td>
                    <!-- 判斷顯示狀態並讓checkbox狀態改變 -->
                    <td width="7%"><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>></td>
                    <td width="7%"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                    <td>
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
                    <input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增最新消息資料">
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