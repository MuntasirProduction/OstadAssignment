<?php

// Initialize variables for form fields
$first_name = '';
$last_name = '';
$email = '';
$password = '';
$confirm_password = '';

// Initialize variable for error messages
$errors = [];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form fields and sanitize input
    $first_name = htmlspecialchars($_POST['first_name'] ?? '');
    $last_name = htmlspecialchars($_POST['last_name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password'] ?? '');
    $confirm_password = htmlspecialchars($_POST['confirm_password'] ?? '');

    // Validate form fields
    if (empty($first_name)) {
        $errors[] = 'Please enter your first name.';
    }
    if (empty($last_name)) {
        $errors[] = 'Please enter your last name.';
    }
    if (empty($email)) {
        $errors[] = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if (empty($password)) {
        $errors[] = 'Please enter a password.';
    } 
    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    }

    // If there are no errors, process form data
    if (empty($errors)) {

        echo '<h2>Registration successful!</h2>';
        echo '<a href="./login.php">Go to Login Page</a>'
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
</head>

<body>
    <h1>Registration Form</h1>

    <?php if (!empty($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>

    <form method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?= $first_name ?>"><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?= $last_name ?>"><br><br>

        <label for="email">Email Address:</label>
        <input type="email" name="email" value="<?= $email ?>"><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" value=""><br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" value=""><br><br>

        <input type="submit" value="Register">
    </form>
</body>

</html>
