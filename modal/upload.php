<?php
// echo "$_POST";

// 更新圖片按鈕會有js函式 op() GET傳值table和id

switch ($_GET['table']) {
    case "title":
        echo "<h3>更新網站標題圖片</h3>";
        break;
    case "mvim":
        echo "<h3>更換動畫圖片</h3>";
        break;
    case "image":
        echo "<h3>更新校園映像圖片</h3>";
        break;
}
?>
<hr>
<!-- 所有更新功能表單都會送到api中的upload.php這支程式中處理 -->
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <?php
            switch ($_GET['table']) {
                case "title":
                    echo "<td>標題區圖片</td>";
                case "mivm":
                    echo "<td>動畫圖片</td>";
                case "image":
                    echo "<td>校園映像圖片</td>";
            }
            ?>
            <td><input type="file" name="img"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input type="submit" value="更新">
        <input type="reset" value="重置">
    </div>
</form>