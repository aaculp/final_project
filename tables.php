<html>
<head>
    <style type = 'text/css'>
        .body{
            background-image: url("apex.jpg");
            height: 100vh;
            width: 100vw;
        }
        .tablePHP {
            color: white;
            font-weight: bold;
            font-size: 20px;
        }

        a {
            color: white;
            font-weight: bold;
            font-size: 20px;
            margin-left: 10%;

        }
        table {
            margin-bottom: 100px;
            margin-left: 10%;
        }
    </style>
</head>
</html>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "Apex");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM team_names";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<div class = 'body'>";
        echo "<table class = 'tablePHP'>";
            echo "<tr>";
                echo "<th>Team Name</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a href=\"home.html\">Add Team</a>";
        echo "</div>";

        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
