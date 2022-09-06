<?php
require_once 'db/database.php';
$id = $_POST['del'];

$del = $db->query("DELETE FROM `content` WHERE `id`='$id'");

if($del){
    echo 'item deleted.';
}

?>