<!DOCTYPE html>
<html>
<head>
    <title>Menu Order</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            background: white;
			margin: auto;
            padding: 50px;
            border-radius: 10x;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            text-align: left;
        }
        h2 {
            color: #333;
        }
        input[type='submit'] {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type='submit']:hover {
            background: #218838;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background:rgb(156, 149, 149);
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
	<div class="container">
    <h1> Menu</h1>
    <form method="POST">
        <?php
        $menu = [
            "Proben" => 5,
            "Buko" =>   10,
            "Siomai" => 5,
            "Water" =>  20,
    "Puso" =>             5,
        ];
        foreach ($menu as $item => $price) {
            echo "<input type='checkbox' name='order[]' value='$item'> $item - 	₱" . number_format($price, 2) . "<br>";
        }
        ?>
        <br>
        <input type="submit" name="submit" value="Submit Order">
    </form>
    <?php
    function calculateTotal($order, $menu) {
        $total = 0;
        foreach ($order as $item) {
            if (isset($menu[$item])) {
                $total += $menu[$item];
            }
        }
        return $total;
    }
    if (isset($_POST['submit']) && !empty($_POST['order'])) {
        $customerOrder = $_POST['order'];
        echo "<h3>Customer Order:</h3>";
        echo "<ul>";
        foreach ($customerOrder as $item) {
            echo "<li>$item</li>";
        }
        echo "</ul>";
        echo "<h3>Total Cost: $" . number_format(calculateTotal($customerOrder, $menu), 2) . "</h3>";
    }
    ?>
	</body>
</html>
