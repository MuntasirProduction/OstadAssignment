<?php

// Initialize variables for form fields
$email = '';
$password = '';

// Initialize variable for error message
$error_message = '';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form fields and sanitize input
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password'] ?? '');

    // Validate form fields
    if (empty($email) || empty($password)) {
        $error_message = 'Please enter your email address and password.';
    } else {
        // Read user data from file
        $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Check if email and password match any user in the file
        foreach ($users as $user) {
            $user_data = explode(':', $user);
            $user_email = $user_data[2];
            $user_password = $user_data[3];
            if ($email === $user_email && $password === $user_password) {
                // If email and password match, redirect to welcome page
                session_start();
                $_SESSION['first_name'] = $user_data[0];
                header('Location: welcome.php');
                exit();
            }
        }

        // If no user was found with matching email and password, display error message
        $error_message = 'Invalid email address or password. Please try again.';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
    <h1>Login Form</h1>

    <?php if (!empty($error_message)) : ?>
        <p><?= $error_message ?></p>
    <?php endif ?>

    <form method="POST">
        <label for="email">Email Address:</label>
        <input type="email" name="email" value="<?= $email ?>"><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" value=""><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
