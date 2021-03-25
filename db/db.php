<?php

$server= "localhost";
$username ="root";
$password="Bluegreen123456789";
$dbname ="ezcashstatic";


$conn = new mysqli($server, $username, $password, $dbname);

$conn->query('SET NAMES utf8');
