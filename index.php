<?php include_once 'includes/header.php'; ?>

    <section class="home-header py-5">
        <h1>Welcome to User Management System</h1>
        <p class="lead">A simple and efficient way to manage your users</p>
        <div class="mt-4">
            <a href="views/users/list.php" class="btn btn-primary btn-lg">
                <i class="fas fa-users"></i> View All Users
            </a>
            <a href="views/users/create.php" class="btn btn-success btn-lg">
                <i class="fas fa-user-plus"></i> Add New User
            </a>
        </div>
    </section>

    <div class="feature-cards">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h3>Create Users</h3>
            <p>Add new users to your system with name, email, and password.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-eye"></i>
            </div>
            <h3>View Users</h3>
            <p>See all your users in an organized and responsive table.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-edit"></i>
            </div>
            <h3>Update Users</h3>
            <p>Edit user information and keep your data up to date.</p>
        </div>
    </div>
