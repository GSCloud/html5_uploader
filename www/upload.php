<?php

foreach ($_FILES as $key => &$file) {
    if (!move_uploaded_file($file['tmp_name'], "./upload/" . basename($file['name']))) {
        echo "Failed to save uploaded file '" . $file['name'];
    }
}

// debugging information
print_r( $_FILES );
