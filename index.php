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
