<?php
require 'config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    die('You must be logged in to book an ambulance.');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO bookings (user_id, pickup_location, dropoff_location) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$user_id, $pickup_location, $dropoff_location])) {
        echo 'Booking successful.';
    } else {
        echo 'Error: Could not book ambulance.';
    }
}
?>

<form method="POST">
    Pickup Location: <input type="text" name="pickup_location" required><br>
    Dropoff Location: <input type="text" name="dropoff_location" required><br>
    <input type="submit" value="Book">
</form>

