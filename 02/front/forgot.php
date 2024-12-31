<fieldset style="width:50%;margin:auto;">
    <legend>忘記密碼</legend>
    <table style="width:98%">
        <tr>
            <td>請輸入信箱以查詢密碼</td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="email" style="width:98%;"></td>
        </tr>
        <tr>
            <td id="result"></td>
        </tr>
        <tr>
            <td><input type="button" value="尋找" onclick="myFind()"></td>
        </tr>
    </table>
</fieldset>

<script>
function myFind() {
    let user = {
        email: $("#email").val(),
    }
     $User->count($_GET);
    $.post("./api/forgot_find.php", user, (res) => {
        console.log("myFind =>", res);
        if (res == "") {
            alert("沒有此email");
        } else {
            $("#result").text("密碼:" +
                res);
        }
    })
}
</script>