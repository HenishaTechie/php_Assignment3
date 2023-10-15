<?php

$servername = "localhost";
$username = "root";
$password = "root";
$database = "test";

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$xml = simplexml_load_file('students.xml');

if ($xml === false) {
    die('Failed to load XML file');
}

if (isset($xml->student) && count($xml->student) > 0) {
    foreach ($xml->student as $student) {
        $id = (int)$student->id;
        $name = (string)$student->name;
        $age = (int)$student->age;
        $gender = (string)$student->gender;

        $sql = "insert into student (id, name, age,gender) values ('$id', '$name', '$age','$gender')";

        if ($con->query($sql) === TRUE) {
            echo "Record inserted successfully.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
} else {
    echo "No 'student' elements found in the XML file.";
}

$con->close();
?>