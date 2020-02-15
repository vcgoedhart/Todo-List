<?php 
include("../../_headerLayout.php"); 

$id = $_GET['id'];

if (isset($_POST["submit"])) {
    $stmt = $conn->prepare("DELETE FROM lijsten WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("Location: ../../index.php");
}
?>

<main class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?id=$id"); ?>" method="POST">
        <h3 class="display-4">Are you sure you want to delete <?= $_GET['name']; ?></h3>
        <button type="submit" name="submit" class="btn btn-danger">Delete</button>
    </form>
</main>

<?php include("../../_footerLayout.php"); ?>