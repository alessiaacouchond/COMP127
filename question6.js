window.addEventListener("DOMContentLoaded", function() {
    document.getElementById("add").addEventListener("click", function() {
        var text = document.getElementById("paragraph").value;
        var p = document.createElement("p");
        p.textContent = text;
        document.getElementById("essay_body").appendChild(p);
        document.getElementById("paragraph").value = "";
    });
});