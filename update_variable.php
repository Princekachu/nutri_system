<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $value = $_POST['value'];
  // Now you can use the $value variable in your PHP code
  $result = mysqli_query($conn,"SELECT foodandbeverage.fnb_id, foodandbeverage.fnb_name, nutrient.nutri_desc FROM foodandbeverage JOIN nutrient ON foodandbeverage.nutri_id = nutrient.nutri_id WHERE nutrient.nutri_name = '$value'");
}
?>