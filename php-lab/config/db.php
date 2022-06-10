<?php
const SITE_URL = 'http://localhost/php-lab/lab-01/';
const HOSTNAME = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DBNAME = 'web_lab';

$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
if (!$conn) {
    die('Connection failed ' . mysqli_connect_error());
}
return $conn;
