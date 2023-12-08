<?php

  include('dbcon.php');
 
  if (isset($_POST['submit'])) {
    $id = $_POST['id_num']; 
    $name = $_POST['name'];
    $nutrient = $_POST['nutrients'];
    $category = $_POST['categories'];
    $sql = "UPDATE `food_and_beverage` SET `fnb_name`='$name',`nutri_id`='$nutrient',`cat_id`='$category' WHERE `fnb_id`='$id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      echo "New record is updated successfully.";
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    } 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritional Guide </title>

    <style>
        body {

            background-color: rgb(255, 217, 122);
        }

        div.header {

            height: 150px;
            background-color: rgb(255, 217, 122);

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        div.main {

            height: 700px;
            background-color: rgb(68, 84, 106);
            box-shadow: inset 0 0 10px #000000;
            border-radius: 5px;
        }

        div.main_left {

            height: 695px;
            width: 600px;
            background-color: rgb(68, 84, 106);
            box-shadow: 0px 0px 5px black;
            border-radius: 5px;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            float: left;
        }

        div.main_right {

            height: 700px;
            background-color: rgb(68, 84, 106);
            box-shadow: 0px 0px 5px black;
            border-radius: 5px;

            display: flex;
            flex-direction: column;

            overflow-x: auto;

            background-image: url('BG-main.png');
            background-repeat: no-repeat;
            background-size: cover;
        }

        div.main_pnl {

            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            text-align: center;

            height: 645px;
        }

        div.footer {

            height: 200px;
            background-color: rgb(68, 84, 106);
            margin-top: -5px;
            border-radius: 5px;
        }

        label.main_txt {

            display: inline-block;
            vertical-align: middle;
            
            font-size: 40px;
            font-weight: bolder;
        }

        label.sub_txt {

            font-size: 16px;
            font-weight: bold;

            margin-top: 15px;
        }

        label.left_txt_top {

            color: rgb(255, 217, 122)  ;
            font-size: 25px;
            font-weight: bold;
            margin-bottom: -80px;

            text-align: center;
            padding: 0 50px;
        }

        label.left_txt_bot {

            color: #ffffff;
            font-size: 16px;
            margin-top: -50px;
        }

        img.left_img {

            width: 550px;
            height: auto;

            filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, 0.5));
            margin-top: 30px;
        }

        select {

            appearance: none;
            background-color: #f2f2f2;
            border: none;
            border-radius: 5px;
            color: #333;
            font-size: 16px;
            padding: 10px;
            width: 250px;
        }

        select::-ms-expand {

            display: none;
        }

        select:hover {

            background-color: rgb(255, 217, 122);
        }

        select:focus {

            outline: none;
        }

        div.footer_left {

            width: 400px;
            height: 200px;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            float: left;
        }

        label.un_txt, label.sgd_txt {

            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;

            color: rgb(255, 217, 122);
        }

        div.footer_right {

            height: 200px;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        label.sop_txt {

            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;

            text-align: center;
            padding: 0 50px;
            line-height: 1.7;
        }

        div.parent {

            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 50px;
        }

        div.child_1, div.child_2, div.child_3 {

            width: 300px;
            height: 100px;
            background-color: rgb(255, 217, 122);
            text-align: center;
            line-height: 100px;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0px 0px 2px black;
        }

        div.child_1, div.child_3 {

            background-color: WHITE;
        }   

        span.create, span.update, span.delete {

            display: inline-block;

            margin-top: 12px;
            font-weight: bold;
            font-size: 20px;
            letter-spacing: 2px;
            
            color: #333;
        }

        .input-style {

            border: 1.5px solid #fff;
            width: 253px;
            height: 37px;
            border-radius: 4px;
            overflow: hidden;
            background: #fafafa;
            padding: 5px 8px;

            font-size: 14px;
        }

        .input-id-style {

            border: 1.5px solid #fff;
            width: 110px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            background: #fafafa;
            padding: 5px 8px;

            text-align: center;
            font-weight: bolder;
            font-size: 18px;

            margin-top: 20px;
        }

        .input-style input, .input-id-style input {

            border: none;
            box-shadow: none;
            background: transparent;
            width: 100%;
        }

        input:focus {

            outline: none;
        }


        input.submit_btn {

            border: 1px solid #ccc;
            width: 170px;
            height: 35px;
            border-radius: 25px;
            font-weight: bold;

            margin-top: 22px;
        }

        span {

            display: inline-block;
            
            color: rgb(255, 217, 122);
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        div.identify, div.updation {

            background-color: #000000;
            opacity: 80%;
            border-radius: 10px;
            padding-top: 25px;
        }

        div.identify {

            width: 210px;
            height: 190px;
            margin-right: 50px; 
        }

        div.updation {

            width: 330px;
            height: 380px;
        }

        form {

            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>
<body>
    <div class="header">

        <label for="" class="main_txt">
            NUTRITIONAL GUIDE SYSTEM
        </label>

        <label for="" class="sub_txt">
            "A world with zero hunger can positively impact our economies, health, education, equality and social development."
        </label>
    </div>

    <div class="main">

        <div class="main_left">

            <label for="" class="left_txt_top">
                UNITED NATION'S SUSTAINABLE DEVELOPMENT GOALS
            </label>

            <img src="SDG-logo.png" alt="Image description" class="left_img">

            <label for="" class="left_txt_bot">
                ADD FOOD/BEVERAGE IN THE DATABASE
            </label>
        </div>

        <div class="main_right">

            <div class="parent">
                <div class="child_1" onclick="handleClick(1)">
                    <span class="create">CREATE</span>
                </div>
                    <div class="child_2" onclick="handleClick(2)">
                    <span class="update">UPDATE</span>
                </div>
                    <div class="child_3" onclick="handleClick(3)">
                    <span class="delete">DELETE</span>
                </div>
            </div>

            <div class="main_pnl">

                <form action="" method="post">

                    <div class="identify">

                        <span>ID NUMBER</span>
                        <br><input class="input-id-style" type="number" name="id_num" placeholder="ex. 10" required oninput="fetchData(this.value)">
                    </div>
                    
                    <div class="updation">

                        <span>NAME</span>
                        <br><input class="input-style" type="text" name="name" required><br>
            
                        <br><span>NUTRIENT</span><br>
                        <select name="nutrients" id="nutrients" required>
                            <option value="1">Carbohydrates</option>
                            <option value="2">Fats</option>
                            <option value="3">Protein</option>
                            <option value="4">Fiber</option>
                            <option value="5">Vitamins</option>
                            <option value="6">Calcium</option>
                            <option value="7">Iron</option>
                            <option value="8">Sodium</option>
                            <option value="9">Potassium</option>
                            <option value="10">Sugar</option>
                        </select><br>

                        <br><span>CATEGORY</span><br>
                        <select name="categories" id="categories" required>
                            <option value="1">Food</option>
                            <option value="2">Beverage</option>
                        </select><br>

                        <br><input class="submit_btn" type="submit" name="submit" value="UPDATE">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="footer">

        <div class="footer_left">
            
            <label for="" class="un_txt">
                UNITED NATION'S SDG 2
            </label>

            <label for="" class="sgd_txt">
                ZERO HUNGER
            </label>
        </div>

        <div class="footer_right">
            
            <label for="" class="sop_txt">
                The lack of access to proper nutrition has resulted in a global crisis, with millions of people suffering from chronic hunger and malnutrition. The insufficient knowledge of proper nutrition and limited access to nutritional resources are significant hindrances in promoting healthy food consumption and addressing nutritional inadequacies.
            </label>
        </div>
    </div>

    <script>
        function handleClick(buttonNumber) {

            switch (buttonNumber) {

                case 1:
                    window.location.href = 'admin_create.php';
                    break;
                case 2:
                    //alert("Update button clicked");
                    break;
                case 3:
                    window.location.href = 'admin_delete.php';
                    break;
            }
        }

        function fetchData(id) {
            // Use AJAX or fetch to send a request to the server and get data based on the input ID
            // For simplicity, I'll use a placeholder function here

            // Assume there's a PHP script on the server that fetches data based on the ID
            // Replace 'your_fetch_data_script.php' with the actual script name
            fetch(`fetch_id.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                // Update other form elements with the fetched data
                document.querySelector('input[name="name"]').value = data.name;
                document.querySelector('select[name="nutrients"]').value = data.nutrient;
                document.querySelector('select[name="categories"]').value = data.category;
            })
            .catch(error => console.error('Error fetching data:', error));
        }
    </script>
</body>
</html>
