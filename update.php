<?php
require_once 'db/database.php';

$id = $_POST['id'];
$text = $_POST['text'];

$sql = $db->query("UPDATE `content` SET `Title`='$text' WHERE `id`='$id'");

if($sql){
    echo 'Success';
}else{echo 'Something went wrong.';}
?>