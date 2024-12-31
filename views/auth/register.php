<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "../../database/connection.php";

    $username = trim($_POST['username'] ?? '');
    $fullname = trim($_POST['fullname'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($username) && !empty($fullname) && !empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, fullname, password , role_id) VALUES (?, ?, ? , ?)");

        if ($stmt->execute([$username, $fullname, $hashedPassword , 2])) {
            header("Location: login.php"); 
            exit;
        } else {
            echo "Registration failed. Try again.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>

<?php include __DIR__.'/../layouts/header.php'; ?>


<h2>Register</h2>
<!-- TODO: Add registration form with input fields for username, password, etc. -->
<!-- Add Bootstrap form classes as needed -->
<form method="post" action="">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="form-group">
        <label for="fullname">Fullname:</label>
        <input type="text" class="form-control" name="fullname" id="fullname" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <!-- Add other registration fields as needed -->
    <button type="submit" name="register" class="btn btn-success">Register</button>
</form>

<?php include __DIR__.'/../layouts/footer.php'; ?>
