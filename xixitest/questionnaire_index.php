<?php

/*
 * @params
 * userID : the user's ID who is answering the questionnaire
 * answerSequence : the user's answer details;
 *
 */

$userID = $_POST['user_id'];
$answerSequence = $_POST['answer_sequence'];

/* database config  */
$servername = "localhost";
$username = "root";
$password = "codered";
$dbname = "codered";
$tableName = "questionnaire";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("server_error");
} 

mysql_select_db($dbname, $conn);
$sql = "INSERT INTO " . $tableName . " VALUES('$userID', '$answerSequence');";
mysql_query($sql);

mysql_close($conn);
?>
