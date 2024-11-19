<?php
session_start();

if (isset($_POST['reset'])) {
    session_destroy(); 
    echo "Game has been reset.
    <br><a href='index.php'><button>Play Again</button></a>";
}

if (!isset($_SESSION['number'])) {
    $_SESSION['number'] = rand(1, 100);
    $_SESSION['attempts'] = 0;
}


$response = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guess'])) {
    $_SESSION['attempts']++;
    $guess = intval($_POST['guess']);
    $number = $_SESSION['number'];

    if ($guess < $number) {
        $response = "Too low! Try again.<br><button onclick='history.back()'>Back</button>";
    } 
    elseif ($guess > $number) {
        $response = "Too high! Try again.<br><button onclick='history.back()'>Back</button>";
    } 
    else {
        $response = "Congratulations! You guessed it in {$_SESSION['attempts']} attempts.<br><button onclick='history.back()'>Play Again</button>";
        unset($_SESSION['number']); 
        unset($_SESSION['attempts']);
    }
}




echo $response;
?>
