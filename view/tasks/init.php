<?php
$list_id = $_GET['list_id'];

$stmt = $conn->prepare("SELECT * FROM `tasks` WHERE list_id = :list_id");
$stmt->bindParam(":list_id", $list_id);
$stmt->execute();

$task_obj = array();

foreach ($stmt->fetchAll() as $task) {
    $obj = (object) array();
    $obj->id = $task['task_id'];
    $obj->description = $task['description'];
    $obj->duration = $task['duration'];
    $obj->status = $task['status'];

    array_push($task_obj, $obj);
}

$task_JSON = json_encode($task_obj);
