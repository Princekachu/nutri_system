<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $value = $_POST['value'];
  // Now you can use the $value variable in your PHP code
  $result = mysqli_query($conn,"SELECT food_and_beverage.fnb_id, food_and_beverage.fnb_name, food_and_beverage.fnb_desc FROM food_and_beverage JOIN nutrient_tbl ON food_and_beverage.nutri_id = nutrient_tbl.nutri_id WHERE nutrient_tbl.nutri_name = '$value'");
}
?>