<?php
$directory = "C:/xampp/htdocs/ASS-3_NODE"; // Specify your directory path here

// Check if the directory exists
if (is_dir($directory)) {
    // Get an array of files and directories inside the specified directory
    $files = scandir($directory);

    // Loop through each file/directory
    foreach ($files as $file) {
        // Exclude the current and parent directory pointers (i.e., "." and "..")
        if ($file != "." && $file != "..") {
            echo $file . "<br>";
        }
    }
} else {
    echo "Directory not found.";
}
?>
