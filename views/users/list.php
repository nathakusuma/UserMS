<?php
require_once '../../config/database.php';
require_once '../../models/User.php';

// Initialize the User model
$user = new User();

// Read all users
$result = $user->read();
$num = $result->rowCount();

include_once '../../includes/header.php';
?>

    <div class="card">
        <div class="card-header">
            <h2>
                <i class="fas fa-users"></i> Users
            </h2>
            <a href="create.php" class="btn btn-success">
                <i class="fas fa-user-plus"></i> Add New User
            </a>
        </div>

        <div class="card-body">
            <?php if(isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo $_GET['success']; ?>
                </div>
            <?php endif; ?>

            <?php if(isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $_GET['error']; ?>
                </div>
            <?php endif; ?>

            <?php if($num > 0): ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-users fa-3x mb-3 text-muted"></i>
                    <h3>No Users Found</h3>
                    <p class="text-muted">Start by adding a new user to the system.</p>
                    <a href="create.php" class="btn btn-primary mt-3">
                        <i class="fas fa-user-plus"></i> Add New User
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
