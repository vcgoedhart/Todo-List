<?php
include("../../_headerLayout.php");

$id = $_GET['id'];

if (isset($_POST["submit"])) {
    $name = $_POST["inputName"];

    $stmt = $conn->prepare("UPDATE lijsten SET Naam=:name WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":name", $name);
    $stmt->execute();

    header("Location: ../../index.php");
}
?>

<main class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?id=$id"); ?>" method="POST">
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" name="inputName" class="form-control" id="inputName" placeholder="Name" value="<?= $_GET['name'] ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
    </form>
</main>

<?php include("../../_footerLayout.php"); ?>