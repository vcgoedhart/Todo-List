/** 
 * Loads the items from the database into HTML
 * 
 * @param int index - Used to showcase the position of the item.
 * @param string filterOption - Used to filter an item off the list.
 */
(function loadTable(index, filterOption) {
    var container = document.getElementById("table-container");

    for (const arr of JSONArray) {
        var tr = document.createElement("tr");
        tr.setAttribute("data-id", arr['id']);

        for (const item in arr) {
            var td = document.createElement("td");
            var textNode = document.createTextNode(arr[item]);

            if (item.includes("id")) {
                textNode = document.createTextNode(index);
                index++;
            }

            td.appendChild(textNode);
            tr.appendChild(td);
        }

        createOptions(tr, arr['id']);
        container.appendChild(tr);
    }
})(1);

/**
 * Creates the edit & delete option for the list.
 *
 * @param HTMLelement row - The <tr /> HTML row container element.
 * @param int list_id - The list id to provide more information for further action.
 */
function createOptions(row, id) {
    var td = document.createElement("td");
    for (const option of ["delete", "edit"]) {
        var a = document.createElement("a");
        var textNode = document.createTextNode(option);

        a.href = "/School/Todo-list/view/" + dbColumnName + "/" + option + ".php?id=" + id;

        a.appendChild(textNode);
        td.appendChild(a);
    }

    row.appendChild(td);
}
