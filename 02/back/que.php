<fieldset style="width:70%;margin:auto;">
    <legend>新增問卷</legend>
    <table>
        <tr>
            <td>問卷名稱</td>
            <td>
                <input type="text" name="subject" id="subject">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="options">
                    選項 <input type="text" name="option[]" id="">
                    <button onclick="more()">更多</button>
                </div>
        </tr>
    </table>
    <div class="ct">
        <button onclick="send()">新增</button>|
        <button onclick="resetForm()">清空</button>
    </div>
</fieldset>
<script>
function more() {
    el = `<div>
            選項 <input type="text" name="option[]" id="" >
         </div>`;
    $("#options").before(el);
}

function send() {
    let subject = $('#subject').val();
    let options = $('input[name="option[]"]').map((id, item) => $(item).val()).get();
    // console.log(subject, options);
    $.post("./api/add_que.php", {
        subject,
        options
    }, (res) => {
        location.reload();
        // console.log(res);
    })
}

function resetForm() {
    $("input[type='text']").val("");
}
</script>