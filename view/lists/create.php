<?php
require("../../connection.php");

if (isset($_POST["submit"])) {
    $name = $_POST["inputName"];

    $stmt = $conn->prepare("INSERT INTO `lists` (`name`) VALUES (:name);");
    $stmt->bindParam(":name", $name);
    $stmt->execute();

    header("Location: ../../index.php");
}

include("../../_layout/_headerLayout.php");
?>

<main class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" name="inputName" class="form-control" id="inputName" placeholder="Name" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add</button>
    </form>
</main>

<?php include("../../_layout/_footerLayout.php"); ?>