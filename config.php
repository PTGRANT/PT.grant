<?php
// config.php - PT GRANT Configuration & Settings

// Define storage file path
define('DATA_FILE', __DIR__ . '/applications.json');

// Admin credentials
define('ADMIN_PASSWORD', 'Admin123');

// Ensure data file exists
if (!file_exists(DATA_FILE)) {
    file_put_contents(DATA_FILE, json_encode([], JSON_PRETTY_PRINT));
}
?>
