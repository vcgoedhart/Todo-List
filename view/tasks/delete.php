<?php
require("../../connection.php");

$task_id = $_GET['id'];

if (isset($_POST["submit"])) {
    $list_id = $_GET["list_id"];

    $stmt = $conn->prepare("DELETE FROM `tasks` WHERE `task_id` = :task_id");
    $stmt->bindParam(":task_id", $task_id);
    $stmt->execute();

    header("Location: ../../view/lists/index.php?list_id=$list_id");
}

$stmt = $conn->prepare("SELECT * FROM `tasks` WHERE `task_id` = :task_id");
$stmt->bindParam(":task_id", $task_id);
$stmt->execute();

$list_id =  $stmt->fetch()['list_id'];

include("../../_layout/_headerLayout.php");
?>

<main class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?id=$task_id&list_id=$list_id"); ?>" method="POST">
        <h3 class="display-4">
            Are you sure you want to delete
        </h3>
        <button type="submit" name="submit" class="btn btn-danger">Delete</button>
    </form>
</main>

<?php include("../../_layout/_footerLayout.php"); ?>