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

// Get user details
if(!$user->readOne()) {
    header("Location: list.php");
    exit();
}

include_once '../../includes/header.php';
?>

    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-user"></i> User Details</h2>
            <div class="btn-group">
                <a href="list.php" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
                <a href="edit.php?id=<?php echo $user->id; ?>" class="btn btn-success">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="delete.php?id=<?php echo $user->id; ?>" class="btn btn-danger"
                   onclick="return confirm('Are you sure you want to delete this user?')">
                    <i class="fas fa-trash"></i> Delete
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="user-detail-grid">
                <div class="detail-item">
                    <span class="detail-label">ID</span>
                    <div class="detail-value"><?php echo $user->id; ?></div>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Name</span>
                    <div class="detail-value"><?php echo $user->name; ?></div>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Email</span>
                    <div class="detail-value"><?php echo $user->email; ?></div>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Created</span>
                    <div class="detail-value"><?php echo date('F d, Y h:i A', strtotime($user->created_at)); ?></div>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Last Updated</span>
                    <div class="detail-value"><?php echo date('F d, Y h:i A', strtotime($user->updated_at)); ?></div>
                </div>
            </div>
        </div>
    </div>
