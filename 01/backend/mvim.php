<div class="di"
    style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <?php include_once "logout.php";?>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli">動畫圖片管理</p>
        <!-- <form method="post" action="./api/edit_<?=$do;?>.php"> -->
        <form method="post" action="./api/edit.php">
            <table width="100%" style="text-align:center">
                <tbody>
                    <tr class="yel">
                        <td width="70%">動畫圖片</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                        $div = 3;
                        $total = ${ucfirst($do)}->count();
                        $pages = ceil($total/$div);
                        $now = $_GET['p']??1;
                        $start=($now-1)*$div;
                        
                        $rows = ${ucfirst($do)}->all(" limit $start,$div");
                        foreach($rows as $row){
                    ?>
                    <tr>
                        <td width="70%">
                            <img src="./upload/<?=$row['img'];?>" style="width:120px;height:80px;">
                        </td>
                        <td width=" 10%">
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"
                                <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        </td>
                        <td>
                            <input type="button"
                                onclick="op('#cover','#cvr','./modal/upload_<?=$do;?>.php?id=<?=$row['id'];?>&table=<?=$do;?>')"
                                value="更換動畫">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$row['id']?>">
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <div class="cent">
                <?php
                        if($now != 1)
                        {
                            echo "<a href='?do=$do&p=".($now-1)."'> < </a>";
                        }
                        for($i=1; $i<=$pages; $i++)
                        {
                            $size=($i==$now)?"24px":"16px";
                            echo "<a href='?do=$do&p=$i' style='font-size:$size'> ";
                            //echo "<a href='?do=$do&p=$i'>";
                            echo $i;
                            echo "</a>";
                        }
                        if($now != $pages)
                        {
                            echo "<a href='?do=$do&p=".($now + 1)."'> > </a>";
                        }
                ?>
            </div>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px"><input type="button"
                                onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$do;?>.php?table=<?=$do;?>&#39;)"
                                value="新增動畫圖片"></td>
                        <td class="cent">
                            <input type="hidden" name="table" value="<?=$do;?>">
                            <input type="submit" value="修改確定">
                            <input type="reset" value="重置">
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>