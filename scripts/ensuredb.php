<?php
require 'localconf.php';
$conn = new mysqli($localconf['dbhost'], $localconf['dbuser'], $localconf['dbpass']);
$db_selected = $conn->select_db($localconf['dbname']);
if (!$db_selected) {
    $sql = "CREATE DATABASE ${localconf['dbname']};";
    $conn->query($sql);
}
$conn->close();
