<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap');

        *{
            margin: 0 auto;
            padding: 0;
        }
        
        body{
            background: white;
            font-weight: bold;
        }

        .container{
            width: 700px;
            background: linear-gradient(90deg, rgba(3,0,38,1) 0%, rgba(0,89,131,1) 100%);
            padding: 30px;
            border-radius:  25px;
            margin-top: 200px;
            font-family: 'Raleway', sans-serif;
            font-size: 25px;
            height: 400px;
            box-shadow: 0px 0px 15px black;
        }

        h3{
            text-align: center;
            color: yellow;
            margin-bottom: 50px;
        }

        .row{
            margin-top: 5px;
            margin-left: 100px;
        }

        .first-row{
            margin-top: 20px;
        }

        label{
            margin-right: 50px;
            color: white;
        }

        input{
            padding: 15px;
            border-radius: 25px;
            border: none;
            background-color: #DCDCDC;
        }

        select, option{
            border: none;
            border-radius: 25px;
            padding: 15px;
            margin-left: 20px;
            background-color: #DCDCDC;
            font-weight: bold;
        }

        #button{
            padding: 15px 25px;
            border-radius: 25px;
            border: none;
            font-family: 'Raleway', sans-serif;
            font-size: 20px;
            margin-left: 305px;
            margin-bottom: 50px;
            font-weight: bold;
        }

        p{
            color: white;
            text-align: center;
        }
        
    </style>
</head>
<body>

    <div class="container">

        <form action="bmi.php" method="get">
            <h3>Body Mass Index Calculator</h3>
            <div class="first-row row">
                <label for="weight">Weight   : </label>
                <input type="text" name="weight">
            </div>
            <br>
            <div class="second-row row">
                <label for="height">Height   : </label>
                <input type="text" name="height">
                <select name="measurement" id="measurement">
                    <option value="cm">cm</option>
                    <option value="m">m</option>
                    <option value="inch">inch</option>
                </select>
            </div>
            <br>
            <Button type="submit" id="button">Calculate</Button>
            <p>Your Body Mass index is <?php echo display() ?>. This is considered <?php echo suggetion()?> </p>
        </form>

    </div>

    <?php

        $BMIvalue = 0;
        
        function display(){

            if(isset($_GET["weight"])){
                $weight = (double)$_GET["weight"];
            } else {
                $weight = 0;
            }
            if(isset($_GET["height"])){
                $height = (double)$_GET["height"];
            } else {
                $height = 0;
            }
            if(isset($_GET["measurement"])){
                $measurement = $_GET["measurement"];
            } else {
                $measurement = "";
            }
            
            

            if($weight == 0 or $height == 0){
                $GLOBALS['BMIvalue'] = 0;
                return $GLOBALS['BMIvalue'];
            }

            if($measurement == "cm"){
                $height = $height / 100;
            } else if($measurement == "inch"){
                $height = $height * 0.0254;
            }

            $GLOBALS['BMIvalue'] = $weight / pow($height,2);
            $GLOBALS['BMIvalue'] = round($GLOBALS['BMIvalue'],2);
            return $GLOBALS['BMIvalue'];     
        }

        function suggetion(){
            
            $displayString = "";
            if($GLOBALS['BMIvalue'] > 0 && $GLOBALS['BMIvalue'] < 18.5){
                $displayString = "Under weight";
            } elseif($GLOBALS['BMIvalue'] >= 18.5 && $GLOBALS['BMIvalue'] < 24.9){
                $displayString = "Normal";
            } elseif($GLOBALS['BMIvalue'] >= 25 && $GLOBALS['BMIvalue'] < 29.0){
                $displayString = "Overweight";
            } elseif($GLOBALS['BMIvalue'] >= 30 && $GLOBALS['BMIvalue'] < 34.9){
                $displayString = "Overweight";
            } elseif($GLOBALS['BMIvalue'] >= 34.9) {
                $displayString = "Extremely Obese";
            }

            return $displayString;

        }
        
    ?>
    
</body>
</html>