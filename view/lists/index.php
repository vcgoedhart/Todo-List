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
<script>
    var statusToggle = null,
        durationToggle = 0;

    /**
     * Manages which type it should filter. <Status, Duration>
     * 
     * @param string filterType - This string is used to identify which type of filter it is.
     */
    function manageFilter(filterType) {
        document.getElementById("table-container").innerHTML = "";

        var arrayCopy = JSONArray;

        if (filterType === null) {
            statusToggle = null;
        }
        if (filterType === "status") {
            var statusToggleValue = statusToggle === "Complete" ? statusToggle = "Incomplete" : statusToggle = "Complete";
            arrayCopy = filterStatus(arrayCopy, statusToggleValue);
        }
        if (filterType === "duration") {
            var durationToggleValue = durationToggle === 1 ? durationToggle = 0 : durationToggle = 1;
            arrayCopy = filterDuration(arrayCopy, durationToggleValue);
            if (statusToggle) {
                arrayCopy = filterStatus(arrayCopy, statusToggle);
            }
        }

        loadTable(1, arrayCopy);
    }

    /**
     * Removes every incomplete or complete status according to the filter.
     * 
     * @param array array - The array to filter
     * @param string value - The value to find which items it has to remove
     * @return array 
     */
    function filterStatus(array, value) {
        array = array.filter(function(obj) {
            return obj.status !== value;
        });
        return array;
    }

    /**
     * Sort the duration from 'high - low' or 'low - high'
     * 
     * @param array array - The array to filter
     * @param int value - Toggle value to toggle between 'high - low' and 'low - high'
     * @return array 
     */
    function filterDuration(array, value) {
        if (value === 1) {
            array.sort(function(a, b) {
                return parseFloat(a.duration) - parseFloat(b.duration);
            });
        } else {
            array.sort(function(a, b) {
                return parseFloat(b.duration) - parseFloat(a.duration);
            });
        }
        return array;
    }
</script>

<?php include("../../_layout/_footerLayout.php"); ?>