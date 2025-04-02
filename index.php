<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-e<quiv="Content-Type" content="text/html; charset=utf-8">
<title>BMI CALCULATOR</title>
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	color:rgb(36, 60, 63);
	font-size: 12px;
}
 .container {
     max width: 500px;
     margin: auto;
     padding: 15;
     background-color: #f8f8ff;
     border-raidus: 5px;
     box-shadow: 0 5x 15px rgba(0, 0, 0, 0.09)
 }
.style1 {color:rgb(158, 142, 142)}
.style2 {
	color:rgb(183, 214, 45);
	font-weight: bold;
}
.style3 {color:rgb(8, 32, 8)}
.style7 {color:rgb(3, 3, 255); font-style: italic; }
body {  
	background: linear-gradient(45deg, red, orange, yellow, green, blue, indigo, violet, red);
}
.style8 {color:rgb(15, 22, 224)}
</style></head>
<body>
<p>&nbsp;</p>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#1230">
  <tbody><tr>
    <td><h1 align="center">&nbsp;</h1>
      <table width="75%" border="0" align="center" cellpadding="5" cellspacing="0">
        <tbody><tr>      
        </tr>
<?php
$bmi = '';
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    if (is_numeric($weight) && is_numeric($height) && $weight > 0 && $height > 0) {
        $heightInMeters = $height / 100;  // Convert height to meters
        $bmi = $weight / ($heightInMeters * $heightInMeters);  // BMI formula

        // Categorize BMI
        if ($bmi < 18.5) {
            $message = 'Low but risk of other clinical problems increased';
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $message = 'Normal Range';
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $message = 'Overweight';
        } elseif ($bmi >= 30.0 ) {
            $message = 'Obese';
        } else {
            $message = 'Obese';
        }
    } else {
        $message = 'Please enter valid numbers for weight and height.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>BMI Calculator</h1>
        <form action="index.php" method="POST">
            <label for="weight">Weight (kg):</label>
            <input type="number" name="weight" id="weight" required>
            
            <label for="height">Height (cm):</label>
            <input type="number" name="height" id="height" required>
            
            <button type="submit">Calculate BMI</button>
        </form>

        <?php if ($bmi != ''): ?>
            <div class="result">
                <h2>Your BMI: <?php echo round($bmi, 2); ?></h2>
                <p>Category: <?php echo $message; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
