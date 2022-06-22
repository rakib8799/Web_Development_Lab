<?php
const SITE_URL = "http://localhost/Web_Development_lab/php-lab/lab-15/";
const HOSTNAME = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DBNAME = 'web_lab';

$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);

if (!$conn) {
    die("Could not connect to the database " . mysqli_connect_error());
}
