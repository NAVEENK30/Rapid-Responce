<?php
$sql = "SELECT * FROM ambulances WHERE available = TRUE";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Ambulance ID: " . $row["id"]. " - Location: " . $row["location"]. "<br>";
    }
} else {
    echo "No ambulances available";
}
?>
