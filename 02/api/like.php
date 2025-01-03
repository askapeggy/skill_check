<?php include_once "db.php";
    $id = $_POST['id'];
    $user = $_SESSION['user'];
    $count = $Log->count(['news'=>$id, 'user'=>$user]);
    $mynews = $News->find($id);
    if($count == 0)
    {//有按讚
        $Log->save(['news'=>$id, 'user'=>$user]);
        $mynews['likes']++;
    }else
    {//收回讚
        $Log->del(['news'=>$id, 'user'=>$user]);
        $mynews['likes']--;
    }
    $News->save($mynews);
    ?>