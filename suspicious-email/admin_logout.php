<?php
session_start();

// Check if the admin is logged in
if (isset($_SESSION['admin'])) {
    // Unset and destroy the session
    session_unset();
    session_destroy();

    // Return success as JSON response
    echo json_encode(['success' => true]);
} else {
    // Return failure as JSON response
    echo json_encode(['success' => false]);
}
?>
