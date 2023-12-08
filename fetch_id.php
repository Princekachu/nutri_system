<?php

include('dbcon.php'); // Assuming this file includes your database connection

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT fnb_name, nutri_id, cat_id FROM food_and_beverage WHERE fnb_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($name, $nutrient, $category);

    // Fetch the result
    if ($stmt->fetch()) {
        // Return data in JSON format
        echo json_encode(array('name' => $name, 'nutrient' => $nutrient, 'category' => $category));
    } else {
        // Handle case when no data is found for the given ID
        echo json_encode(array('error' => 'No data found for the given ID.'));
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle case when ID parameter is not set
    echo json_encode(array('error' => 'ID parameter is not set.'));
}

// Close the database connection
$conn->close();

?>