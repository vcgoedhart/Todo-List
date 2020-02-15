<?php
include("_headerLayout.php");
// 
$stmt = $conn->prepare("SELECT * FROM lijsten");
$stmt->execute();
?>

<main class="container">
    <table class="table w-100">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th class="text-right">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($stmt->setFetchMode(PDO::FETCH_ASSOC)) {
                foreach ($stmt->fetchAll() as $key => $value) {
            ?>
                    <tr>
                        <td><?= $key; ?></td>
                        <td><?= $value['Naam']; ?></td>
                        <td class="text-right">
                            <a href="#">Edit</a>
                            |
                            <a href="#">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <a href="view/lijsten/create.php">Add list...</a>
</main>

<?php include("_footerLayout.php"); ?>