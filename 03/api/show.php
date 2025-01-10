<?php include_once "db.php";
    $row = $Movie->find(['id'=>$_POST['id']]);
    $row['sh'] = !$row['sh'];
    $Movie->save($row);
?>