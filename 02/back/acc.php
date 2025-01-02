<fieldset style="width:75%;">
    <legend>帳號管理</legend>
    <table class='ct' style="width:75%">
        <tr>
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
        </tr>
        <?php
        $rows=$User->all();
        foreach($rows as $row):?>
        <tr>
            <td>
                <?=$row['acc'];?>
            </td>
            <td>
                <?=str_repeat("*",strlen($row['pw']));?>
            </td>
            <td><input type="checkbox" name="del[]" value=""></td>
        </tr>
        <?php endforeach;?>
    </table>


    <!-- <fieldset style="width:50%;margin:auto;"> -->
    <h2>新增會員</h2>
    <div style="color:red">
        *請設定您要註冊的帳號及密碼(最常12個字元)
    </div>
    <table>
        <tr>
            <td>Step1:登入帳號管理</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td><input type="button" value="註冊" onclick='reg()'> <input type="button" value="清除" onclick="resetForm()">
            </td>
        </tr>
    </table>
    <!-- </fieldset> -->

    <script>
    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }
        console.log(user);
        //判斷是否為空白
        if (user.acc == "" || user.pw == "" || user.pw2 == "" || user.email == "") {
            alert("不可空白")
        } else {
            //判斷密碼是否正確 客戶端先行判斷
            if (user.pw != user.pw2) {
                alert("密碼錯誤")
            } else {
                $.get("./api/chk_acc.php", {
                    acc: user.acc
                }, (res) => {
                    console.log("chk acc=>", res);
                    if (parseInt(res) > 0) {
                        alert("帳號重複");
                    } else {
                        $.post("./api/reg.php", user, (res) => {
                            location.reload();
                        })
                    }
                })
            }
        }
    }

    function resetForm() {
        $("#acc").val("");
        $("#pw").val("");
        $("#pw2").val("");
        $("#email").val("");
    }
    </script>
</fieldset>