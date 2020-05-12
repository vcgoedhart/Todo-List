<?php
require("connection.php");
require("view/lists/init.php");

include("_layout/_headerLayout.php");
?>

<main class="container">
    <table id="table" class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>
                    <p>Options</p>
                </th>
            </tr>
        </thead>
        <tbody id="table-container"></tbody>
    </table>
</main>

<script>
    var JSONArray = <?= $list_JSON ?>;
</script>
<script src="script/tableLoader.js"></script>

<?php include("_layout/_footerLayout.php"); ?>