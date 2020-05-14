<?php
require("../../connection.php");

$list_id = $_GET['id'];

if (isset($_POST["submit"])) {
    $name = $_POST["inputName"];

    $stmt = $conn->prepare("UPDATE `lists` SET `name`=:name WHERE `list_id`=:list_id");
    $stmt->bindParam(":list_id", $list_id);
    $stmt->bindParam(":name", $name);
    $stmt->execute();

    header("Location: ../../index.php");
}

$stmt = $conn->prepare("SELECT * FROM `lists` WHERE `list_id`=:list_id");
$stmt->bindParam(":list_id", $list_id);
$stmt->execute();

$item = $stmt->fetch();

include("../../_layout/_headerLayout.php");
?>

<main class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?id=$list_id"); ?>" method="POST">
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" name="inputName" class="form-control" id="inputName" placeholder="Name" value="<?= $item['name'] ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
    </form>
</main>

<?php include("../../_layout/_footerLayout.php"); ?>