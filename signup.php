<?php
// Start the session
session_start();

// Placeholder for handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $yearStarted = htmlspecialchars($_POST['yearStarted']);
    $bio = htmlspecialchars($_POST['bio']);

    // Here, add your logic to store the data, such as database insertion
    // For now, let's just print the inputs to demonstrate
    echo "<h2>Your Input:</h2>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Telephone: $telephone<br>";
    echo "Year Cooking Started: $yearStarted<br>";
    echo "Bio: $bio<br>";

    // After storing data, you might want to redirect or perform other actions
}

include 'header.php'; // Include your header file
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="path/to/styles.css"> <!-- Make sure the path is correct -->
</head>

<body>
    <div class="container text-center">
        <h1>Sign Up</h1>
    </div>
    <div class="container-sm custom-container">
        <div class="col text-bg-light">
            <form method="post" action="functions/user_signup.php">
                <h5 class="text-center">Create a New Account</h5>
                <br>
                <br>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control" id="name" name="name" placeholder="First Last" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">Telephone (Optional)</label>
                    <input type="telephone" class="form-control" id="telephone" name="telephone"
                        placeholder="+44 123 456 7890">
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio (Optional)</label>
                    <textarea class="form-control" id="bio" name="bio" rows="4"
                        placeholder="Tell us a little bit about yourself..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary text-center">Submit</button>
            </form>
            <br><br>
            <p class="text-center">Are you an existing chef? <a href="login.php">Log In</a></p>
        </div>
    </div>

</body>

</html>