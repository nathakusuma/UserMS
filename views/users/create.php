<?php
require_once '../../config/database.php';
require_once '../../models/User.php';

$user = new User();

// Process form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set user properties
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];

    // Check if email already exists
    if($user->emailExists()) {
        $error = "Email already exists.";
    } else {
        // Create the user
        if($user->create()) {
            header("Location: list.php?success=User created successfully");
            exit();
        } else {
            $error = "Unable to create user.";
        }
    }
}

include_once '../../includes/header.php';
?>

    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-user-plus"></i> Create User</h2>
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
                    <input type="text" class="form-control" name="name" id="name" required>
                    <small class="form-text">Enter the user's full name</small>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                    <small class="form-text">Enter a valid email address</small>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                    <small class="form-text">Choose a strong password</small>
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save User
                    </button>
                    <a href="list.php" class="btn btn-outline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
