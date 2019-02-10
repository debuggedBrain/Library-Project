<?php

$servername = "sql1.njit.edu";
$username = "ah366";
$password = "yebAXqPoe";
$dbname = "ah366";

$db = mysqli_connect($servername, $username, $password, $dbname);


if ($db->connect_error) {
    die("Connection failed: " . $cdb->connect_error);
} 

echo "Hello, here is the data: <br>";

mysqli_select_db($db, $dbname);

$sqlPatrons = "SELECT * FROM patrons"; #the actual SQL statement to be run
$resultPatrons = $db->query($sqlPatrons);#running the SQL statement

$sqlBooks = "SELECT * FROM books";#the actual SQL statement to be run
$resultBooks = $db->query($sqlBooks); #running the SQL statement

echo "<br> Patrons Data: <br>";
if ($resultPatrons->num_rows > 0) {
    while($row = $resultPatrons->fetch_assoc()) {
        echo $row["name"]." , ".$row["cardnum"]." , ".$row["email"]." , ".$row["booksout"].$row["duedate"]." , ".$row["booksorder"]."<br>";
    }
} else {
    echo "0 results for patrons table<br>";
}


echo "<br> Books Data: <br>";
if ($resultBooks->num_rows > 0) {
    while($row = $resultBooks->fetch_assoc()) {
        echo $row["booktitle"]." , ".$row["author"]." , ".$row["callnum"]."<br>";
    }
} else {
    echo "0 results for books table<br>";
}

$db->close();

?>