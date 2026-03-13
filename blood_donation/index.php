<?php
session_start();

// Cookie Check: Pre-fill email if it was remembered
$saved_email = isset($_COOKIE['donor_email']) ? $_COOKIE['donor_email'] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Mock Login: In a real app, check against database
    if ($email === "donor@example.com" && $pass === "password123") {
        $_SESSION['donor_name'] = "John Doe";
        $_SESSION['blood_type'] = "O+";

        // Implement Cookie: Save email for 7 days
        if (isset($_POST['remember'])) {
            setcookie("donor_email", $email, time() + (86400 * 7), "/");
        }

        header("Location: dashboard.php");
        exit();
    }
}
?>

<?php if(isset($_GET['status'])): ?>
    <p style="background: #d4edda; padding: 10px;">Welcome to the life-saving team, <?php echo $_GET['donor']; ?>!</p>
<?php endif; ?>

<form method="POST" action="index.php">
    <h2>Donor Login</h2>
    <input type="email" name="email" value="<?php echo $saved_email; ?>" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <label><input type="checkbox" name="remember"> Remember Email</label><br>
    <button type="submit">Login</button>
</form>
