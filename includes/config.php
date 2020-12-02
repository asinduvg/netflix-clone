<?php

ob_start(); // turns on output buffering -> wait for all the php before outputting it to the page
session_start();

date_default_timezone_set('Asia/Colombo');

try {
    $con = new PDO('mysql:dbname=netflix;host=localhost', 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    exit('Connection failed: ' . $e->getMessage());
}
