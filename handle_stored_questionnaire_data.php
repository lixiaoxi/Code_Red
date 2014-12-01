<?php

/* database config */
$servername = "localhost";
$username = "root";
$password = "codered";
$dbname = "codered";
$tableName = "questionnaire";
$resultsToBePrintedToCsv = array();

// Create connection
$conn = mysql_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 

mysql_select_db($dbname, $conn);

$sql = "SELECT * FROM " . $tableName . ";";
$result = mysql_query($sql);


while($row = mysql_fetch_array($result)){
    $oneRecordArray = array();
    array_push($oneRecordArray, $row['user_id']);
    $answerSequence = str_split($row['answer_sequence']);
    foreach ($answerSequence as $character) {
    	array_push($oneRecordArray, $character);
    }
    array_push($resultsToBePrintedToCsv, $oneRecordArray);
}

$fp = fopen("./database_reuslt.csv", 'w');
foreach ($resultsToBePrintedToCsv as $oneLine) {
	fputcsv($fp, $oneLine);	
}
fclose($fp);

mysql_close($conn);
?>
