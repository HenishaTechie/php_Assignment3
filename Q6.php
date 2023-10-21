<?php
$users = array(
    array('id' => 1, 'name' => 'Henisha', 'email' => 'henisha@example.com'),
    array('id' => 2, 'name' => 'Hetvi', 'email' => 'hetvi@example.com'),
);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($users);
} else {
    http_response_code(405);
    echo json_encode(array('error' => 'Method not allowed'));
}
?>