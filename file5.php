<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $ambulance_id = $_POST['ambulance_id'];

    $sql = "INSERT INTO bookings (user_id, ambulance_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $ambulance_id);
    
    if ($stmt->execute()) {
        echo "Booking successful";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
