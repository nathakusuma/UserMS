<?php
require_once '../../config/database.php';
require_once '../../models/User.php';

// Check if id parameter exists
if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: list.php");
    exit();
}

$user = new User();
$user->id = $_GET['id'];

// Delete the user
if($user->delete()) {
    header("Location: list.php?success=User deleted successfully");
} else {
    header("Location: list.php?error=Unable to delete user");
}
exit();
