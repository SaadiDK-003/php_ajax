<?php
require_once 'db/database.php';
$id = $_POST['del'];

$del = $db->query("DELETE FROM `user` WHERE `id`='$id'");

if($del){
    echo 'item deleted.';
}

?>