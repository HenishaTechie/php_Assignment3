<?php

$apiUrl = 'http://localhost:8000/persons';

$ch = curl_init($apiUrl);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

$data = json_decode($response, true);

if ($data === null) {
    echo 'Error decoding JSON';
} else {
    echo '<h1>Call Express api in php.</h1>';
    echo '<table border="1">';
    echo '<tr>
              <th>Name</th>
              <th>Age</th>
              <th>City</th>
          </tr>';
    
    foreach ($data as $item) {
        echo '<tr>';
        echo '<td>' . $item['name'] . '</td>';
        echo '<td>' . $item['age'] . '</td>';
        echo '<td>' . $item['city'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
