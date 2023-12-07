<?php

  include('dbcon.php');
 
    $result = mysqli_query($conn, "SELECT fnb_id, fnb_name, nutri_desc FROM food_and_beverage JOIN nutrient_tbl ON food_and_beverage.nutri_id = nutrient_tbl.nutri_id ORDER BY fnb_id");

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

            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        img.left_img {

            width: 200px;
            height: auto;

            filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, 0.5));

            margin-bottom: 60px;
        }

        select {

            appearance: none;
            background-color: #f2f2f2;
            border: none;
            border-radius: 5px;
            color: #333;
            font-size: 16px;
            padding: 10px;
            width: 200px;

            margin-top: 40px;
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

        tr.head_tbl {

            background-color: #f2f2f2;
            height: 40px;
            text-align: center;

            font-size: 14px;
            font-weight: bold;

            position: sticky;
            top: 0;
        }

        tr.rows_txt {

            font-size: 15px;
            font-weight: bold;
            color: #f2f2f2;
        }

        table {

            border-collapse: separate;
            border-spacing: 3px;

            height: 700px;
            overflow: auto;
        }

        td.cell {

            padding: 10px;
            text-align: center;
        }

        td.cell_desc {

            padding: 10px;
        }

        #output {


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

            <img src="SGD-logo.png" alt="Image description" class="left_img">

            <label for="" class="left_txt_top">
                ADD
            </label>
        </div>

        <div class="main_right">

            
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

        function updateVariable(value) {
            
            // Update hidden input value
            document.getElementById("nutrients").value = value;
            
            // Submit the form
            document.getElementById("myForm").submit();
        }
    </script>
</body>
</html>