<?php include_once "db.php";
// echo $User->find(_POST);
//echo $_POST['email'];
$d = $_POST['email'];
$d1 =  $User->find(['email'=>$d]);
if(is_bool($d1))
{
    echo "";
}else
{
    echo $d1['pw'];

}
?>