<?php

$servername = "localhost";
$username = "root";
$password = "root";
$database = "test";

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM student";
$result = $con->query($sql);

if ($result->num_rows > 0) {

    $xml = new SimpleXMLElement('<students></students>');


    // Create a table element
    // $table = $xml->addChild('table');

    // // Fetch each row from the MySQL result and add to the table
    // while ($row = $result->fetch_assoc()) {
    //     $rowElement = $table->addChild('row');
    //     foreach ($row as $columnName => $value) {
    //         $rowElement->addChild($columnName, $value);
    //     }
    // }

    while ($row = $result->fetch_assoc()) {
        $student = $xml->addChild('student');
        $student->addChild('id', $row['id']);
        $student->addChild('name', $row['name']);
        $student->addChild('age', $row['age']);
        $student->addChild('gender', $row['gender']);
    }

    $xml->asXML('student.xml');
    echo 'Data exported to student.xml file.';
} else {
    echo 'No data found in the students table.';
}

$con->close();
?>
