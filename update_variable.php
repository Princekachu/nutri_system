<?php

    session_start();
    include('dbcon.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['value'])) {
            $val = $_POST['value'];

            $stmt = $conn->prepare("SELECT fnb_id, fnb_name, nutri_desc FROM food_and_beverage JOIN nutrient_tbl ON food_and_beverage.nutri_id = nutrient_tbl.nutri_id WHERE nutrient_tbl.nutri_name = ?");
            $stmt->bind_param("s", $val);
            $stmt->execute();
            $result = $stmt->get_result();

            // Store the result in the session variable
            $_SESSION['result'] = $result->fetch_all(MYSQLI_ASSOC);

            $stmt->close();
        }
    } else {
        echo '<script>window.close();</script>';
    }
?>