<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $preferences = $_POST;
    echo "<h1>Summary of Your Preferences</h1>";
    echo "<pre>";
    print_r($preferences);
    echo "</pre>";
}
?>
