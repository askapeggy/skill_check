<h3 class="cent">新增動態文字廣告管理</h3>
<hr>
<!-- <form action="api/insert_ad.php" method="post" enctype="multipart/form-data"> -->
<form action="api/insert.php" method="post" enctype="multipart/form-data">
    <table style="margin:auto">
        <tr>
            <td>動態文字廣告</td>
            <td><input type="text" name="text" id="text"></td>
        </tr>
    </table>
    <div class="cent">
        <input type="hidden" name="table" value="<?=$_GET['table']?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>