<?php
function searchTerms($query) {
    $terms = [];
    preg_match_all('/"([^"]+)"/', $query, $quoted);
    $terms = $quoted[1];
    $remaining = preg_replace('/"[^"]*"/', '', $query);
    $words = preg_split('/\s+/', trim($remaining), -1, PREG_SPLIT_NO_EMPTY);
    return array_merge($terms, $words);
}

$query = "";
$matches = [];

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["query"])) {
    $query = trim($_GET["query"]);
    if ($query !== "") {
        $terms = searchTerms($query);
        $files = scandir("images/");
        foreach ($files as $file) {
            if ($file === "." || $file === "..") continue;
            foreach ($terms as $term) {
                if (stripos($file, $term) !== false) {
                    $matches[] = $file;
                    break;
                }
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
    <form action="question4.php" method="get">
        <fieldset>
            Type a query: <input type="text" name="query" />
            <input type="submit" value="Search" />
        </fieldset>
    </form>

    <?php 
    if (!empty($matches)) {
        foreach ($matches as $file) {
            echo "<a href='images/" . htmlspecialchars($file) . "'>";
            echo "<img src='images/" . htmlspecialchars($file) . "' height='100' alt='" . htmlspecialchars($file) . "'>";
            echo "</a>";
        }
    } elseif ($query !== "") {
        echo "<p>No results found.</p>";
    }
    ?>
</body>
</html>
