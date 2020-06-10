function down_search() {

    document.onclick = function (event) {
        var hasParent = false;
        for (var node = event.target; node != document.body; node = node.parentNode) {
            if (node.id == 'panel-body') {
                hasParent = true;
                break;
            }
        }
        if (hasParent)
            document.getElementById("table-responsive").style.display = "block",
                document.getElementById("search").style.border = "none",
                document.getElementById("search").style.background = "#fff";
        else
            document.getElementById("table-responsive").style.display = "none",

                document.getElementById("search").style.background = "#eee";
    }
}
