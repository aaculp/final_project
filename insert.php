<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$user = 'root';
$password = 'root';
$db = 'Apex';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);

// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$teamName = mysqli_real_escape_string($link, $_GET['teamName']);

// attempt insert query execution
$sql = "INSERT INTO team_names (name) VALUES ('$teamName')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Escape user inputs for security
$player1 = mysqli_real_escape_string($link, $_GET['player1']);
$player2 = mysqli_real_escape_string($link, $_GET['player2']);
$player3 = mysqli_real_escape_string($link, $_GET['player3']);


// attempt insert query execution
$sql1 = "INSERT INTO team_players (player1, player2, player3) VALUES ('$player1','$player2', '$player3')";
if(mysqli_query($link, $sql1)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


// Escape user inputs for security
$p1Kills = mysqli_real_escape_string($link, $_GET['p1Kills']);
$p2Kills = mysqli_real_escape_string($link, $_GET['p2Kills']);
$p3Kills = mysqli_real_escape_string($link, $_GET['p3Kills']);

// attempt insert query execution
$sql2 = "INSERT INTO player_kills (player1, player2, player3) VALUES ('$p1Kills','$p2Kills', '$p3Kills')";
if(mysqli_query($link, $sql2)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>
