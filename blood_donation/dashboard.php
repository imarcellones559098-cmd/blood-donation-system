<?php
session_start();
if (!isset($_SESSION['donor_name'])) {
    header("Location: index.php");
    exit();
}
?>

<div style="border: 2px solid #b22222; padding: 20px; border-radius: 10px;">
    <h1>Blood Donor Dashboard</h1>
    <p><strong>Donor Name:</strong> <?php echo $_SESSION['donor_name']; ?></p>
    <p><strong>Blood Group:</strong> <?php echo $_SESSION['blood_type']; ?></p>
    <hr>
    <h3>Next Appointment:</h3>
    <p>None scheduled. <a href="#">Click here to find a blood drive.</a></p>
    <br>
    <a href="logout.php">Logout</a>
</div>
