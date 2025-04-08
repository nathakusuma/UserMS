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

// Get existing user data
if(!$user->readOne()) {
    header("Location: list.php");
    exit();
}

// Process form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set user properties
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];

    // Only set password if it's provided
    if(!empty($_POST['password'])) {
        $user->password = $_POST['password'];
    }

    // Update the user
    if($user->update()) {
        header("Location: list.php?success=User updated successfully");
        exit();
    } else {
        $error = "Unable to update user.";
    }
}

include_once '../../includes/header.php';
?>

    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-edit"></i> Edit User</h2>
            <a href="list.php" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> Back to Users
            </a>
        </div>

        <div class="card-body">
            <?php if(isset($error)): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="post">
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $user->name; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $user->email; ?>" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <small class="form-text">Leave blank to keep current password</small>
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update User
                    </button>
                    <a href="list.php" class="btn btn-outline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
