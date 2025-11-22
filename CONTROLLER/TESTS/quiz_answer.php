<?php
session_start();

// $_POST contains all inputs from the form (even the empty ones)
if (!empty($_POST)) {
    
    // We simply save the entire form data into the session
    // This overwrites the old data with the new data (including blanks)
    $_SESSION['quiz'] = $_POST;

    echo "Success. Saved " . count($_POST) . " fields.";
} else {
    echo "No data received";
}
?>