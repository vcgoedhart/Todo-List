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
                    <button class="btn btn-primary" onclick="filterDuration();">Switch</button>
                </th>
                <th>Status
                    <button class="btn btn-primary" onclick="filterStatus();">Toggle</button>
                    <button class="btn btn-primary" onclick="filterDefault();">Default</button>
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
<script>
    var durationToggle = 0,
        statusToggle = "Incomplete";

    /**
     * Filters the table to show the duration from 'high - low' or 'low - high' 
     */
    function filterDuration() {
        document.getElementById("table-container").innerHTML = "";

        var toggleValue = durationToggle === 1 ? durationToggle = 0 : durationToggle = 1;
        var arrayCopy = JSONArray;

        if (toggleValue === 1) {
            arrayCopy.sort(function(a, b) {
                return parseFloat(a.duration) - parseFloat(b.duration);
            });
        } else {
            arrayCopy.sort(function(a, b) {
                return parseFloat(b.duration) - parseFloat(a.duration);
            });
        }

        loadTable(1, arrayCopy);
    }

    /**
     * Filters the table to only show the columns that are 'Complete' or 'Incomplete 
     */
    function filterStatus() {
        document.getElementById("table-container").innerHTML = "";

        var toggleValue = statusToggle === "Complete" ? statusToggle = "Incomplete" : statusToggle = "Complete";
        var arrayCopy = JSONArray;

        arrayCopy = arrayCopy.filter(function(obj) {
            return obj.status !== toggleValue;
        });

        loadTable(1, arrayCopy);
    }

    /**
     * Sets the table back to default
     */
    function filterDefault() {
        document.getElementById("table-container").innerHTML = "";
        loadTable(1);
    }
</script>

<?php include("../../_layout/_footerLayout.php"); ?>