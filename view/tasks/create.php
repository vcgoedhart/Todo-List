<?php
require("../../connection.php");

$list_id = $_GET["list_id"];

if (isset($_POST["submit"])) {
    $description = $_POST["inputDescription"];
    $status = $_POST["inputStatus"];
    $duration = $_POST["inputDuration"];

    $stmt = $conn->prepare("INSERT INTO `tasks`(`description`, `duration`, `status`, `list_id`) VALUES (:description, :duration, :status, :list_id)");

    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":duration", $duration);
    $stmt->bindParam(":list_id", $list_id);

    $stmt->execute();

    header("Location: ../../view/lists/index.php?list_id=$list_id");
}

include("../../_layout/_headerLayout.php");
?>

<main class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?list_id=$list_id"); ?>" method="POST">
        <div class="form-group">
            <label for="inputDescription">Description</label>
            <input type="text" name="inputDescription" class="form-control" id="inputDescription" placeholder="Description" required>
        </div>
        <div class="form-group">
            <label for="inputStatus">Status</label>
            <input type="text" name="inputStatus" class="form-control" id="inputStatus" placeholder="Status" required>
        </div>
        <div class="form-group">
            <label for="inputDuration">Duration</label>
            <input type="text" name="inputDuration" class="form-control" id="inputDuration" placeholder="Duration" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add</button>
    </form>
</main>

<?php include("../../_layout/_footerLayout.php"); ?>