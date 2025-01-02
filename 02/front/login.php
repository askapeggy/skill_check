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
            <td><input type="button" value="登入" onclick="Login()"> <input type="reset" value="清除" onclick="resetForm()">
            </td>
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
        $.get("./api/chk_acc.php", {
            acc: user.acc
        }, (res) => {
            console.log("chk acc=>", res);
            if (parseInt(res) == 0) {
                alert("查無帳號");
                resetForm();
            } else {
                //有資料
                $.post("./api/chk_pw.php", user, (res) => {
                    console.log("chk_pw =>", res);
                    if (parseInt(res) == 0) {
                        alert("密碼錯誤");
                        resetForm();
                    } else {
                        alert("恭喜登入");
                        if (user.acc == "admin") {
                            location.href = "./admin.php";
                        } else {
                            location.href = "./index.php";
                        }
                    }
                })
            }
        })
    } else {
        alert("請輸入帳號和密碼");
    }
}

function resetForm() {
    $("#acc").val("");
    $("#pw").val("");
}
</script>