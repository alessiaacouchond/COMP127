window.addEventListener("DOMContentLoaded", function() {
    var heads = 0;
    var tails = 0;

    document.getElementById("flip").addEventListener("click", function() {
        if (Math.random() < 0.5) {
            document.getElementById("coin").src = "head.jpg";
            heads++
            document.getElementById("num_heads").textContent = heads;
        } else {
            document.getElementById("coin").src = "tail.jpg";
            tails++
            document.getElementById("num_tails").textContent = tails;
        }
    });
});