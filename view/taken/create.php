<?php
include("../../_headerLayout.php");

$stmt = $conn->prepare("SELECT * FROM taken");
$stmt->execute();

if (isset($_POST['submit'])) {
    $description = $_POST["inputDescription"];
    $duration = $_POST["inputDuration"];
    $status = $_POST["inputStatus"];

    $stmt = $conn->prepare("INSERT INTO taken (beschrijving, status, duration, lijstenid) VALUES (:description, :status, :duration, 42);");

    // $stmt->bindParam(":listId", 42/*$listId*/);
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
                    <label for="name">Taak beschrijving</label>
                    <input type="text" name="inputDescription" class="form-control" id="name" placeholder=".':)" required>
                </div>
                <div class="form-group">
                    <label for="name">Duur</label>
                    <input type="text" name="inputDuration" class="form-control" id="name" placeholder=".':)" required>
                </div>
                <div class="form-group">
                    <label for="name">Status</label>
                    <input type="text" name="inputStatus" class="form-control" id="name" placeholder=".':)" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>

    <?php include("../../_footerLayout.php"); ?>