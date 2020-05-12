var container = document.getElementById("table-container");

/** 
 * Creates a HTML element for every list item in the database.
 * "index = 1" is used to assign the position for every table item.
 */
var index = 1;
for (const arr of JSONArray) {
    var tr = document.createElement("tr");

    // To go to its child page.
    if (UrlExists("view/lists/index.php?list_id=" + arr['list_id'])) {
        tr.onclick = function () {
            window.location.href = "view/lists/index.php?list_id=" + arr['list_id'];
        };
    }

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

    createOptions(tr, arr['list_id']);
    container.appendChild(tr);
}

/**
 * Creates the edit & delete option for the list.
 *
 * @param HTMLelement row - The <tr /> HTML row container element.
 * @param int list_id - The list id to provide more information for further action.
 */
function createOptions(row, list_id) {
    var td = document.createElement("td");
    for (const option of ["edit", "delete"]) {
        var a = document.createElement("a");
        var textNode = document.createTextNode(option);

        a.href = "view/lists/" + option + ".php?list_id=" + list_id;

        a.appendChild(textNode);
        td.appendChild(a);
    }

    row.appendChild(td);
}

/**
 * Checks if destination url exists. To prevent any complications.
 * 
 * @param string url - url to check 
 */
function UrlExists(url) {
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status != 404;
}