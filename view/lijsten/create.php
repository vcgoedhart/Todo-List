<?php 
include("../../_headerLayout.php");

if (isset($_POST["submit"])) {
    $name = $_POST["inputName"];

    $stmt = $conn->prepare("INSERT INTO lijsten (naam) VALUES (:name);");
    $stmt->bindParam(":name", $name);
    $stmt->execute();

    header("Location: ../../index.php");
}
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

<?php include("../../_footerLayout.php"); ?>