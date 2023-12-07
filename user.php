<?php
  include('dbcon.php');
  $val = 'Carbohydrates';
  $result = mysqli_query($conn,"SELECT food_and_beverage.fnb_id, food_and_beverage.fnb_name, nutrient_tbl.nutri_desc FROM food_and_beverage JOIN nutrient_tbl ON food_and_beverage.nutri_id = nutrient_tbl.nutri_id ORDER BY fnb_id");
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
            width: 400px;
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

        label.left_txt_top, label.left_txt_bot {

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

        button.gen_btn {

            background-color: rgb(255, 217, 122);
            border: none;
            border-radius: 5px;
            color: #000;
            font-size: 14px;
            font-weight: bold;
            padding: 10px 20px;
            margin-top: 50px;
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

            <img src="E_GIF_02.gif" alt="Image description" class="left_img">

            <label for="" class="left_txt_top">
                PLEASE CHOOSE
            </label>

            <label for="" class="left_txt_bot">
                FROM THE OPTIONS BELOW
            </label>
    
                <select name="nutrients" id="nutrients" onchange="updateVariable(this.value)">
                    <option value="Carbohydrates">Carbohydrates</option>
                    <option value="Fats">Fats</option>
                    <option value="Protein">Protein</option>
                    <option value="Fiber">Fiber</option>
                    <option value="Vitamins">Vitamins</option>
                    <option value="Calcium">Calcium</option>
                    <option value="Iron">Iron</option>
                    <option value="Sodium">Sodium</option>
                    <option value="Potassium">Potassium</option>
                    <option value="Sugar">Sugar</option>
                </select>

                <script>

                    function updateVariable(value) {

                        var xhttp = new XMLHttpRequest();
                        xhttp.open("POST", "update_variable.php", true);
                        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp.send("value="+value);
                    }
                </script>
                
                <button type="submit" class="gen_btn" name="gen">
                    GENERATE
                </button>
        </div>

        <div class="main_right">

            <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                <table id="output">
                
                <tr class="head_tbl">
                    <td>ID</td>
                    <td>NAME</td>
                    <td>DESCRIPTION</td>
                </tr>
                <?php
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                ?>
                <tr class="rows_txt">
                    <td class="cell"><?php echo $row["fnb_id"]; ?></td>    
                    <td class="cell"><?php echo $row["fnb_name"]; ?></td>
                    <td class="cell_desc"><?php echo $row["nutri_desc"]; ?></td>
                </tr>
                <?php
                $i++;
                }
                ?>
                </table>
                <?php
                }
                else{
                    echo "No result found";
                }
            ?>
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
</body>
</html>