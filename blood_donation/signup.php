<?php
session_start();
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $blood_type = $_POST['blood_type'];
    $age = (int)$_POST['age'];

    // 1. Validation: Required Fields
    if (empty($name) || empty($email)) {
        $errors[] = "Full name and Email are required.";
    }

    // 2. Validation: Blood Type check
    $valid_types = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
    if (!in_array($blood_type, $valid_types)) {
        $errors[] = "Please select a valid blood type.";
    }

    // 3. Validation: Age Check (Minimum 18 for donors)
    if ($age < 18) {
        $errors[] = "You must be at least 18 years old to donate blood.";
    }

    if (empty($errors)) {
        // Success! Redirect with GET data for your documentation
        header("Location: index.php?status=success&donor=" . urlencode($name));
        exit();
    }
}
?>

<h2>Donor Registration</h2>
<form method="POST" action="signup.php">
    <?php foreach($errors as $err) echo "<p style='color:red;'>$err</p>"; ?>
    <input type="text" name="fullname" placeholder="Full Name"><br>
    <input type="email" name="email" placeholder="Email Address"><br>
    <input type="number" name="age" placeholder="Age"><br>
    <select name="blood_type">
        <option value="">Select Blood Type</option>
        <option value="O+">O+</option>
        <option value="A+">A+</option>
        </select><br>
    <button type="submit">Register as Donor</button>
</form>
