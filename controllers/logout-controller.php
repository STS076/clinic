<?php

if (!isset($_SESSION['user'])) {
    header('Location: connection.php');
    exit; 
}

session_unset();
session_destroy();
