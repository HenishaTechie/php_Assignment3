<?php

// Directory path
$directory = 'D:\xampp\htdocs\clg';

// Get the list of files in the directory
$files = scandir($directory);

// Remove "." and ".." from the list
$files = array_diff($files, array('.', '..'));

// Display the list of files
echo '<ol>';
foreach ($files as $file) {
    echo '<li>' . $file . '</li>';
}
echo '</ol>';
?>
