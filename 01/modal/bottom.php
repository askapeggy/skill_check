<?php
    include_once "../api/db.php";
    $bottom=$Bottom->find(1);
?>
<h3 class="cent">頁尾版權管理</h3>
<hr>
<!-- <form action="api/insert_ad.php" method="post" enctype="multipart/form-data"> -->
<form action="api/update_data.php" method="post" enctype="multipart/form-data">
    <table style="margin:auto">
        <tr>
            <td>頁尾版權</td>
            <td><input type="text" name="bottom" id="text" value="<?=$bottom['bottom']?>"></td>
        </tr>
    </table>
    <div class="cent">
        <input type="hidden" name="table" value="bottom">
        <input type="submit" value="更新">
        <input type="reset" value="重置">
    </div>
</form>