<?php
    if(isset($_POST['acc']))
    {
        if($_POST['acc'] =='admin' && $_POST['pw']=='1234')
        {
            $_SESSION['login']=1;
        }else
        {
            echo "帳號或密碼錯誤";
        }
    }


    if(!isset($_SESSION['login']))
    {
        ?>
<table>
    <form action="?" method="post">
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
</table>
<div>
    <input type="submit" value="登入">
    <input type="reset" value="重置">
</div>
</form>
<?php
    }else
    {
        ?>
<div class="rb tab">
    <h2 class="ct">請選擇所需功能</h2>
</div>
<?php
    }
?>