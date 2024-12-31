<fieldset style="width:50%;margin:auto;">
    <legend>會員登入</legend>
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td><input type="button" value="登入" onclick="Login()"> <input type="reset" value="清除"></td>
            <td>
                <a href="?do=forgot">忘記密碼</a>
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
function Login() {
    let user = {
        acc: $("#acc").val(),
        pw: $("#pw").val(),
    };
    if (user.acc.lenght != 0 && user.pw.lenght != "") {
        //有資料
        $.post("./api/login.php", user, (res) => {
            console.log("login =>", res);
            if (parseInt(res) == 0) {
                alert("請輸入正確帳號和密碼");
            } else {
                alert("恭喜登入");
            }
        })
    } else {
        alert("請輸入帳號和密碼");
    }
}
</script>