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
    <a href="view/lists/create.php">Add List...</a>
</main>

<script>
    var JSONArray = <?= $list_JSON ?>;
    var dbColumnName = "lists";
</script>
<script src="script/tableLoader.js"></script>
<script>
    var rows = document.getElementById("table-container").childNodes;
    for (var i = 0; i < rows.length; i++) {
        (function(i) {
            var list_id = rows[i].getAttribute("data-id");
            rows[i].onclick = function() {
                window.location.href = "/School/Todo-List/view/lists/index.php?list_id=" + list_id;
            };
        })(i);
    }
</script>

<?php include("_layout/_footerLayout.php"); ?>