<?php
require("../../connection.php");
require("../tasks/init.php");

include("../../_layout/_headerLayout.php");
?>

<main class="container">
    <table id="table" class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Status</th>
                <th>
                    <p>Options</p>
                </th>
            </tr>
        </thead>
        <tbody id="table-container"></tbody>
    </table>
</main>

<script>
    var JSONArray = <?= $task_JSON ?>;
</script>
<script src="../../script/tableLoader.js"></script>

<?php include("../../_layout/_footerLayout.php"); ?>