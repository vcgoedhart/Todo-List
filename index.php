<?php
include("_headerLayout.php");

$stmt = $conn->prepare("SELECT * FROM lijsten");
$stmt->execute();

?>


<main class="container">
    <a class="btn bg-primary text-light" href="view/lijsten/create.php">Add list...</a>

    <div class="list-containers">
        <?php
        foreach ($stmt->fetchAll() as $key => $value) {
        ?>
            <div class="list-container">
                <div class="jumbotron py-4">
                    <h2 class="font-weight-light"><?= $value['Naam']; ?></h2>
                    <hr>

                    <div class="task-container">
                    </div>

                    <a href="">Add task...</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</main>

<?php include("_footerLayout.php"); ?>