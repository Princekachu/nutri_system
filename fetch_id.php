<?php
include('dbcon.php'); // Assuming this file includes your database connection

// Check if the name parameter is set
if (isset($_GET['name'])) {
    $name = $_GET['name'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT fnb_id, fnb_desc, nutri_id, cat_id FROM food_and_beverage WHERE fnb_name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($id, $description, $nutrient, $category);

    // Fetch the result
    if ($stmt->fetch()) {
        // Return data in JSON format
        header('Content-Type: application/json'); // Set content type header
        echo json_encode(array('id_num' => $id, 'description' => $description, 'nutrient' => $nutrient, 'category' => $category));
    } else {
        // Handle case when no data is found for the given name
        header('Content-Type: application/json'); // Set content type header
        echo json_encode(array('error' => 'No data found for the given name.'));
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle case when name parameter is not set
    header('Content-Type: application/json'); // Set content type header
    echo json_encode(array('error' => 'Name parameter is not set.'));
}

// Close the database connection
$conn->close();
?>