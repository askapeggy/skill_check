<?php include_once "db.php";
    $type = $_POST['type'];
    $rows = $News->all(['type'=>$type]);
    foreach($rows as $row)
    {
         echo "<a href='javascript:getPost({$row['id']})' class='list-item'>{$row['title']}</a>";
        // echo "<a href='javascript:getPost({$row['id']})' class='list-item' onclick='getdata({$row['id']})'>{$row['title']}</a>";
    }
?>