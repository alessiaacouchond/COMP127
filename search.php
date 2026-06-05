<?php
$query = "";
$matches = [];

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["query"])) {
    $query = trim($_GET["query"]);
    if ($query !== "") {
        $files = scandir("images/");
        foreach ($files as $file) {
            if ($file === "." || $file === "..") continue;
            if (stripos($file, $query) !== false) {
                $matches[] = $file;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Image Gallery Search</title>
</head>
<body>
    <h1>Image Gallery Search</h1>
    <form action="search.php" method="get">
        <fieldset>
            Type a query: <input type="text" name="query" />
            <input type="submit" value="Search" />
        </fieldset>
    </form>

    <?php 
    if (!empty($matches)) {
        echo "<ul>";
        foreach ($matches as $file) {
            echo "<li><a href ='images/" . htmlspecialchars($file) . "'>" . htmlspecialchars($file) . "</a></li>";
        }
        echo "</ul>";
    } elseif ($query !== "") {
        echo "<p>No results found.</p>";
    }
    ?>
</body>
</html>
