<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Number</title>
</head>
<body>
    <h1>Guess the Number</h1>
    <p>Guess a number between 1 and 100.</p>

    <form method="post" action="server.php">
        <input type="number" name="guess" min="1" max="100" required>
        <button type="submit">Submit Guess</button>
    </form>
    <br>
    <form method="post" action="server.php">
        <input type="hidden" name="reset" value="1">
        <button type="submit">Reset Game</button>
    </form>

    <?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p><strong>Server Response: 
            <?php echo file_get_contents("server.php"); ?>
        </strong></p>
    <?php endif; ?>
</body>
</html
