<?php
include("../../_headerLayout.php");

$stmt = $conn->prepare("SELECT * FROM list");
$stmt->execute();

if (isset($_POST['submit'])) {
    $list_id = $_POST["inputList_Id"];
    $description = $_POST["inputDescription"];
    $duration = $_POST["inputDuration"];
    $status = $_POST["inputStatus"];

    $stmt = $conn->prepare("INSERT INTO taken (lijsten_id, beschrijving, duur, status) VALUES (:list_id, :description, :duration, :status);");

    $stmt->bindParam(":list_id", $list_id);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":duration", $duration);
    $stmt->bindParam(":status", $status);

    $stmt->execute();

    header("Location: ../list/index.php/?id=$list_id");
}
?>

<div class="container">
    <div class="row">
        <div class="col">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter task name" required>
                    <label for="name">List</label>

                    <select name="list_id" class="form-control form-control-sm" required>
                        <?php
                        foreach ($stmt->fetchAll() as $list) {
                        ?>
                            <option value="<?= $list['id'] ?>"><?= $list['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="duur" class="col-form-label">duur</label>
                    <input required class="form-control" type="time" id="duur" name="duur">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
</div>

<?php include("../../_footerLayout.php"); ?>