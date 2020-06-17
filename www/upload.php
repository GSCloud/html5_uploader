<?php

foreach ($_FILES as $key => &$file) {
    if (!move_uploaded_file($file["tmp_name"], "./upload/" . basename($file["name"]))) {
        echo "Failed to save uploaded file " . $file['name'] . "\n";
    }
}

// debugging information
echo "<h2>FILES DATA</h2>";
print_r($_FILES);

echo "<h2>POST DATA</h2>";
print_r($_POST);
