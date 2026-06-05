<?php
function isPalindrome($str) {
    $lower = strtolower($str);
    return $lower === strrev($lower);
}

$result = null;
$input = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = $_POST["word"];
    $result = isPalindrome($input);
}
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8" />
        <title>Palindrome Checker</title>
    </head>

    <body>
        <h1>Palindrome Checker</h1>
        <form method="post">
            <label>Enter a string: <input type="text" name="word" value="<?= htmlspecialchars($input) ?>" /></label>
            <input type="submit" value="Check"/>
        </form>

        <?php if ($result !== null) : ?>
            <p>
                "<?= htmlspecialchars($input) ?>" is <?=$result ? "" : "NOT" ?> a palindrome.
            </p>
        <?php endif; ?>
    </body>
</html>