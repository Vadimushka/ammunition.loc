<?php
include_once 'functions.php';

$id = (int) $_GET['id'];

$res = $db->prepare("DELETE FROM `wares` WHERE `id` = :id");
$res->execute(array(':id' => $id));

$res = $db->prepare("DELETE FROM `warehouse` WHERE `id` = :id");
$res->execute(array(':id' => $id));

header("Location: /index.php#warehouse");