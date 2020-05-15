<?php
require("../../connection.php");
require("../tasks/init.php");

include("../../_layout/_headerLayout.php");
?>


<main class="container">
    <a href="../../index.php" class="btn btn-primary text-light">Back</a>
    <table id="table" class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Duration
                    <button class="btn btn-primary" onclick="manageFilter('duration');">Switch</button>
                </th>
                <th>Status
                    <button class="btn btn-primary" onclick="manageFilter('status');">Toggle</button>
                    <button class="btn btn-primary" onclick="manageFilter(null);">Default</button>
                </th>
                <th>
                    <p>Options</p>
                </th>
            </tr>
        </thead>
        <tbody id="table-container"></tbody>
    </table>
    <a href="../tasks/create.php?list_id=<?= $_GET["list_id"]; ?>">Add Task to this list...</a>
</main>

<script>
    var JSONArray = <?= $task_JSON ?>;
    var dbColumnName = "tasks";
</script>
<script src="../../script/tableLoader.js"></script>
<script src="../../script/filterTasks.js"></script>

<?php include("../../_layout/_footerLayout.php"); ?>