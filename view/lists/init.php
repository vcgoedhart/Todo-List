<?php
$stmt = $conn->prepare("SELECT * FROM `lists`");
$stmt->execute();

$list_obj = array();

foreach ($stmt->fetchAll() as $list) {
    $obj = (object) array();
    $obj->list_id = $list['list_id'];
    $obj->name = $list['name'];

    array_push($list_obj, $obj);
}

$list_JSON = json_encode($list_obj);
