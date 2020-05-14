<?php
require("../../connection.php");

$list_id = $_GET['id'];

if (isset($_POST["submit"])) {
    $stmt = $conn->prepare("DELETE FROM `lists` WHERE `list_id` = :list_id");
    $stmt->bindParam(":list_id", $list_id);
    $stmt->execute();

    header("Location: ../../index.php");
}

include("../../_layout/_headerLayout.php");
?>

<main class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?id=$list_id"); ?>" method="POST">
        <h3 class="display-4">
            Are you sure you want to delete
        </h3>
        <button type="submit" name="submit" class="btn btn-danger">Delete</button>
    </form>
</main>

<?php include("../../_layout/_footerLayout.php"); ?>