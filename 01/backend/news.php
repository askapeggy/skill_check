<div class="di"
    style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <?php include_once "logout.php";?>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli">最新消息資料內容管理</p>
        <!-- <form method="post" action="./api/edit.php"> -->
        <form method="post" action="./api/edit.php">
            <table width="100%" style="text-align:center">
                <tbody>
                    <tr class="yel">
                        <td width="80%">最新消息資料內容</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                    </tr>
                    <?php
                        $div = 4;
                        $total = ${ucfirst($do)}->count();
                        $pages = ceil($total/$div);
                        $now = $_GET['p']??1;
                        $start=($now-1)*$div;
                        
                        $rows = ${ucfirst($do)}->all(" limit $start,$div");
                        foreach($rows as $row){
                    ?>
                    <tr>
                        <td width="80%">
                            <textarea name="text[]" id="" style="width:550px;height:40px"><?=$row['text']?></textarea>
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"
                                <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
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
                                onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增最新消息資料">
                        </td>
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