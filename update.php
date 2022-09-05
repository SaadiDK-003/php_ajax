<?php
require_once 'db/database.php';

$id = $_POST['id'];
$text = $_POST['text'];

$sql = $db->query("UPDATE `user` SET `username`='$text' WHERE `id`='$id'");

if($sql){
    echo 'Success';
}else{echo 'Something went wrong.';}
?>