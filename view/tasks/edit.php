<?php
require("../../connection.php");

$task_id = $_GET['id'];

if (isset($_POST["submit"])) {
    $list_id = $_GET["list_id"];

    $description = $_POST["inputDescription"];
    $status = $_POST["inputStatus"];
    $duration = $_POST["inputDuration"];

    $stmt = $conn->prepare("UPDATE `tasks` SET `description`=:description, `status`=:status, `duration`=:duration WHERE `task_id`=:task_id");
    $stmt->bindParam(":task_id", $task_id);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":duration", $duration);
    $stmt->execute();

    header("Location: ../../view/lists/index.php?list_id=$list_id");
}

$stmt = $conn->prepare("SELECT * FROM `tasks` WHERE `task_id`=:task_id");
$stmt->bindParam(":task_id", $task_id);
$stmt->execute();

$item = $stmt->fetch();
$list_id =  $item['list_id'];

include("../../_layout/_headerLayout.php");
?>

<main class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?id=$task_id&list_id=$list_id"); ?>" method="POST">
        <div class="form-group">
            <label for="inputDescription">Description</label>
            <input type="text" name="inputDescription" class="form-control" id="inputDescription" placeholder="Description" value="<?= $item['description'] ?>" required>
        </div>
        <div class="form-group">
            <label for="inputStatus">Status</label>
            <select name="inputStatus" id="inputStatus" class="form-control">
                <option value="Incomplete">Incomplete</option>
                <option value="Complete" <?php if ($item['status'] != "Incomplete") {
                                                echo "selected";
                                            } ?>>Complete</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputDuration">Duration in minutes</label>
            <input type="number" name="inputDuration" class="form-control" id="inputDuration" placeholder="Duration" value="<?= $item['duration'] ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
    </form>
</main>

<?php include("../../_layout/_footerLayout.php"); ?>