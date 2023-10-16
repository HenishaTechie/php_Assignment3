<?php

$directory = 'D:\xampp\htdocs\clg';

$files = scandir($directory);

$files = array_diff($files, array('.', '..'));

echo '<ol>';
foreach ($files as $file) {
    echo '<li>' . $file . '</li>';
}
echo '</ol>';
?>
