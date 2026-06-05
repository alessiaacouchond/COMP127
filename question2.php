<?php
function lineSum($filename, $lineNumber) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    $parts = explode(" ", trim($lines[$lineNumber - 1]));
    $sum = 0;
    foreach ($parts as $num) {
        $sum += (int)$num;
    }
    return $sum;
}

$result = null;
$lineNum = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lineNum = $_POST["line"];
    $result = lineSum("sums.txt", (int)$lineNum);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Line Sum</title>
</head>
<body>
    <h1>Line Sum</h1>
    <form method="post">
        <label>Line number: <input type="number" name="line" value="<?= htmlspecialchars($lineNum) ?> /></label>
        <input type="submit" value="Calculate" />
    </form>

    <?php if ($result !== null): ?>
        <p>The sum of line <?= htmlspecialchars($lineNum) ?> is: <strong><?= $result ?></strong></p>
    <?php endif; ?>
</body>
</html>