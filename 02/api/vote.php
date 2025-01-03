<?php include_once "db.php";

$opt_id = $_POST['opt'];
$option=$Que->find($opt_id);
$suboject=$Que->find($option['main_id']);
$option['vote']++;
$suboject['vote']++;
$Que->save($option);
$Que->save($suboject);
to("../index.php?do=result&id={$option['main_id']}");
?>